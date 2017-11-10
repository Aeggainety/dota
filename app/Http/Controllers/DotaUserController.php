<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Database\Eloquent\Model;
use app\DotaUser;
use Carbon\Carbon;
header("Content-Type:text/html;charset=utf-8");
class DotaUserController extends Controller
{
	
	
	
    /**
	*Display a listing of the resource
    *
    *@return Response
    *
    */

	public function index()
	{	

		$dotauser = new \App\DotaUser();
		
		$dotausers = $dotauser->orderBy('LadderTournament','DESC')->latest()->get();//查询出来的是json数据  中文会显示乱码  循环时$v->字段名		
		
		return view('dota.lists',compact('dotausers'));
	}
	
	

	
	/**
	*
	*Show the form for creating a new resource
	*
	*
	*@return 
	*/
	public function create()
	{
		return view('dota.create');
	}


	public function show()
	{
		echo 'show';exit;
	}

	public function store()
	{
		$DotaUser = new \App\DotaUser();

		$DotaUser->wechat = $_POST['wechat'];
		$DotaUser->DOTAID = $_POST['DOTAID'];
		$DotaUser->DOTAName = $_POST['DOTAName'];
		$DotaUser->LadderTournament = $_POST['LadderTournament'];
		$DotaUser->role = $_POST['role'];
		$DotaUser->classType = $_POST['classType'];
		$DotaUser->classNo = $_POST['classNo'];
		$DotaUser->position = implode($_POST['position'], ',');
		

		// print_r($this->setPublishedAtAttribute(date('Y-m-d',time())));
		
		// exit;
		$DotaUser->save();//save方法自动保存created_at和updated_at
		return redirect('/');
	}

	//时间设置——没用到
	// public function setPublishedAtAttribute($date)
	// {
	// 	return $this->attributes['publish_at'] = Carbon::createFromFormat('Y-m-d',$date);
	// }

	public function matching()
	{
		
		$dotauser = new \App\DotaUser();
		if($_POST){
			$requests = $_POST;		
			$dotausers = $dotauser->where('LadderTournament','>=',$_POST['LadderTournament'])->where(function($query) use($requests) {
				if(isset($_POST['role']) && $_POST['role']){
					$query->where('role','=',$_POST['role']);
				}
			})->where(function($query) use($requests) {
				if(isset($_POST['classType']) && $_POST['classType']){
					$query->where('classType','=',$_POST['classType']);
				}
			})->where(function($query) use($requests) {
				if(isset($_POST['classNo']) && $_POST['classNo']){
					$query->where('classNo','=',$_POST['classNo']);
				}
			})->where(function($query) use($requests) {
				if(isset($_POST['position']) && $_POST['position']){
					$query->where('position','like','%'.implode($_POST['position'], ',').'%');
				}
			})->latest()->get();
			// echo '<pre>';
			// print_r($dotausers);exit;

		}else{

			$dotausers = $dotauser->latest()->get();//查询出来的是json数据  中文会显示乱码  循环时$v->字段名	
		}
			
		
		return view('dota.matching',compact('dotausers'));
	}

	public function editDotaName () 
	{
		if($_POST['DOTAName']){
			$id = $_POST['userid'];
			$DOTAName = $_POST['DOTAName'];
			$DotaUser = new \App\DotaUser();
			$DotaUser->find($id);
			$res = $DotaUser->where("id",$id)->update(["DOTAName"=>"$DOTAName"]);
			// var_dump($res);exit;
			if($res){
				echo json_encode(true);
			}else{
				echo json_encode(false);
			}
			
		}else{
			echo json_encode(false);
		}
	}



}
?>