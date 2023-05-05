<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Costumer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(){
        $costumers = Costumer::all();
        return response()->json(['costumers'=>$costumers]);
    }
}
