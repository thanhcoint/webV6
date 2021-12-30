<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Email;
use App\ProfileEmail;
use App\Action;
use App\User;
use App\Classes\ranDom;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
	public function postFirstEmail(Request $request)
	{
		$input = $request->all();
		$user = User::all();
		foreach ($input as $b => $c) {
			$bc = json_decode($b, true);
			$action = trim($bc['action']);
			$profilemail_ = trim($bc['profilemail']);
			$user = trim($bc['user']);
			$password = trim($bc['password']);
		}
		if (Auth::attempt(['email' => $user, 'password' => $password])) {
			if ($action) {
					if ($profilemail_ == "All") {
						$apple = Email::where($action, 'like', 'New')->first();
					} else {
						$profile = ProfileEmail::where('mail_profile', 'like', $profilemail_)->first();
						if ($profile) {
							$profilemail = $profile->id;
						}
						$apple = Email::where([[$action, 'like', 'New'], ['id_pm', 'like', $profilemail]])->first();
					}
					if ($apple) {
							$apple->$action = "Using";
							$apple->save();
							echo $apple->Ten . "|" . $apple->newPass . "|" . $apple->recoveryMail . "|" . $apple->oldPass . "|".$apple->ScretGG."|".$apple->OTPGG."|".$apple->passGen."|".$apple->channel."|";
						
					} else {echo 'Het hang';}
			} else {echo "dữ liệu sai";}
		} else {echo "Sai dang nhap";}
	}
##########################################################################################################
	public function postUpdateEmail(Request $request, $id)
	{
		$input = $request->all();
		foreach ($input as $b => $c) {
			$b = json_decode($b, true);
			$action = $b['action'];
			$mail = trim($b['email'], "\n");
			$update = trim($b['update']);
			$genPass = trim($b['change_pass']);
		}
		if ($update) {
				$apple = Email::where('Ten', 'like', $mail)->first();
				if ($apple) {
					if($action=="watchVideo"){
						$apple->$action = (int)$update;
						if($genPass != "No"){
							$apple->passGen = $genPass;
						}
						$apple->save();
						echo "1";
					}
					else{
						$apple->$action = $update;
						if($genPass != "No"){
							$apple->passGen = $genPass;
						}
						$apple->save();
						echo "1";
					}
					
				} else {
					echo "khong ton tai mail";
				}
		} else {
			echo "du lieu sai";
		}
	}
##########################################################################################################
public function postGetRestoreYtb(Request $request)
{
	$input = $request->all();
		$user = User::all();
		foreach ($input as $b => $c) {
			$bc = json_decode($b, true);
			$user = trim($bc['user']);
			$profilemail_ = trim($bc['profilemail']);
			$password = trim($bc['password']);
		}
		if (Auth::attempt(['email' => $user, 'password' => $password])) {
			$profile = ProfileEmail::where('mail_profile', 'like', $profilemail_)->first();
				if ($profile) {
					$profilemail = $profile->id;
				}
				$apple = Email::where([['RestoreYTB', 'like', 'New'], ['id_pm', 'like', $profilemail]])->max('watchVideo');
				if ($apple) {
						$apple2 = Email::where([['RestoreYTB', 'like', 'New'], ['id_pm', 'like', $profilemail],['watchVideo','like',$apple]])->first();
						$apple2->RestoreYTB = "Using";
						$apple2->save();
						echo $apple2->Ten . "|" . $apple2->newPass . "|" . $apple2->recoveryMail . "|" . $apple2->oldPass . "|".$apple2->ScretGG."|".$apple2->OTPGG."|" . $apple2->passGen . "|". $apple2->watchVideo . "|". $apple2->channel . "|";
					} else {echo 'Het hang';}
		} else {echo "Sai dang nhap";}
}
##########################################################################################################
public function gettest()
{
	$profilemail_="may4";
	$profile = ProfileEmail::where('mail_profile', 'like', $profilemail_)->first();
			if ($profile) {
				$profilemail = $profile->id;
			}
			
	$apple = Email::where([['RestoreYTB', 'like', 'New'], ['id_pm', 'like', $profilemail]])->max('watchVideo');
	if ($apple) {
			$apple2 = Email::where([['RestoreYTB', 'like', 'New'], ['id_pm', 'like', $profilemail],['watchVideo','like',$apple]])->first();
			$apple2->RestoreYTB = "Using";
			$apple2->save();
			echo $apple2->Ten . "|" . $apple2->watchVideo . "|";
		} else {echo 'Het hang';}
}
##########################################################################################################
public function postScret(Request $request)
	{
		$input = $request->all();
		foreach ($input as $b => $c) {
			$b = json_decode($b, true);
			$mail = trim($b['email'], "\n");
			$Scret = trim($b['Scret']);
		}
		if ($mail) {
				$apple = Email::where('Ten', 'like', $mail)->first();
				if ($apple) {
					$apple->ScretGG = $Scret;
					$apple->save();
					echo "1";
				} else {
					echo "khong ton tai mail";
				}
			} else {
			echo "du lieu sai";
		}
	}
##########################################################################################################
public function postOTP(Request $request)
	{
		$input = $request->all();
		foreach ($input as $b => $c) {
			$b = json_decode($b, true);
			$mail = trim($b['email'], "\n");
			$OTPGG = trim($b['OTPGG']);
		}
		if ($mail) {
				$apple = Email::where('Ten', 'like', $mail)->first();
				if ($apple) {
					$apple->OTPGG = $OTPGG;
					$apple->save();
					echo "1";
				} else {
					echo "khong ton tai mail";
				}
			} else {
			echo "du lieu sai";
		}
	}
##########################################################################################################	
	public function getProfile()
	{
		$pro_file = Action::select('id', 'action')->get();
		$abc = [];
		foreach ($pro_file as $value) {
			$abc[] = $value->action;
		}
		return response()->json($abc);
	}
##########################################################################################################	
	public function getAction($id)
	{
		$profile = ProfileEmail::where('mail_profile', 'like',$id)->get();
		$abc = [];
		foreach ($profile as $value) {
			$abc[] = $value;
		}
		return response()->json($abc);
	}
##########################################################################################################	
	public function getTestEmail($id)
	{
		$apple = Email::where("changePass", 'like', 'New')->first();
		if ($apple->passGen) {
			echo $apple->passGen;
		} else {
			echo "abc";
		}
	}
##########################################################################################################	
	public function postgetMail(Request $request)
	{
		$input = $request->all();
		$user = User::all();
		foreach ($input as $b => $c) {
			$bc = json_decode($b, true);
			$slm = trim($bc['slm']);
			$user = trim($bc['user']);
			$password = trim($bc['password']);
		}
		if (Auth::attempt(['email' => $user, 'password' => $password])) {
			$apple1 = Email::where('status', 'like', 'New')->first();
			if ($apple1) {
				$apple = Email::where('status', 'like', 'New')->get()->random(1);
				if ($apple) {
					$abc = [];
					foreach ($apple as $value) {
						$abc[] = $value->Ten;
						$Tengoidc = $value->Ten;
					}
					$id2 = Email::where('Ten', 'like', $Tengoidc)->first();
					$id2->status = "Used";
					$id2->save();
					return response()->json($abc);
				}
			} else {
				Email::where('status', 'like', 'Used')->update(['status' => 'New']);
				$apple = Email::where('status', 'like', 'New')->get()->random(1);
				if ($apple) {
					$abc = [];
					foreach ($apple as $value) {
						$abc[] = $value->Ten;
						$Tengoidc = $value->Ten;
					}
					$id2 = Email::where('Ten', 'like', $Tengoidc)->first();
					$id2->status = "Used";
					$id2->save();
					return response()->json($abc);
				}
			}
		} else {
			echo "Sai dang nhap";
		}
		//echo $profilemail;

	}
##########################################################################################################	
	public function testUser(Request $request)
	{
		$input = $request->all();
		$user = User::all();
		foreach ($input as $b => $c) {
			$bc = json_decode($b, true);
			$user = trim($bc['user']);
			$password = trim($bc['password']);
		}
		if (Auth::attempt(['email' => $user, 'password' => $password])) {
			echo "ok";
		} else {
			echo "fail";
		}
		//echo $profilemail;

	}
##########################################################################################################	
	public function postGetMailVer(Request $request)
	{

		$input = $request->all();
		$user = User::all();
		foreach ($input as $b => $c) {
			$bc = json_decode($b, true);
			$action = trim($bc['action']);
			$profilemail_ = trim($bc['profilemail']);
			$trangThai = trim($bc['trangThai']);
			$user = trim($bc['user']);
			$password = trim($bc['password']);
		}
		if (Auth::attempt(['email' => $user, 'password' => $password])) {
			if ($action) {
				if ($action == "sendIos" || $action == "deleteIos" || $action == "changePass" || $action == "watchVideo" || $action == "download_app" || $action == "download_book" || $action == "send_mail" || $action == "add_paymment" || $action == "sendGmailApp" || $action == "send_mail_ipad") {
					if ($profilemail_ == "All") {
						$apple = Email::where($action, 'like', $trangThai)->first();
					} else {
						$profile = ProfileEmail::where('mail_profile', 'like', $profilemail_)->first();
						if ($profile) {
							$profilemail = $profile->id;
						}
						$apple = Email::where([[$action, 'like', $trangThai], ['id_pm', 'like', $profilemail]])->first();
					}

					if ($apple) {
						$apple->$action = "Using_Ver";
						$apple->save();
						echo $apple->Ten . "|" . $apple->newPass . "|" . $apple->recoveryMail . "|" . $apple->oldPass . "|".$apple->ScretGG."|".$apple->OTPGG."|";
					} else {
						echo 'Het hang';
					}
				} else {
					echo "dữ liệu sai";
				}
			} else {
				echo "dữ liệu sai";
			}
		} else {
			echo "Sai dang nhap";
		}
	}
##########################################################################################################

}
