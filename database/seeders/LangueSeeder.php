<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Langue;

class LangueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Langue::create(['nom_langue'  => 'Minan' , 'code_langue' => 'Min' ,  'description' => 'Langue du Benin'] );
        Langue::create(['nom_langue'  => 'Yoruba'  ,  'code_langue' =>'Yor'  , 'description' => 'Langue du Benin']  );
        Langue::create(['nom_langue'  => 'Dendi' , 'code_langue' => 'Den' , 'description' => 'Langue du Benin' ] );
        Langue::create(['nom_langue'  => 'Bariba'  , 'code_langue' => 'Bar' ,  'description' => 'Langue du Benin' ]);
    }
}
