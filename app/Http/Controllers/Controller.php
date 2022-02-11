<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function genderName($gender_id){
        if($gender_id == '1'){
            return "Male";
        }elseif($gender_id == '2'){
            return "Fe-Male";
        }else{
            return "Other";
        }
    }

    public function maritialStatus($status_code){
        if($status_code == '1'){
            return "Married";
        }elseif($status_code == '2'){
            return "Single";
        }else{
            return "Other";
        }
    }

    public function religionName($religion_id){
        if($religion_id == '1'){
            return "Islam";
        }elseif($religion_id == '2'){
            return "Hinduism";
        }elseif($religion_id == '3'){
            return "Christianity";
        }else{
            return "Other";
        }
    }


    public function smsSend($mobile_no, $message){
        return true;
        $message  = urlencode($message);

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL            => "https://api.mobireach.com.bd/SendTextMessage?Username=sbacsms&Password=SbacMizan@321&From=SBAC%20BANK&To={$mobile_no}&Message={$message}",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING       => '',
            CURLOPT_MAXREDIRS      => 10,
            CURLOPT_TIMEOUT        => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION   => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST  => 'GET',
        ));

        try{
            $response = curl_exec($curl);

            DB::insert(DB::raw("exec [dbo].[sms_logs_insert] :branch_id, :mobile_no, :message_body, :response, :entry_datetime"),[                    
                ':branch_id'      => Auth::user()->branch_id,
                ':mobile_no'      => $mobile_no,
                ':message_body'   => $message,
                ':response'       => $response,
                ':entry_datetime' => date('Y-m-d H:i:s.v'),
            ]);

            // Convert xml string into an object
            $xmlcontent = simplexml_load_string($response);
            
            // Convert into json
            $json_response = json_encode($xmlcontent);


            
            // Convert into associative array
            $response_array = json_decode($json_response, true);

            $message_sent_status = $response_array['ServiceClass']['StatusText'];
            $message_sent_error  = $response_array['ServiceClass']['ErrorCode'];

            if($message_sent_status == "success" && $message_sent_error == 0){
                return true;
            }else{
                return false;
            }

        }catch(Exception $e){
            file_put_contents("sms_error.txt", $e->getMessage()."\n", FILE_APPEND);
            return false;
        }


    }













}
