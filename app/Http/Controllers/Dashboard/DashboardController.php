<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    //

    public function index()
    {

        try {
            return Inertia::render('Dashboard');
        } catch(\Exception $e) {
            return redirect()->back()->with([
               'error' => $e->getMessage()
            ]);
        }

    }







}
