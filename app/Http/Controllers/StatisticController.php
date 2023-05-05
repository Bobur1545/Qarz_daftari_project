<?php

namespace App\Http\Controllers;

use App\Models\Costumer;
use App\Models\Debt;
use App\Models\Payment;
use App\Models\Statistic;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatisticController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Jami xaridorlarda sotuvchining qancha miqdordagi puli yotibdi, shuni ko'rsatadi
        $costumers = Costumer::all()->sum('debt');
        $debts_quantity = Debt::whereDate('created_at', now())->get()->sum('quantity');
        $paymets_quantity = Payment::whereDate('created_at', now())->get()->sum('quantity');

        $debts_costumers_key = $debts_costumers_val = [];

        $debts_costumers = Costumer::all()->take(7)->pluck('debt', 'name')->toArray();

        foreach($debts_costumers as $key=>$value) {
            $debts_costumers_key[] = $key;
            $debts_costumers_val[] = $value;
        }
//        $payments = Payment::whereBetween('created_at',[Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->take(6)->pluck('quantity','created_at')->toArray();
//        $debts = Debt::whereBetween('created_at',[Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->take(7)->pluck('quantity')->toArray();


        $date6 = date('Y-m-d', strtotime('-6 day'));
        $beginningOfDay = $date6 . " 00:00:00";
        $endOfDay = $date6 . " 23:59:59";
        $dq6 = Debt::whereBetween('created_at', [$beginningOfDay, $endOfDay])
            ->get()->sum('quantity');
        $db6 = Payment::whereBetween('created_at', [$beginningOfDay, $endOfDay])
            ->get()->sum('quantity');

        $date5 = date('Y-m-d', strtotime('-5 day'));
        $beginningOfDay = $date5 . " 00:00:00";
        $endOfDay = $date5 . " 23:59:59";
        $dq5 = Debt::whereBetween('created_at', [$beginningOfDay, $endOfDay])
            ->get()->sum('quantity');
        $db5 = Payment::whereBetween('created_at', [$beginningOfDay, $endOfDay])
            ->get()->sum('quantity');

        $date4 = date('Y-m-d', strtotime('-4 day'));
        $beginningOfDay = $date4 . " 00:00:00";
        $endOfDay = $date4 . " 23:59:59";
        $dq4 = Debt::whereBetween('created_at', [$beginningOfDay, $endOfDay])
            ->get()->sum('quantity');
        $db4 = Payment::whereBetween('created_at', [$beginningOfDay, $endOfDay])
            ->get()->sum('quantity');

        $date3 = date('Y-m-d', strtotime('-3 day'));
        $beginningOfDay = $date3 . " 00:00:00";
        $endOfDay = $date3 . " 23:59:59";
        $dq3 = Debt::whereBetween('created_at', [$beginningOfDay, $endOfDay])
            ->get()->sum('quantity');
        $db3 = Payment::whereBetween('created_at', [$beginningOfDay, $endOfDay])
            ->get()->sum('quantity');

        $date2 = date('Y-m-d', strtotime('-2 day'));
        $beginningOfDay = $date2 . " 00:00:00";
        $endOfDay = $date2 . " 23:59:59";
        $dq2 = Debt::whereBetween('created_at', [$beginningOfDay, $endOfDay])
            ->get()->sum('quantity');
        $db2 = Payment::whereBetween('created_at', [$beginningOfDay, $endOfDay])
            ->get()->sum('quantity');

        $date1 = date('Y-m-d', strtotime('-1 day'));
        $beginningOfDay = $date1 . " 00:00:00";
        $endOfDay = $date1 . " 23:59:59";
        $dq1 = Debt::whereBetween('created_at', [$beginningOfDay, $endOfDay])
            ->get()->sum('quantity');
        $db1 = Payment::whereBetween('created_at', [$beginningOfDay, $endOfDay])
            ->get()->sum('quantity');

        $date0 = date('Y-m-d', strtotime('0 day'));
        $beginningOfDay = $date0 . " 00:00:00";
        $endOfDay = $date0 . " 23:59:59";
        $dq0 = Debt::whereBetween('created_at', [$beginningOfDay, $endOfDay])
            ->get()->sum('quantity');
        $db0 = Payment::whereBetween('created_at', [$beginningOfDay, $endOfDay])
            ->get()->sum('quantity');

        $debts_stat = [
            $date6 => $dq6, $date5 => $dq5, $date4 => $dq4, $date3 => $dq3, $date2 => $dq2, $date1 => $dq1, $date0 => $dq0];
        $payments_stat = [
            $date6 => $db6, $date5 => $db5, $date4 => $db4, $date3 => $db3, $date2 => $db2, $date1 => $db1, $date0 => $db0];

        foreach($debts_stat as $key=>$value) {
            $statistic_key[] = $key;
            $dstatistic_val[] = $value;
        }

        foreach($payments_stat as $key=>$value) {
//            $statistic_key[] = $key;
            $pstatistic_val[] = $value;
        }
//        dd($pstatistic_val);

        return view('admin.statistics', [
            'costumers' => $costumers,
            'debts_quantity' => $debts_quantity,
            'paymets_quantity' => $paymets_quantity,
            'debts_costumers_key' =>  $debts_costumers_key,
            'debts_costumers_val' => $debts_costumers_val,
//            'payments'=>$payments,
//            'debts'=>$debts,
            'statistic_key' => $statistic_key,
            'dstatistic_val' => $dstatistic_val,
            'pstatistic_val' => $pstatistic_val,
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Statistic $statistic)
    {


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Statistic $statistic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Statistic $statistic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Statistic $statistic)
    {
        //
    }
}
