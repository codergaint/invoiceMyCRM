<?php

namespace App\Http\Controllers;

use App\Models\AdminPanel;
use App\Models\PageConfig;
use App\Models\GeneralSettings;
use App\Models\Pricing;
use App\Models\PricingpageModule;
use App\Models\FeaturepageModule;
use App\Mail\verifyAccount;
use Session;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Str;
use Mail;

class FrontendController extends Controller
{
    public function homepage(){
        $details = GeneralSettings::orderBy('id','DESC')->first();
        $layout   = PageConfig::where(['pageName'=>'homepage'])->first();
        if(!empty($layout)):
            if($layout->pageType=="theme1"):
                return view('frontend.basicHome',['details'=>$details,'layout'=>$layout]);
            else:
                return view('frontend.advanceHome',['details'=>$details,'layout'=>$layout]);
            endif;
        else:
            return view('frontend.basicHome',['details'=>$details]);
        endif;
    }

    public function userLogin(){
            $details = GeneralSettings::orderBy('id','DESC')->first();
            return view('crm.login',['details'=>$details]);
    }

    public function userLoginConfirm(Request $requ){
        $user = User::where(['email'=>$requ->userid])->orWhere(['userid'=>$requ->userid])->first();
        if(!empty($user)):
            $hashpass  = $user->password;
            $sessionid  = $user->id;
            $authuser = Hash::check($requ->password,$hashpass);
            if($authuser):
                session_start();
                Session::regenerate();
                Session::put('crmAuth',$sessionid);
                Session::get('crmAuth');
                $_SESSION['crmAuth']   = $sessionid;
                return redirect(route('crmAdmin'));
            else:
                return redirect(route('userLogin'))->with('error','Sorry! Wrong password provide');
            endif;
        else:
            return redirect(route('userLogin'))->with('error','Sorry! No user found');
        endif;
    }

    public function userSignUp(){
            $details = GeneralSettings::orderBy('id','DESC')->first();
            return view('crm.register',['details'=>$details]);
    }

    public function userSignupConfirm(Request $requ){
        $exist = User::where(['email'=>$requ->email])->first();
        if(!empty($exist)):
            return back()->with('error','Sorry! email already exist');
        else:
            $user = new User();
            $randCode = Str::random(40);
            $hashpass  = Hash::make($requ->password);
            $name               = $requ->name;
            $mail               = $requ->email;
            $user->userid       = $requ->name;
            $user->name         = $requ->name;
            $user->email        = $requ->email;
            $user->password     = $hashpass;
            $user->verifycode   = $randCode;
            // $admin->plainPass   = $requ->password;
            if($user->save()):
                $auth = User::where('email',$requ->email)->first();
                $sessionid = $auth->id;
                session_start();
                Session::regenerate();
                Session::put('crmAuth',$sessionid);
                Session::get('crmAuth');
                $_SESSION['crmAuth']   = $sessionid;
                Mail::to($requ->email)->send(new verifyAccount($randCode,$name,$mail));
                return redirect(route('crmAdmin'));
            else:
                return back()->with('error','Sorry! Wrong password provide');
            endif;
        endif;
    }
    

    public function resendVerify($email){
        $user = User::where(['email'=>$email])->first();
        if(empty($user)):
            return back()->with('error','Sorry! No record found');
        else:
            $randCode = Str::random(40);
            $name               = $user->name;
            $mail               = $user->email;
            $user->verifycode   = $randCode;
            // $admin->plainPass   = $requ->password;
            if($user->save()):
                $sessionid = $user->id;
                session_start();
                Session::regenerate();
                Session::put('crmAuth',$sessionid);
                Session::get('crmAuth');
                $_SESSION['crmAuth']   = $sessionid;
                Mail::to($requ->email)->send(new verifyAccount($randCode,$name,$mail));
                return back()->with('success','Congrats! Verification code re-send successfully. Please check your mail to verify your account');
            else:
                return back()->with('error','Sorry! Wrong information provided');
            endif;
        endif;
    }
    

    public function verifyMail($email,$randCode){
        $user = User::where(['email'=>$email,'verifycode'=>$randCode])->first();
        if(empty($user)):
            return redirect(route('userSignUp'))->with('error','Link already expired. Login to your panel and try to re-send code to verify');
        else:
            $date   = date('Y-m-d H:i:s');
            $randCode = Str::random(40);
            $name                   = $user->name;
            $mail                   = $user->email;
            $user->verifycode       = $randCode;
            $user->email_verified_at= $date;
            // $admin->plainPass   = $requ->password;
            if($user->save()):
                $sessionid = $user->id;
                session_start();
                Session::regenerate();
                Session::put('crmAuth',$sessionid);
                Session::get('crmAuth');
                $_SESSION['crmAuth']   = $sessionid;
                return redirect(route('crmAdmin'));
            else:
                return back()->with('error','Sorry! Wrong information provided');
            endif;
        endif;
    }
    
    public function userPassReset($email){
        $user = User::where(['email'=>$email])->first();
        if(empty($user)):
            return back()->with('error','Sorry! No record found');
        else:
            $randCode = Str::random(40);
            $name               = $user->name;
            $mail               = $user->email;
            $user->verifycode   = $randCode;
            if($user->save()):
                $sessionid = $user->id;
                session_start();
                Session::regenerate();
                Session::put('crmAuth',$sessionid);
                Session::get('crmAuth');
                $_SESSION['crmAuth']   = $sessionid;
                Mail::to($requ->email)->send(new userPassReset($randCode,$name,$mail));
                return back()->with('success','Congrats! Password reset request placed successfully. Please check your mail to verify your account and set new password');
            else:
                return back()->with('error','Sorry! Wrong information provided');
            endif;
        endif;
    }

    public function userForgotPass(){
            $details = GeneralSettings::orderBy('id','DESC')->first();
            return view('crm.forgotPass',['details'=>$details]);
    }

    public function adminLogin(){
        $layout   = PageConfig::where(['pageName'=>'authpage'])->first();
        if(!empty($layout)):
            if($layout->pageType=="Basic"):
                return view('frontend.adminBasicSignin',['layout'=>$layout]);
            else:
                return view('frontend.adminCoverSignin',['layout'=>$layout]);
            endif;
        else:
            return view('frontend.adminCoverSignin');
        endif;
    }

    public function loginConfirm(Request $requ){
        $admin = AdminPanel::where(['email'=>$requ->username])->first();
        if(!empty($admin)):
            $hashpass  = $admin->loginPass;
            $sessionid  = $admin->id;
            $authuser = Hash::check($requ->password,$hashpass);
            if($authuser):
                session_start();
                Session::regenerate();
                Session::put('adminAuth',$sessionid);
                Session::get('adminAuth');
                $_SESSION['adminAuth']   = $sessionid;
                return redirect(route('superAdmin'));
            else:
                return redirect(route('adminLogin'))->with('error','Sorry! Wrong password provide');
            endif;
        else:
            return redirect(route('adminLogin'))->with('error','Sorry! Wrong information provide');
        endif;
    }

    public function signupConfirm(Request $requ){
        $admin = AdminPanel::where(['email'=>$requ->username])->first();
        if(!empty($admin)):
            return back()->with('error','Sorry! Admin account already exist');
        else:
            $admin = new AdminPanel();
            $hashpass  = Hash::make($requ->password);
            $admin->name        = $requ->adminName;
            $admin->email       = $requ->username;
            $admin->loginPass   = $hashpass;
            $admin->plainPass   = $requ->password;
            if($admin->save()):
                return back()->with('success','Congrats! Admin profile created successfully');
            else:
                return back()->with('error','Sorry! Wrong password provide');
            endif;
        endif;
    }

    public function pricing(){
        $pricing =  Pricing::all();
        $section2 = PricingpageModule::where('section','priceServiceSection')->orderBy('id','DESC')->first();
        $section3 = PricingpageModule::where('section','priceFaqSection')->orderBy('id','DESC')->first();
        $startNow = PricingpageModule::where('section','priceStartSection')->orderBy('id','DESC')->first();
        $createAccount = PricingpageModule::where('section','priceCreatedNowSection')->orderBy('id','DESC')->first();
        return view('frontend.pricing',['pricing'=>$pricing,'section2'=>$section2,'section3'=>$section3,'createAccount'=>$createAccount,'startNow'=>$startNow]);
    }
    public function feature(){
        $section2 = FeaturepageModule::where('section','featureServiceSection')->orderBy('id','DESC')->first();
        $section3 = FeaturepageModule::where('section','Section3')->orderBy('id','DESC')->first();
        $section4 = FeaturepageModule::where('section','Section4')->orderBy('id','DESC')->first();
        $section5 = FeaturepageModule::where('section','Section5')->orderBy('id','DESC')->first();
        $section6 = FeaturepageModule::where('section','featureFaqSection')->orderBy('id','DESC')->first();
        $startNow = FeaturepageModule::where('section','featureStartSection')->orderBy('id','DESC')->first();
        $createAccount = FeaturepageModule::where('section','featureCreatedNowSection')->orderBy('id','DESC')->first();
        return view('frontend.feature',['section2'=>$section2,'section3'=>$section3,'section4'=>$section4,'section5'=>$section5,'section6'=>$section6,'createAccount'=>$createAccount,'startNow'=>$startNow]);
    }
    
    public function crmLogout(Request $request){
        $request->session()->flush();
        $request->session()->regenerate();
        session_start();
        session_destroy();
        return redirect(route('userLogin'))->with('error','Successfully logout!');
    }
}
