<?php

namespace App\Http\Controllers;

use App\Models\Train;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $currentDate = date('Y-m-d');
        $currentHour = date('H:i:s');


        $availableTrains = Train::where('data_di_partenza', '>=', $currentDate)
            ->where('posti_disponibili', '>', 0)
            ->where('cancellato', 0)
            ->get()
            ->toArray();


        $futureAvailableTrains = array_filter($availableTrains, function ($train) use ($currentDate, $currentHour) {
            if (($train['data_di_partenza'] == $currentDate && $train['orario_partenza'] < $currentHour) || ($train['data_di_partenza'] > $currentDate)) {
                return $train;
            }

        });

        // dd($availableTrains);

        return view('welcome', compact('futureAvailableTrains'));
    }

}
