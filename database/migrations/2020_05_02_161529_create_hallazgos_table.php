<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHallazgosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hallazgos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('memorandum');
            $table->integer('leaderAudit_id')->unsigned();
            $table->integer('auditGroup_id')->unsigned();
            $table->string('responsibles');
            $table->string('timeFindings');
            $table->string('dateTransfers');
            $table->integer('validityAudit');
            $table->integer('dateEndAudit');
            $table->bigInteger('valueFindings');
            $table->integer('typeFinding_id')->unsigned();
            $table->string('file')->nullable();
            $table->string('slug')->unique();
            $table->softDeletes();
            $table->timestamps();

            //relaciones
            $table->foreign('typeFinding_id')->references('id')->on('type_findings')->onDelete('cascade');
            $table->foreign('auditGroup_id')->references('id')->on('audit_groups')->onDelete('cascade');
            $table->foreign('leaderAudit_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hallazgos');
    }
}
