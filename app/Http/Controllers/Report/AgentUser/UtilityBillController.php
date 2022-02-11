<?php

namespace App\Http\Controllers\Report\AgentUser;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class UtilityBillController extends Controller
{
    /**
     * Redirect to  the transaction searching page
     *
     */
    public function index(){
        return view('report.agent-user.tranasctions.utility-bill-transaction.index');
    }

    /**
     * Report Generate
     *
     */
    public function generateReport(Request $request){
        $starting_date = date('Y-m-d', strtotime($request->input('starting_date')));
        $ending_date   = date('Y-m-d', strtotime($request->input('ending_date')));

        $cash_transactions =  DB::select(DB::raw("exec [dbo].[utility_transaction_report] :starting_date, :ending_date, :branch_id, :trn_code"),[
            ':starting_date' => $starting_date,
            ':ending_date'   => $ending_date,
            ':branch_id'     => Auth::user()->branch_id,
            ':trn_code'      => '14',
        ]);
        
        $data = [
            "cash_transactions" => $cash_transactions,
            "starting_date"     => $starting_date,
            "ending_date"       => $ending_date
        ];
        return view('report.agent-user.tranasctions.utility-bill-transaction.utility-bill-transaction', $data);
    }


}
