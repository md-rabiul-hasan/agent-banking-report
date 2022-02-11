function captureFP(fingerpname) {
    CallSGIFPGetData(SuccessFunc, ErrorFunc, fingerpname);
}

function CallSGIFPGetData(successCall, failCall, fingerpname) {

    var uri = "https://localhost:8443/SGIFPCapture"; 
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
            fpobject = JSON.parse(xmlhttp.responseText);
            successCall(fpobject, fingerpname);
        }
        else if (xmlhttp.status == 404) {
            failCall(xmlhttp.status)
        }
    }
    xmlhttp.onerror = function () {
        failCall(xmlhttp.status);
    }


    var params = "Timeout=" + 10000;
    params += "&Quality=" + 50;
    params += "&licstr=" + '';
    params += "&fakeDetection=" + 0;
    params += "&templateFormat=" + 'ISO';
    params += "&imageWSQRate=" + "2.25";
    xmlhttp.open("POST", uri, true);
    xmlhttp.send(params);
}



/* 
    This functions is called if the service sucessfully returns some data in JSON object
 */
function SuccessFunc(result, fingerpname) {
      
    if (result.ErrorCode == 0) {
        if(result.ImageQuality < 60){
            toastr.error("Image quality minimum 60%. Please take fingerprint againg");
        }else{
            if (result != null && result.BMPBase64.length > 0) {
                document.getElementById(fingerpname).src = "data:image/bmp;base64," + result.BMPBase64;
            }            
            document.getElementById(fingerpname+"_QUALITY").innerHTML = result.ImageQuality;

            $("#"+fingerpname+"_TEMPLATE").val(result.TemplateBase64);   
            $("#"+fingerpname+"_BUTTON").attr("disabled","disabled"); 
        }         
    }
    else {
        alert("Fingerprint Capture Error Code:  " + result.ErrorCode + ".\nDescription:  " + ErrorCodeToString(result.ErrorCode) + ".");
    }
}

function ErrorFunc(status) {
    alert("Check if SGIBIOSRV is running; status = " + status + ":");
}


var secugen_lic = "";

function ErrorCodeToString(ErrorCode) {
var Description;
switch (ErrorCode) {
    case 51:
        Description = "System file load failure";
        break;
    case 52:
        Description = "Sensor chip initialization failed";
        break;
    case 53:
        Description = "Device not found";
        break;
    case 54:
        Description = "Fingerprint image capture timeout";
        break;
    case 55:
        Description = "No device available";
        break;
    case 56:
        Description = "Driver load failed";
        break;
    case 57:
        Description = "Wrong Image";
        break;
    case 58:
        Description = "Lack of bandwidth";
        break;
    case 59:
        Description = "Device Busy";
        break;
    case 60:
        Description = "Cannot get serial number of the device";
        break;
    case 61:
        Description = "Unsupported device";
        break;
    case 63:
        Description = "SgiBioSrv didn't start; Try image capture again";
        break;
    default:
        Description = "Unknown error code or Update code to reflect latest result";
        break;
}
return Description;
}