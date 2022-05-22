<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('weight');
            $table->string('colour');
            $table->string('qty');
            $table->string('pickup');
            $table->string('destination'); 
            $table->string('warehouse');
            $table->string('transportation_mode');
            $table->string('status');
            $table->string('pickup_date');
            $table->string('delivery_date');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventories');
    }
}
