<?php

namespace App\Livewire\Category;

use Livewire\Attributes\Validate;
// use Livewire\Attributes\Rule;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithFileUploads;
use Image;
use Illuminate\Support\Str;

class CreateCategory extends Component
{
    use WithFileUploads;

    #[Validate] 
    public $name = '';

    #[Validate] 
    public $image;
 
    public function rules(){
        return [
            'name' =>'required',
            'image' =>'nullable|image|max:12288',
        ];

    }

    public function messages(){
        return [
            'name.required' =>'Tên danh mục không để trống',
            'image.image' =>'File hình danh mục phải là dạng hình ảnh',
            'image.max' =>'Chọn file image danh mục có kích thước nhỏ hơn 12Mb',
        ];
    }


    public function save(){
        $this->validate();

        // dd('tao moi danh muc');
        $category = new Category();
        $image = $this->image;
        if ($image) {
            $image_name = date('dmY').'_'.$image->getClientOriginalName();
            Image::make($image)->resize(300,300)->save('backend/upload/logo_image/'.$image_name);
            $image_url = 'backend/upload/category/'.$image_name;
            $category->image = $image_url;
        }

        $category->name = $this->name;
        $category->slug = Str::slug($this->name);

        try {
            $category->save();
            $notification = array(
                'message' => 'Danh muc tao thanh cong!',
                'alert-type' => 'success'
            );

        } catch (\Throwable $th) {
            $notification = array(
                'message' => 'Có lỗi xảy ra!',
                'alert-type' => 'error'
            );
        }

        //reset field and close Modal Create
        $this->reset('name');
        $this->dispatch('item-created');
        //Refesh Show Component

        //Notifiaction
        $this->dispatch('alert', $notification);

    }

    public function render()
    {
        return view('livewire.category.create-category');
    }
}
