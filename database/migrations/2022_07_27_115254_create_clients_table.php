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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('type')->nullable();
            $table->string('nom')->nullable();
            $table->string('prenom')->nullable();
            $table->string('telephone')->nullable();
             $table->string('email')->nullable();
            $table->string('entreprise')->nullable();
            $table->string('adresse')->nullable();
            $table->string('adr_livraison')->nullable();
            $table->string('adr_facturation')->nullable();
            $table->string('registre_commerce')->nullable();
            $table->string('raison_sociale')->nullable();
            $table->string('statut_juridique')->nullable();
            $table->string('nif')->nullable();
            $table->string('nis')->nullable();


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
        Schema::dropIfExists('clients');
    }
};
