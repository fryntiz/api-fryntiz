<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateCvProjectsTable
 */
class CreateCvProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cv_projects', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->charset = 'utf8';
            $table->collation = 'utf8_unicode_ci';
            $table->bigIncrements('id');
            $table->unsignedBigInteger('curriculum_id')
                ->comment('Relación con el curriculum');
            $table->foreign('curriculum_id')
                ->references('id')->on('cv_curriculums')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            $table->unsignedBigInteger('image_id');
            $table->foreign('image_id')
                ->references('id')->on('files')
                ->onUpdate('cascade')
                ->onDelete('no action');
            $table->unsignedBigInteger('repository_id')->nullable();
            $table->foreign('repository_id')
                ->references('id')->on('cv_repositories')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            $table->text('url');
            $table->text('urlinfo');
            $table->text('repository');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cv_projects', function (Blueprint $table) {
            $table->dropForeign(['image_id']);
            $table->dropForeign(['curriculum_id']);
            $table->dropForeign(['repository_id']);
        });
    }
}
