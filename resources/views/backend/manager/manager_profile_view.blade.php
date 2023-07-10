@extends('backend.manager.layout.master')

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
                            <li class="breadcrumb-item"><a href="{{ route('manager.dashboard') }}">Bảng điều khiển</a></li>

                            <li class="breadcrumb-item active">Hồ sơ</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Hồ sơ</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-4 col-xl-4">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="{{ (isset($manager_Data->photo)) ? asset($manager_Data->photo) : asset('backend/upload/no_image.jpg')  }}" class="rounded-circle avatar-lg img-thumbnail"
                        alt="profile-image">

                        <h4 class="mb-0">{{ $manager_Data->name }}</h4>
                        <p class="text-muted">Chức năng: {{ $manager_Data->role }}</p>


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
                        <form id="profile_form" action="{{ route('manager.profile.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Thông tin cá nhân</h5>

                            <div class="row mb-3">
                                        <div class="col-md-3">
                                            <h5 class="mb-0">Tên</h5>
                                        </div>
                                        <div class="col-md-9 form-group">
                                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $manager_Data->name }}">
                                        </div>
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                            </div>

                            <div class="row mb-3">
                                        <div class="col-md-3">
                                            <h5 class="mb-0">Email</h5>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $manager_Data->email }}">
                                        </div>
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                            </div>

                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <h5 class="mb-0">Phone</h5>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $manager_Data->phone}}">
                                        </div>
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                            </div>

                            <div class="row mb-3">
                                        <div class="col-md-3">
                                            <h5 class="mb-0">Địa chỉ</h5>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="text" name="address" id="address" class="form-control" value="{{ $manager_Data->address }}">
                                        </div>
                            </div>

                            <div class="row mb-3">
                                        <div class="col-md-3">
                                            <h5 class="mb-0">Hình</h5>
                                        </div>
                                        <div class="col-md-9">
                                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">
                                        </div>
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                            </div>

                            <div class="row mb-3">
                                        <div class="col-md-3">
                                        </div>
                                        <div class="col-md-9">
                                            <img id="showImage" src="{{ (isset($manager_Data->photo)) ? asset($manager_Data->photo) : asset('backend/upload/no_image.jpg')  }}" class="rounded-circle avatar-lg img-thumbnail"
                        alt="profile-image">
                                </div>
                            </div>

                            <div class="text-end">
                                        <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i> Lưu thông tin</button>
                            </div>
                        </form>

                    </div>
                </div> <!-- end card-->

            </div> <!-- end col -->
        </div>
        <!-- end row-->

    </div> <!-- container -->

</div> <!-- content -->

<script type="text/javascript">
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload = function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>

{{-- Validate From JS --}}
<script type="text/javascript">
    $(document).ready(function (){
        $('#profile_form').validate({
            rules: {
                name: {
                    required : true,
                },
                phone: {
                    required : true,
                },

            },
            messages :{
                name: {
                    required : 'Tên không để trống',
                },
                phone: {
                    required : 'Số điện thoại không để trống',
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
