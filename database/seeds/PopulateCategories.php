<?php

use Illuminate\Database\Seeder;

use App\Models\Category;

class PopulateCategories extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $idents = [
            'colombian_salsa' => 'Salsa colombienne',
            'bachata' => 'Bachata',
            'afro_colombian' => 'Afro-colombienne',
            'latin_rumba' => 'Latin Rumba',
            'capoeiria' => 'Capoeira',
            'belly_dance' => 'Belly dance',
            'other' => 'Autre',
        ];

        foreach ($idents as $ident => $label) {
            $cat = new Category;
            $cat->timestamps = false;
            $cat->ident = $ident;
            $cat->label = $label;
            $cat->save();
        }
    }
}
