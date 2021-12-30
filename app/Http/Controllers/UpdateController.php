<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Email;
use App\Status;
use App\ProfileEmail;
use App\Action;

class UpdateController extends Controller
{
    //-----------------------------------------------------------------------------------------------//
    public function getUpdate()
    {
        $pro_file = ProfileEmail::all();
        $status = Status::all();
        $action = Action::all();
        $id_mail_profile = ProfileEmail::where('id', 'All')->get();
        return view('admin/theloai/update', ['status' => $status, 'pro_file' => $pro_file, 'id_mail_profile' => $id_mail_profile, 'action' => $action]);
    }
    //---------------------------------------------------------------------------------------------//

    //-------------------------------------------------------------------------------------//
    public function updateAction(Request $request)
    {
        if ($request->id_so) {
            $pro_file = ProfileEmail::all();
            $status = Status::all();
            $id_mail_profile = ProfileEmail::where('id', 'All')->get();
            //$action_update=$request->action;
            Action::where('id', $request->id_so)->update(['action' => trim($request->action)]);
            $action = Action::all();
        }
        if ($request->deleteIos && $request->sendIos) {
            $status = Status::all();
            $pro_file = ProfileEmail::all();
            $action = Action::all();
            $mail_profile = $request->mail_profile;
            $id_mail_profile = ProfileEmail::where('id', $mail_profile)->get();
            $deleteIos = $request->deleteIos;
            $sendIos = $request->sendIos;

            if ($deleteIos != 'No') {
                if ($mail_profile == "All") {
                    if ($deleteIos == 'All') {
                        Email::query()->update(['deleteIos' => 'New']);
                    } elseif ($deleteIos == 'Mail lỗi') {
                        Email::where('deleteIos', 'like', '%Mail%')->update(['deleteIos' => 'New']);
                    } else {
                        Email::where('deleteIos', 'like', $deleteIos)->update(['deleteIos' => 'New']);
                    }
                } else {
                    if ($deleteIos == 'All') {
                        Email::where('id_pm', 'like', $mail_profile)->update(['deleteIos' => 'New']);
                    } elseif ($deleteIos == 'Mail lỗi') {
                        Email::where([['deleteIos', 'like', '%Mail%'], ['id_pm', 'like', $mail_profile]])->update(['deleteIos' => 'New']);
                    } else {
                        Email::where([['deleteIos', 'like', $deleteIos], ['id_pm', 'like', $mail_profile]])->update(['deleteIos' => 'New']);
                    }
                }
            }
            /////////////////////////////////////////////////////

            if ($sendIos != 'No') {
                if ($mail_profile == "All") {
                    if ($sendIos == 'All') {
                        Email::query()->update(['sendIos' => 'New']);
                    } elseif ($sendIos == 'Mail lỗi') {
                        Email::where('sendIos', 'like', '%Mail%')->update(['sendIos' => 'New']);
                    } else {
                        Email::where('sendIos', 'like', $sendIos)->update(['sendIos' => 'New']);
                    }
                } else {
                    if ($sendIos == 'All') {
                        Email::where('id_pm', 'like', $mail_profile)->update(['sendIos' => 'New']);
                    } elseif ($sendIos == 'Mail lỗi') {
                        Email::where([['sendIos', 'like', '%Mail%'], ['id_pm', 'like', $mail_profile]])->update(['sendIos' => 'New']);
                    } else {
                        Email::where([['sendIos', 'like', $sendIos], ['id_pm', 'like', $mail_profile]])->update(['sendIos' => 'New']);
                    }
                }
            }
        }
        if ($request->changePass && $request->RestoreYTB) {
            $status = Status::all();
            $pro_file = ProfileEmail::all();
            $action = Action::all();
            $mail_profile = $request->mail_profile;
            $id_mail_profile = ProfileEmail::where('id', $mail_profile)->get();
            $changePass = $request->changePass;
            $RestoreYTB = $request->RestoreYTB;
            if ($changePass != 'No') {
                if ($mail_profile == "All") {
                    if ($changePass == 'All') {
                        Email::query()->update(['changePass' => 'New']);
                    } elseif ($changePass == 'Mail lỗi') {
                        Email::where('changePass', 'like', '%Mail%')->update(['changePass' => 'New']);
                    } else {
                        Email::where('changePass', 'like', $changePass)->update(['changePass' => 'New']);
                    }
                } else {

                    if ($changePass == 'All') {
                        Email::where('id_pm', 'like', $mail_profile)->update(['changePass' => 'New']);
                    } elseif ($changePass == 'Mail lỗi') {
                        Email::where([['changePass', 'like', '%Mail%'], ['id_pm', 'like', $mail_profile]])->update(['changePass' => 'New']);
                    } else {
                        Email::where([['changePass', 'like', $changePass], ['id_pm', 'like', $mail_profile]])->update(['changePass' => 'New']);
                    }
                }
            }

            /////////////////////////////////////////////////////
            if ($RestoreYTB != 'No') {
                if ($mail_profile == "All") {
                    if ($RestoreYTB == 'All') {
                        Email::query()->update(['RestoreYTB' => 'New']);
                    } elseif ($RestoreYTB == 'Mail lỗi') {
                        Email::where('RestoreYTB', 'like', '%Mail%')->update(['RestoreYTB' => 'New']);
                    } else {
                        Email::where('RestoreYTB', 'like', $RestoreYTB)->update(['RestoreYTB' => 'New']);
                    }
                } else {
                    if ($RestoreYTB == 'All') {
                        Email::where('id_pm', 'like', $mail_profile)->update(['RestoreYTB' => 'New']);
                    } elseif ($RestoreYTB == 'Mail lỗi') {
                        Email::where([['RestoreYTB', 'like', '%Mail%'], ['id_pm', 'like', $mail_profile]])->update(['RestoreYTB' => 'New']);
                    } else {
                        Email::where([['RestoreYTB', 'like', $RestoreYTB], ['id_pm', 'like', $mail_profile]])->update(['RestoreYTB' => 'New']);
                    }
                }
            }
        }
        if ($request->sendGmailApp) {
            $status = Status::all();
            $pro_file = ProfileEmail::all();
            $action = Action::all();
            $mail_profile = $request->mail_profile;
            $id_mail_profile = ProfileEmail::where('id', $mail_profile)->get();
            $sendGmailApp = $request->sendGmailApp;
            if ($mail_profile == "All") {
                if ($sendGmailApp != 'No') {
                    if ($sendGmailApp == 'All') {
                        Email::query()->update(['sendGmailApp' => 'New']);
                    } elseif ($sendGmailApp == 'Mail lỗi') {
                        Email::where('sendGmailApp', 'like', '%Mail%')->update(['sendGmailApp' => 'New']);
                    } else {
                        Email::where('sendGmailApp', 'like', $sendGmailApp)->update(['sendGmailApp' => 'New']);
                    }
                }
            } else {

                if ($sendGmailApp != 'No') {
                    if ($sendGmailApp == 'All') {
                        Email::where('id_pm', 'like', $mail_profile)->update(['sendGmailApp' => 'New']);
                    } elseif ($sendGmailApp == 'Mail lỗi') {
                        Email::where([['sendGmailApp', 'like', '%Mail%'], ['id_pm', 'like', $mail_profile]])->update(['sendGmailApp' => 'New']);
                    } else {
                        Email::where([['sendGmailApp', 'like', $sendGmailApp], ['id_pm', 'like', $mail_profile]])->update(['sendGmailApp' => 'New']);
                    }
                }
            }
        }
        if ($request->download_book && $request->send_mail) {
            $status = Status::all();
            $pro_file = ProfileEmail::all();
            $action = Action::all();
            $mail_profile = $request->mail_profile;
            $id_mail_profile = ProfileEmail::where('id', $mail_profile)->get();
            $download_book = $request->download_book;
            $send_mail = $request->send_mail;
            if ($download_book != 'No') {
                if ($mail_profile == "All") {
                    if ($download_book == 'All') {
                        Email::query()->update(['download_book' => 'New']);
                    } elseif ($download_book == 'Mail lỗi') {
                        Email::where('download_book', 'like', '%Mail%')->update(['download_book' => 'New']);
                    } else {
                        Email::where('download_book', 'like', $download_book)->update(['download_book' => 'New']);
                    }
                } else {
                    if ($download_book == 'All') {
                        Email::where('id_pm', 'like', $mail_profile)->update(['download_book' => 'New']);
                    } elseif ($download_book == 'Mail lỗi') {
                        Email::where([['download_book', 'like', '%Mail%'], ['id_pm', 'like', $mail_profile]])->update(['download_book' => 'New']);
                    } else {
                        Email::where([['download_book', 'like', $download_book], ['id_pm', 'like', $mail_profile]])->update(['download_book' => 'New']);
                    }
                }
            }

            /////////////////////////////////////////////////////
            if ($send_mail != 'No') {
                if ($mail_profile == "All") {
                    if ($send_mail == 'All') {
                        Email::query()->update(['send_mail' => 'New']);
                    } elseif ($send_mail == 'Mail lỗi') {
                        Email::where('send_mail', 'like', '%Mail%')->update(['send_mail' => 'New']);
                    } else {
                        Email::where('send_mail', 'like', $send_mail)->update(['send_mail' => 'New']);
                    }
                } else {
                    if ($send_mail == 'All') {
                        Email::where('id_pm', 'like', $mail_profile)->update(['send_mail' => 'New']);
                    } elseif ($send_mail == 'Mail lỗi') {
                        Email::where([['send_mail', 'like', '%Mail%'], ['id_pm', 'like', $mail_profile]])->update(['send_mail' => 'New']);
                    } else {
                        Email::where([['send_mail', 'like', $send_mail], ['id_pm', 'like', $mail_profile]])->update(['send_mail' => 'New']);
                    }
                }
            }
        }
        if ($request->send_mail_ipad) {
            $status = Status::all();
            $pro_file = ProfileEmail::all();
            $action = Action::all();
            $mail_profile = $request->mail_profile;
            $id_mail_profile = ProfileEmail::where('id', $mail_profile)->get();
            $send_mail_ipad = $request->send_mail_ipad;
            if ($send_mail_ipad != 'No') {
                if ($mail_profile == "All") {
                    if ($send_mail_ipad == 'All') {
                        Email::query()->update(['send_mail_ipad' => 'New']);
                    } elseif ($send_mail_ipad == 'Mail lỗi') {
                        Email::where('send_mail_ipad', 'like', '%Mail%')->update(['send_mail_ipad' => 'New']);
                    } else {
                        Email::where('send_mail_ipad', 'like', $send_mail_ipad)->update(['send_mail_ipad' => 'New']);
                    }
                } else {
                    if ($send_mail_ipad == 'All') {
                        Email::where('id_pm', 'like', $mail_profile)->update(['send_mail_ipad' => 'New']);
                    } elseif ($send_mail_ipad == 'Mail lỗi') {
                        Email::where([['send_mail_ipad', 'like', '%Mail%'], ['id_pm', 'like', $mail_profile]])->update(['send_mail_ipad' => 'New']);
                    } else {
                        Email::where([['send_mail_ipad', 'like', $send_mail_ipad], ['id_pm', 'like', $mail_profile]])->update(['send_mail_ipad' => 'New']);
                    }
                }
            }
        }
        return view('admin/theloai/update', ['status' => $status, 'pro_file' => $pro_file, 'id_mail_profile' => $id_mail_profile, 'action' => $action]);
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function getcauhinh()
    {
        $pro_file = ProfileEmail::all();
        $status = Status::all();
        $action = Action::all();
        $id_mail_profile = ProfileEmail::where('id', 'All')->get();
        return view('admin/theloai/cauhinh', ['status' => $status, 'pro_file' => $pro_file, 'id_mail_profile' => $id_mail_profile, 'action' => $action]);
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //-----------------------------------------------------------------------------------------------//
    public function getUpdateProfile()
    {
        $pro_file = ProfileEmail::all();
        $status = Status::all();
        $action = Action::all();
        $id_mail_profile = ProfileEmail::where('id', 'All')->get();
        return view('admin/theloai/updateProfile', ['status' => $status, 'pro_file' => $pro_file, 'id_mail_profile' => $id_mail_profile, 'action' => $action]);
    }
    //---------------------------------------------------------------------------------------------//

    //-------------------------------------------------------------------------------------//
    public function updateActionProfile(Request $request)
    {
        $abc=$request->user_ids;
        foreach ($abc as $user_ids => $id) {
             $theloai = ProfileEmail::find($id);
            $theloai->action=$request->action;
            $theloai->somailbackup=$request->somailbackup;
            $theloai->fakeip=$request->fakeip;
            $theloai->Youtube=$request->Youtube;
            $theloai->timeWatchYTB=$request->timeWatchYTB;
            $theloai->CreatChannel=$request->CreatChannel;
            $theloai->GmailApp=$request->GmailApp;
            $theloai->Docs=$request->Docs;
            $theloai->GoogleTrust=$request->GoogleTrust;
            $theloai->ChromeTrust=$request->ChromeTrust;
            $theloai->save();
        }
        return 'sucess';
        /*
        $pro_file = ProfileEmail::all();
        $status = Status::all();
        $action = Action::all();
        $id_mail_profile = ProfileEmail::where('id', 'All')->get();
        if ($request->mail_profile){
            ProfileEmail::where('id', $request->mail_profile)->update(['action' => $request->action]);
        }
        return view('admin/theloai/updateProfile', ['status' => $status, 'pro_file' => $pro_file, 'id_mail_profile' => $id_mail_profile, 'action' => $action]);
        */
    }
    ////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function updateActionVerMail(Request $request)
    {
        if ($request->sendIos) {
            $status = Status::all();
            $pro_file = ProfileEmail::all();
            $action = Action::all();
            $mail_profile = $request->mail_profile;
            $id_mail_profile = ProfileEmail::where('id', $mail_profile)->get();
            $sendIos = $request->sendIos;

            /////////////////////////////////////////////////////

            if ($sendIos != 'No') {
                if ($mail_profile == "All") {
                    if ($sendIos == 'All') {
                        Email::where('sendIos')->update(['sendIos' => 'Mail-ver']);
                    } elseif ($sendIos == 'Mail lỗi') {
                        Email::where('sendIos', 'like', '%Mail%')->update(['sendIos' => 'Mail-ver']);
                    } else {
                        Email::where('sendIos', 'like', $sendIos)->update(['sendIos' => 'Mail-ver']);
                    }
                } else {
                    if ($sendIos == 'All') {
                        Email::where('id_pm', 'like', $mail_profile)->update(['sendIos' => 'Mail-ver']);
                    } elseif ($sendIos == 'Mail lỗi') {
                        Email::where([['sendIos', 'like', '%Mail%'], ['id_pm', 'like', $mail_profile]])->update(['sendIos' => 'Mail-ver']);
                    } else {
                        Email::where([['sendIos', 'like', $sendIos], ['id_pm', 'like', $mail_profile]])->update(['sendIos' => 'Mail-ver']);
                    }
                }
            }
        }
        return view('admin/theloai/update', ['status' => $status, 'pro_file' => $pro_file, 'id_mail_profile' => $id_mail_profile, 'action' => $action]);
    }
}