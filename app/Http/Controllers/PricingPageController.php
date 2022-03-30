<?php

namespace App\Http\Controllers;

use App\Models\PricingpageModule;
use Illuminate\Http\Request;

class PricingPageController extends Controller
{
    public function pricingSection(){
        $section8 = PricingpageModule::where('section','priceServiceSection')->first();
        $priceStartNow = PricingpageModule::where('section','priceStartSection')->first();
        $priceFaq = PricingpageModule::where('section','priceFaqSection')->first();
        $priceCreatedNow = PricingpageModule::where('section','priceCreatedNowSection')->first();
        return view('superadmin.pricingPageSection',['priceService'=>$section8,'priceStartNow'=>$priceStartNow,'priceFaq'=>$priceFaq,'priceCreatedNow'=>$priceCreatedNow]);
    }
    // section eight controller

    public function savePricingService(Request $requ){
        $existChk = PricingpageModule::where(['section'=>$requ->section,'title'=>$requ->priceServiceHeading])->first();
        if(!empty($existChk)):
            $section = $existChk;
        else:
            $section = new PricingpageModule();
        endif;

            $section->section           = $requ->section;
            $section->title             = $requ->priceServiceHeading;
            $section->description       = $requ->priceServiceText;

            if($section->save()):
                return back()->with('success','Success! Pricing service saved successfully');
            else:
                return back()->with('error','Sorry! Pricing service failed to update');
            endif;
    }
    // service boxes save to database
    public function savePricingBox(Request $requ){
        $existChk = PricingpageModule::where(['section'=>$requ->section,'title'=>$requ->boxHeading])->first();
        if(!empty($existChk)):
            return back()->with('error','Sorry! Box already exist');
        else:
            $section = new PricingpageModule();

            $section->section       = $requ->section;
            $section->title         = $requ->boxHeading;
            $section->description   = $requ->boxText;

            if($section->save()):
                return back()->with('success','Success! Section six box saved successfully');
            else:
                return back()->with('error','Sorry! Section six box failed to update');
            endif;
        endif;
    }

    public function updatePricingBox(Request $requ){
        $section = PricingpageModule::find($requ->boxId);
        if(empty($section)):
            return back()->with('error','Sorry! No data found');
        else:
            $section->title         = $requ->boxHeading;
            $section->description   = $requ->boxText;

            if($section->save()):
                return back()->with('success','Success! Service box saved successfully');
            else:
                return back()->with('error','Sorry! Service box failed to update');
            endif;
        endif;
    }

    public function editPricingBox($id){
        $existChk = PricingpageModule::find($id);
        return view('superadmin.editPricingBox',['sixthBox'=>$existChk]);
    }

    public function delPricingBox($id){
        $existChk = PricingpageModule::find($id);
        if(empty($existChk)):
            return back()->with('error','Sorry! No data found');
        else:
            $existChk->delete();
            return back()->with('success','Success! Service box delete successfully');
        endif;
    }

    // pricing start now section

    public function savePricingStartNow(Request $requ){
        $existChk = PricingpageModule::where(['section'=>$requ->section,'title'=>$requ->priceStartHeading])->first();
        if(!empty($existChk)):
            $section = $existChk;
        else:
            $section = new PricingpageModule();
        endif;

            $section->section           = $requ->section;
            $section->title             = $requ->priceStartHeading;
            $section->description       = $requ->priceStartText;
            $section->btnTxt            = $requ->btnTxt;
            $section->btnUrl            = $requ->btnUrl;

            if($section->save()):
                return back()->with('success','Success! Start now section saved successfully');
            else:
                return back()->with('error','Sorry! Start now section failed to update');
            endif;
    }
    // pricing FAQ section

    public function savePricingFaqSection(Request $requ){
        $existChk = PricingpageModule::where(['section'=>$requ->section,'title'=>$requ->priceFaqHeading])->first();
        if(!empty($existChk)):
            $section = $existChk;
        else:
            $section = new PricingpageModule();
        endif;

            $section->section           = $requ->section;
            $section->title             = $requ->priceFaqHeading;
            $section->description       = $requ->priceFaqText;
            $section->slogan            = $requ->priceFaqSlogan;

            if($section->save()):
                return back()->with('success','Success! FAQ section saved successfully');
            else:
                return back()->with('error','Sorry! FAQ section failed to update');
            endif;
    }
    // pricing create now section

    public function savePricingCreatedNow(Request $requ){
        $existChk = PricingpageModule::where(['section'=>$requ->section,'title'=>$requ->priceCreatedNowHeading])->first();
        if(!empty($existChk)):
            $section = $existChk;
        else:
            $section = new PricingpageModule();
        endif;

            $section->section           = $requ->section;
            $section->title             = $requ->priceCreatedNowHeading;
            $section->description       = $requ->priceCreatedNowText;
            $section->btnTxt            = $requ->btnTxt;
            $section->btnUrl            = $requ->btnUrl;

            if($section->save()):
                return back()->with('success','Success! Create account section saved successfully');
            else:
                return back()->with('error','Sorry! Create account section failed to update');
            endif;
    }
}
