<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
//            $table->id();
            $table->increments('id')->unique();//  use increments to prevent foreign key error
            $table->string('first_name');
            $table->string('last_name');
            $table->unsignedInteger('company_id')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->timestamps();

            // ADD FOREIGN KEY: references on delete cascade
            $table->foreign('company_id')
                ->references('id')
                ->on('companies')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
