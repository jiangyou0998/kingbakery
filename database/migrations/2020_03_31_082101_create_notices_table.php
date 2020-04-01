<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->bigInteger('dept');
            $table->string('filepath');
            $table->bigInteger('user');
            $table->date('date_create')->default(null);
            $table->date('date_modify')->default(null);
            $table->date('date_delete')->default(null);
            $table->unsignedbigInteger('notice_no')->default(0);
            $table->date('date_until');
            $table->string('first_path');
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
        Schema::dropIfExists('notices');
    }
}
