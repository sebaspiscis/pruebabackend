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
        Schema::create('productos', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->uuid('id')->primary();

            $table->string('name', 50);
            $table->string('description', 250);
            $table->decimal('price', 10, 2);
            $table->unsignedInteger('stock');
            $table->boolean('estado')->default(1);

            $table->uuid('categoria_id');

            $table->index('categoria_id');

            $table->foreign('categoria_id')
                ->references('id')
                ->on('categorias')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
