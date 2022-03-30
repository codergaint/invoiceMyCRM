<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Models\Company;
use App\Models\Currency;
use App\Models\PackageModule;
use App\Models\PaymentCredential;
use App\Models\Pricing;
use App\Models\Language;
use App\Models\AdminPanel;
use App\Models\EmailSetup;
use App\Models\Faq;
use App\Models\GeneralSettings;
use App\Models\Page;
use App\Models\PageConfig;
use Carbon\Carbon;
use Illuminate\Support\Facades\Request as FacadesRequest;
// use Psy\Util\Str;
use Illuminate\Support\Str;
use File;

class SuperAdminController extends Controller
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
    public function index(Request $request)
    {
        if (view()->exists($request->path())) {
            return view($request->path());
        }
        return abort(404);
    }

    public function root()
    {
        return view('superadmin.index');
    }

    public function saveCompany(Request $requ){
        $check = Company::where(['email'=>$requ->email])->get();
        if(count($check)>0):
            return back()->with('error','Sorry! Email already exist');
        else:
            $company    = new Company();
            $company->companyName   = $requ->companyName;
            $company->email         = $requ->email;
            $company->phoneNumber   = $requ->phoneNumber;
            $company->website       = $requ->url;
            $company->currId        = $requ->currency;
            $company->langId        = $requ->language;
            $company->tzId          = $requ->timeZone;
            $company->address       = $requ->address;
            $company->details       = $requ->companyDetails;

            if ($requ->hasFile('logo')) {
                $image = $requ->file('logo');
                $name = Str::slug($requ->input('companyName')).'_'.time().'.'.$image->getClientOriginalExtension();
                $folder = public_path('/assets/images/company/');
                $destinationPath = $folder;
                $image->move($destinationPath, $name);
                $filePath = $name;
                $company->logo = $filePath;
            }
            $company->loginPass = Hash::make($requ->loginPass);
            $company->plainPass  = $requ->loginPass;
            if($company->save()):
                return back()->with('success','Congratulations! Company profile saved successfully');
            else:
                return back()->with('error','Sorry! Company profile failed to save');
            endif;
        endif;
    }

    public function updateCompany(Request $requ){
        $company = Company::find($requ->companyId);
        // return $requ->timeZone;
        if(!empty($company)):
            $company->companyName   = $requ->companyName;
            $company->phoneNumber   = $requ->phoneNumber;
            $company->website       = $requ->url;
            $company->currId        = $requ->currency;
            $company->langId        = $requ->language;
            $company->tzId          = $requ->timeZone;
            $company->address       = $requ->address;
            $company->details       = $requ->companyDetails;
            if($company->save()):
                return back()->with('success','Congrats! Details update successfully');
            else:
                return back()->with('error','Sorry! Details failed to update');
            endif;
        else:
            return back()->with('error','Sorry! Company profile not found');
        endif;
    }

    public function updateCompLogo(Request $requ){
        if ($requ->hasFile('logo')) {
            $company = Company::find($requ->companyId);
            if(!empty($company)):
                $image = $requ->file('logo');
                $name = Str::slug($requ->input('companyName')).'_'.time().'.'.$image->getClientOriginalExtension();
                if(File::exists(public_path('/assets/images/company/'.$company->logo))){
                    File::delete(public_path('/assets/images/company/'.$company->logo));
                }
                $folder = public_path('/assets/images/company/');
                $destinationPath = $folder;
                $image->move($destinationPath, $name);
                $filePath = $name;
                $company->logo = $filePath;
                $company->save();
                return back()->with('success','Congrats! Logo update successfully');
            else:
                return back()->with('error','Sorry! Logo failed to update');
            endif;
        }else{
            return back()->with('error','Sorry! Please upload a valid file');
        }
    }

    public function updateCompPass(Request $requ){
        $company = Company::find($requ->companyId);
        if(!empty($company)):
            if(!(Hash::check($requ->oldPass, $company->loginPass))):
                return back()->with('error','Sorry! Your old password does not match with the password you provide. Please provide the right password');
            else:
                if($requ->newPass == $requ->confirmPass):
                    $company->loginPass = Hash::make($requ->newPass);
                    $company->plainPass  = $requ->newPass;
                    $company->email  = $requ->email;
                    $company->save();
                    return back()->with('success','Congrats! Password update successfully');
                else:
                    return back()->with('error','Sorry! New password does not match with confirm password');
                endif;
            endif;
        else:
            return back()->with('error','Sorry! Password failed to update');
        endif;
    }
    //Company activity end
    
    public function saveProduct(Request $requ){
        $check = Pricing::where(['productName'=>$requ->productName])->get();
        if(count($check)>0):
            return back()->with('error','Sorry! Product already exist');
        else:
            $product    = new Pricing();
            $storage = $requ->storage.$requ->storageUnit;
            $product->productName   = $requ->productName;
            $product->annualPrice   = $requ->annualPrice;
            $product->monthlyPrice  = $requ->monthlyPrice;
            $product->employee      = $requ->employee;
            $product->storage       = $storage;
            $product->storageUnit   = $requ->storageUnit;
            $product->status        = $requ->productStatus;
            $product->details       = $requ->productDetails;

            if ($requ->hasFile('logo')) {
                $image = $requ->file('logo');
                $name = Str::slug($requ->input('productName')).'_'.time().'.'.$image->getClientOriginalExtension();
                $folder = public_path('/assets/images/product/');
                $destinationPath = $folder;
                $image->move($destinationPath, $name);
                $filePath = $name;
                $product->media = $filePath;
            }
            if($product->save()):
                //Save module for product
                if(!empty($requ->module)):
                    $productDetails = Pricing::where(['productName'=>$requ->productName])->first();
                    for($i=0;$i<count($requ->module);$i++) {
                        $savedb=[
                          'packId'          =>  $productDetails->id,
                          'moduleName'      =>  $requ->module[$i],
                          'created_at'      =>  Carbon::now(),
                          'updated_at'      =>  Carbon::now()
                        ];
                        PackageModule::insert($savedb);
                    }
                endif;  
                return back()->with('success','Congratulations! Product details saved successfully');
            else:
                return back()->with('error','Sorry! Product details failed to save');
            endif;
        endif;
    }

    public function updateProduct(Request $requ){
        $product = Pricing::find($requ->productId);
        // return $requ->timeZone;
        if(!empty($product)):
            $product->productName   = $requ->productName;
            $product->annualPrice   = $requ->annualPrice;
            $product->monthlyPrice  = $requ->monthlyPrice;
            $product->employee      = $requ->employee;
            $product->storage       = $requ->storage;
            $product->storageUnit   = $requ->storageUnit;
            $product->status        = $requ->productStatus;
            $product->details       = $requ->productDetails;
            //Save module for product
            $module = PackageModule::where(['packId'=>$requ->productId])->get();
            if(count($module)>0):
                foreach($module as $mod):
                    $modules = PackageModule::find($mod->id);
                    $modules->delete();
                endforeach;
            endif;
            if(!empty($requ->module)):
                for($i=0;$i<count($requ->module);$i++) {
                    $savedb=[
                      'packId'          =>  $product->id,
                      'moduleName'      =>  $requ->module[$i],
                      'created_at'      =>  Carbon::now(),
                      'updated_at'      =>  Carbon::now()
                    ];
                    PackageModule::insert($savedb);
                }
            endif;  
            if($product->save()):
                return back()->with('success','Congrats! Details update successfully');
            else:
                return back()->with('error','Sorry! Details failed to update');
            endif;
        else:
            return back()->with('error','Sorry! Company profile not found');
        endif;
    }

    public function updateProLogo(Request $requ){
        if ($requ->hasFile('logo')) {
            $product = Pricing::find($requ->productId);
            if(!empty($product)):
                $image = $requ->file('logo');
                $name = Str::slug($requ->input('productName')).'_'.time().'.'.$image->getClientOriginalExtension();
                if(File::exists(public_path('/assets/images/product/'.$product->media))){
                    File::delete(public_path('/assets/images/product/'.$product->media));
                }
                $folder = public_path('/assets/images/product/');
                $destinationPath = $folder;
                $image->move($destinationPath, $name);
                $filePath = $name;
                $product->media = $filePath;
                $product->save();
                return back()->with('success','Congrats! Product media update successfully');
            else:
                return back()->with('error','Sorry! Product media failed to update');
            endif;
        }else{
            return back()->with('error','Sorry! Please upload a valid file');
        }
    }
    //End product controller

    public function saveCurrency(Request $requ){
        $check = Currency::where(['currency'=>$requ->currencyName])->get();
        if(count($check)):
            return back()->with('error','Sorry! Currency already exist');
        else:
            $curr    = new Currency();
            $curr->currency   = $requ->currencyName;
            $curr->shortCode  = $requ->shortName;
            $curr->symble     = $requ->symble;
            $curr->status     = $requ->currStatus;
            $curr->rtl        = $requ->rtl;
            if($curr->save()):
                return back()->with('success','Congratulations! Data saved successfully');
            else:
                return back()->with('error','Sorry! Data failed to save');
            endif;
        endif;
    }

    public function updateCurrency(Request $requ){
        $check = Currency::find($requ->currId);
        if(empty($check)):
            return back()->with('error','Sorry! Currency not found');
        else:
            $check->currency   = $requ->currencyName;
            $check->shortCode  = $requ->shortName;
            $check->symble     = $requ->symble;
            $check->status     = $requ->currStatus;
            $check->rtl        = $requ->rtl;
            if($check->save()):
                return back()->with('success','Congratulations! Data updated successfully');
            else:
                return back()->with('error','Sorry! Data failed to update');
            endif;
        endif;
    }

    public function saveLanguage(Request $requ){
        $check = Language::where(['language'=>$requ->languageName])->get();
        if(count($check)):
            return back()->with('error','Sorry! Language already exist');
        else:
            $lang    = new Language();
            $lang->language   = $requ->languageName;
            $lang->shortCode  = $requ->shortName;
            $lang->status     = $requ->langStatus;
            $lang->rtl        = $requ->rtl;
            if($lang->save()):
                return back()->with('success','Congratulations! Language saved successfully');
            else:
                return back()->with('error','Sorry! Language failed to save');
            endif;
        endif;
    }

    public function updateLanguage(Request $requ){
        $check = Language::find($requ->currId);
        if(empty($check)):
            return back()->with('error','Sorry! Language not found');
        else:
            $check->language   = $requ->languageName;
            $check->shortCode  = $requ->shortName;
            $check->status     = $requ->langStatus;
            $check->rtl        = $requ->rtl;
            if($check->save()):
                return back()->with('success','Congratulations! Language updated successfully');
            else:
                return back()->with('error','Sorry! Language failed to update');
            endif;
        endif;
    }
    //Server page controller
    public function savePage(Request $requ){
        $check = Page::where(['pageName'=>$requ->pageName])->get();
        if(count($check)):
            return back()->with('error','Sorry! Page already exist');
        else:
            $page    = new Page();
            $page->pageName     = $requ->pageName;
            $page->url          = $requ->pageUrl;
            $page->content      = $requ->pageContent;
            $page->metaTitle    = $requ->metaTitle;
            $page->metaDesc     = $requ->metaDetails;
            $page->metaKeyword  = $requ->keyword;
            if($page->save()):
                return back()->with('success','Congrats! Page created successfully');
            else:
                return back()->with('error','Sorry! Page failed to created');
            endif;
        endif;
    }

    public function updatePage(Request $requ){
        $page = Page::find($requ->pageId);
        if(empty($page)):
            return back()->with('error','Sorry! Data not found');
        else:
            $page->pageName     = $requ->pageName;
            $page->url          = $requ->pageUrl;
            $page->content      = $requ->pageContent;
            $page->metaTitle    = $requ->metaTitle;
            $page->metaDesc     = $requ->metaDetails;
            $page->metaKeyword  = $requ->keyword;
            if($page->save()):
                return back()->with('success','Congrats! Page updated successfully');
            else:
                return back()->with('error','Sorry! Page failed to update');
            endif;
        endif;
    }
    //Server faq controller
    public function saveFaq(Request $requ){
        $check = Faq::where(['question'=>$requ->question])->get();
        if(count($check)):
            return back()->with('error','Sorry! FAQ already exist');
        else:
            $faq    = new Faq();
            $faq->question     = $requ->question;
            $faq->answer       = $requ->answer;
            if($faq->save()):
                return back()->with('success','Congrats! FAQ created successfully');
            else:
                return back()->with('error','Sorry! FAQ failed to created');
            endif;
        endif;
    }

    public function updateFaq(Request $requ){
        $faq = Faq::find($requ->pageId);
        if(empty($faq)):
            return back()->with('error','Sorry! Data not found');
        else:
            $faq->question     = $requ->question;
            $faq->answer       = $requ->answer;
            if($faq->save()):
                return back()->with('success','Congrats! FAQ created successfully');
            else:
                return back()->with('error','Sorry! FAQ failed to created');
            endif;
        endif;
    }
    
    //Payment credentials
    public function saveOnlineCredential (Request $requ){
        $payment = PaymentCredential::find($requ->paymentId);
        if(empty($payment)):
            $payment    = new PaymentCredential();
        endif;
        $payment->paypalClientId    = $requ->paypalId;
        $payment->paypalSecret      = $requ->paypalSecret;
        $payment->paypalEnvironment = $requ->environment;
        $payment->paypalStatus      = $requ->paypalStatus;

        $payment->stripeId              = $requ->stripeKey;
        $payment->stripeSecret          = $requ->stripeSecret;
        $payment->stripeWebhookSecret   = $requ->stripeWebHook;
        $payment->stripeStatus          = $requ->stripeStatus;

        $payment->mollieAPI    = $requ->mollieAPI;
        $payment->mollieStatus = $requ->mollieStatus;
        if($payment->save()):
            return back()->with('success','Congrats! Payment credentials saved successfully');
        else:
            return back()->with('error','Sorry! Payment credentials failed to save');
        endif;
    }
    //general settings controller
    //details part
    public function saveGeneralSettings (Request $requ){
        $gs = GeneralSettings::find($requ->gsId);
        if(empty($gs)):
            $gs    = new GeneralSettings();
        endif;
        $gs->companyName    = $requ->companyName;
        $gs->email          = $requ->email;
        $gs->phone          = $requ->phone;
        $gs->website        = $requ->website;

        $gs->currency       = $requ->currency;
        $gs->language       = $requ->language;
        $gs->timezone       = $requ->timeZone;
        $gs->address        = $requ->address;

        if($gs->save()):
            return back()->with('success','Congrats! Details update successfully');
        else:
            return back()->with('error','Sorry! Details failed to update');
        endif;
    }
    //update frontend logo
    public function updateFrontLogo(Request $requ){
        if ($requ->hasFile('frontLogo')) {
            $gs = GeneralSettings::find($requ->gsId);
            if(!empty($gs)):
                $image = $requ->file('frontLogo');
                $name = Str::slug($requ->input('companyName')).'_'.time().'.'.$image->getClientOriginalExtension();
                if(File::exists(public_path('/assets/images/logo/'.$gs->frontLogo))){
                    File::delete(public_path('/assets/images/logo/'.$gs->frontLogo));
                }
                $folder = public_path('/assets/images/logo/');
                $destinationPath = $folder;
                $image->move($destinationPath, $name);
                $filePath = $name;
                $gs->frontLogo = $filePath;
                $gs->save();
                return back()->with('success','Congrats! Front logo update successfully');
            else:
                return back()->with('error','Sorry! Front logo failed to update');
            endif;
        }else{
            return back()->with('error','Sorry! Please upload a valid file');
        }
    }
    
    //update general logo
    public function updateGenLogo(Request $requ){
        if ($requ->hasFile('randLogo')) {
            $gs = GeneralSettings::find($requ->gsId);
            if(!empty($gs)):
                $image = $requ->file('randLogo');
                $name = Str::slug($requ->input('companyName')).'_'.time().'.'.$image->getClientOriginalExtension();
                if(File::exists(public_path('/assets/images/logo/'.$gs->randLogo))){
                    File::delete(public_path('/assets/images/logo/'.$gs->randLogo));
                }
                $folder = public_path('/assets/images/logo/');
                $destinationPath = $folder;
                $image->move($destinationPath, $name);
                $filePath = $name;
                $gs->randLogo = $filePath;
                $gs->save();
                return back()->with('success','Congrats! General logo update successfully');
            else:
                return back()->with('error','Sorry! General logo failed to update');
            endif;
        }else{
            return back()->with('error','Sorry! Please upload a valid file');
        }
    }
    
    //update favicon
    public function updateFavicon(Request $requ){
        if ($requ->hasFile('favicon')) {
            $gs = GeneralSettings::find($requ->gsId);
            if(!empty($gs)):
                $image = $requ->file('favicon');
                $name = Str::slug($requ->input('companyName')).'_'.time().'.'.$image->getClientOriginalExtension();
                if(File::exists(public_path('/assets/images/logo/'.$gs->favicon))){
                    File::delete(public_path('/assets/images/logo/'.$gs->favicon));
                }
                $folder = public_path('/assets/images/logo/');
                $destinationPath = $folder;
                $image->move($destinationPath, $name);
                $filePath = $name;
                $gs->favicon = $filePath;
                $gs->save();
                return back()->with('success','Congrats! Favicon update successfully');
            else:
                return back()->with('error','Sorry! Favicon failed to update');
            endif;
        }else{
            return back()->with('error','Sorry! Please upload a valid file');
        }
    }
    
    //smtp setup part
    public function saveSmtp (Request $requ){
        $ms = EmailSetup::find($requ->msId);
        if(empty($ms)):
            $ms    = new EmailSetup();
        endif;
        $ms->formName   = $requ->formName;
        $ms->formEmail  = $requ->formEmail;
        $ms->host       = $requ->mailHost;
        $ms->port       = $requ->mailPort;

        $ms->userName   = $requ->mailUser;
        $ms->password   = $requ->mailPass;
        $ms->encType    = $requ->encType;

        if($ms->save()):
            return back()->with('success','Congrats! Mail setup saved successfully');
        else:
            return back()->with('error','Sorry! Mail setup failed to update');
        endif;
    }
    
    //mail setup part
    public function saveMail (Request $requ){
        $ms = EmailSetup::find($requ->msId);
        if(empty($ms)):
            $ms    = new EmailSetup();
        endif;
        $ms->formName   = $requ->formName;
        $ms->formEmail  = $requ->formEmail;;

        if($ms->save()):
            return back()->with('success','Congrats! Mail setup saved successfully');
        else:
            return back()->with('error','Sorry! Mail setup failed to update');
        endif;
    }//mail setup part

    public function saveLayout (Request $requ){
        $layout = PageConfig::where(['pageName'=>$requ->pageName])->first();
        if(empty($layout)):
            $layout    = new PageConfig();
        endif;
        $layout->pageName   = $requ->pageName;
        $layout->pageTitle  = $requ->pageTitle;
        $layout->pageType   = $requ->pageType;

        if($layout->save()):
            return back()->with('success','Congrats! Layout saved successfully');
        else:
            return back()->with('error','Sorry! Layout failed to update');
        endif;
    }//Layout controller update

    public function saveProfile (Request $requ){
        $admin = AdminPanel::find($requ->profileId);
        if(empty($admin)):
            $admin    = new AdminPanel();
        endif;
        $admin->name   = $requ->profileName;

        if($admin->save()):
            return back()->with('success','Congrats! Details saved successfully');
        else:
            return back()->with('error','Sorry! Details failed to update');
        endif;
    }
    public function avatarUpdate (Request $requ){
        if ($requ->hasFile('avatar')) {
            $avatar = AdminPanel::find($requ->profileId);
            if(!empty($avatar)):
                $image = $requ->file('avatar');
                $name = Str::slug($requ->input('profileName')).'_'.time().'.'.$image->getClientOriginalExtension();
                if(File::exists(public_path('/assets/images/admin/'.$avatar->avatar))){
                    File::delete(public_path('/assets/images/admin/'.$avatar->avatar));
                }
                $folder = public_path('/assets/images/admin/');
                $destinationPath = $folder;
                $image->move($destinationPath, $name);
                $filePath = $name;
                $avatar->avatar = $filePath;
                $avatar->save();
                return back()->with('success','Congrats! Profile update successfully');
            else:
                return back()->with('error','Sorry! Profile failed to update');
            endif;
        }else{
            return back()->with('error','Sorry! Please upload a valid file');
        }
    }
    
    public function adminlogout(Request $request)
    {
        $request->session()->flush();
        $request->session()->regenerate();
        session_start();
        session_destroy();
        //session_regenerate();
        return redirect(route('adminLogin'))->with('error','Successfully logout! Please login to continue');
    }
}
