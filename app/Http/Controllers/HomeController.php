<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cache;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {  

        $branch_id            = Auth::user()->branch_id;
        $agent_mother_account = trim(Auth::user()->branch->mother_account_no);

        if(Auth::user()->role_id == '4'){
            //Dashboard Data for Agent Users
            $transactions =  DB::select(DB::raw("exec [dbo].[agent_dashboard_transaction] :branch_id, :current_date"),[
                ':branch_id'    => $branch_id,
                ':current_date' => date('Y-m-d')
            ]);

            $query = "DECLARE
            @daily_total_txn_OUT int,
            @daily_dr_amt_OUT decimal(18, 2),
            @daily_cr_amt_OUT decimal(18, 2);
    
            EXEC [dbo].[AGENTUSER_Dashboard_barcum]

                @agent_accountno     = '$agent_mother_account',
                @agent_id            = '$branch_id',
                @daily_total_txn_OUT = @daily_total_txn_OUT OUTPUT,
                @daily_dr_amt_OUT    = @daily_dr_amt_OUT OUTPUT,
                @daily_cr_amt_OUT    = @daily_cr_amt_OUT OUTPUT

            SELECT
                @daily_total_txn_OUT as daily_total_txn,
                @daily_dr_amt_OUT as daily_dr_amt,
                @daily_cr_amt_OUT as daily_cr_amt";

            $transaction_summery =  DB::select(DB::raw($query));

            $data = [
                "transactions"        => $transactions,
                "transaction_summery" => $transaction_summery
            ];

            return view('agent.dashboard', $data);

        }elseif (Auth::user()->role_id == '1') {
            // Dashboard Data for Bank HO Users
            $query = "DECLARE
            @daily_total_txn_OUT int,
            @daily_total_amt_OUT decimal(18, 2),
            @total_txn_OUT int,
            @total_amt_OUT decimal(18, 2),
            @total_agent_OUT int,
            @total_customer_OUT int
    
            EXEC [dbo].[HO_Dashboard_barcum]
                    @daily_total_txn_OUT = @daily_total_txn_OUT OUTPUT,
                    @daily_total_amt_OUT = @daily_total_amt_OUT OUTPUT,
                    @total_txn_OUT = @total_txn_OUT OUTPUT,
                    @total_amt_OUT = @total_amt_OUT OUTPUT,
                    @total_agent_OUT = @total_agent_OUT OUTPUT,
                    @total_customer_OUT = @total_customer_OUT OUTPUT
            
            SELECT	@daily_total_txn_OUT as daily_total_txn,
                    @daily_total_amt_OUT as daily_total_amt,
                    @total_txn_OUT as total_txn,
                    @total_amt_OUT as total_amt,
                    @total_agent_OUT as total_agent,
                    @total_customer_OUT as total_customer";

            $ho_summery =  DB::select(DB::raw($query));
            $ho_joblist =  DB::select(DB::raw("EXEC [dbo].[HO_Dashboard_joblist] @branch_id=0"));

            $data = [
                "ho_summery" => $ho_summery,
                "ho_joblist" => $ho_joblist
            ];

            return view('home',$data);

        }elseif(Auth::user()->role_id == '3'){
            // Dashboard Data for Agent Admin
            $query = "DECLARE
            @current_bal_OUT decimal(18, 2),
            @daily_total_txn_OUT int,
            @daily_dr_amt_OUT decimal(18, 2),
            @daily_cr_amt_OUT decimal(18, 2);
    
            EXEC [dbo].[AGENTADMIN_Dashboard_barcum]

                @agent_id            = '$branch_id',
                @agent_accountno     = '$agent_mother_account',
                @current_bal_OUT     = @current_bal_OUT OUTPUT,
                @daily_total_txn_OUT = @daily_total_txn_OUT OUTPUT,
                @daily_dr_amt_OUT    = @daily_dr_amt_OUT OUTPUT,
                @daily_cr_amt_OUT    = @daily_cr_amt_OUT OUTPUT

            SELECT	@current_bal_OUT as current_bal,
            @daily_total_txn_OUT as daily_total_txn,
            @daily_dr_amt_OUT as daily_dr_amt,
            @daily_cr_amt_OUT as daily_cr_amt";

            $agent_admin_summery =  DB::select(DB::raw($query));
            $agent_joblist       =  DB::select(DB::raw("EXEC [dbo].[AGENT_Dashboard_joblist] @branch_id='$branch_id'"));
            
            $data = [
                "agent_admin_summery" => $agent_admin_summery,
                "agent_joblist"       => $agent_joblist
            ];

            return view('home',$data);

        }elseif(Auth::user()->role_id == '2'){
            //Dashboard Data for Bank Branch Users
            $query = "DECLARE
                @daily_total_txn_OUT int,
                @daily_total_amt_OUT decimal(18, 2),
                @total_agent_OUT int;
    
            EXEC [dbo].[BRANCH_Dashboard_barcum]
                    @branch_id = '$branch_id',
                    @daily_total_txn_OUT = @daily_total_txn_OUT OUTPUT,
                    @daily_total_amt_OUT = @daily_total_amt_OUT OUTPUT,
                    @total_agent_OUT = @total_agent_OUT OUTPUT
            
            SELECT	@daily_total_txn_OUT as daily_total_txn,
                    @daily_total_amt_OUT as daily_total_amt,
                    @total_agent_OUT as total_agent";

            $branch_summery =  DB::select(DB::raw($query));
            $ho_joblist =  DB::select(DB::raw("EXEC [dbo].[HO_Dashboard_joblist] @branch_id='$branch_id'"));

            $data = [
                "branch_summery" => $branch_summery,
                "ho_joblist" => $ho_joblist
            ];

            return view('home',$data);
        }

        return view('home');
    }

}
