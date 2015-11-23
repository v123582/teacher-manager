<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user'); # 上傳使用者
            $table->string('name'); # 檔案名稱
            $table->string('subject'); # 科目
            $table->string('chapter'); # 章節
            $table->string('grade'); # 年級
            $table->string('topic'); # 主題
            $table->string('link'); # 網址
            $table->text('description'); # 敘述
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
        Schema::drop('files');
    }
}
