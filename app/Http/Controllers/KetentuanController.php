<?php

namespace App\Http\Controllers;

use App\Models\Bisnis;
use App\Models\TypeKamar;
use Illuminate\Http\Request;

class KetentuanController extends Controller
{
    public function index()
    {
        $bisnis = Bisnis::all();
        $typekamar = TypeKamar::all();
        return view('user.pages.ketentuan', compact('bisnis', 'typekamar'));
    }
}
