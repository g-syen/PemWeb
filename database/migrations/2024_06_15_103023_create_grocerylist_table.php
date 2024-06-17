<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrocerylistTable extends Migration
{
    public function up()
    {
        Schema::create('grocerylist', function (Blueprint $table) {
            $table->id();
            $table->string('namaBarang');
            $table->boolean('isChecked')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('grocerylist');
    }
}
