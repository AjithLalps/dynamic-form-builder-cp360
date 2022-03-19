<?php

namespace App\Http\Controllers;

use App\Models\Form;
use Illuminate\Http\Request;

class FormListingController extends Controller
{
    public function index()
    {
        $forms = Form::all();

        return view('forms.index', \compact('forms'));
    }

    public function show(string $code)
    {
        $form = Form::where('code', $code)->first();

        return view('forms.show', compact('form'));
    }
}
