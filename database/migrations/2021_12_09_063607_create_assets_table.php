<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('assets', static function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("code");
            $table->string("image")->nullable();
            $table->integer("qty_balance")->default(0);
            $table->foreignId("category_id");
            $table->foreignId("status_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
}
