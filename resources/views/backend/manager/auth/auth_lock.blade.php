
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Quản lý Lock | Shop</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Computer, Laptop, Printer, Camera Trí Đức etc." name="description" />
        <meta content="Trí Đức Computer" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href=" {{ asset('backend/assets/images/favicon.ico') }}">

        <!-- Bootstrap css -->
        <link href=" {{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App css -->
        <link href=" {{ asset('backend/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style"/>
        <!-- icons -->
        <link href=" {{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- Head js -->
        <script src="{{ asset('backend/assets/js/head.js') }}"></script>

    </head>

    <body class="authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-4">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">

                                <div class="text-center mb-4">
                                    <div class="auth-logo">
                                        <a href="#" class="logo logo-dark text-center">
                                            <span class="logo-lg">
                                                <img src="assets/images/logo-dark.png" alt="" height="22">
                                            </span>
                                        </a>

                                        <a href="#" class="logo logo-light text-center">
                                            <span class="logo-lg">
                                                <img src="assets/images/logo-light.png" alt="" height="22">
                                            </span>
                                        </a>
                                    </div>
                                </div>

                                <div class="text-center w-75 m-auto">
                                    <img src="{{(!empty(Auth::user()->photo))? url(Auth::user()->photo): url('backend/upload/no_image.jpg') }}" height="88" alt="user-image" class="rounded-circle shadow">
                                    <h4 class="text-dark-50 text-center mt-3">Xin chào ! {{ Auth::user()->role }} </h4>

                                </div>


                                <form action="{{ route('manager.unlock') }}" method="post">
                                @csrf
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Mật khẩu</label>
                                        <input class="form-control @error('password') is-invalid @enderror" type="password" required="" id="password" name="password" placeholder="Nhập mật khẩu đăng nhập lại">
                                    </div>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <div class="text-center d-grid">
                                        <button class="btn btn-primary" type="submit"> Đăng nhập </button>
                                    </div>

                                </form>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                        <div class="row mt-3">
                            <div class="col-12 text-center">
                                <p class="text-white-50">Phải bạn không? quay lại <a href="{{ route('manager.login') }}" class="text-white ms-1"><b>Đăng nhập</b></a></p>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <footer class="footer footer-alt">
            2010 - <script>document.write(new Date().getFullYear())</script> &copy; Shop tạo bởi<a href="" class="text-white-50">Trí Đức</a>
        </footer>

        <!-- Vendor js -->
        <script src="{{ asset('backend/assets/js/vendor.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('backend/assets/js/app.min.js') }}"></script>

    </body>
</html>
