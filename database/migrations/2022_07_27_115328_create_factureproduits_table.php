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
        Schema::create('factureproduits', function (Blueprint $table) {
            $table->id();

            $table->string('id_produit');
            $table->string('id_facture');
            $table->integer('quantite');
            $table->string('service')->nullable();
            $table->string('montant');
            $table->string('remise')->nullable();
            $table->string('totale_montant');

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
        Schema::dropIfExists('facture-produits');
    }
};
