<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>Shop - Máy tính_Laptop_Camera_Printer_Phone</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/assets/imgs/theme/favicon.svg')}}" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{asset('frontend/assets/css/main.css?v=5.3')}}" />
</head>

<body>

     <!-- Header  -->
    @include('frontend.layout.header')

    <main class="main pages">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Pages <span></span> My Account
                </div>
            </div>
        </div>
        <div class="page-content pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                        <div class="row">
                            <div class="col-lg-6 col-md-8">
                                <div class="login_wrap widget-taber-content background-white">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h1 class="mb-5">Tạo tài khoản</h1>
                                            <p class="mb-30">Bạn có tài khoản chưa? <a href="{{ route('login') }}">Đăng nhập</a></p>
                                        </div>
                                        <form id="register_form" method="POST" action="{{ route('register') }}">
                                            @csrf

                                            {{-- <div class="form-group">
                                                <input type="text" class="@error('username') is-invalid @enderror"  name="username" placeholder="Tên" value="{{ old('username') }}"/>
                                            </div>
                                            @error('username')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror --}}

                                            <div class="row mb-3">
                                                <label for="username" class="col-sm-3 col-form-label">Tên tài khoản</label>
                                                <div class="col-sm-9 form-group">
                                                    <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{ old('username') }}" placeholder="Nhập tên tài khoản">
                                                </div>
                                                @error('username')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="row mb-3">
                                                <label for="phone" class="col-sm-3 col-form-label">Số điện thoại</label>
                                                <div class="col-sm-9 form-group">
                                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone" value="{{ old('phone') }}" placeholder="Nhập số điện thoại">
                                                </div>
                                                @error('phone')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="row mb-3">
                                                <label for="email" class="col-sm-3 col-form-label">Email (tuỳ chọn)</label>
                                                <div class="col-sm-9 form-group">
                                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" placeholder="Nhập thư điện tử">
                                                </div>
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="row mb-3">
                                                <label for="new_password" class="col-sm-3 col-form-label">Mật khẩu</label>
                                                <div class="col-sm-9 form-group">
                                                    <input type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" id="new_password" value="{{ old('new_password') }}" placeholder="Nhập mật khẩu">
                                                </div>
                                                @error('new_password')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="row mb-3">
                                                <label for="new_password_confirmation" class="col-sm-3 col-form-label">Xác thực mật khẩu</label>
                                                <div class="col-sm-9 form-group">
                                                    <input type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror" name="new_password_confirmation" id="new_password_confirmation" value="{{ old('new_password_confirmation') }}" placeholder="Nhập mật khẩu lần nữa">
                                                </div>
                                                @error('new_password_confirmation')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>




                                            <div class="login_footer form-group mb-50">
                                                <div class="chek-form">
                                                    <div class="custome-checkbox form-group">
                                                        <input class="form-check-input" type="checkbox" name="gree" id="gree"/>
                                                        <label class="form-check-label" for="gree"><span>Tôi đã đọc và đồng ý với chính sách.</span></label>
                                                    </div>
                                                </div>
                                                <a href="page-privacy-policy.html"><i class="fi-rs-book-alt mr-5 text-muted"></i>Xem nhiều hơn</a>
                                            </div>
                                            <div class="form-group mb-30">
                                                <button type="submit" class="btn btn-fill-out btn-block hover-up font-weight-bold">Xác nhận &amp; đăng ký</button>
                                            </div>
                                           
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 pr-30 d-none d-lg-block">
                                <div class="card-login mt-115">
                                    <a href="#" class="social-login facebook-login">
                                        <img src="{{asset('frontend/assets/imgs/theme/icons/logo-facebook.svg')}}" alt="" />
                                        <span>Tiếp tục với Facebook</span>
                                    </a>
                                    <a href="#" class="social-login google-login">
                                        <img src="{{asset('frontend/assets/imgs/theme/icons/logo-google.svg')}}" alt="" />
                                        <span>Tiếp tục với Google</span>
                                    </a>
                                    <a href="#" class="social-login apple-login">
                                        <img src="{{asset('frontend/assets/imgs/theme/icons/logo-apple.svg')}}" alt="" />
                                        <span>Tiếp tục với Apple</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @include('frontend.layout.footer')

     <!-- Preloader Start -->
     <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="{{ asset('frontend/assets/imgs/theme/loading.gif') }}" alt="" />
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor JS-->
    <script src="{{ asset('frontend/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/slick.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.elevatezoom.js') }}"></script>
    <!-- Template  JS -->

   <script src="{{ asset('frontend/assets/js/main.js?v=5.3') }}"></script>
   <script src="{{ asset('frontend/assets/js/shop.js?v=5.3') }}"></script>

    {{-- Validation Form js --}}
    <script src="{{ asset('frontend/assets/js/validate.min.js') }}"></script>

    {{-- Validate From JS --}}
<script type="text/javascript">
    $(document).ready(function (){
        $('#register_form').validate({
            rules: {
                username: {
                    required : true,
                    maxlength: 255
                },
                phone: {
                    required : true,
                },
                new_password: {
                    required : true,
                    minlength:8
                },
                new_password_confirmation: {
                    equalTo:"#new_password",

                },
                "gree[]": {
                    required : true,
                },


            },
            messages :{
                username: {
                    required : 'Tên không để trống',
                    maxlength: 'Tên quá dài'
                },
                phone: {
                    required : 'Số điện thoại không để trống',

                },
                new_password: {
                    required : 'Mật khẩu không để trống',
                    minlength: 'Độ dài mật khẩu ít nhất 8 ký tự'

                },
                new_password_confirmation: {
                    equalTo : 'Xác nhận mật khẩu không trùng với mật khẩu ở trên ',

                },

                gree: {
                    required : 'Bạn đồng ý với chính sách',

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
</body>

</html>
