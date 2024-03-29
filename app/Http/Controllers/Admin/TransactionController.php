<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function show_transaction()
    {

        $Dates = session()->get('selected_date_range', []);

        $startDate = $Dates[0] ?? null;
        $endDate   = $Dates[1] ?? null;

        if($startDate && $endDate)
        {
            $transaction = Transaction::whereBetween('created_at' , [$startDate , $endDate])
                                        ->latest()->paginate(10);
        }
        else
        {
            $transaction = Transaction::latest()->paginate(10);
        }

       return view('admin.transcation.show_transaction' , compact('transaction'));
    }

    public function view_transaction($id)
    {
        $transaction = Transaction::find($id);

        return view('admin.transcation.view_transaction',compact('transaction'));
    }

}
