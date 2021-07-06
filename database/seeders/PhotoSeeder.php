<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $main_path = "https://admin.greenoffice.in.ua/public/images/main";
        $directory = "public/images/main";    // Папка с изображениями

        //Добавление системного файла
        DB::table('photos')->insert([
            'name' => "Картинка удаленой фотографии",
            'photo_url' => "https://admin.greenoffice.in.ua/public/images/technical/1.jpg",
            'visibility' => false
            ]);


        //пробуем открыть папку
        $dir_handle = @opendir($directory) or die("Ошибка при открытии папки !!!");

        while ($file = readdir($dir_handle))    //поиск по файлам
        {
            if($file=="." || $file == "..") continue;  //пропустить ссылки на другие папки


               DB::table('photos')->insert([
                   'name' => explode(".", $file)[0] . ' main image',
                   'photo_url' => "https://admin.greenoffice.in.ua/public/images/main/". $file,
                   ]);

        }
        closedir($dir_handle);  //закрыть папку

    }
}
