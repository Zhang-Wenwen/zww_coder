<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageBoardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('message_board', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps('created_at');
            $table->timestamps('updated_at');
            $table->char('name',20);
            $table->unsignedInteger('id');
            $table->char('email',50);
            $table->char('text',50);
            $table->unsignedInteger('is_examined',2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('message_board');
    }
}
