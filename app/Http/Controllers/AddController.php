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
class AddController extends Controller
{
    //-----------------------------------------------------------------------------------------------//
     public function getThem()
    {
        $trung= [];
        $pro_file=ProfileEmail::all();
    	return view('admin.theloai.them',['trung'=>$trung,'pro_file'=>$pro_file]);
    }
    //-----------------------------------------------------------------------------------------------//
    public function postThem( Request $request ) {
    $pro_file=ProfileEmail::all();
    $content =trim($request->Ten);
    $content = explode( "\n", $content );
    $content = array_filter( $content, 'trim' ); // remove any extra \r characters left behind
    $trung= [];
    foreach ( $content as $line )
        {
            $line=trim($line);
            $mailFull=explode( "|", $line );
            $serch=Email::where('Ten','like',$mailFull[0])->get();
            if(count($serch)!=0){
                foreach($serch as $value){
                    $tenmail=$value->Ten;
                    $profile_id=$value->id_pm;
                    $profile_name=ProfileEmail::where('id',$profile_id)->get();
                    foreach($profile_name as $pi){
                        $profile_name=$pi->mail_profile;
                    }
                    
                }
                $trung[]=$tenmail." ---- In Profile : ".$profile_name;
                }
            else
            {
                $theloai= new Email;
                $theloai->Ten=$mailFull[0];
                $theloai->newPass=$mailFull[1];
                if(count($mailFull)>2)
                {
                    $theloai->recoveryMail=$mailFull[2];
                }
                else
                {
                    $theloai->recoveryMail="Not Found";
                }  
                
                if(count($mailFull)>3)
                {
                    if ($mailFull[3]!=""){ 
                        $scretid=explode("scret=",$mailFull[3]);
                        $theloai->ScretGG= $scretid[1];
                        if($scretid[1]!="" and $scretid[1]!=null){
                            $theloai->send_mail_ipad="Success";
                        }else{ $theloai->send_mail_ipad="New" ;}
                    }
                   
                }
                if(count($mailFull)>4)
                {
                    if ($mailFull[4]!=""){
                    $theloai->OTPGG=$mailFull[4];
                    }
                }              
                $theloai->sendIos="New";
                $theloai->deleteIos="New";
                $theloai->changePass="New";
                $theloai->sendGmailApp="New";
                $theloai->download_book="New";
                $theloai->RestoreYTB="New";
                $theloai->send_mail="New";
                $theloai->status="New";
                $theloai->id_pm=$request->profileMail;
                $theloai->save();
            }
              
            

        }
        if (count($trung)>0)
        {
            return view('admin/theloai/them',['trung'=>$trung,'pro_file'=>$pro_file]);
        }
            else
        {
        return redirect('admin/theloai/them')->with('thongbao','thêm thành công');
        }
    }
    //-----------------------------------------------------------------------------------------------//
    public function postProfile(Request $request)
    {
        $profile_mail=changeTitle($request->profile_mail);
        $serch=ProfileEmail::where('mail_profile','like',$profile_mail)->get();
        if(count($serch)!=0)
        {
            return redirect('admin/theloai/them')->with('eror','profile : '.$profile_mail.' đã tồn tại'); 
        }

        else
        {
            $profile=new ProfileEmail();
            $profile->mail_profile=$profile_mail;
            $profile->save();
            return redirect('admin/theloai/them')->with('thongbao','thêm thành công profile :'.$profile_mail);
        }
    }
    //-----------------------------------------------------------------------------------------------//
    public function deleteProfile(Request $request)
    {
        $id_pm=$request->profileMail;
        $serch=Email::where('id_pm','like',$id_pm)->get();
        if(count($serch)!=0)
        {
            $profile_mail=ProfileEmail::where('id',$id_pm)->first();
            $profile_mail=$profile_mail->mail_profile;
            return redirect('admin/theloai/them')->with('eror','Bạn chưa xóa hết email trong '.$profile_mail);
        }
        else
        {
            $profile_mail=ProfileEmail::where('id',$id_pm)->first();
            ProfileEmail::where('id',$id_pm)->delete();
            $profile_mail=$profile_mail->mail_profile;
            return redirect('admin/theloai/them')->with('thongbao','Xóa thành công profile :'.$profile_mail);
        }
    }
    //-----------------------------------------------------------------------------------------------//
    //-----------------------------------------------------------------------------------------------//
    //-----------------------------------------------------------------------------------------------//
       
}
