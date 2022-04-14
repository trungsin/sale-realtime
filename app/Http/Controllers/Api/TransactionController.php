<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\DuAn;
use App\Models\BatDongSan;
use App\Models\PhanKhu;
use App\Models\User;
use Auth;
use Carbon\Carbon;
class TransactionController extends Controller
{
    public function data(Request $request,$id,$status) {

    	$du_an = DuAn::where('id',$id)->first();
    	$phan_khus = PhanKhu::where('id_du_an',$du_an->id)->orderBy('id','DESC')->get();
    	$data = [];
    	foreach ($phan_khus as $key => $phan_khu) {
    		$data_khu = [	
    						"id"=>$phan_khu->id,
    						"ma"=>$phan_khu->ma,
    						"ghi_chu"=>$phan_khu->ghi_chu,
    						"cac_lo"=>[]
    					];
    		$bat_dong_sans = BatDongSan::leftJoin('users','users.id','=','bat_dong_san.id_user_dat_cho')
                                            ->select('bat_dong_san.*','users.name')
                                            ->where('id_khu',$phan_khu->id)->get();
    		// else
    		// 	$bat_dong_sans = BatDongSan::leftJoin('users','users.id','=','bat_dong_san.id_user_dat_cho')
      //                                       ->select('bat_dong_san.*','users.name')
      //                                       ->where('id_khu',$phan_khu->id)->where('tinh_trang','<>','con')->get();
    		foreach ($bat_dong_sans as $key => $bat_dong_san) {
    			array_push($data_khu["cac_lo"],$bat_dong_san);
    		}
    		array_push($data,$data_khu);
    	}
        return response()->json([
                              'success'=> true,
                              'message'=> 'get transactions successfully!',
                              'data'=>$data],200);
    }

    public function getBlock($id) {
    	$bat_dong_san = BatDongSan::where('id',$id)->first();
        $data = json_decode(json_encode($bat_dong_san), true);
        $user = Auth::user();
        $data['dat_coc'] = $user->chuc_vu==1?1:($user->id==$data['id_user_dat_cho']?1:0);
        $data['huy_coc'] = $user->chuc_vu==1?1:($user->id==$data['id_user_coc']?1:0);
        if(!is_null($data['id_user_dat_cho']))
            $data['id_user_dat_cho'] = User::where('id',$data['id_user_dat_cho'])->first()->name;
        if(!is_null($data['id_user_coc']))
            $data['id_user_coc'] = User::where('id',$data['id_user_coc'])->first()->name;
        return response()->json([
                              'success'=> true,
                              'message'=> 'get block successfully!',
                              'data'=> $data
                          ],200); 
    }

    public function datCho(Request $request) {
    	$data = $request->all();
    	$user = Auth::user();
    	$bat_dong_san = BatDongSan::where('id',$data["id"])->first();
    	if($bat_dong_san && $bat_dong_san->tinh_trang == "con"){
    		$bat_dong_san->update([
    								"ho_ten_khach_hang_dat_cho" => $data["ho_ten_khach_hang_dat_cho"],
    								"so_cmnd_khach_hang_dat_cho" => $data["so_cmnd_khach_hang_dat_cho"],
    								"tinh_trang" => "booking",
    								"id_user_dat_cho" => $user->id,
    								"ngay_dat_cho" => Carbon::now()
    							]);
	        return response()->json([
	                              'success'=> true,
	                              'message'=> 'dat cho block successfully!',
	                              'data'=>$bat_dong_san
	                          ],200); 
    	}
    	return response()->json([
	                              'success'=> true,
	                              'message'=> 'dat cho block successfully!',
	                              'data'=>$bat_dong_san
	                          ],200); 
    }

    public function datCoc(Request $request) {
    	$data = $request->all();
    	$user = Auth::user();
        $user_id = $user->id;

    	$bat_dong_san = BatDongSan::where('id',$data["id"])->first();
    	if($bat_dong_san && $bat_dong_san->tinh_trang == "booking"){
    		if ($request->hasFile('anh_cmnd_truoc')
    			&&$request->hasFile('anh_cmnd_sau')
    			&&$request->hasFile('anh_xac_nhan')) {
    			$image_name_cmnd_truoc = time().'_cmnd_truoc.'.$request->anh_cmnd_truoc->getClientOriginalExtension();
    			$image_name_cmnd_sau = time().'_cmnd_sau.'.$request->anh_cmnd_sau->getClientOriginalExtension();
    			$image_name_xac_nhan = time().'_xac_nhan.'.$request->anh_xac_nhan->getClientOriginalExtension();
				$request->anh_cmnd_truoc->move(public_path('uploads'), $image_name_cmnd_truoc);
				$request->anh_cmnd_sau->move(public_path('uploads'), $image_name_cmnd_sau);
				$request->anh_xac_nhan->move(public_path('uploads'), $image_name_xac_nhan);
                 if($user->chuc_vu==1)
                    $user_id = $bat_dong_san->id_user_dat_cho;
	    		$bat_dong_san->update([
	    								"ho_ten_khach_hang_dat_coc" => $data["ho_ten_khach_hang_dat_coc"],
	    								"so_cmnd_khach_hang_dat_coc" => $data["so_cmnd_khach_hang_dat_coc"],
	    								"tinh_trang" => "coc",
	    								"coc" => $data["coc"],
	    								"id_user_coc" => $user->id,
	    								"ghi_chu_dat_coc" => $data["ghi_chu_dat_coc"],
	    								"ngay_coc" => Carbon::now(),
	    								"img_cmnd_truoc" => 'uploads/'.$image_name_cmnd_truoc,
	    								"img_cmnd_sau" => 'uploads/'.$image_name_cmnd_sau,
	    								"img_xac_nhan" => 'uploads/'.$image_name_xac_nhan
	    								]);
		        return response()->json([
		                              'success'=> true,
		                              'message'=> 'dat cho coc successfully!',
		                              'data'=>$bat_dong_san
		                          ],200); 
		    }
		    
    	}
    	return response()->json([
	                              'success'=> true,
	                              'message'=> 'dat coc successfully!',
	                              'data'=>$bat_dong_san
	                          ],200); 
    }

    public function huyCoc(Request $request) {
        $data = $request->all();
        $user = Auth::user();
        $bat_dong_san = BatDongSan::where('id',$data["id"])->first();
        if($bat_dong_san && $bat_dong_san->tinh_trang == "coc"){
            $bat_dong_san->update([
                                    "ho_ten_khach_hang_dat_coc" => null,
                                    "so_cmnd_khach_hang_dat_coc" => null,
                                    "tinh_trang" => "con",
                                    "coc" => 0,
                                    "id_user_coc" => null,
                                    "ghi_chu_dat_coc" => null,
                                    "ngay_coc" => null,
                                    "img_cmnd_truoc" => null,
                                    "img_cmnd_sau" => null,
                                    "img_xac_nhan" => null,
                                    "ho_ten_khach_hang_dat_cho" => null,
                                    "so_cmnd_khach_hang_dat_cho" => null,
                                    "id_user_dat_cho" => null,
                                    "ngay_dat_cho" => null
                                ]);
            return response()->json([
                                  'success'=> true,
                                  'message'=> 'huy coc successfully!',
                                  'data'=>$bat_dong_san
                              ],200); 
        }
        return response()->json([
                                  'success'=> true,
                                  'message'=> 'huy coc successfully!',
                                  'data'=>$bat_dong_san
                              ],200); 
    }

    public function xacNhanCoc(Request $request) {
        $data = $request->all();
        $user = Auth::user();
        $bat_dong_san = BatDongSan::where('id',$data["id"])->first();
        if($bat_dong_san && $bat_dong_san->tinh_trang == "coc"){
            $bat_dong_san->update(["tinh_trang" => "xac-nhan"]);
            return response()->json([
                                  'success'=> true,
                                  'message'=> 'xac nhan coc successfully!',
                                  'data'=>$bat_dong_san
                              ],200); 
        }
        return response()->json([
                                  'success'=> true,
                                  'message'=> 'xac nhan coc successfully!',
                                  'data'=>$bat_dong_san
                              ],200); 
    }
}
