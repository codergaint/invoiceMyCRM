<?php

namespace App\Http\Controllers;

use App\Models\FeaturepageModule;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use File;

class FeaturePageController extends Controller
{
    public function featureSection(){
        $featurePageSection = FeaturepageModule::where('section','featurePageDetailsSection')->first();
        $featureService     = FeaturepageModule::where('section','featureServiceSection')->first();
        $featureThree       = FeaturepageModule::where('section','Section3')->first();
        $featureFour        = FeaturepageModule::where('section','Section4')->first();
        $featureFive        = FeaturepageModule::where('section','Section5')->first();
        $featureStartNow    = FeaturepageModule::where('section','featureStartSection')->first();
        $featureFaq         = FeaturepageModule::where('section','featureFaqSection')->first();
        $featureCreatedNow  = FeaturepageModule::where('section','featureCreatedNowSection')->first();
        return view('superadmin.featurePageSection',['featureService'=>$featureService,'featureStartNow'=>$featureStartNow,'featureFaq'=>$featureFaq,'featureCreatedNow'=>$featureCreatedNow,'featurePageDetails'=>$featurePageSection,'feature3'=>$featureThree,'section4'=>$featureFour,'section5'=>$featureFive]);
    }
    // feature page details section

    public function saveFeaturePageSection(Request $requ){
        $existChk = FeaturepageModule::where(['section'=>$requ->section,'title'=>$requ->featurePageDetailsHeading])->first();
        if(!empty($existChk)):
            $section = $existChk;
        else:
            $section = new FeaturepageModule();
        endif;

            $section->section           = $requ->section;
            $section->title             = $requ->featurePageDetailsHeading;
            $section->description       = $requ->featurePageDetailsText;
            $section->btnTxt            = $requ->btnTxt;
            $section->btnUrl            = $requ->btnUrl;

            if($section->save()):
                return back()->with('success','Success! Page Details section saved successfully');
            else:
                return back()->with('error','Sorry! Page Details section failed to update');
            endif;
    }
    // section eight controller

    public function saveFeatureService(Request $requ){
        $existChk = FeaturepageModule::where(['section'=>$requ->section,'title'=>$requ->featureServiceHeading])->first();
        if(!empty($existChk)):
            $section = $existChk;
        else:
            $section = new FeaturepageModule();
        endif;

            $section->section           = $requ->section;
            $section->title             = $requ->featureServiceHeading;
            $section->description       = $requ->featureServiceText;

            if($section->save()):
                return back()->with('success','Success! Feature service saved successfully');
            else:
                return back()->with('error','Sorry! Feature service failed to update');
            endif;
    }
    // service boxes save to database
    public function saveFeatureBox(Request $requ){
        $existChk = FeaturepageModule::where(['section'=>$requ->section,'title'=>$requ->boxHeading])->first();
        if(!empty($existChk)):
            return back()->with('error','Sorry! Box already exist');
        else:
            $section = new FeaturepageModule();

            $section->section       = $requ->section;
            $section->title         = $requ->boxHeading;
            $section->description   = $requ->boxText;

            if($section->save()):
                return back()->with('success','Success! Section third box saved successfully');
            else:
                return back()->with('error','Sorry! Section third box failed to update');
            endif;
        endif;
    }

    public function updateFeatureBox(Request $requ){
        $section = FeaturepageModule::find($requ->boxId);
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

    public function editFeatureBox($id){
        $existChk = FeaturepageModule::find($id);
        return view('superadmin.editFeatureBox',['thirdBox'=>$existChk]);
    }

    public function delFeatureBox($id){
        $existChk = FeaturepageModule::find($id);
        if(empty($existChk)):
            return back()->with('error','Sorry! No data found');
        else:
            $existChk->delete();
            return back()->with('success','Success! Service box delete successfully');
        endif;
    }
    public function saveFeatureSection3(Request $requ){
        $existChk = FeaturepageModule::where(['section'=>$requ->section,'title'=>$requ->thirdHeading])->first();
        if(!empty($existChk)):
            $section = $existChk;
        else:
            $section = new FeaturepageModule();
        endif;

            $section->section       = $requ->section;
            $section->title         = $requ->thirdHeading;
            $section->description   = $requ->thirdText;
            $section->btnTxt        = $requ->thirdBtnTxt;

            //Update image if has files
            if ($requ->hasFile('thirdImg')):
                $image = $requ->file('thirdImg');
                $name = Str::slug($requ->input('section')).'_'.time().'.'.$image->getClientOriginalExtension();
                if(!empty($section->logo) && File::exists(public_path('/assets/images/section/'.$section->logo))){
                    File::delete(public_path('/assets/images/section/'.$section->logo));
                }
                $folder = public_path('/assets/images/section/');
                $destinationPath = $folder;
                $image->move($destinationPath, $name);
                $filePath = $name;
                $section->logo = $filePath;
            endif;
            //image update complete

            //Update image if has files
            if ($requ->hasFile('rightImg')):
                $image = $requ->file('rightImg');
                $name = Str::slug($requ->input('section')).'_'.time().'.'.$image->getClientOriginalExtension();
                if(!empty($section->rightImg) && File::exists(public_path('/assets/images/section/'.$section->rightImg))){
                    File::delete(public_path('/assets/images/section/'.$section->rightImg));
                }
                $folder = public_path('/assets/images/section/');
                $destinationPath = $folder;
                $image->move($destinationPath, $name);
                $filePath = $name;
                $section->rightImg = $filePath;
            endif;
            //image update complete

            if($section->save()):
                return back()->with('success','Success! Section third saved successfully');
            else:
                return back()->with('error','Sorry! Section third failed to update');
            endif;
    }
    // section third boxes save to database
    public function saveFeatureThirdBox(Request $requ){
        $existChk = FeaturepageModule::where(['section'=>$requ->section,'title'=>$requ->boxHeading])->first();
        if(!empty($existChk)):
            return back()->with('error','Sorry! Box already exist');
        else:
            $section = new FeaturepageModule();

            $section->section       = $requ->section;
            $section->title         = $requ->boxHeading;
            $section->description   = $requ->boxText;

            if($section->save()):
                return back()->with('success','Success! Section third box saved successfully');
            else:
                return back()->with('error','Sorry! Section third box failed to update');
            endif;
        endif;
    }

    public function updateFeatureThirdBox(Request $requ){
        $section = FeaturepageModule::find($requ->boxId);
        if(empty($section)):
            return back()->with('error','Sorry! No data found');
        else:
            $section->title         = $requ->boxHeading;
            $section->description   = $requ->boxText;

            if($section->save()):
                return back()->with('success','Success! Section third box saved successfully');
            else:
                return back()->with('error','Sorry! Section third box failed to update');
            endif;
        endif;
    }

    public function editFeatureThirdBox($id){
        $existChk = FeaturepageModule::find($id);
        return view('superadmin.editFeatureThirdBox',['thirdBox'=>$existChk]);
    }

    public function delFeatureThirdBox($id){
        $existChk = FeaturepageModule::find($id);
        if(empty($existChk)):
            return back()->with('error','Sorry! No data found');
        else:
            $existChk->delete();
            return back()->with('success','Success! Section third box delete successfully');
        endif;
    }

    // section four controller
    public function saveFeatureSection4(Request $requ){
        $existChk = FeaturepageModule::where(['section'=>$requ->section,'title'=>$requ->fourthHeading])->first();
        if(!empty($existChk)):
            $section = $existChk;
        else:
            $section = new FeaturepageModule();
        endif;

            $section->section           = $requ->section;
            $section->title             = $requ->fourthHeading;
            $section->description       = $requ->fourthText;
            $section->designerTxt       = $requ->designerText;
            $section->designerHeading   = $requ->designerHeading;
            $section->developerHeading  = $requ->developerHeading;
            $section->developerTxt      = $requ->developerText;

            //Update image if has files
            if ($requ->hasFile('designImg')):
                $image = $requ->file('designImg');
                $name = Str::slug($requ->input('section')).'_'.time().'.'.$image->getClientOriginalExtension();
                if(!empty($section->designerImg) && File::exists(public_path('/assets/images/section/'.$section->designerImg))){
                    File::delete(public_path('/assets/images/section/'.$section->designerImg));
                }
                $folder = public_path('/assets/images/section/');
                $destinationPath = $folder;
                $image->move($destinationPath, $name);
                $filePath = $name;
                $section->designerImg = $filePath;
            endif;
            //image update complete

            //Update image if has files
            if ($requ->hasFile('developImg')):
                $image = $requ->file('developImg');
                $name = Str::slug($requ->input('section')).'_'.time().'.'.$image->getClientOriginalExtension();
                if(!empty($section->developerImg) && File::exists(public_path('/assets/images/section/'.$section->developerImg))){
                    File::delete(public_path('/assets/images/section/'.$section->developerImg));
                }
                $folder = public_path('/assets/images/section/');
                $destinationPath = $folder;
                $image->move($destinationPath, $name);
                $filePath = $name;
                $section->developerImg = $filePath;
            endif;
            //image update complete

            if($section->save()):
                return back()->with('success','Success! Section four saved successfully');
            else:
                return back()->with('error','Sorry! Section four failed to update');
            endif;
    }
    // section five controller
    public function saveFeatureSection5(Request $requ){
        $existChk = FeaturepageModule::where(['section'=>$requ->section,'title'=>$requ->fourthHeading])->first();
        if(!empty($existChk)):
            $section = $existChk;
        else:
            $section = new FeaturepageModule();
        endif;

            $section->section       = $requ->section;
            $section->title         = $requ->fifthHeading;
            $section->description   = $requ->fifthText;
            $section->quoteWriter   = $requ->quoteWriter;
            $section->quote         = $requ->quoteText;

            //Update image if has files
            if ($requ->hasFile('quoteImg')):
                $image = $requ->file('quoteImg');
                $name = Str::slug($requ->input('section')).'_'.time().'.'.$image->getClientOriginalExtension();
                if(!empty($section->quoteImage) && File::exists(public_path('/assets/images/section/'.$section->quoteImage))){
                    File::delete(public_path('/assets/images/section/'.$section->quoteImage));
                }
                $folder = public_path('/assets/images/section/');
                $destinationPath = $folder;
                $image->move($destinationPath, $name);
                $filePath = $name;
                $section->quoteImage = $filePath;
            endif;
            //image update complete

            if($section->save()):
                return back()->with('success','Success! Section five saved successfully');
            else:
                return back()->with('error','Sorry! Section five failed to update');
            endif;
    }
    // video section save to database
    public function saveFeatureVideoBox(Request $requ){
        $existChk = FeaturepageModule::where(['section'=>$requ->section,'title'=>$requ->videoHeading])->first();
        if(!empty($existChk)):
            return back()->with('error','Sorry! Box already exist');
        else:
            $section = new FeaturepageModule();

            $section->section       = $requ->section;
            $section->videoHeading  = $requ->videoHeading;
            $section->videoText     = $requ->videoText;
            $section->gridVideo      = $requ->videoUrl;

            //Update image if has files
            if ($requ->hasFile('videoImg')):
                $image = $requ->file('videoImg');
                $name = Str::slug($requ->input('section')).'_'.time().'.'.$image->getClientOriginalExtension();
                if(!empty($section->logo) && File::exists(public_path('/assets/images/section/'.$section->logo))){
                    File::delete(public_path('/assets/images/section/'.$section->logo));
                }
                $folder = public_path('/assets/images/section/');
                $destinationPath = $folder;
                $image->move($destinationPath, $name);
                $filePath = $name;
                $section->logo = $filePath;
            endif;
            //image update complete

            if($section->save()):
                return back()->with('success','Success! Section third box saved successfully');
            else:
                return back()->with('error','Sorry! Section third box failed to update');
            endif;
        endif;
    }

    public function updateFeatureVideoBox(Request $requ){
        $section = FeaturepageModule::find($requ->boxId);
        if(empty($section)):
            return back()->with('error','Sorry! No data found');
        else:
            $section->videoHeading  = $requ->videoHeading;
            $section->videoText     = $requ->videoText;
            $section->gridVideo      = $requ->videoUrl;

            //Update image if has files
            if ($requ->hasFile('videoImg')):
                $image = $requ->file('videoImg');
                $name = Str::slug($requ->input('section')).'_'.time().'.'.$image->getClientOriginalExtension();
                if(!empty($section->logo) && File::exists(public_path('/assets/images/section/'.$section->logo))){
                    File::delete(public_path('/assets/images/section/'.$section->logo));
                }
                $folder = public_path('/assets/images/section/');
                $destinationPath = $folder;
                $image->move($destinationPath, $name);
                $filePath = $name;
                $section->logo = $filePath;
            endif;
            //image update complete

            if($section->save()):
                return back()->with('success','Success! Section third box saved successfully');
            else:
                return back()->with('error','Sorry! Section third box failed to update');
            endif;
        endif;
    }

    public function editFeatureVideoBox($id){
        $existChk = FeaturepageModule::find($id);
        return view('superadmin.editFeatureVideoBox',['thirdBox'=>$existChk]);
    }

    public function delFeatureVideoBox($id){
        $existChk = FeaturepageModule::find($id);
        if(empty($existChk)):
            return back()->with('error','Sorry! No data found');
        else:
            $existChk->delete();
            return back()->with('success','Success! Section third box delete successfully');
        endif;
    }


    // feature start now section

    public function saveFeatureStartNow(Request $requ){
        $existChk = FeaturepageModule::where(['section'=>$requ->section,'title'=>$requ->featureStartHeading])->first();
        if(!empty($existChk)):
            $section = $existChk;
        else:
            $section = new FeaturepageModule();
        endif;

            $section->section           = $requ->section;
            $section->title             = $requ->featureStartHeading;
            $section->description       = $requ->featureStartText;
            $section->btnTxt            = $requ->btnTxt;
            $section->btnUrl            = $requ->btnUrl;

            if($section->save()):
                return back()->with('success','Success! Start now section saved successfully');
            else:
                return back()->with('error','Sorry! Start now section failed to update');
            endif;
    }
    // feature FAQ section

    public function saveFeatureFaqSection(Request $requ){
        $existChk = FeaturepageModule::where(['section'=>$requ->section,'title'=>$requ->featureFaqHeading])->first();
        if(!empty($existChk)):
            $section = $existChk;
        else:
            $section = new FeaturepageModule();
        endif;

            $section->section           = $requ->section;
            $section->title             = $requ->featureFaqHeading;
            $section->description       = $requ->featureFaqText;
            $section->slogan            = $requ->featureFaqSlogan;

            if($section->save()):
                return back()->with('success','Success! FAQ section saved successfully');
            else:
                return back()->with('error','Sorry! FAQ section failed to update');
            endif;
    }
    // feature create now section

    public function saveFeatureCreatedNow(Request $requ){
        $existChk = FeaturepageModule::where(['section'=>$requ->section,'title'=>$requ->featureCreatedNowHeading])->first();
        if(!empty($existChk)):
            $section = $existChk;
        else:
            $section = new FeaturepageModule();
        endif;

            $section->section           = $requ->section;
            $section->title             = $requ->featureCreatedNowHeading;
            $section->description       = $requ->featureCreatedNowText;
            $section->btnTxt            = $requ->btnTxt;
            $section->btnUrl            = $requ->btnUrl;

            if($section->save()):
                return back()->with('success','Success! Create account section saved successfully');
            else:
                return back()->with('error','Sorry! Create account section failed to update');
            endif;
    }
}
