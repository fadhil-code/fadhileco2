<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\users_detalis;
use App\Models\users_cirtificates;
use App\Models\users_studes;
use App\Models\users_contacts;
use App\Models\users_langs;
use App\Models\users_jobs;
use App\Models\users_address;
use App\Models\users_skills;
use App\Models\specialties;
use App\Models\postss;
use App\Models\post_special;
use App\Models\post_photo;
use App\Models\post_jobs_requests;
use App\Models\post_comments;
use App\Models\post_like;
use App\Models\notifications;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AuthManager extends Controller
{
    //
    function login(){
        if(Auth::check()){
        return redirect(route('home'));
            
        }
        return view('login');
        }
    function registration(){
        if(Auth::check()){
            return redirect(route('login'));
                
            }
            $data10= specialties::all();
            
        return view('registration',[
            'specialties'=>$data10]);
     }

    function loginPost(Request $request){
        $request->validate([
            'email'=> 'required',
            'password'=> 'required'
        ]);
        $cr=$request->only('email','password');
        if(Auth::attempt($cr)){
            $id = Auth::user()->id;
            $data= User::where('id',$id)->get();

           
            return redirect()->intended(route('home'));

              //  return  view('welcome',['Users'=>$data,
            //'specialties'=>$data10,
            //]);
        }
        $email=$request->input('email');
        $request->session()->put('email', $email);
        return redirect(route('login'))->with("error","Login details are not valid");
        
     }
    function home(Request $request){
        if(Auth::check()){

            $all_posts=DB::table('postss')
            ->join('post_photo','postss.id','=','post_photo.pid')
            ->join('post_special','postss.id','=','post_special.pid')
            ->select('postss.*','post_photo.image','post_special.spid')->get();
            $id = Auth::user()->id;
            $data= User::where('id',$id)->get();
            $data10= specialties::all();
            $data0= postss::all()->sortByDesc('id');
            $user_detales= User::find($id)->users_detalis;
            $post_jobs_request= User::find($id)->post_jobs_requests;
            $post_likes= post_like::where('uid',$id)->get();
            $notifications= notifications::where('to_uid',$id)->get();
            $post_comment= post_comments::all();
            
            
           // $data0= postss::where('id',$id)->get();  لعرض المنشورات المتخصصة فقط
            $data1= post_photo::all();
            $data2= post_special::all();
            $userposts= User::find(13)->postss;
                return  view('welcome',[
                'specialties'=>$data10,
                'postss'=>$data0,
                'post_photo'=>$data1,
                'post_special'=>$data2,
                'userposts'=>$userposts,
                'all_posts'=>$all_posts,
                'user_detales'=>$user_detales,
                'post_jobs_requests'=>$post_jobs_request,
                'post_comments'=>$post_comment,
                'post_like'=>$post_likes,
                'notifications'=>$notifications,
                ]);
        }
        $email=$request->input('email');
        $request->session()->put('email', $email);
        return redirect(route('login'))->with("error","Login details are not valid");
        
     }
    function registrationPost(Request $request){
        $request->validate([
            'fullname'=> 'required',
            'email'=> 'required|email|unique:users',
            'password'=> 'required|min:1'
        ]);
        $user_type=$request->get('user_type');
        $data['fullname']=$request->fullname;
        $data['email']=$request->email;
        $data['password']=Hash::make($request->password);
        $data['user_type']=$user_type;
        $data['photo']="avatar3.png";

        if ($user_type=="1"){
            $data['prev']="view,posts,courses,";
        }
        else
        {
            $data['prev']="view,";
            
        }
        $user= User::create($data);
        if (!$user){
        return redirect(route('registration'))->with("error","registration failed");
        }
        $user_data_detalis['uid']=$user->id;
        $user_data_detalis['spid']=$request->get('user_spe');
        $users_det= users_detalis::create($user_data_detalis);

       // users_detalis::where('uid',$id)->update(['spid'=>'1']);
        $user_data['uid']=$user->id;

        if (!$users_det){return redirect(route('registration'))->with("error","registration failed");}
        $users_det1= users_address::create($user_data);
        if (!$users_det1){return redirect(route('registration'))->with("error","registration failed");}
        //$users_det2= users_cirtificates::create($user_data);
        //if (!$users_det2){return redirect(route('registration'))->with("error","registration failed");}
        $users_det3= users_contacts::create($user_data);
        if (!$users_det3){return redirect(route('registration'))->with("error","registration failed");}
        //$users_det4= users_jobs::create($user_data);
        //if (!$users_det4){return redirect(route('registration'))->with("error","registration failed");}
        //$users_det5= users_langs::create($user_data);
        //if (!$users_det5){return redirect(route('registration'))->with("error","registration failed");}
        //$users_det6= users_skills::create($user_data);
        //if (!$users_det6){return redirect(route('registration'))->with("error","registration failed");}
       // $users_det6= users_studes::create($user_data);
        //if (!$users_det6){return redirect(route('registration'))->with("error","registration failed");}        
        return redirect(route('login'))->with("success","registration success");

        }

    function logout(Request $request){
        //session::flush();
        $request->session()->forget('email');
        Auth::logout();
        return redirect(route('login'));
        

     }


    function show_edit_info($id){
        if(Auth::check()){
            $data= User::where('id',$id)->get();
            //$data2= users_detalis::where('uid',$id)->get();
            //$data3= users_address::where('uid',$id)->get();
            //$data4= users_studes::where('uid',$id)->get();
            //$data5= users_contacts::where('uid',$id)->get();
            //$data6= users_skills::where('uid',$id)->get();
            //$data7= users_cirtificates::where('uid',$id)->get();
            //$data8= users_langs::where('uid',$id)->get();
            //$data9= users_jobs::where('uid',$id)->get();
            return view('editinfo',['Users'=>$data
            ]);
            return view('editinfo',['Users'=>$data,
            'users_detalis'=>$data2,
            'users_address'=>$data3,
            'users_studes'=>$data4,
            'users_contacts'=>$data5,
            'users_skills'=>$data6,
            'users_cirtificates'=>$data7,
            'users_langs'=>$data8,
            'users_jobs'=>$data9,
            ]);
            }
            return view('login');
        

        }
    
    function show_edit_info2(){
            if(Auth::check()){
                $id = Auth::user()->id;
                $data= User::where('id',$id)->get();
                $data2= users_detalis::where('uid',$id)->get();
                $data3= users_address::where('uid',$id)->get();
                $data4= users_studes::where('uid',$id)->get();
                $data5= users_contacts::where('uid',$id)->get();
                $data6= users_skills::where('uid',$id)->get();
                $data7= users_cirtificates::where('uid',$id)->get();
                $data8= users_langs::where('uid',$id)->get();
                $data9= users_jobs::where('uid',$id)->get();
                $notifications= notifications::where('to_uid',$id)->get();

            $user_detales= User::find($id)->users_detalis;

                return view('editinfo',['Users'=>$data,
                'users_detalis'=>$data2,
                'users_address'=>$data3,
                'users_studes'=>$data4,
                'users_contacts'=>$data5,
                'users_skills'=>$data6,
                'users_cirtificates'=>$data7,
                'users_langs'=>$data8,
                'users_jobs'=>$data9,
                'user_detales'=>$user_detales,
                'notifications'=>$notifications,
            ]);
               
                
                    
                }
                return view('login');
            
    
            }
    
    
    function show_edit_info2Post(Request $request){
        try {
            $id = Auth::user()->id;
            if ($request->has('image')) {
                $request->validate([
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
                ]);
                    $fileName = $id  .time(). '.' . $request->file('image')->extension();
                                        $request->image->storeAs('public/images', $fileName);  
                                User::where('id',$id)->update(['photo'=>$fileName]);
            }
           
            $fullname = $request->fullname;
            $email = $request->email;
 
            User::where('id',$id)->update(['fullname'=>$fullname,'email'=>$email]);
            users_contacts::where('uid',$id)->update([
                'phone'=>$request->phone,'facebook'=>$request->facebook,
                'instagram'=>$request->instagram,'telegram'=>$request->telegram,
                'linkdin'=>$request->linkdin
                ]);


          

          return redirect(route('show_edit_info2'))->with("success","تم تحديث البيانات الشخصية بنجاح.");

        } catch (Throwable $e) {
            
            return redirect(route('show_edit_info2'))->with("success",report($e));
     
        }
    } 
    public function editadress2Post(Request $request) {

        
            if(Auth::check()){
                $id = Auth::user()->id;

               users_address::where('uid',$id)->update(['country'=>$request->country,'city'=>$request->city]); 
                return redirect(route('show_edit_info2'))->with("success","تم تحديث معلومات السكن بنجاح.");
               // return redirect(route('home'))->with("success","Record updated successfully.");
            }
            return view('home');
    
            }      
               
                    
        
    public function editinfo(Request $request,$id) {

        
        if(Auth::check()){
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            $fullname = $request->fullname;
            $email = $request->email;
            $fileName = $id  . '.' . $request->file('image')->extension();
            $request->image->storeAs('public/images', $fileName);   
            User::where('id',$id)->update(['fullname'=>$fullname,'email'=>$email,'photo'=>$fileName]);
            users_contacts::where('uid',$id)->update([
                'phone'=>$request->phone,'facebook'=>$request->facebook,
                'instagram'=>$request->instagram,'telegram'=>$request->telegram,
                'linkdin'=>$request->linkdin
                ]);


           users_detalis::where('uid',$id)->update(['spid'=>'1']);
          

          return redirect(route('home'))->with("success","Record updated successfully.");
        }
        return view('home');

        }


    public function editadress(Request $request,$id) {

        
            if(Auth::check()){
               users_address::where('uid',$id)->update(['country'=>$request->country,'city'=>$request->city]); 
              return redirect(route('home'))->with("success","Record updated successfully.");
            }
            return view('home');
    
    }
    public function addstudy2Post(Request $request) {

        
                if(Auth::check()){
                    $id = Auth::user()->id;

                    $data['uid']=$id;
                    $data['stname']=$request->stname;
                    $data['special']=$request->special;
                    $data['university']=$request->university;
                    $data['collage']=$request->collage;
                    $data['date1']=$request->date1;
                    $data['date2']=$request->date2;
                    $data['country']=$request->country;
                    $data['city']=$request->city;
                    $users_studess= users_studes::create($data);
                    if (!$users_studess){
                         return redirect(route('show_edit_info2'))->with("success","لم يتم الاضافة.");
                //  return redirect(route('home'))->with("error","university failed to add");
                        }            
                  //return redirect(route('home'))->with("success","Record updated successfully.");
                         return redirect(route('show_edit_info2'))->with("success","تم تحديث معلومات الشهادة بنجاح.");

                }
                return view('home');
        
                }
    public function editstudy(Request $request,$id) {
                if(Auth::check()){
                   users_studes::where('uid',$id)->update([
                    'stname'=>$request->stname,'special'=>$request->special,
                    'university'=>$request->university,'collage'=>$request->collage,
                    'date1'=>$request->stdate1,'date2'=>$request->stdate2,
                    'country'=>$request->stcountry,'city'=>$request->stcity
                    ]);
        
                  return redirect(route('home'))->with("success","Record updated successfully.");
                }
                return view('home');
        
                }
    public function addstudy(Request $request,$id) {
                    if(Auth::check()){
                        $data['uid']=$id;
                        $data['stname']=$request->stname;
                        $data['special']=$request->special;
                        $data['university']=$request->university;
                        $data['collage']=$request->collage;
                        $data['date1']=$request->date1;
                        $data['date2']=$request->date2;
                        $data['country']=$request->country;
                        $data['city']=$request->city;
                        $users_studess= users_studes::create($data);
                        if (!$users_studess){
                            return redirect(route('home'))->with("error","university failed to add");
                            }            
                      return redirect(route('home'))->with("success","Record updated successfully.");
                    }
                    return view('home');
            
                    }
    public function editskils(Request $request,$id) {
                    if(Auth::check()){
                        users_skills::where('uid',$id)->update([
                        'skname'=>$request->skname
                        ]);
                        users_cirtificates::where('uid',$id)->update([
                            'cname'=>$request->cname,'date1'=>$request->cdate1
                            ]);
                            users_langs::where('uid',$id)->update([
                                'langname'=>$request->langname,'pres'=>$request->pres
                                ]);
                    
                      return redirect(route('home'))->with("success","Record updated successfully.");
                    }
                    return view('home');
            
                }
    public function addskilsPost(Request $request) {
            if(Auth::check()){
                $id = Auth::user()->id;
                $data['uid']=$id;
                $data['skname']=$request->skname;
                $users_skill= users_skills::create($data);
                if (!$users_skill){
                     return redirect(route('show_edit_info2'))->with("success","لم يتم الاضافة.");
                    }            
                     return redirect(route('show_edit_info2'))->with("success","تم اضافة المهارة بنجاح.");
            }
            return view('home');
    
            }  
    public function addcirtificatePost(Request $request) {
                if(Auth::check()){
                    $id = Auth::user()->id;
                    $data['uid']=$id;
                    $data['cname']=$request->cname;
                    $data['date1']=$request->date1;
                    $users_cirtificate= users_cirtificates::create($data);
                    if (!$users_cirtificate){
                         return redirect(route('show_edit_info2'))->with("success","لم يتم الاضافة.");
                        }            
                         return redirect(route('show_edit_info2'))->with("success","تم اضافة الشهادة بنجاح.");
                }
                return view('home');
        
                } 
    public function addlangPost(Request $request) {
                    if(Auth::check()){
                        $id = Auth::user()->id;
                        $data['uid']=$id;
                        $data['langname']=$request->langname;
                        $data['pres']=$request->pres;
                        $users_lang= users_langs::create($data);
                        if (!$users_lang){
                             return redirect(route('show_edit_info2'))->with("success","لم يتم الاضافة.");
                            }            
                             return redirect(route('show_edit_info2'))->with("success","تم اضافة اللغة بنجاح.");
                    }
                    return view('home');
            
                    }   
    public function addjobPost(Request $request) {
                        if(Auth::check()){
                            $id = Auth::user()->id;
                            $data['uid']=$id;
                            $data['jobtitle']=$request->jobtitle;
                            $users_job= users_jobs::create($data);
                            if (!$users_job){
                                 return redirect(route('show_edit_info2'))->with("success","لم يتم الاضافة.");
                                }            
                                 return redirect(route('show_edit_info2'))->with("success","تم اضافة الوظيفة بنجاح.");
                        }
                        return view('home');
                
                        }   
    public function delete_study2Post(Request $request,$id) {
                        if(Auth::check()){
                            
                            users_studes::where('id',$id)->delete();
                                return redirect(route('show_edit_info2'))->with("success","تم مسح الشهادة بنجاح.");
                            }
                            return view('home');
                    
                            } 
    public function delete_skillPost(Request $request,$id) {
                        if(Auth::check()){
                            users_skills::where('id',$id)->delete();
                                return redirect(route('show_edit_info2'))->with("success","تم مسح المهارة بنجاح.");
                            }
                            return view('home');
                    
                            } 
    public function delete_cirtificatePost(Request $request,$id) {
                                if(Auth::check()){
                                    users_cirtificates::where('id',$id)->delete();
                                        return redirect(route('show_edit_info2'))->with("success","تم مسح الشهادة بنجاح.");
                                    }
                                    return view('home');
                            
                                    } 
    public function delete_langPost(Request $request,$id) {
                                        if(Auth::check()){
                                            users_langs::where('id',$id)->delete();
                                                return redirect(route('show_edit_info2'))->with("success","تم مسح اللغة بنجاح.");
                                            }
                                            return view('home');
                                    
                                            } 
    public function delete_jobPost(Request $request,$id) {
                                                if(Auth::check()){
                                                    users_jobs::where('id',$id)->delete();
                                                        return redirect(route('show_edit_info2'))->with("success","تم مسح الوظيفة بنجاح.");
                                                    }
                                                    return view('home');
                                            
                                                    } 
    public function editjobs(Request $request,$id) {
            if(Auth::check()){
                users_jobs::where('uid',$id)->update([
                'jobtitle'=>$request->jobtitle
                ]);
                
            
              return redirect(route('home'))->with("success","Record updated successfully.");
            }
            return view('home');
        }
    

       

    public function delete_study($id,$uid) {
        users_studes::where('id',$id)->delete();
            return redirect(route('home'))->with("success","Record deleted successfully.");
         //   echo "Record deleted successfully.<br/>(".$uid.")";
            //echo '<a href = "/show_edit_info/'.$uid.'">Click Here</a> to go back.';
        }

    public function addpostPost(Request $request) {
            if(Auth::check()){
                $id = Auth::user()->id;
                $data['uid']=$id;
                $data['active']="1";
                $data['title']=$request->title;
                $data['body']=$request->body;
                $mytime = Carbon::now();
                $data['postdate']=$mytime->toDateTimeString();
                $post1= postss::create($data);
                if (!$post1){
                    
                     return redirect(route('home'))->with("success","لم يتم الاضافة.");
                    }
                    $htmlsp = $request->input('htmlsp');
                    $postid=$post1->id;
                    foreach ($htmlsp as $htmlsps) {
                        $user_data['pid']=$postid;
                        $user_data['spid']=$htmlsps;
                        $post_special_det= post_special::create($user_data);
                        if (!$post_special_det){return redirect(route('home'))->with("error","registration failed");}  

                    }
                    if ($request->has('images')) {

                        foreach ($request->images as $imagefile) {
                    $randomId       =   rand(2,50);
                    $fileName = $postid  .$randomId.time(). '.' . $imagefile->extension();
                            $imagefile->storeAs('public/images/posts/', $fileName);  
                            $user_data2['pid']=$postid;
                        $user_data2['image']=$fileName;
                        $post_photo_det= post_photo::create($user_data2);
                       if (!$post_photo_det){return redirect(route('home'))->with("error","registration failed");}  
                        
                     }
                 }
                    
          
                    return redirect(route('home'))->with("success","تم نشر المنشور بنجاح.");
                        }
            return view('home');
    
            }  

    public function add_job_requestPost(Request $request,$id,$uid) {
                if(Auth::check()){
                    $userid = Auth::user()->id;
                    $data['pid']=$id;
                    $data['uid']=$userid;
                    $data['companyuid']=$uid;
                    $data['accepted']="0";
                    $mytime = Carbon::now();
                    $data['requestdate']=$mytime->toDateTimeString();
                    $post_jobs_request= post_jobs_requests::create($data);
                    if (!$post_jobs_request){
                        
                         return redirect(route('home'))->with("success","لم يتم الاضافة.");
                        }                     
                        $data2['pid']=$id;
                        $data2['from_uid']=$userid;
                        $data2['to_uid']=$uid;
                        $data2['readed']="0";
                        $data2['notdate']=$mytime->toDateTimeString();
                                $data2['body']="تم التقديم على العمل من قبل ";
                               // notifications::where('pid',$pid)->where('to_uid',$uid)->delete();
                                $notification= notifications::create($data2);
              
                        return redirect(route('home'))->with("success","تم طلب العمل بنجاح.");
                            }
                return view('home');
        
                } 
    public function add_post_commentPost(Request $request,$id) {
                    if(Auth::check()){
                        $userid = Auth::user()->id;
                        $data['pid']=$id;
                        $data['uid']=$userid;
                        $data['comment']=$request->comment;
                        $mytime = Carbon::now();
                        $data['commentdate']=$mytime->toDateTimeString();
                        $post_comment= post_comments::create($data);
                        if (!$post_comment){
                            
                             return redirect(route('home'))->with("success","لم يتم الاضافة.");
                            }                     
                  
                            return redirect(route('home'))->with("success","تم اضافة التعليق بنجاح.");
                                }
                    return view('home');
            
                    } 
    public function add_post_likePost(Request $request,$id) {
                        if(Auth::check()){
                            $userid = Auth::user()->id;
                            $data['pid']=$id;
                            $data['uid']=$userid;
                            $post_likes= post_like::create($data);
                            if (!$post_likes){
                                
                                 return redirect(route('home'))->with("success","لم يتم الاضافة.");
                                }                     
                      
                                return redirect(route('home'))->with("success","تم الاعجاب بنجاح.");
                                    }
                        return view('home');
                
                        } 
   public function delete_post_likePost(Request $request,$id) {
                            if(Auth::check()){
                                $post_likes= DB::table('post_like')->where('id', $id)->delete();
                                if (!$post_likes){
                                    
                                     return redirect(route('home'))->with("success","لم يتم الاضافة.");
                                    }                     
                          
                                    return redirect(route('home'))->with("success","تم الغاء الاعجاب بنجاح.");
                                        }
                            return view('home');
                    
                            } 

    public function deactive_postPost(Request $request,$id) {
                                if(Auth::check()){
                                    $post_likes= postss::where('id',$id)->update(['active'=>0]);
                                    if (!$post_likes){
                                         return redirect(route('home'))->with("success","لم يتم الاضافة.");
                                        }                     
                              
                                        return redirect(route('home'))->with("success","تم ارشفة المنشور بنجاح.");
                                            }
                                return view('home');
                        
    } 
    function jobsRequests(){
        if(Auth::check()){
            $id = Auth::user()->id;
            $data= User::where('id',$id)->get();
            $data2= post_jobs_requests::where('companyuid',$id)->get();
            $user_detales= User::find($id)->users_detalis;
            $notifications= notifications::where('to_uid',$id)->get();

            return view('jobsRequests',['Users'=>$data,
            'post_jobs_requests'=>$data2,
            'user_detales'=>$user_detales,
            'notifications'=>$notifications,
            ]);
           
            
                
            }
            return view('login');
        

        }


function jobsRequestsPost(Request $request,$id,$par,$uid,$pid){
    try {
  
        post_jobs_requests::where('id',$id)->update(['accepted'=>$par]);
        $userid = Auth::user()->id;
        $data['pid']=$pid;
        $data['from_uid']=$userid;
        $data['to_uid']=$uid;
        $data['readed']="0";
        $mytime = Carbon::now();
        $data['notdate']=$mytime->toDateTimeString();
            if($par==1){
                $data['body']="تم قبولك للعمل في";
                notifications::where('pid',$pid)->where('to_uid',$uid)->delete();
                $notification= notifications::create($data);
            }
            elseif($par==2){
                $data['body']="تم رفضك في العمل لدى";
                notifications::where('pid',$pid)->where('to_uid',$uid)->delete();
                $notification= notifications::create($data);
            }
            
      return redirect(route('jobsRequests'))->with("success","تم تحديث الطلبات بنجاح.");

    } catch (Throwable $e) {
        
        return redirect(route('jobsRequests'))->with("success",report($e));
 
    }
} 


function profiles($uid){
    if(Auth::check()){
        $id =$uid;
        $data= User::where('id',$id)->get();
        $data2= users_detalis::where('uid',$id)->get();
        $data3= users_address::where('uid',$id)->get();
        $data4= users_studes::where('uid',$id)->get();
        $data5= users_contacts::where('uid',$id)->get();
        $data6= users_skills::where('uid',$id)->get();
        $data7= users_cirtificates::where('uid',$id)->get();
        $data8= users_langs::where('uid',$id)->get();
        $data9= users_jobs::where('uid',$id)->get();
        $notifications= notifications::where('to_uid',$id)->get();
        $user_detales= User::find($id)->users_detalis;

        return view('profiles',['Users'=>$data,
        'users_detalis'=>$data2,
        'users_address'=>$data3,
        'users_studes'=>$data4,
        'users_contacts'=>$data5,
        'users_skills'=>$data6,
        'users_cirtificates'=>$data7,
        'users_langs'=>$data8,
        'users_jobs'=>$data9,
        'user_detales'=>$user_detales,
        'notifications'=>$notifications,
        ]);
       
        
            
        }
        return view('login');
    

    }
function postview($pid){
        if(Auth::check()){
;
            $id = Auth::user()->id;
            $data= User::where('id',$id)->get();
            $data10= specialties::all();
            $user_detales= User::find($id)->users_detalis;
            $post_jobs_request= User::find($id)->post_jobs_requests;
            $post_likes= post_like::where('uid',$id)->get();
            $post_comment= post_comments::all();
            $notifications= notifications::where('to_uid',$id)->get();

            //$data0= postss::all()->sortByDesc('id');
            
            
           // $data0= postss::where('id',$id)->get();  لعرض المنشورات المتخصصة فقط
            $data1= post_photo::all();
            $data2= post_special::all();
           // $userposts= postss::find($pid);
            $userposts= postss::where('id',$pid)->get()->sortByDesc('id');
                return  view('postview',[
                'specialties'=>$data10,
                'post_photo'=>$data1,
                'post_special'=>$data2,
                'userposts'=>$userposts,
                'user_detales'=>$user_detales,
                'post_jobs_requests'=>$post_jobs_request,
                'post_comments'=>$post_comment,
                'post_like'=>$post_likes,
                'notifications'=>$notifications,
                ]);
           
            
                
            }
            return view('login');
        
    
        }

    }
