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
    Schema::create('addproduct', function (Blueprint $table) {
        $table->id();
        $table->string('src');
        $table->decimal('price', 8, 2);
        $table->string('name');
        $table->text('description');
        $table->decimal('sellprice', 8, 2);
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
        //
    }
};
