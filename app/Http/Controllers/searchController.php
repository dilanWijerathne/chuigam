<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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

class searchController extends Controller
{

	public function searchHelpers(Request $search_data){

		if($search_data->district_id == '0' && $search_data->city_id == '0'){
			$search_data = DB::table('users')
	            ->join('jobs', function($join) use($search_data){
	            	$join->on('users.job_id', '=', 'jobs.id');
	            	$join->where('jobs.job', 'like', $search_data->job.'%');
	            	})
	            ->get();		
		}

		elseif($search_data->district_id != '0' && $search_data->city_id == '0'){
			$search_data = DB::table('users')
	            ->join('jobs', function($join) use($search_data){
	            	$join->on('users.job_id', '=', 'jobs.id');
	            	$join->where('jobs.job', 'like', $search_data->job.'%');
	            	})
	            ->join('districts', function($join) use($search_data){
	            	$join->on('users.district_id', '=', 'districts.id');
	            	$join->where('districts.id','=',$search_data->district_id);
	            	})
	            ->get();
		}

		elseif($search_data->district_id == '0' && $search_data->city_id != '0'){
			$search_data = DB::table('users')
	            ->join('jobs', function($join) use($search_data){
	            	$join->on('users.job_id', '=', 'jobs.id');
	            	$join->where('jobs.job', 'like', $search_data->job.'%');
	            	})
	            ->join('cities', function($join) use($search_data){
	            	$join->on('users.city_id', '=', 'cities.id');
	            	$join->where('cities.id','=',$search_data->city_id);
	            	})
	            ->get();	
		}

		else{

			$search_data = DB::table('users')
	            ->join('jobs', function($join) use($search_data){
	            	$join->on('users.job_id', '=', 'jobs.id');
	            	$join->where('jobs.job', 'like', $search_data->job.'%');
	            	})
	            ->join('districts', function($join) use($search_data){
	            	$join->on('users.district_id', '=', 'districts.id');
	            	$join->where('districts.id','=',$search_data->district_id);
	            	})
	            ->join('cities', function($join) use($search_data){
	            	$join->on('users.city_id', '=', 'cities.id');
	            	$join->where('cities.id','=',$search_data->city_id);
	            	})
	            ->get();

        }    

        return $search_data;  

	}
    
}