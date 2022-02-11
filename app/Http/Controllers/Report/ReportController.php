<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
Use Illuminate\Support\Facades\Auth;
use Exception;

class ReportController extends Controller
{
    function system_user_view(){

        return view('report.system_user_report.system_user_view');
    }

    function system_user_report_table(Request $request){

      //  echo $user_type = $request->user_type;
      //  echo"<br>";
      // echo $branch_id = $request->branch_id;

        $users = DB::select("EXEC get_user_list");

        // echo"<pre>";
        // print_r($users);

        return view('report.system_user_report.system_report_table', compact('users'));

    }

    function customer_report_view(){

        return view('report.customer_report.customer_report_view');
    }


    function customer_report_table(Request $request){

         // echo $user_type = $request->user_type;
         // echo"<br>";
         // echo $branch_id = $request->branch_id;

         //  echo"<br>";
         // echo $division_id = $request->division_id; 

         // echo"<br>";
         // echo $district_id = $request->district_id;

         // die;

        $users = DB::select("EXEC get_customer_list");

        // echo "<pre>";
        // print_r($users);die;

        return view('report.customer_report.customer_report_table', compact('users'));
    }

    function get_district_from_division(Request $request){
             if ($request->ajax()) {
                try {
                    $division_id = $request->division_id;
                   $district = DB::table('param_district')->where('param_division_id',$division_id)->get();

                  
                   $output = "<optgroup label='Select District'>
                    <option value=''>Select District</option>";
                    
                    foreach($district  as $single_district){
                        $output .= "<option value='$single_district->dist_id'>$single_district->dist_name</option>";
                    }
                    $output .= "</optgroup>";
                    echo $output;


                }catch (\Exception $e) {
                    echo $e->getMessage();
                }

            }

        }// end get_district_from_division function


    }

