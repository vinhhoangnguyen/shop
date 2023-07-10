<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Validation\Rule;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;

class CustomerController extends Controller
{
    //Dashboard index
    public function index(){
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('frontend.customer.index', compact('userData'));
    }//end method

    public function CustomerLogout(Request $request){
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    } // End Mehtod

    //Update Profile
    public function customerProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::findorFail($id);

        //Validation
        $validatedData = $request->validate([
            'email' => [Rule::unique('users')->ignore($data),'max:255'],
            'phone' => ['required', Rule::unique('users')->ignore($data)],
            'name' => ['required'],
            'image' => ['file', 'mimes:jpeg,png,gif,svg, WebP', 'max:2048'],

        ], [

            'email.unique' => 'Tài khoản email đã tồn tại',
            'email.max' => 'Tài khoản email quá dài',
            'phone.required' => 'Số điện thoại không để trống',
            'phone.unique' => 'Số điện thoại đã tồn tại',
            'name.required' => 'Tên tài khoản không để trống',
            'image.mimes'=> 'File ảnh Upload phải là dạng .jpeg, .png, .gif, .svg và WebP',
            'image.max'=> 'Kích thước file ảnh Upload không vượt quá 2MB',

        ]);

        //dd($request->all());
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
            Image::make($image)->resize(300,300)->save('frontend/upload/customer_image/'.$image_name);
            $image_url = 'frontend/upload/customer_image/'.$image_name;
            $data['photo'] = $image_url;

        }
        $data->save();

        $notification = array(
            'message' => 'Hồ sơ đã cập nhật thành công',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }//end method

    //update password
    public function customerPassword_Update(Request $request){

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
            $notification = array(
                'message' => 'Mật khẩu cũ không đúng !!',
                'alert-type' => 'error'
            );
            return back()->with($notification);
        }

        // Update The new password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        $notification = array(
            'message' => 'Cập nhật mật khẩu thành công.',
            'alert-type' => 'success'
        );
        return back()->with($notification);


    }//end method


    //User Account Guest....đang làm
    Public function account(){
        return view('auth.account');
    }
}
