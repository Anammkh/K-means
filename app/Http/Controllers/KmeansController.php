<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KmeansController extends Controller
{
    public function dataset()
    {
        // Return view for dataset
        return view('admin.kmeans.dataset');
    }

    public function elbow()
    {
        // Return view for elbow optimization
        return view('admin.kmeans.elbow');
    }

    public function cluster()
    {
        // Return view for cluster determination
        return view('admin.kmeans.cluster');
    }

    public function process()
    {
        // Return view for process
        return view('admin.kmeans.proses');
    }

    public function result()
    {
        // Return view for results
        return view('admin.kmeans.hasil');
    }
}


