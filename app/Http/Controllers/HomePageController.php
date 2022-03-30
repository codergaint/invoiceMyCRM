<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomepageModule;
use Illuminate\Support\Str;
use File;

class HomePageController extends Controller
{
    public function homeSection(){
        $section1 = HomepageModule::where('section','Section1')->first();
        $section2 = HomepageModule::where('section','Section2')->orderBy('id','DESC')->get();
        $section3 = HomepageModule::where('section','Section3')->first();
        $section4 = HomepageModule::where('section','Section4')->first();
        $section5 = HomepageModule::where('section','Section5')->first();
        $section6 = HomepageModule::where('section','Section6')->first();
        $section7 = HomepageModule::where('section','Section7')->first();
        $section8 = HomepageModule::where('section','Section8')->first();
        $section9 = HomepageModule::where('section','Section9')->first();
        $section10 = HomepageModule::where('section','Section10')->first();
        return view('superadmin.homePageSection',['section1'=>$section1,'section2'=>$section2,'section3'=>$section3,'section4'=>$section4,'section5'=>$section5,'section6'=>$section6,'section7'=>$section7,'section8'=>$section8,'section9'=>$section9,'section10'=>$section10]);
    }
    // Homepage slider section save to database
    public function saveHomeSection1(Request $requ){
        $existChk = HomepageModule::where('section',$requ->section)->first();
        if(empty($existChk)):
            $section = new HomepageModule();
        else:
            $section = $existChk;
        endif;

        $section->section       = $requ->section;
        $section->title         = $requ->sliderHeading;
        $section->slogan        = $requ->sliderSlogan;
        $section->description   = $requ->sliderText;
        $section->btnTxt        = $requ->btnTxt;
        $section->btnUrl        = $requ->btnUrl;

        //Update image if has files
        if ($requ->hasFile('slideImg')):
            $image = $requ->file('slideImg');
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
            return back()->with('success','Success! Slider section updated successfully');
        else:
            return back()->with('error','Sorry! Slider section failed to update');
        endif;
    }
    // Homepage statistic section save to database
    public function saveHomeSection2(Request $requ){
        $existChk = HomepageModule::where(['section'=>$requ->section,'title'=>$requ->statisticHeading])->first();
        if(!empty($existChk)):
            return back()->with('error','Sorry! Statistic data already exist');
        else:
            $section = new HomepageModule();

            $section->section       = $requ->section;
            $section->title         = $requ->statisticHeading;
            $section->slogan        = $requ->statisticSlogan;
            $section->statisticText = $requ->statisticText;
            $section->statisticMeter= $requ->statisticMeter;

            //Update image if has files
            if ($requ->hasFile('statisImg')):
                $image = $requ->file('statisImg');
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
                return back()->with('success','Success! Statistic section saved successfully');
            else:
                return back()->with('error','Sorry! Statistic section failed to update');
            endif;
        endif;
    }

    public function editStatistic($id){
        $statistic = HomepageModule::find($id);
        return view('superadmin.editStatistic',['statistic'=>$statistic]);
    }
    
    public function updateStatistic(Request $requ){
        $section = HomepageModule::find($requ->statisId);
        if(empty($section)):
            return back()->with('error','Sorry! Statistic failed to update');
        else:
            $section->title         = $requ->statisticHeading;
            $section->slogan        = $requ->statisticSlogan;
            $section->statisticText = $requ->statisticText;
            $section->statisticMeter= $requ->statisticMeter;

            //Update image if has files
            if ($requ->hasFile('statisImg')):
                $image = $requ->file('statisImg');
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
                return back()->with('success','Success! Statistic section update successfully');
            else:
                return back()->with('error','Sorry! Statistic section failed to update');
            endif;
        endif;
    }

    public function delStatistic($id){
        $section = HomepageModule::find($id);
        if(empty($section)):
            return back()->with('error','Sorry! No record found');
        else:
            $section->delete();
            return back()->with('success','Success! Record sucessfully delete');
        endif;
    }

    // All in one section save to database
    public function saveHomeSection3(Request $requ){
        $existChk = HomepageModule::where(['section'=>$requ->section,'title'=>$requ->aioHeading])->first();
        if(!empty($existChk)):
            $section = $existChk;
        else:
            $section = new HomepageModule();
        endif;

            $section->section   = $requ->section;
            $section->title     = $requ->aioHeading;
            $section->slogan    = $requ->aioSlogan;
            $section->description= $requ->aioText;
            $section->btnTxt    = $requ->btnTxt;
            $section->btnUrl    = $requ->btnUrl;
            $section->videoLink = $requ->videoUrl;
            $section->boxHeading= $requ->buttonBoxSlogan;
            $section->boxText   = $requ->buttonBoxText;

            //Update image if has files
            if ($requ->hasFile('sectionImg')):
                $image = $requ->file('sectionImg');
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
                return back()->with('success','Success! All in one section saved successfully');
            else:
                return back()->with('error','Sorry! All in one section failed to update');
            endif;
    }
    // why section save to database
    public function saveHomeSection4(Request $requ){
        $existChk = HomepageModule::where(['section'=>$requ->section,'title'=>$requ->whyHeading])->first();
        if(!empty($existChk)):
            $section = $existChk;
        else:
            $section = new HomepageModule();
        endif;

            $section->section   = $requ->section;
            $section->title     = $requ->whyHeading;
            $section->slogan    = $requ->whySlogan;
            $section->btnTxt    = $requ->btnTxt;
            $section->btnUrl    = $requ->btnUrl;

            //Update image if has files
            if ($requ->hasFile('whyImg')):
                $image = $requ->file('whyImg');
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
                return back()->with('success','Success! Why section saved successfully');
            else:
                return back()->with('error','Sorry! Why section failed to update');
            endif;
    }
    // section six boxes save to database
    public function saveSection4Box(Request $requ){
        $existChk = HomepageModule::where(['section'=>$requ->section,'title'=>$requ->boxHeading])->first();
        if(!empty($existChk)):
            return back()->with('error','Sorry! Box already exist');
        else:
            $section = new HomepageModule();

            $section->section       = $requ->section;
            $section->title         = $requ->boxHeading;
            $section->description   = $requ->boxText;

            if($section->save()):
                return back()->with('success','Success! Record saved successfully');
            else:
                return back()->with('error','Sorry! Record failed to update');
            endif;
        endif;
    }

    public function updateSection4Box(Request $requ){
        $section = HomepageModule::find($requ->boxId);
        if(empty($section)):
            return back()->with('error','Sorry! No data found');
        else:
            $section->title         = $requ->boxHeading;
            $section->description   = $requ->boxText;

            if($section->save()):
                return back()->with('success','Success! Record saved successfully');
            else:
                return back()->with('error','Sorry! Record failed to update');
            endif;
        endif;
    }

    public function editSection4Box($id){
        $existChk = HomepageModule::find($id);
        return view('superadmin.editSB4',['SB4'=>$existChk]);
    }

    public function delSection4Box($id){
        $existChk = HomepageModule::find($id);
        if(empty($existChk)):
            return back()->with('error','Sorry! No data found');
        else:
            $existChk->delete();
            return back()->with('success','Success! Record delete successfully');
        endif;
    }
    // advance automation section save to database
    public function saveHomeSection5(Request $requ){
        $existChk = HomepageModule::where(['section'=>$requ->section,'title'=>$requ->amHeading])->first();
        if(!empty($existChk)):
            $section = $existChk;
        else:
            $section = new HomepageModule();
        endif;

            $section->section       = $requ->section;
            $section->title         = $requ->amHeading;
            $section->description   = $requ->amText;

            //Update image if has files
            if ($requ->hasFile('amImg')):
                $image = $requ->file('amImg');
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
                return back()->with('success','Success! Section five saved successfully');
            else:
                return back()->with('error','Sorry! Section five failed to update');
            endif;
    }

    public function saveHomeSection6(Request $requ){
        $existChk = HomepageModule::where(['section'=>$requ->section,'title'=>$requ->sixthHeading])->first();
        if(!empty($existChk)):
            $section = $existChk;
        else:
            $section = new HomepageModule();
        endif;

            $section->section       = $requ->section;
            $section->title         = $requ->sixthHeading;
            $section->description   = $requ->sixthText;
            $section->btnTxt        = $requ->sixthBtnTxt;

            //Update image if has files
            if ($requ->hasFile('sixthImg')):
                $image = $requ->file('sixthImg');
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
                return back()->with('success','Success! Section six saved successfully');
            else:
                return back()->with('error','Sorry! Section six failed to update');
            endif;
    }
    // section six boxes save to database
    public function saveSixthBox(Request $requ){
        $existChk = HomepageModule::where(['section'=>$requ->section,'title'=>$requ->boxHeading])->first();
        if(!empty($existChk)):
            return back()->with('error','Sorry! Box already exist');
        else:
            $section = new HomepageModule();

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

    public function updateSixthBox(Request $requ){
        $section = HomepageModule::find($requ->boxId);
        if(empty($section)):
            return back()->with('error','Sorry! No data found');
        else:
            $section->title         = $requ->boxHeading;
            $section->description   = $requ->boxText;

            if($section->save()):
                return back()->with('success','Success! Section six box saved successfully');
            else:
                return back()->with('error','Sorry! Section six box failed to update');
            endif;
        endif;
    }

    public function editSixthBox($id){
        $existChk = HomepageModule::find($id);
        return view('superadmin.editSixthBox',['sixthBox'=>$existChk]);
    }

    public function delSixthBox($id){
        $existChk = HomepageModule::find($id);
        if(empty($existChk)):
            return back()->with('error','Sorry! No data found');
        else:
            $existChk->delete();
            return back()->with('success','Success! Section six box delete successfully');
        endif;
    }

    // section seven controller
    public function saveHomeSection7(Request $requ){
        $existChk = HomepageModule::where(['section'=>$requ->section,'title'=>$requ->seventhHeading])->first();
        if(!empty($existChk)):
            $section = $existChk;
        else:
            $section = new HomepageModule();
        endif;

            $section->section           = $requ->section;
            $section->title             = $requ->seventhHeading;
            $section->description       = $requ->seventhText;
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
                return back()->with('success','Success! Section seven saved successfully');
            else:
                return back()->with('error','Sorry! Section seven failed to update');
            endif;
    }

    // section eight controller

    public function saveHomeSection8(Request $requ){
        $existChk = HomepageModule::where(['section'=>$requ->section,'title'=>$requ->eighthHeading])->first();
        if(!empty($existChk)):
            $section = $existChk;
        else:
            $section = new HomepageModule();
        endif;

            $section->section           = $requ->section;
            $section->title             = $requ->eighthHeading;
            $section->description       = $requ->eighthText;
            $section->writerHeading     = $requ->writerHeading;
            $section->writingText       = $requ->writerTxt;
            $section->btnTxt            = $requ->btnTxt;
            $section->btnUrl            = $requ->btnUrl;
            $section->designerTxt       = $requ->buttonTitle;

            if($section->save()):
                return back()->with('success','Success! Section eight saved successfully');
            else:
                return back()->with('error','Sorry! Section eight failed to update');
            endif;
    }
    // service boxes save to database
    public function saveServiceBox(Request $requ){
        $existChk = HomepageModule::where(['section'=>$requ->section,'title'=>$requ->boxHeading])->first();
        if(!empty($existChk)):
            return back()->with('error','Sorry! Box already exist');
        else:
            $section = new HomepageModule();

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

    public function updateServiceBox(Request $requ){
        $section = HomepageModule::find($requ->boxId);
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

    public function editServiceBox($id){
        $existChk = HomepageModule::find($id);
        return view('superadmin.editServiceBox',['sixthBox'=>$existChk]);
    }

    public function delServiceBox($id){
        $existChk = HomepageModule::find($id);
        if(empty($existChk)):
            return back()->with('error','Sorry! No data found');
        else:
            $existChk->delete();
            return back()->with('success','Success! Service box delete successfully');
        endif;
    }

    //Section 9 client box controller
    public function saveClientBox(Request $requ){
        $existChk = HomepageModule::where(['section'=>$requ->section,'title'=>$requ->companyName])->first();
        if(!empty($existChk)):
            return back()->with('error','Sorry! Box already exist');
        else:
            $section = new HomepageModule();

            $section->section       = $requ->section;
            $section->companyName   = $requ->companyName;
            //Update image if has files
            if ($requ->hasFile('boxImg')):
                $image = $requ->file('boxImg');
                $name = Str::slug($requ->input('section')).'_'.time().'.'.$image->getClientOriginalExtension();
                if(!empty($section->companyLogo) && File::exists(public_path('/assets/images/section/'.$section->companyLogo))){
                    File::delete(public_path('/assets/images/section/'.$section->companyLogo));
                }
                $folder = public_path('/assets/images/section/');
                $destinationPath = $folder;
                $image->move($destinationPath, $name);
                $filePath = $name;
                $section->companyLogo = $filePath;
            endif;
            //image update complete


            if($section->save()):
                return back()->with('success','Success! Service box saved successfully');
            else:
                return back()->with('error','Sorry! Service box failed to update');
            endif;
        endif;
    }

    public function updateClientBox(Request $requ){
        $section = HomepageModule::find($requ->boxId);
        if(empty($section)):
            return back()->with('error','Sorry! No data found');
        else:
            $section->companyName   = $requ->companyName;
            //Update image if has files
            if ($requ->hasFile('boxImg')):
                $image = $requ->file('boxImg');
                $name = Str::slug($requ->input('section')).'_'.time().'.'.$image->getClientOriginalExtension();
                if(!empty($section->companyLogo) && File::exists(public_path('/assets/images/section/'.$section->companyLogo))){
                    File::delete(public_path('/assets/images/section/'.$section->companyLogo));
                }
                $folder = public_path('/assets/images/section/');
                $destinationPath = $folder;
                $image->move($destinationPath, $name);
                $filePath = $name;
                $section->companyLogo = $filePath;
            endif;
            //image update complete

            if($section->save()):
                return back()->with('success','Success! Service box saved successfully');
            else:
                return back()->with('error','Sorry! Service box failed to update');
            endif;
        endif;
    }

    public function editClientBox($id){
        $existChk = HomepageModule::find($id);
        return view('superadmin.editServiceBox',['serviceBox'=>$existChk]);
    }

    public function delClientBox($id){
        $existChk = HomepageModule::find($id);
        if(empty($existChk)):
            return back()->with('error','Sorry! No data found');
        else:
            $existChk->delete();
            return back()->with('success','Success! Service box delete successfully');
        endif;
    }

    
    // service boxes save to database
    public function saveOportunity(Request $requ){
        $existChk = HomepageModule::where(['section'=>$requ->section,'title'=>$requ->boxHeading])->first();
        if(!empty($existChk)):
            return back()->with('error','Sorry! Record already exist');
        else:
            $section = new HomepageModule();

            $section->section       = $requ->section;
            $section->title         = $requ->boxHeading;
            $section->description   = $requ->boxText;

            if($section->save()):
                return back()->with('success','Success! Record saved successfully');
            else:
                return back()->with('error','Sorry! Record failed to update');
            endif;
        endif;
    }

    public function updateOportunity(Request $requ){
        $section = HomepageModule::find($requ->boxId);
        if(empty($section)):
            return back()->with('error','Sorry! No data found');
        else:
            $section->title         = $requ->boxHeading;
            $section->description   = $requ->boxText;

            if($section->save()):
                return back()->with('success','Success! Oportunity box saved successfully');
            else:
                return back()->with('error','Sorry! Oportunity box failed to update');
            endif;
        endif;
    }

    public function editOportunity($id){
        $existChk = HomepageModule::find($id);
        return view('superadmin.editOportunity',['oprotunity'=>$existChk]);
    }

    public function delOportunity($id){
        $existChk = HomepageModule::find($id);
        if(empty($existChk)):
            return back()->with('error','Sorry! No data found');
        else:
            $existChk->delete();
            return back()->with('success','Success! Oportunity box delete successfully');
        endif;
    }


    public function newHomeSection(Request $requ){
        return view('superadmin.newHomeSection');
    }
}
