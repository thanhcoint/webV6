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

class AjaxController extends Controller
{
    //-----------------------------------------------------------------------------------------------//
    public function getEmail($id_mail_profile)
    {
        if($id_mail_profile!="All")
        {
            $theloai=Email::where('id_pm',$id_mail_profile)->get();
        }
        else
        {
            $theloai = Email::all();
        }
        $status=Status::all();
        $pro_file=ProfileEmail::all();
        $id_mail_profile_=ProfileEmail::where('id',$id_mail_profile)->get();
        
    	return view('admin.theloai.danhsach',['theloai'=>$theloai,'status'=>$status,'pro_file'=>$pro_file,'id_mail_profile'=>$id_mail_profile_,'link'=>$id_mail_profile]);
    
    }
    public function getEmailYT($id_mail_profile)
    {
        if($id_mail_profile!="All")
        {
            $theloai=Email::where('id_pm',$id_mail_profile)->get();
        }
        else
        {
            $theloai = Email::all();
        }
        $status=Status::all();
        $pro_file=ProfileEmail::all();
        $id_mail_profile_=ProfileEmail::where('id',$id_mail_profile)->get();
        
    	return view('admin.theloai.danhSachYT',['theloai'=>$theloai,'status'=>$status,'pro_file'=>$pro_file,'id_mail_profile'=>$id_mail_profile_,'link'=>$id_mail_profile]);
    
    }
    public function getGmai($id_mail_profile)
    {
        if($id_mail_profile!="All")
        {
            $theloai=Email::where('id_pm',$id_mail_profile)->get();
        }
        else
        {
            $theloai = Email::all();
        }
        $status=Status::all();
        $pro_file=ProfileEmail::all();
        $id_mail_profile_=ProfileEmail::where('id',$id_mail_profile)->get();
        
    	return view('admin.theloai.danhSachGmail',['theloai'=>$theloai,'status'=>$status,'pro_file'=>$pro_file,'id_mail_profile'=>$id_mail_profile_,'link'=>$id_mail_profile]);
    
    }
    public function getAndroid($id_mail_profile)
    {
        if($id_mail_profile!="All")
        {
            $theloai=Email::where('id_pm',$id_mail_profile)->get();
        }
        else
        {
            $theloai = Email::all();
        }
        $status=Status::all();
        $pro_file=ProfileEmail::all();
        $id_mail_profile_=ProfileEmail::where('id',$id_mail_profile)->get();
        
    	return view('admin.theloai.android',['theloai'=>$theloai,'status'=>$status,'pro_file'=>$pro_file,'id_mail_profile'=>$id_mail_profile_,'link'=>$id_mail_profile]);
    
    }

    public function getEmailipad($id_mail_profile)
    {
        if($id_mail_profile!="All")
        {
            $theloai=Email::where('id_pm',$id_mail_profile)->get();
        }
        else
        {
            $theloai = Email::all();
        }
        $status=Status::all();
        $pro_file=ProfileEmail::all();
        $id_mail_profile_=ProfileEmail::where('id',$id_mail_profile)->get();
        
    	return view('admin.theloai.danhSachipad',['theloai'=>$theloai,'status'=>$status,'pro_file'=>$pro_file,'id_mail_profile'=>$id_mail_profile_,'link'=>$id_mail_profile]);
    
    }
}
