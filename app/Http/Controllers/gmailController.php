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
class gmailController extends Controller
{
    //-----------------------------------------------------------------------------------------------//
    public function getDanhSach()
    {
    	$theloai = Email::all();
        $status=Status::all();
        $pro_file=ProfileEmail::all();
    	return view('admin.theloai.danhSachGmail',['theloai'=>$theloai,'status'=>$status,'pro_file'=>$pro_file]);
    }
    //-----------------------------------------------------------------------------------------------//
        public function getSua($id)
    {//return view('admin.theloai.sua');
    	$theloai = Email::find($id);
    	return view('admin.theloai.sua',['theloai'=>$theloai]);
    }
    //-----------------------------------------------------------------------------------------------//
        public function getdelete($id)
    {
    	$theloai = Email::find($id);
    	$theloai->delete();
    	return redirect('admin/Youtube/danhSachGmail')->with('thongbao','xóa thành công');
    }
    //-----------------------------------------------------------------------------------------------//
        public function delete_select(Request $request)
    {
        $abc=$request->user_ids;
        foreach ($abc as $user_ids => $id) {
             $theloai = Email::find($id);
            $theloai->delete();
        }
        return 'sucess';
    }
    //-----------------------------------------------------------------------------------------------//
        public function delete_all($id_mail_profile) {
        if($id_mail_profile=="All")
            {
                Email::truncate();
                return redirect('admin/gmail/'.$id_mail_profile)->with('thongbao','xóa thành công');
            }
            else
            {
                Email::where('id_pm',$id_mail_profile)->delete();
                return redirect('admin/gmail/'.$id_mail_profile)->with('thongbao','xóa thành công');
            }

        
    }
    //-----------------------------------------------------------------------------------------------//
        public function delete_all_serch(Request $request) 
        {
            $abc =json_decode($request->theloai_post);
            //var_dump($abc);
            foreach ($abc as $key => $value) {
                $id = $value->id;
                $theloai = Email::find($id);
                $theloai->delete();
            }

        return redirect('admin/gmail/All')->with('thongbao','xóa thành công');
    }
//-----------------------------------------------------------------------------------------------//
        public function download_all(request $request) {
            $dataStorage = [];
            $abc =json_decode($request->theloai_post);
            //var_dump($abc);
            foreach ($abc as $key => $value) {
                $dataStorage[] =$value->Ten."\t".$value->newPass."\t".$value->recoveryMail."\t"."http://authen.tyui.us/?scret=".$value->ScretGG."\t".$value->OTPGG."\t";
            }
        $dataStorage = implode( "\n", $dataStorage );
        Storage::put( 'Email_download.txt', $dataStorage );

        return Response::download( storage_path( 'app/Email_download.txt' ) );
        }

        //-----------------------------------------------------------------------------------------------//
        public function post_download_select(Request $request) {
        $dataStorage = [];
        $abc=$request->user_ids;
        foreach ( $abc as $id ) {
            $theloai = Email::find($id);
            $dataStorage[] =$theloai->Ten."\t".$theloai->newPass."\t".$theloai->recoveryMail."\t"."http://authen.tyui.us/?scret=".$theloai->ScretGG."\t".$theloai->OTPGG."\t";
        }
        $dataStorage = implode( "\n", $dataStorage );
        Storage::put( 'id.txt', $dataStorage );

        return 'sucess';
        }
        //-----------------------------------------------------------------------------------------------//
        public function get_download_seclect(){
        return Response::download( storage_path( 'app/id.txt' ) );
        }
    //-----------------------------------------------------------------------------------------------//
        public function search(Request $request)
    {   $status=Status::all();
        $pro_file=ProfileEmail::all();
        if($request)
        {
            $mail_profile=$request->mail_profile;
            $id_mail_profile=ProfileEmail::where('id',$mail_profile)->get();
           // $orderby=$request->order_by;
            $sendGmailApp=$request->sendGmailApp;
            if($mail_profile!="All")
            {
                $all_=Email::where('id_pm',$mail_profile)->get();
            }
            else
            {
                $all_ = Email::all();
            }
            $all_id=[];
            foreach ($all_ as $value) {
                $all_id[]=$value->id;
            }
            //$id_sendGmailApp=$all_id;
            if($sendGmailApp!="All" and $sendGmailApp!="Mail lỗi"){
            $sendGmailApp=Email::where([['sendGmailApp','like',$sendGmailApp],['id_pm','like',$mail_profile]])->get();
            
           }
           if($sendGmailApp=="Mail lỗi"){
              $sendGmailApp=Email::where([['sendGmailApp','like','%Mail%'],['id_pm','like',$mail_profile]])->get();
            }
            
            $theloai=$sendGmailApp;
            return view('admin.theloai.searchGmail',['theloai'=>$theloai,'serch'=>$request,'status'=>$status,'id_mail_profile'=>$id_mail_profile,'pro_file'=>$pro_file]);
       }


    }
    //-----------------------------------------------------------------------------------------------//
        public function test()
    {
        $abc = Email::where('download_book','like','%Mail%')->update(['download_book'=>'New']);
    }
    //-----------------------------------------------------------------------------------------------//
    //-----------------------------------------------------------------------------------------------//
    //-----------------------------------------------------------------------------------------------//
    //-----------------------------------------------------------------------------------------------//
    //-----------------------------------------------------------------------------------------------//
    
}
