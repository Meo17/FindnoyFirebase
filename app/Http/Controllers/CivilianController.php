 <?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Kreait\Laravel\Firebase\Facades\Firebase;
use App\Services\FirebaseService;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use RealRashid\SweetAlert\Facades\Alert;

class CivilianController extends Controller
{


	public function __construct(){
        $this->database = FirebaseService::connect();
        $this->auth = Firebase::auth();
    }

    
    public function  numberOfCivilian(Request $request){  
    }

    public function getCivilianLocation(Request $request) {
    }



    #list of all civilians
    public function listAllCivilians(Request $request) {

    }

    #list of 
    public function listOfCiviliansInPoliceStation(Request $request) {

    }


     public function FunctionName($value='')
    {
        // code...
    }



}
