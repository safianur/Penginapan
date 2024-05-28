<?php

namespace App\Http\Controllers;

use App\Models\Bisnis;
use Illuminate\Http\Request;

class BisnisController extends Controller
{
    public function index()
    {
        $bisnis = Bisnis::all();
        return view('user.index', compact('bisnis'));
    }
}
