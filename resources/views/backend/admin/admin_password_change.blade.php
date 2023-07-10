@extends('backend.admin.layout.master')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a></li>

                            <li class="breadcrumb-item active">Hồ sơ</li>
                            <li class="breadcrumb-item active">Thay đổi mật khẩu</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Thay đổi mật khẩu</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-4 col-xl-4">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="{{ (isset($admin_Data->photo)) ? asset($admin_Data->photo) : asset('backend/upload/no_image.jpg')  }}" class="rounded-circle avatar-lg img-thumbnail"
                        alt="profile-image">

                        <h4 class="mb-0">{{ $admin_Data->name }}</h4>
                        <p class="text-muted">Chức năng: {{ $admin_Data->role }}</p>



                        {{-- <div class="text-start mt-3">

                            <p class="text-muted mb-2 font-13"><strong>Full Name :</strong> <span class="ms-2">Geneva D. McKnight</span></p>

                            <p class="text-muted mb-2 font-13"><strong>Mobile :</strong><span class="ms-2">(123) 123 1234</span></p>

                            <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2">user@email.domain</span></p>

                            <p class="text-muted mb-1 font-13"><strong>Location :</strong> <span class="ms-2">USA</span></p>
                        </div> --}}

                        <ul class="social-list list-inline mt-3 mb-0">
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i class="mdi mdi-google"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-info text-info"><i class="mdi mdi-twitter"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a href="javascript: void(0);" class="social-list-item border-secondary text-secondary"><i class="mdi mdi-github"></i></a>
                            </li>
                        </ul>
                    </div>
                </div> <!-- end card -->



            </div> <!-- end col-->

            <div class="col-lg-8 col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <form id="chagePass_form" action="{{ route('admin.password.update') }}" method="post" >
                            @csrf


                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                        {{session('status')}}
                                </div>
                            @elseif(session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{session('error')}}
                                </div>
                            @endif

                            <div class="row mb-3">
                                        <div class="col-md-3">
                                            <h5 class="mb-0">Mật khẩu củ</h5>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="password" name="old_password" id="old_password" class="form-control @error('old_password') is-invalid @enderror" placeholder="Mật khẩu cũ" value={{old('old_password')}}>
                                        </div>
                                        @error('old_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                            </div>

                            <div class="row mb-3">
                                        <div class="col-md-3">
                                            <h5 class="mb-0">Mật khẩu mới</h5>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="password" name="new_password" id="new_password" class="form-control @error('new_password') is-invalid @enderror" placeholder="Mật khẩu mới">
                                        </div>
                                        @error('new_password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                            </div>
                            <div class="row mb-3">
                                        <div class="col-md-3">
                                            <h5 class="mb-0">Xác nhận mật khẩu mới</h5>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control @error('new_password_confirmation') is-invalid @enderror" placeholder="Xác nhận mật khẩu mới">
                                        </div>
                                        @error('new_password_confirmation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                            </div>



                            <div class="text-end">
                                        <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Cập nhật</button>
                            </div>
                        </form>

                    </div>
                </div> <!-- end card-->

            </div> <!-- end col -->
        </div>
        <!-- end row-->

    </div> <!-- container -->

</div> <!-- content -->

{{-- Validation Form js --}}
<script src="{{ asset('backend/assets/js/validate.min.js') }}"></script>

{{-- Validate From JS --}}
<script type="text/javascript">
$(document).ready(function (){

    jQuery.validator.addMethod("notEqualTo",
                             function(value, element, param) {
                                  return this.optional(element) || value != $(param).val();
                             }, "This has to be different...");

    $('#chagePass_form').validate({
        rules: {
            old_password: {
                required : true,
                minlength: 8
            },

            new_password: {
                required : true,
                notEqualTo:"#old_password",
                minlength:8
            },
            new_password_confirmation: {
                equalTo:"#new_password",

            },



        },
        messages :{
            old_password: {
                required : 'Mật khẩu cũ không để trống',
                minlength: 'Mật khẩu cũ ngắn'
            },

            new_password: {
                required : 'Mật khẩu mới không để trống',
                notEqualTo: 'Mật khẩu mới phải khác với mật khẩu cũ',
                minlength: 'Độ dài mật khẩu mới ít nhất 8 ký tự'

            },
            new_password_confirmation: {
                equalTo : 'Xác nhận mật khẩu không trùng với mật khẩu mới ở trên ',
            },




        },
        errorElement : 'span',
        errorPlacement: function (error,element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight : function(element, errorClass, validClass){
            $(element).addClass('is-invalid');
        },
        unhighlight : function(element, errorClass, validClass){
            $(element).removeClass('is-invalid');
        },
    });
});
</script>
@endsection








