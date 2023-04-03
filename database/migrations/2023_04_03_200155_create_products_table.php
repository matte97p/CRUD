<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->double('price'); //TODO implement tariffario timed
            $table->integer('sell_percentage'); //TODO implement tariffario timed
            $table->string('sku');
            $table->string('image')->default('https://www.google.com/url?sa=i&url=https%3A%2F%2Fit.vecteezy.com%2Farte-vettoriale%2F5377442-404-icona-pagina-errore-pagina-non-trovata-icona-linea-computer-portatile-con-segnale-di-avvertimento-ed-errore-404-problema-di-connessione-internet-file-non-trovato-e-rotto-pagina-icona-illustrazione-vettoriale&psig=AOvVaw12York0Egtq3iMdpFPXn0o&ust=1680639875832000&source=images&cd=vfe&ved=0CBAQjRxqFwoTCJC-j8jFjv4CFQAAAAAdAAAAABAn');
            $table->integer('availability')->default(0); //TODO implement warehouse with a view of { ORDER - SELL }
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
