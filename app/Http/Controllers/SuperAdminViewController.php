<?php

namespace App\Http\Controllers;

use App\Models\AdminPanel;
use App\Models\Company;
use App\Models\Currency;
use App\Models\EmailSetup;
use App\Models\Faq;
use App\Models\GeneralSettings;
use App\Models\Pricing;
use App\Models\Language;
use App\Models\Page;
use App\Models\PageConfig;
use App\Models\PaymentCredential;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SuperAdminViewController extends Controller
{
    public function __construct(){
        //$this->middleware('SuperAdmin');
        $this->middleware('adminAuth');
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function languageList(){
        $language   = Language::orderBy('id','DESC')->get();
        return view('superadmin.languageList',['language'=>$language]);
    }

    public function newLanguage(){
        return view('superadmin.newLanguage');
    }

    public function editLanguage($id){
        $language   = Language::find($id);
        return view('superadmin.editCurrency',['language'=>$language]);
    }

    public function delLanguage($id){
        $language   = Language::find($id);
        if(!empty($language)):
            $language->delete();
            return back()->with('success','Congrats! Record successfully deleted');
        else:
            return back()->with('error','Sorry! Record failed to delete');
        endif;
    }
    //End language controller

    public function onlineCredential(){
        $onlineCredential   = PaymentCredential::orderBy('id','DESC')->first();
        return view('superadmin.onlineCredential',['pc'=>$onlineCredential]);
    }

    public function offlineCredential(){
        $onlineCredential   = PaymentCredential::orderBy('id','DESC')->first();
        return view('superadmin.onlineCredential',['onlineCredential'=>$onlineCredential]);
    }
    //End payment credintials controller

    public function currencyList(){
        $currency   = Currency::orderBy('id','DESC')->get();
        return view('superadmin.currencyList',['currency'=>$currency]);
    }

    public function newCurrency(){
        return view('superadmin.newCurrency');
    }

    public function editCurrency($id){
        $currency   = Currency::find($id);
        return view('superadmin.editCurrency',['currency'=>$currency]);
    }

    public function delCurrency($id){
        $currency   = Currency::find($id);
        if(!empty($currency)):
            $currency->delete();
            return back()->with('success','Congrats! Record successfully deleted');
        else:
            return back()->with('error','Sorry! Record failed to delete');
        endif;
    }
    //End currency controller
    public function defaultPage(){
        $pages   = Page::orderBy('id','DESC')->get();
        return view('superadmin.defaultPage',['page'=>$pages]);
    }

    public function editPage($id){
        $pages   = Page::find($id);
        return view('superadmin.editPage',['page'=>$pages]);
    }

    public function delPage($id){
        $pages   = Page::find($id);
        if(!empty($pages)):
            $pages->delete();
            return back()->with('success','Congrats! Record successfully deleted');
        else:
            return back()->with('error','Sorry! Record failed to delete');
        endif;
    }
    
    public function layouts(){
        $layout   = PageConfig::orderBy('id','DESC')->get();
        return view('superadmin.layoutPage',['layout'=>$layout]);
    }
    
    //End default pages controller

    public function faqList(){
        $faq   = Faq::orderBy('id','DESC')->get();
        return view('superadmin.faqList',['faq'=>$faq]);
    }

    public function editFaq($id){
        $faq   = Faq::find($id);
        return view('superadmin.editFaq',['faq'=>$faq]);
    }

    public function delFaq($id){
        $faq   = Faq::find($id);
        if(!empty($faq)):
            $faq->delete();
            return back()->with('success','Congrats! Record successfully deleted');
        else:
            return back()->with('error','Sorry! Record failed to delete');
        endif;
    }
    //FAQ controller end

     public function companyList(){
        $company   = Company::orderBy('id','DESC')->get();
        return view('superadmin.companyList',['company'=>$company]);
    }

    public function newCompany(){
        return view('superadmin.newCompany');
    }

    public function editCompany($id){
        $company   = Company::find($id);
        return view('superadmin.editCompany',['company'=>$company]);
    }

    public function delCompany($id){
        $company   = Company::find($id);
        if(!empty($company)):
            $company->delete();
            return back()->with('success','Congrats! Company profile successfully deleted');
        else:
            return back()->with('error','Sorry! Company profile failed to delete');
        endif;
    }
    //End company controller

     public function productList(){
        $product   = Pricing::orderBy('id','DESC')->get();
        return view('superadmin.productList',['product'=>$product]);
    }

    public function newProduct(){
        return view('superadmin.newProduct');
    }

    public function editProduct($id){
        $product   = Pricing::find($id);
        return view('superadmin.editProduct',['product'=>$product]);
    }

    public function delProduct($id){
        $product   = Pricing::find($id);
        if(!empty($product)):
            $product->delete();
            return back()->with('success','Congrats! Product successfully deleted');
        else:
            return back()->with('error','Sorry! Product failed to delete');
        endif;
    }
    //End product controller

     public function generalSettings(){
        $generalSettings   = GeneralSettings::orderBy('id','DESC')->first();
        return view('superadmin.generalSettings',['gs'=>$generalSettings]);
    }
    //End general settings controller

     public function mailSetup(){
        $mailsetup   = EmailSetup::orderBy('id','DESC')->first();
        return view('superadmin.mailSettings',['ms'=>$mailsetup]);
    }
    //End mail settings controller

     public function adminProfile(){
        $adminProfile   = AdminPanel::orderBy('id','DESC')->first();
        return view('superadmin.profileSettings',['profile'=>$adminProfile]);
    }
    //End mail settings controller
}
