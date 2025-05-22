<?php

namespace Database\Seeders;

use App\Models\Train;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class TrainTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $trains = []; // array per debug
        for ($i = 0; $i < 25; $i++) {

            $newTrain = new Train();
            $newTrain->azienda = $faker->company() . ' ' . $faker->companySuffix();
            $newTrain->stazione_partenza = $faker->city();
            $newTrain->stazione_arrivo = $faker->city();
            $newTrain->orario_partenza = $faker->time();
            $newTrain->orario_arrivo = $faker->time();
            $newTrain->data_di_partenza = $faker->dateTimeBetween('-1 week', '+1 week');
            $newTrain->posti_disponibili = $faker->numberBetween(0, 400);
            $newTrain->codice_treno = $faker->bothify('??-##########');
            $newTrain->totale_carrozze = $faker->numberBetween(7, 20);
            $newTrain->tipo_treno = $faker->word();
            $newTrain->stato_treno = $faker->boolean(50);
            $newTrain->cancellato = $faker->boolean(50);
            $newTrain->in_ritardo = $faker->boolean(50);

            $newTrain->save();
            // Aggiungi all'array per debug
            $trains[] = $newTrain->toArray();

        }

        // Debug alla fine di tutti i treni
        dd($trains);
    }
}
