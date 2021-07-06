<?php


namespace App\ControllerHelpers;


use App\Models\Category;

class PoolControllerHelper
{

    private $input;

    /**
     * Функция для проверки значений в инпут
     */
    private function privateCheckInput($word, $max){
        for($i = 1; $i<=$max; $i++){
            if($this->input[$word."_image".$i] == "null"){
                $this->input[$word."_image".$i] = null;
            }
        }
    }





/**
 * Функция для возвращения инпута с проверенными на значения нулл фотографиями
 */
    public function getInput($input){

        $this->input = $input;

        $this->privateCheckInput("slider", 3);
        $this->privateCheckInput("gallery", 5);

        return $this->input;
    }


    /**
     * Функция для возвращения массива категорий
     */
    public function getCatogories(){
        $categories = Category::all();
        $result_categories = array();

        foreach ($categories as $category){
            $result_categories[$category->id] = $category->name;
        }

        return $result_categories;
    }






}
