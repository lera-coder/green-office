<?php

namespace Database\Seeders;

use App\Models\Photo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PortfolioPhotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 0;

        $photos = Photo::all();

        $filtered = $photos->reject(function ($value) {
            return (($value->visibility == 0)||($value->name =='balaton main image')||($value->name == 'komo8 main image')||($value->name == 'leman main image')||($value->name == 'komo10 main image')
                ||($value->name == 'komo main image')||($value->name == 'eden main image')||($value->name == 'rio main image')||($value->name == 'kupel main image')
                ||($value->name == 'baycal main image')||($value->name == 'ontario main image')||($value->name == 'marsel main image')||($value->name == 'torrens main image')
            ||($value->name == 'odessa main image')||($value->name == 'taho main image')||($value->name == 'mayami main image')||($value->name == 'baffalo main image')
                ||($value->name == 'nicca main image')||($value->name == 'victoriia main image')||($value->name == 'venecia main image')||($value->name == 'michigan main image')
                ||($value->name == 'ritsa main image')||($value->name == 'komo4 main image')||($value->name == 'eldorado main image')||($value->name == 'baden main image'));
        });

        foreach ($filtered as $photo){
            $i++;
            DB::table('portfolio_photos')->insert([
                'order'=> $i,
                'photo_id'=> $photo->id
            ]);
        }


    }
}
