<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgendaEntrevistaController extends Controller
{
    public function cita()
    {
        return view('components.entrevista');
    }
}