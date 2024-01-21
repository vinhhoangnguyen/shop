<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Setting;
use Livewire\Attributes\Validate;
use Livewire\WithFileUploads;
use Image;
use Illuminate\Support\Str;

class UpdateSetting extends Component
{
    use WithFileUploads;

    #[Validate]
    public $name, $address, $phone, $hot_line, $email, $time, $account;

    #[Validate]
    public $logo;

    public Setting $setting;

    public function mount()
    {
        $this->setting = Setting::find(1);
        $this->name = $this->setting->name;
        $this->address = $this->setting->address;
        $this->phone = $this->setting->phone;
        $this->hot_line = $this->setting->hot_line;
        $this->email = $this->setting->email;
        $this->time = $this->setting->time;
        $this->account = $this->setting->account;
    }

    public function rules(){
        return [
            'name' =>'required',
            'address' =>'required',
            'phone' =>'required',
            'hot_line' =>'required',
            'account' =>'required',
            'time' =>'required',
            'email' =>'nullable|email',
            'logo' =>'nullable|image|max:2048',
        ];

    }

    public function messages(){
        return [
            'name.required' =>'Tên shop không để trống',
            'address.required' =>'Địa chỉ shop không để trống',
            'phone.required' =>'Số điện thoại shop không để trống',
            'hot_line.required' =>'Đường dây nóng của shop không để trống',
            'account.required' =>'Số tài khoản shop không để trống',
            'time.required' =>'Thời gian làm việc shop không để trống',
            'email.email' =>'Thư điện tử phải là dạng email',
            'logo.image' =>'File logo Shop dạng hình ảnh',
            'logo.max' =>'Chọn file logo Shop có kích thước nhỏ hơn 2Mb',
        ];
    }


    public function render()
    {
        return view('livewire.update-setting');
    }

    public function update(){
        $validated = $this->validate();

        //Update
        $image = $this->logo;
        if ($image) {
            unlink($this->setting->logo);

            $image_name = date('dmY').'_'.$image->getClientOriginalName();
            // Image::make($image)->resize(300,300)->save('backend/upload/logo_image/'.$image_name);
            Image::make($image)->save('backend/upload/logo_image/'.$image_name);
            $image_url = 'backend/upload/logo_image/'.$image_name;
            $this->setting->logo = $image_url;
        }

        $this->setting->name = $this->name;
        $this->setting->slug = Str::slug($this->name);
        $this->setting->address = $this->address;
        $this->setting->phone = $this->phone;
        $this->setting->hot_line =  $this->hot_line;
        $this->setting->email = $this->email;
        $this->setting->time = $this->time;
        $this->setting->account =  $this->account;

        try {
            $this->setting->save();
            $notification = array(
                'message' => 'Thông tin shop đã được cập nhật!',
                'alert-type' => 'success'
            );

        } catch (\Throwable $th) {
            $notification = array(
                'message' => 'Có lỗi xảy ra!',
                'alert-type' => 'error'
            );
        }

        $this->dispatch('alert', $notification);

    }

}
