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
            $table->id();
            $table->string('memorandum');
            $table->integer('leaderAudit');
            $table->integer('auditGroup');
            $table->string('responsibles');
            $table->string('timeFindings');
            $table->string('dateTransfers');
            $table->integer('validityAudit');
            $table->integer('dateEndAudit');
            $table->integer('valueFindings');
            $table->integer('typeFinding');
            $table->string('file');
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
        Schema::dropIfExists('hallazgos');
    }
}
