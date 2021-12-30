<?php
namespace App\Http\Controllers;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Auth;
class UserController extends Controller
{
	public function getDangnhapAdmin()
	{
		return view('admin.login');
	}
	public function getlist_user()
	{
		$user=User::all();
		return view('admin.user.danhsach',['user'=>$user]);
	}
	public function add_user()
	{
		return view('admin.user.them');
	}
	public function post_add_user(Request $request)
	{
		$this->validate($request,[
				'name' => 'required|min:3',
    			'email' => 'required|email|unique:users,email',
    			'password' => 'required|min:3|max:100',
    			'passwordAgain' => 'required|same:password'
    		],
    		[
    			'name.required' => 'chưa nhập tên',
    			'name.min' => 'tên phải ít nhất 3 ký tự',
    			'email.required' => 'phải đúng là mail',
    			'email.unique' => 'mail đã tồn tại',
    			'email.required'=>'Bạn chưa nhập email',
    			'password.required'=>'Bạn chưa nhập pass',
    			'password.unique' => 'password đã tồn tại',
    			'password.min'=>'pass phải hơn 3 ký tự',
    			'password.max'=>'pass không dc quá 100 ký tự',
    			'passwordAgain.required' => 'chưa nhập mk lại',
    			'passwordAgain.same' => 'mật khẩu nhập lại đéo đúng'
    		]);
		$user = new User;
		$user->name=$request->name;
		$user->email=$request->email;
		$user->password= bcrypt($request->password);
		$user->quyen=$request->author;
		$user->save();
		return view('admin.user.them')->with('thongbao','add sucess');
	}

	public function postDangnhapAdmin(Request $request)
	{
		$this->validate($request,[
    			'email' => 'required',
    			'password' => 'required|min:3|max:100'
    		],
    		[
    			'email.required'=>'Bạn chưa nhập email',
    			'password.required'=>'Bạn chưa nhập pass',
    			'password.unique' => 'password đã tồn tại',
    			'password.min'=>'pass phải hơn 3 ký tự',
    			'password.max'=>'pass không dc quá 100 ký tự',
    		]);
		if(Auth::attempt(['email' =>$request->email,'password'=>$request->password]))
		{
			return redirect('admin/theloai/danhsach');
		}
		else
		{
			return redirect('admin/dangnhap')->with('thongbao','đăng nhập không thành công');
		}
	}
		public function update_user($id)
	{
		$user=User::find($id);
		//var_dump($user);
		return view('admin.user.sua',['user'=>$user]);
	}
		public function post_update_user()
	{
		return view('admin.user.them');
	}
	public function delete($id)
	{
		$user=User::find($id);
		$user->delete();
		return view('admin.user.sua',['user'=>$user]);
	}
}