<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;

class LoginController extends Controller {
    
    
    public function index(Request $request) 
    {
        //$systemName = 'Aofa';
        return view('login');
        
    }
    public function register(Request $request) 
    {
     
     $this->validate($request,[
         'firstname'=>'required|alpha|max:15',
         'lastname' =>'required|alpha|max:15',
         'email'    =>'required|email|unique:user',
         'phone'    =>'required|numeric|unique:user',
         'password' =>'required',
         'gender'   =>'required|digits:1',
         'day'      =>'required|between:1,31',
         'month'    =>'required|between:1,12',
         'year'     =>'required',
         'city'     =>'required|alpha|max:15',
         'country'  =>'required|alpha'
     ]);
        
        
     $firstname     = $request->input('firstname');
     $lastname      = $request->input('lastname');
     $email         = $request->input('email'); 
     $phone         = $request->input('phone'); 
     $password      = $request->input('password');
     $gender        = $request->input('gender');
     $day           = $request->input('day'); 
     $month         = $request->input('month'); 
     $year          = $request->input('year');
     $city          = $request->input('city');
     $country       = $request->input('country');
     $date_of_birth = $day."/".$month."/".$year;
     $phone_code = '1111';
     $mail_code = '2222';
        
     DB:: insert('insert into user (first_name, last_name, gender, phone, email, password, city, date_of_birth, country, mail_verify_code, phone_verify_code) value(?,?,?,?,?,?,?,?,?,?,?)', [$firstname, $lastname, $gender, $phone, $email, $password, $city, $date_of_birth, $country, $mail_code, $phone_code]);
     return redirect('login?user=return');  
    }

}
