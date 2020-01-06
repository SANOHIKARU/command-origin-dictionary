<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commands', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('category_id')->unsigned();
            //string()はVARCHAR型である。2つ目の引数でサイズを指定できる。
            $table->string('name');
            $table->text('origin');
            $table->string('description');
            $table->timestamps();

            // 外部キー制約設定
            $table->foreign('category_id')
                  ->references('category_id')
                  ->on('categories')
                  ->onDelete('restrict') //削除拒否
                  ->onUpdate('cascade'); //更新同行
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('commands');
    }
}
