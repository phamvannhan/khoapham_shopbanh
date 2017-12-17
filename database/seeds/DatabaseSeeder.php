<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
    }
}
class UsersTableSeeder extends Seeder
{
    //thêm dữ liệu của bảng users tự tạo
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        //tao bang xem tren document 
        DB::table('users')->insert([
            ['full_name' =>'teo','email'=>'teo@gmail.com','password'=>Hash::make(12345)],
             ['full_name' =>'ty','email'=>'ty@gmail.com','password'=>bcrypt(12345)]
        ]);
    }
}
