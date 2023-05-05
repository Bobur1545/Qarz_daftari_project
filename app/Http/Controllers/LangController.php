<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller
{
    public function setLang(Request $request)
    {
        $request->validate([
            'lang' => 'required|in:uz,ru,en'
        ]);

        session(['lang' => $request->get('lang')]);

        return redirect()->back();
    }
}
