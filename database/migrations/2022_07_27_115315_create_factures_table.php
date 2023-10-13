<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->id();
            $table->string('code_facture')->nullable();
            $table->integer('id_client')->nullable();
            $table->integer('id_user')->nullable();
            $table->string('type_facture')->nullable();
            $table->string('statut')->nullable();
            $table->date('date')->nullable();
            $table->string('remise')->nullable();
            $table->string('exist_remise')->nullable();
            $table->string('tva')->nullable();
            $table->string('totale_ht')->nullable();
            $table->string('totale_tva')->nullable();
            $table->string('totale_ttc')->nullable();

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
        Schema::dropIfExists('factures');
    }
};
