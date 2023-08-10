<?php

namespace App\Http\Controllers;

use App\Models\temp_verfy;
use App\Models\user_registration;
use DB;
use Illuminate\Http\Request;
use Mail;

class login_register extends Controller
{
    public function login()
    {
        return view('Login_Register.login');
    }

    public function register()
    {
        return view('Login_Register.register');
    }

    // login post
    public function loginadminpost(Request $req)
    {
        $email = $req->emailinput;
        $password = $req->passwordinput;
        $userid = session('sessionuseremail');

        $login = DB::table("user_registrations")->where(["email" => $email, "password" => $password])->first();
        $userid = session('sessionuseremail');

        if ($login != "") {
            if (isset($email)) {

                $systemcheck = user_registration::where('email', $email)->first();

                if (isset($systemcheck)) {
                    ;
                } else {
                    $systemcheck = new user_registration();
                    $systemcheck->email = $email;
                    $systemcheck->save();
                }
            }

            if ($login->role == "1") {
                $email = $req->emailinput;
                $password = $req->passwordinput;
                $adm = user_registration::where(["email" => $email, "password" => $password])->get();
                $user = user_registration::where("email", $email)->first();

                session(["sessionid" => $login->id]);
                session(["sessionuseremail" => $login->email]);
                session(["sessionusername" => $login->first_name]);

                return redirect("/adminlayout");

            } else if ($login->role == "0") {
                session(["sessionid" => $login->id]);
                session(["sessionuseremail" => $login->email]);
                session(["sessionusername" => $login->first_name]);

                // return redirect("/");

                return view("PlantNest_USER.user_index");
            }

        } else {
            return redirect()->back()->with("errormessage", "Record Not Found");

        }
    }

    // Register Post

    public function registerpost(Request $req)
    {
        $email = $req->emailinput;
        // $studcheck =DB::table("students")->where("student_email", $email)->first();
        $user = user_registration::where("email", $email)->first();

        $login = temp_verfy::where("email", session('sessionuseremail'))->first();
        // $login2 =DB::table("students")->where("Student_email", $email)->first();
        $pass = $req->passwordinput;
        $conpass = $req->coninput;

        if (strlen($pass) < 8) {
            echo "<script>alert('Woops! Password cannot be less the 8 characters.')
            window.location.href=''
            </script>";
            return;
        } else {
            if ($pass == $conpass) {
                session(["sessionuseremail" => $email]);
                session(["sessionusername" => $login->first_name]);

                //forgot
                // if($login->status ==8)
                // {

                //     $user = user_registration::where("email", $email)->first();
                //     $user->password = $req->passwordinput;
                //     $user->update();
                // }
                // else
                // {
                // .....

                $user = user_registration::where("email", $email)->first();
                // echo $systemcheck;

                if (isset($user)) {
                    ;
                } else {
                    $logins = temp_verfy::where("email", $email)->first();

                    $user = new user_registration();
                    $user->first_name = $logins->first_name;
                    $user->last_name = $logins->last_name;
                    $user->email = $logins->email;
                    $user->contact_no = $logins->contact_no;

                    $user->password = $logins->passwordinput;
                    // $user->password = $req->password;
                    $user->role = 0;
                    $user->save();

                    // echo "Registerd";
                    $data = ['Std_Name' => $user->first_name, 'data' => $user->email];
                    $user['to'] = $user->email;

                    Mail::send('Login_Register.email_register', $data, function ($messages) use ($user) {
                        $messages->to($user['to']);
                        $messages->subject('User Registration Completed!');
                    });
                }

            }

            return redirect('/');
            // return view("/" ,compact( 'fetch','lab','hardware','software','Network','announcement','attendances','student_data'));

            // }
            // else
            // {
            //     echo
            //     "<script>alert('Password and Confirm password does not match.')
            //     window.location.href='/register'
            //     </script>";
            // }
        }

    }

    // Random code
    public function generateUniqueCode()
    {
        // $code = random_int(1000000, 999999);
        $code = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
        return $code;
    }

    // code match
    public function code_match_(Request $req)
    {
        $email = $req->emailinput;
        $user = temp_verfy::where("email", $email)->first();

        $codes = $req->code0;
        $codes = $codes . $req->code1;
        $codes = $codes . $req->code2;
        $codes = $codes . $req->code3;
        $codes = $codes . $req->code4;
        $codes = $codes . $req->code5;

        //$studcheck =DB::table("students")->where("Student_email", $email)->first();
        //$req->emailinput;
        $user = user_registration::where("email", $email)->first();

        $login = temp_verfy::where("email", $email)->first();
        $logins = temp_verfy::where("email", $email)->first();

        $code_check = $req->code;
        $user = DB::table("temp_verfies")->where("email", $email)->first();
        // $login2 =DB::table("students")->where("Student_email", $email)->first();
        $pass = $req->passwordinput;
        $conpass = $req->coninput;

        if (isset($codes)) {
            session(["sessionuseremail" => $user->email]);
            session(["sessionusername" => $login->first_name]);

            if ($codes == $login->code) {

                $user = new user_registration();
                $user->first_name = $logins->first_name;
                $user->last_name = $logins->last_name;
                $user->email = $logins->email;
                $user->contact_no = $logins->contact_no;

                $user->password = $logins->password;
                $user->role = 0;

                $user->profile_image = $logins->profile_image;
                // $user->password = $req->password;
                $user->save();

                // echo "Registerd";
                $data = ['Std_Name' => $user->first_name, 'data' => $user->email];
                $user['to'] = $user->email;

                Mail::send('Login_Register.email_register', $data, function ($messages) use ($user) {
                    $messages->to($user['to']);
                    $messages->subject('User Registration Completed!');
                });

                $fetch = temp_verfy::all();
                echo "<script>alert('Verfication Code Match.')
                window.location.href='/'
                </script>";
            } else {
                echo "<script>alert('Wrong Verfication Code.')
                window.location.href='/code_match'
                </script>";
            }
        } else {
            echo "<script>alert('Please enter code and try again.')
            window.location.href='code_match'
            </script>";
        }

    }

    // get email
    public function get_email()
    {
        return view("Login_Register.code_match_");
    }

    // code match
    public function code_match(Request $res)
    {
        $fetch = temp_verfy::all();
        return view("Login_Register.code_match", compact('fetch'));
    }

    // code match

    public function input(Request $res)
    {
        //taking input

        $get_Email = $res->emailinput;

        $user = temp_verfy::where("email", $get_Email)->first();

        //checking from aptech user data
        // $studcheck =DB::table("students")->where("Student_email", $get_Email)->first();
        // if(isset($studcheck))
        // {
        $v_code = $this->generateUniqueCode();
        $user = DB::table("user_registrations")->where("email", $get_Email)->first();
        // $email_match =DB::table("students")->where("Student_email", $get_Email)->first();

        if (isset($user)) {
            echo "<script>alert('Email Already Exists.')
                window.location.href='/login'
                </script>";
        } else {
            $studcheck = new temp_verfy();
            $studcheck->email = $get_Email;
            $studcheck->first_name = $res->first_name;
            $studcheck->last_name = $res->last_name;
            $studcheck->password = $res->passwordinput;

            $studcheck->contact_no = $res->contact;
            $studcheck->code = $v_code;

            $image = $res->file('image');
            $ext = rand() . "." . $image->getClientOriginalName();
            $image->move('images/', $ext);
            $studcheck->profile_image = $ext;

            $studcheck->save();

            try
            {
                $data = ['name' => $studcheck->name, 'data' => $studcheck->email, 'code' => $studcheck->code];
                //$data= Auth::User()->name;
                $user['to'] = $studcheck->email;
                Mail::send('Login_Register.email_user', $data, function ($messages) use ($user) {
                    $messages->to($user['to']);
                    $messages->subject('Registration Code for Plant Nest');
                });
                // session(["sessionuseremail"=>$user->email]);

                return redirect("/code_match");

            } catch (Exception $ex) {
                echo $ex->getMessage();
                die;
            }
        }

        // }else{
        //     echo
        //     "<script>alert('Record Not Found.')
        //     window.location.href='/student'
        //     </script>";
        // }

    }

    // logout

    public function logout()
    {
        session()->forget("sessionuseremail");
        return redirect("/");
    }

    // forget password 

    public function forgetpassword()
    {
        $fetch = temp_verfy::all();
        return view("Login_Register.forgetpassword",compact('fetch'));
    }

    public function forgetpassword_(Request $req)
    {
        $v_code =  $this->generateUniqueCode();
        $user = user_registration::where('email',$req->emailinput)->first();
        
       if(isset($req->emailinput))
       {
           if(isset($user))
           {
            $fetch = temp_verfy::all();

                 $data= ['data'=> $user->email , 'code'=>$v_code]; 
                //$data= Auth::User()->name;
                $user ['to'] = $user->email;    
                Mail::send('Login_Register.email_user_forg',$data ,function($messages) use ($user)
                {
                    $messages->to($user ['to']);
                    $messages->subject('Forgot Passwword Code for Online Varsity');
                });
                $fuser = temp_verfy::where('email',$req->emailinput)->first();
                $fuser->code = $v_code; 
                $fuser->status = 8;  
                $fuser->update();
                return view("Login_Register.code_match",compact('fetch'));
            }else{
                echo "<script>alert('Invalid Email Address.')
                window.location.href='/forgetpassword'
                </script>";
            }
       }
       else{
        echo "<script>alert('Please Provide Email Addresss to Continue.')
            </script>";

       }
        
    }

}
