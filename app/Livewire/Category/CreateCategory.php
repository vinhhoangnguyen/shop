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

    public $iteration;
    public $isImage = false;

    public function rules(){
        return [
            'name' =>'required | Unique:categories',
            'image' =>'nullable|image|Unique:categories,image|max:2048',
        ];

    }

    public function messages(){
        return [
            'name.required' =>'Tên danh mục không để trống',
            'name.unique' =>'Tên danh mục đã tồn tại',
            'image.image' =>'File hình danh mục phải là dạng hình ảnh',
            'image.unique' =>'File hình trùng với danh mục khác',
            'image.max' =>'Chọn file image danh mục có kích thước nhỏ hơn 2Mb',
        ];
    }

    public function close(){
        $this->reset('name');
        $this->resetValidation();
        $this->image = null;
        $this->iteration++;
    }

    // public function updatedImage($value){
    //     // dd($value);
    //     // 1. validate image
    //     $validateImage = $this->validate([
    //         'image' => 'image',
    //     ]);

    //         dd($validateImage);
    // }

    public function save(){
        $this->validate();

        $category = new Category();
        $image = $this->image;
        if ($image) {
            $image_name = date('dmY').'_'.$image->getClientOriginalName();
            Image::make($image)->resize(300,300)->save('backend/upload/pos/category/'.$image_name);
            $image_url = 'backend/upload/pos/category/'.$image_name;
            $category->image = $image_url;
        }

        $category->name = $this->name;
        $category->slug = Str::slug($this->name);

        try {
            $category->save();
            $notification = array(
                'message' => 'Danh mục tạo thành công!',
                'alert-type' => 'success'
            );

        } catch (\Throwable $th) {
            $notification = array(
                'message' => 'Có lỗi xảy ra!',
                'alert-type' => 'error'
            );
        }

        //reset field and close Modal Create
        $this->close();

        $this->dispatch('close-modal');

        //Refesh Show Component
        $this->dispatch('item-created')->to(ShowCategory::class);

        //Notifiaction
        $this->dispatch('alert', $notification);

    }

    public function render()
    {
        return view('livewire.category.create-category');
    }
}
