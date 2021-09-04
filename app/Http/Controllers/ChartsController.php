<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chart;
use Illuminate\Support\Facades\DB;

class ChartsController extends Controller
{
    public function index() {
        // Get users grouped by age and gender
        $groups = DB::table('users')
            ->select('age', DB::raw('count(*) as total'))
            ->groupBy('age')
            ->pluck('total', 'age')->all();
        $gender = DB::table('users')
            ->select('gender', DB::raw('count(*) as total'))
            ->groupBy('gender')
            ->pluck('total', 'gender')->all();

        // Generate random colours for the groups
        for ($i=0; $i <= count($groups); $i++) {
            $colours[] = '#' . substr(str_shuffle('ABCDEF0123456789'), 0, 6);
        }
        // Prepare the data for returning with the view
        $chart = new Chart();
        $chart->labels = (array_keys($groups));
        $chart->dataset = (array_values($groups));
        $chart->colours = $colours;

        $gender_label = array_keys($gender);
        // ["male", "female", "all"]
        $gender_data = array_values($gender);
        // [11, 9, 20]
        return view('dashboard', compact('chart', 'gender_label', 'gender_data', 'gender'));
    }}
