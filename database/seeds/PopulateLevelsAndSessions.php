<?php

use Illuminate\Database\Seeder;

use App\Models\Level;
use App\Models\Session;

class PopulateLevelsAndSessions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $idents = [
            'beginner1' => 'Débutant 1',
            'beginner2' => 'Débutant 2',
            'improvement' => 'Perfectionnement',
            'transitional1' => 'Intermédiaire 1',
            'transitional2' => 'Intermédiaire 2',
        ];

        foreach ($idents as $ident => $label) {
            $level = new Level;
            $level->ident = $ident;
            $level->label = $label;
            $level->save();
        }

        $session = new Session;
        $session->label = 'Janvier-Février-Mars 2019';
        $session->date_start = \Carbon\Carbon::createFromFormat('Y-m-d', '2019-01-14');
        $session->date_end = \Carbon\Carbon::createFromFormat('Y-m-d', '2019-03-08');
        $session->save();
    }
}
