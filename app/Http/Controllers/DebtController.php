<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use App\Models\Debt;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class DebtController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $debts = Debt::paginate(20);
        $costumers = Costumer::all();
        return view('admin.debt', ['debts'=>$debts,'costumers'=>$costumers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Auth::user()->hasDirectPermission('debt.store')) {
            $request->validate([
                'costumer_id' => 'required',
                'product' => 'required',
                'quantity' => 'required',
                'end_day' => 'required'
            ]);
            $debt = $request->all();
            $debt['user_id'] = auth()->user()->id;
            $costumer_id = $request->costumer_id;
            $costumer = Costumer::where('id', $costumer_id)->first();
            $costumer->debt += intval($request->quantity);
            $costumer->save();
            Debt::create($debt);
        }
            return redirect()->back()->with('success', 'Muvaffaqqiyatli qo\'shildi');

    }

    /**
     * Display the specified resource.
     */
    public function show(Debt $debt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Debt $debt)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Debt $debt)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Debt $debt)
    {
        //
    }
    public function permission(User $user)
    {
        if(Auth::user()->hasDirectPermission('profile.permission')) {
            $user_permission = $user->permissions;
            $permissions = Permission::all();
            return view('admin.permissions',['user_permissions'=>$user_permission, 'user'=>$user,'permissions'=>$permissions]);
        }
    }

}
