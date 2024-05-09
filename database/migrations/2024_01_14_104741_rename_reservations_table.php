<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Exécute les migrations.
     */
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            // Déclarer la clé primaire
            $table->bigIncrements('id');

            // Déclarer les clés étrangères
            $table->unsignedBigInteger('chambre_id');
            $table->unsignedBigInteger('client_id');

            // Ajouter d'autres colonnes pour la table "reservations"
            $table->date('date_arrivee');
            $table->date('date_depart');
            $table->integer('nombre_personnes');

            // Déclarer les contraintes de clé étrangère
            $table->foreign('chambre_id')->references('id')->on('chambres')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

            // Ajouter les horodatages pour la table "reservations"
            $table->timestamps();
        });
    }

    /**
     * Revertit les migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
