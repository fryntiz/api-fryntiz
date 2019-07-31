<?php

namespace App\Http\Controllers\Webhook;

use App\Http\Controllers\Controller;
use App\Webhook\Gitlab\GitlabWebhook;
use function config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use function info;
use Symfony\Component\Process\Process;

/**
 * Class GitlabWebhookController
 *
 * Controlador para tratar los webhooks desde gitlab.
 *
 * Con espacio de rutas propios no tiene middleware, para dejarlo en "web es
 * necesario habilitar en el middleware VerifyCsrfToken el método utilizado
 * para excluirlo ya que no hay sesión para validar el usuario en este tipo de
 * peticiones.
 * Esto se lleva a cabo con la propiedad $except. Pero solo cuando se hace
 * bajo web.php, si usas un espacio propio no es necesario.
 *
 * @package App\Http\Controllers\Webhook
 */
class GitlabWebhookController extends Controller
{
    /**
     * Despliega la última versión del master para la API
     * php artisan down
     * git checkout -- .
     * git pull
     * npm install --production
     * composer install --no-interaction --no-dev --prefer-dist
     * php artisan migrate --force
     * php artisan up
     *
     */
    public function apiDeploy(Request $request)
    {
        Log::info('Entra en apiDeploy');
        $gitLabWebHook = new GitlabWebhook();
        $gitLabWebHook->token = $request->header('X-Gitlab-Token');
        $gitLabWebHook->request = $request->all();

        ## Si coinciden los hashs lanza el comando bash para desplegar
        if ($gitLabWebHook->isValidHash()) {
            Log::info('Hash de Gitlab validado');
            $root_path = base_path();
            $process = new Process([
                'cd ' . $root_path . ';' .
                ' ./scripts/webhooks/api-deploy.sh',
            ]);

            try {
                $process->run();
            } catch (Exception $e) {
                Log::error('Fallo al ejecutar WebHook');
            }

            // TODO → Crear log en "webhooks/api-deploy"
            Log::info('webhooks/api-deploy', $process->getOutput());
            Log::info('webhooks/api-deploy', $process->getErrorOutput());
        }
    }

    /**
     * Procesa las notificaciones de eventos realizados en gitlab como
     * un bot, correo, procesar dato... etc...
     */
    public function apiNotification(Request $request)
    {

    }
}
