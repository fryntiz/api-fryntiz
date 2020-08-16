<?php

namespace App\SmartPlant;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Plant
 *
 * Representa una planta que será asociada desde los registros de lecturas
 * subidos a la API.
 *
 * @package App\SmartPlant
 */
class Plant extends Model
{
    protected $table = 'smartbonsai_plants';

    /**
     * Relación con todos los registros de lecturas asociados a una planta.
     * @return mixed
     */
    public function registers()
    {
        return $this->hasMany(PlantRegister::class, 'smartbonsai_plant_id', 'id');
    }

    public function getUrlImageAttribute()
    {
        $image = $this->image ?? 'smartplant/default.jpg';

        return asset('storage/' . $image);
    }

    /**
     * Devuelve los 100 últimos registros.
     *
     * @return mixed
     */
    public function last100registers()
    {
        return PlantRegister::where('smartbonsai_plant_id', $this->id)
            ->whereNotNull('soil_humidity')
            ->orderBy('created_at', 'DESC')
            ->limit(100)
            ->get();
    }
}
