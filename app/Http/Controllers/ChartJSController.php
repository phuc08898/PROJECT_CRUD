<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;


class ChartJSController extends Controller
{
    public function index()
    {
        // Sample data for the chart
        $labels = ['January', 'February', 'March', 'April', 'May', 'June', 'July'];
        $data = [0, 10, 5, 2, 20, 30, 45];


        // Pass data to the view
        return view('chart', compact('labels', 'data'));
    }
}

