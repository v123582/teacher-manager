<?php

use Illuminate\Database\Seeder;
use App\User;
use App\File;

class FileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('files')->delete();
        $users = User::all()->lists('id')->toArray();
		for ($i = 1; $i <= 10; $i++) {
	        $randdomUser = $users[array_rand($users)];
	        File::create(array(
	            'user' => $randdomUser,
	            'name' => str_random(10),
	            'subject' => str_random(10),
	            'chapter' => str_random(10),
	            'grade' => str_random(10),
	            'topic' => str_random(10),
	            'link' => str_random(10),
	            'description' => str_random(10),
	        ));
		}


    }
}

// $table->increments('id');
// $table->string('user'); # 上傳使用者
// $table->string('name'); # 檔案名稱
// $table->string('subject'); # 科目
// $table->string('chapter'); # 章節
// $table->string('grade'); # 年級
// $table->string('topic'); # 主題
// $table->string('link'); # 網址
// $table->text('description'); # 敘述   
// $table->timestamps();