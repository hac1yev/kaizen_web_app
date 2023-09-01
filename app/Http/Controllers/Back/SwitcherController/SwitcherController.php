<?php

namespace App\Http\Controllers\Back\SwitcherController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SwitcherController extends Controller
{
    public function switcherIndex()
    {
        return view('back.switcher.switcher');
    }
}
