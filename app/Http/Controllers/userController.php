<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use DB;
use App\user;
use App\userModel;
use App\feedbackModel;
use App\userSkills;
use View;
use Redirect;
use Carbon\carbon;
use Image;
use Illuminate\Support\Facades\Input;
use Session;

class userController extends Controller
{
    public function login(Request $req){

        $uname = $req->input('uname');
        $pass = $req->input('pass');

        $users= DB::table('users')->where('username',$uname)->where('password',$pass)->first();

        if($users){

            $username = $users->username;
            $data['user_result'] = userModel::where('first_name', $username)->get();

            $user_id = $users->id;
            $user_data = userModel::where('id', $user_id)->take(1)->get();
            session(['uname' => $username, 'id' => $user_id]);

            $user_id = session()->get('id');



            $user_data = userModel::where('id', $user_id)->take(1)->get();

            $feedback_data = feedbackModel::where('getter_id', $user_id)->get();

            $feedback_data = DB::table('feedbacks')
                    ->join('users', 'feedbacks.giver_id', '=', 'users.id')
                    ->where('getter_id',$user_id)
                    ->orderBy('feedback_id','desc')
                    ->get();

    //        return view('profile',compact('user_data','feedback_data'));
              return redirect($username)->with('feedback_data',$feedback_data)->with('user_data',$user_data);


            // return $this->viewProfile($uname);


        }else{
            echo'wrong';
        }
    }

    public function signup(Request $req){

        $fname = $req->input('fname');
        $lname = $req->input('lname');
        $uname = $req->input('uname');
        $email = $req->input('email');
        $pass = $req->input('pass');
        $type = $req->input('contact_no');
        $occupation = $req->input('occupation');
        $district = $req->input('selected_district');
        $city = $req->input('selected_city');

        $data = array('first_name'=>$fname,'last_name'=>$lname,'username'=>$uname,'email'=>$email,'password'=>$pass,'type'=>$type,'occupation'=>$occupation,'district_id'=>$district, 'city_id'=>$city); 

        DB::table('users')->insert($data);

        return redirect('login');

    }

    public function loginPage(){
        $districts= DB::table('districts')->get();
        return view('home')->with('districts_data',$districts);
    }

    public function viewProfile($uname){

        $user_data = userModel::where('user_name', $uname)->take(1)->get();
        $feedback_data = feedbackModel::where('getter_id', $user_data[0]->id)->get();
        $skills_data = userSkills::where('username', $uname)->take(1)->get();
        $suggestions_data = userModel::where('username', '!=' ,$username)->take(4)->get();

        $feedback_data = DB::table('feedbacks')
                ->join('users', 'feedbacks.giver_id', '=', 'users.id')
                ->where('getter_id',$user_data[0]->id)
                ->orderBy('feedback_id','desc')
                ->get();
                $help_request_data =  DB::table('help_requests')->where('helper_id',  session()->get('id'))->get();

                return redirect($uname)->with('user_data',$user_data)->with('feedback_data',$feedback_data)->with('skills_data',$skills_data)->with('request_data',$help_request_data)->with('suggestions_data',$suggestions_data);

    }


    public function viewProfileThroughUrl($username){

        $user_data = userModel::where('username', $username)->take(1)->get();
        $feedback_data = feedbackModel::where('getter_id', $user_data[0]->id)->get();
        $skills_data = userSkills::where('username', $username)->take(1)->get();
        $suggestions_data = userModel::where('username', '!=' ,$username)->take(4)->get();
        $notification_data = DB::table('help_requests')->where('helper_id',Session::get('uname'))->get();

        $feedback_data = DB::table('feedbacks')
                ->join('users', 'feedbacks.giver_id', '=', 'users.id')
                ->where('getter_id',$user_data[0]->id)
                ->orderBy('feedback_id','desc')
                ->get();

        // $help_request_data =  DB::table('help_requests')->where('helper_id', session()->get('id'))->get();

        $help_request_data = DB::table('help_requests')
                ->join('users', 'help_requests.seeker_id', '=', 'users.id')
                ->where('helper_id', session()->get('id'))
                ->where('status','requested')
                ->orderBy('help_id','desc')
                ->get();

        $help_request_pending_data = DB::table('help_requests')
                ->join('users', 'help_requests.seeker_id', '=', 'users.id')
                ->where('helper_id',session()->get('id'))
                ->where('status','accepted')
                ->orderBy('help_id','desc')
                ->get();
                

//        return view('profile',compact('user_data','feedback_data'));

        // if($username == session()->get('uname')){
        //     return view('profile')->with('user_data',$user_data)->with('feedback_data',$feedback_data)->with('skills_data',$skills_data)->with('request_data',$help_request_data)->with('request_pending_data',$help_request_pending_data)->with('suggestions_data',$suggestions_data)->with('notification_data',$notification_data);
        // }
        // else{
        //     return view('profile_others')->with('user_data',$user_data)->with('feedback_data',$feedback_data)->with('skills_data',$skills_data)->with('request_data',$help_request_data)->with('suggestions_data',$suggestions_data)->with('notification_data',$notification_data);
        // }

                return view('profile')->with('user_data',$user_data)->with('feedback_data',$feedback_data)->with('skills_data',$skills_data)->with('request_data',$help_request_data)->with('request_pending_data',$help_request_pending_data)->with('suggestions_data',$suggestions_data)->with('notification_data',$notification_data);



    }


    public function viewPage($page){
            $username = session()->get('uname');
            $user_data = userModel::where('username', $username)->take(1)->get();
            $feedback_data = feedbackModel::where('getter_id', $user_data[0]->id)->get();
            $skills_data = userSkills::where('username', $username)->take(1)->get();
            $suggestions_data = userModel::where('username', '!=' ,$username)->take(4)->get();
            $notification_data = DB::table('help_requests')->where('helper_id',Session::get('uname'))->get();

            $feedback_data = DB::table('feedbacks')
                    ->join('users', 'feedbacks.giver_id', '=', 'users.id')
                    ->where('getter_id',$user_data[0]->id)
                    ->orderBy('feedback_id','desc')
                    ->get();

            // $help_request_data =  DB::table('help_requests')->where('helper_id', session()->get('id'))->get();

            $help_request_data = DB::table('help_requests')
                    ->join('users', 'help_requests.seeker_id', '=', 'users.id')
                    ->where('helper_id',session()->get('id'))
                    ->where('status','requested')
                    ->orderBy('help_id','desc')
                    ->get();

            $help_request_pending_data = DB::table('help_requests')
                    ->join('users', 'help_requests.seeker_id', '=', 'users.id')
                    ->where('helper_id',session()->get('id'))
                    ->where('status','accepted')
                    ->orderBy('help_id','desc')
                    ->get(); 

            $districts= DB::table('districts')->get();

            $helpers_data = DB::table('users')
                            ->join('jobs', function($join) {
                              $join->on('users.job_id', '=', 'jobs.id');
                              })
                            ->join('districts', function($join) {
                              $join->on('users.district_id', '=', 'districts.id');
                              })
                            ->join('cities', function($join) {
                              $join->on('users.city_id', '=', 'cities.id');
                              })
                            ->get();              

    //        return view('profile',compact('user_data','feedback_data'));

            if($page == 'search'){
                return view($page)->with('user_data',$user_data)->with('feedback_data',$feedback_data)->with('skills_data',$skills_data)->with('request_data',$help_request_data)->with('request_pending_data',$help_request_pending_data)->with('suggestions_data',$suggestions_data)->with('notification_data',$notification_data)->with('districts_data',$districts)->with('helpers_data',$helpers_data);
            }
    }


    public function updateProfile(Request $update){

        if($update->ajax()){

          $u_id = session()->get('id');
          $fname = $update->first_name;
          $lname = $update->last_name;
          $uname = $update->user_name;
          $email = $update->email;
          $pass = $update->password;
          $type = $update->type;
          $occupation = $update->occupation;
          $location = $update->location;
          $working_hours = $update->working_hours;
          $working_location = $update->working_location;
          $mobile_no = $update->mobile_no;
          $about = $update->about;

          $data = array('first_name'=>$fname,'last_name'=>$lname,'username'=>$uname,'email'=>$email,'password'=>$pass,'type'=>$type,'occupation'=>$occupation,'location'=>$location,'working_location'=>$working_location,'working_hours'=>$working_hours,'working_location'=>$working_location,'about'=>$about,'mobile_no'=>$mobile_no);

          DB::table('users')->where('id',$u_id)->update($data);

          return response($data);
          //return $this->viewProfile($u_id);

        }

    }



    public function feedback(Request $feed){

        if($feed->ajax()){
          //Carbon::setToStringFormat('jS \o\f F, Y g:i:s a');
          $dt = Carbon::now();
          $date = $dt->toDayDateTimeString();  ;

          $feedback_giver_id = session()->get('id');
          // $feedback_giver_uname = session()->get('uname');
          // $feedback_getter_id = $feed->input('id');
          // $feedback_getter_uname = $feed->input('uname');
          // $feedback_value = $feed->input('feedback');
          $feedback_getter_id = $feed->getter_id;
          $feedback_getter_uname = $feed->getter_uname;
          $feedback_value = $feed->feedback;

          $feedback_data = array('giver_id'=>$feedback_giver_id,'getter_id'=>$feedback_getter_id,'feedback'=>$feedback_value,'date'=>$date);

          DB::table('feedbacks')->insert($feedback_data);

          $feedback_data_complete = DB::table('feedbacks')
                  ->join('users', 'feedbacks.giver_id', '=', 'users.id')
                  ->where('getter_id',$feedback_getter_id)
                  ->orderBy('feedback_id','desc')
                  ->first();

          //return $this->viewProfile($feedback_getter_id);
          return response()->json($feedback_data_complete);


        }

    }

    public function updateSkills(Request $skills){

          if($skills->ajax()){

            // $skill = $skills->data;

              $data = array('id'=>session()->get('id'),'username'=>session()->get('uname'),'skills'=>$skills->data);

              $check_row = DB::table('skills')->where('id', session()->get('id'))->first();

              if($check_row){
                    DB::table('skills')->where('id', session()->get('id'))->update($data);
              }
              else{
                    DB::table('skills')->insert($data);
              }


              return response($data);

          }

    }

    public function ajax($data){

        return view('ajax');

    }

    public function profileImageUpload(Request $request_image){


              $uname = session()->get('uname');
              if($request_image->data->has('profile_image')){
                  //upload an image to the /img/tmp directory and return the filepath.
                  $file = $request_image->data;
                  $tmpFilePath = '/img/tmp/';
                  $tmpFileName = time() . '-' . $request_image->file('profile_image')->getClientOriginalName();
                  $file = $file->move(public_path() . $tmpFilePath, $tmpFileName);
                  $path = $tmpFilePath . $tmpFileName;
                  return response()->json(array('path'=> $path), 200);
                  DB::table('users')->where('username',$uname)->update(['profile_image' => $tmpFileName]);
                }


    }

    public function searchUsers(Request $search){


              $uname = session()->get('uname');

              if($search->search_data == ""){
                $fetch_users = "error";
              }
              else{
                $fetch_users = DB::table('users')->where('first_name', 'like', $search->search_data.'%')->orWhere('last_name', 'like', $search->search_data.'%')->orWhere('occupation', 'like', $search->search_data.'%')->get();
                if(count($fetch_users)<1){
                  $fetch_users = "error";
                }
              }
              // if($search->occupation == ""){
              //     if($search->working_location == ""){
              //         if($search->working_hours == ""){
              //             $fetch_users = DB::table('users')->get();
              //         }
              //         else{
              //             $fetch_users = DB::table('users')->where('working_hours', 'like', $search->working_hours.'%')->get();
              //         }
              //     }
              //     else{
              //         if($search->working_hours == ""){
              //             $fetch_users = DB::table('users')->where('working_location', 'like', $search->working_location.'%')->get();
              //         }
              //         else{
              //             $fetch_users = DB::table('users')->where('working_location', 'like', $search->working_location.'%')->where('working_hours', 'like', $search->working_hours.'%')->get();
              //         }
              //     }
              // }else{
              //   if($search->working_location == ""){
              //       if($search->working_hours == ""){
              //           $fetch_users = DB::table('users')->where('occupation', 'like', $search->occupation.'%')->get();
              //       }
              //       else{
              //           $fetch_users = DB::table('users')->where('occupation', 'like', $search->occupation.'%')->where('working_hours', 'like', $search->working_hours.'%')->get();
              //       }
              //     }
              //   else{
              //       if($search->working_hours == ""){
              //           $fetch_users = DB::table('users')->where('occupation', 'like', $search->occupation.'%')->where('working_location', 'like', $search->working_location.'%')->get();
              //       }
              //       else{
              //           $fetch_users = DB::table('users')->where('occupation', 'like', $search->occupation.'%')->where('working_location', 'like', $search->working_location.'%')->where('working_hours', 'like', $search->working_hours.'%')->get();
              //       }
              //   }
              //
              // }
              //
              //
              //
              if($fetch_users == "error"){

                $array_data[] = array('error'=>'true');
                return response($array_data);

              }

              else{

                // foreach($fetch_users as $a){
                //   $array_data[] =  array('id'=>$a->id,'username'=>$a->username,'first_name'=>$a->first_name,'last_name'=>$a->last_name, 'occupation'=>$a->occupation, 'working_location'=>$a->working_location, 'error'=>'false');
                //   return response($array_data);
                // }
                return response($fetch_users);

              }

    }

    


    public function helpRequest(Request $help_request){

        if($help_request->ajax()){

          $seeker_id = session()->get('id');
          $helper_id = $help_request->helper_id;
          $help = $help_request->help;

          $data = array('seeker_id'=>$seeker_id,'helper_id'=>$helper_id,'help'=>$help);

          DB::table('help_requests')->insert($data);

          return response($data);
          //return $this->viewProfile($u_id);

        }

    }

    public function loadNotification(Request $notification){



          $user_id = session()->get('id');

          $notification_data = DB::table('help_requests')->where('helper_id',$user_id)->get();

          $notification_data = DB::table('help_requests')
                  ->join('users', 'help_requests.seeker_id', '=', 'users.id')
                  ->where('helper_id',$user_id)
                  ->orderBy('help_id','desc')
                  ->get();



          if($notification_data){
              return response($notification_data);
          }

          //return $this->viewProfile($u_id);



    }



    public function getRequestData(Request $help_id){

      $help_request_data = DB::table('help_requests')
                ->join('users', 'help_requests.seeker_id', '=', 'users.id')
                ->where('help_id',$help_id->help_id)
                ->where('status','requested')
                ->orderBy('help_id','desc')
                ->get();

                return response($help_request_data);    

      }


      public function updateRequestStatus(Request $update){

          DB::table('help_requests')
                              ->where('help_id',$update->help_id)
                              ->update(['status' => $update->status]); 

          // if($update_request){
              return response($update->status);                       
          // }
          

      }

      public function searchAutocomplete(Request $search){

          if($search->term == ""){
                $fetch_jobs = "error";
              }
              else{
                $fetch_jobs = DB::table('jobs')->where('job', 'like', $search->term.'%')->get();
                // if(count($fetch_jobs)<1){
                //   $fetch_jobs = "error";
                // }
              }      

              foreach($fetch_jobs as $fetch){
                $results[] = ['id'=>$fetch->id , 'value' => $fetch->job ];
              }
                            
              return $results;  
      }


      public function getCities(Request $district_id){

          $get_cities = DB::table('cities')->where('district_id', $district_id->district_id)->get();
          return $get_cities;
      }





}
