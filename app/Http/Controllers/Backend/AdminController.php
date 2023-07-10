<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;


class AdminController extends Controller
{
    //Dashboard index
    public function index(){
        return view('backend.admin.dashboard');
    }//end method

    // Login view
    public function login(){
        return view('backend.admin.auth.login');
    }//end method

    // Logout
    public function Admin_Destroy(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/admin/login');
    } // End Mehtod

    //View Profile
    public function AdminProfile(){
        $id = Auth::user()->id;
        $admin_Data = User::findorFail($id);
        return view('backend.admin.admin_profile_view', compact('admin_Data'));
    }//end method

    //Update Profile
    public function AdminProfile_Update(Request $request){
        $id = Auth::user()->id;
        $data = User::findorFail($id);

        //Validation
        $validatedData = $request->validate([
            'email' => [Rule::unique('users')->ignore($data),'max:255'],
            'phone' => ['required', Rule::unique('users')->ignore($data)],
            'name' => ['required'],
            'image' => ['file', 'mimes:jpeg,png,gif,svg, WebP', 'max:2048'],

        ], [
            // 'email.required' => 'Tài khoản email không để trống',
            'email.unique' => 'Tài khoản email đã tồn tại',
            'email.max' => 'Tài khoản email quá dài',
            'phone.required' => 'Số điện thoại không để trống',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            'name.required' => 'Tên tài khoản không để trống',
            'image.mimes'=> 'File ảnh Upload phải là dạng .jpeg, .png, .gif, .svg và WebP',
            'image.max'=> 'Kích thước file ảnh Upload không vượt quá 2MB',

        ]);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;

        $image = $request->file('image');
        //Cập nhật: nếu có hình hoặc ko hình
        if ($image) {
            if ($data->photo) {
                unlink($data->photo);
            }

            $image_name = date('dmYHi').'_'.$image->getClientOriginalName();
            Image::make($image)->resize(300,300)->save('backend/upload/admin_image/'.$image_name);
            $image_url = 'backend/upload/admin_image/'.$image_name;
            $data['photo'] = $image_url;

        }
        $data->save();

        $notification = array(
            'message' => 'Hồ sơ đã cập nhật thành công',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }//end method


    //View change password
    public function AdminPassword_Change(){
        $id = Auth::user()->id;
        $admin_Data = User::findorFail($id);
        return view('backend.admin.admin_password_change', compact('admin_Data'));
    }//end method

    //update password
    public function AdminPassword_update(Request $request){

        // Validation
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ],
        [
            'old_password.required' => 'Mật khẩu hiện tại không để trống',
            'new_password.required' => 'Mật khẩu mới không để trống',
            'new_password.confirmed' => 'Xác nhận mật khẩu mới chưa đúng.',

        ]);

        // Match The Old Password
        if (!Hash::check($request->old_password, Auth::user()->password)) {
            return back()->with("error", "Mật khẩu cũ không đúng !!");
        }

        // Update The new password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);
        return back()->with("status", " Cập nhật mật khẩu thành công.");


    }//end method


    //Lock screen
    public function Admin_lock(){
        return view('backend.admin.auth.auth_lock');
    }//end method

    //Lock screen
    public function Admin_Unlock(Request $request){
        //validate
        $request->validate([
            'password' => 'required',
        ],
        [
            'password.required' => 'Mật khẩu hiện tại không để trống',
        ]);

        //xác thực và chuyển hướng
        $credentials = [
            'phone' => Auth::user()->phone,
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($credentials)) {
            // Xác thực thành công, chuyển hướng đến trang chính
            return redirect()->route('admin.dashboard');
        }

        return redirect()->back()->withErrors(['password' => 'Mật khẩu không chính xác.']);

    }//end method


}
