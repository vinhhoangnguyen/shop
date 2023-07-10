<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->
        <div class="user-box text-center">
            <img src=" {{ asset('backend/assets/images/users/user-1.jpg')}}" alt="user-img" title="Mat Helme"
                class="rounded-circle avatar-md">
            <div class="dropdown">
                <a href="javascript: void(0);" class="text-dark dropdown-toggle h5 mt-2 mb-1 d-block"
                    data-bs-toggle="dropdown">Geneva Kennedy</a>
                <div class="dropdown-menu user-pro-dropdown">

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-user me-1"></i>
                        <span>My Account</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-settings me-1"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-lock me-1"></i>
                        <span>Lock Screen</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fe-log-out me-1"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>
            <p class="text-muted">Admin Head</p>
        </div>

        @php
            $id = Auth::user()->id;
            $data = App\Models\User::find($id);
        @endphp
        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">{{$data->role}}</li>

                <li>
                    <a href="{{  route('admin.dashboard')}}" >
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        {{-- <span class="badge bg-success rounded-pill float-end">1</span> --}}
                        <span> Bảng điều khiển </span>
                    </a>
                    {{-- <div class="collapse" id="sidebarDashboards">
                        <ul class="nav-second-level">
                            <li>
                                <a href="index.html">Dashboard 1</a>
                            </li>

                        </ul>
                    </div> --}}
                </li>




                <li>
                    <a href="#sidebarEcommerce" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span> Ecommerce </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce">
                        <ul class="nav-second-level">
                            <li>
                                <a href="ecommerce-dashboard.html">Dashboard</a>
                            </li>
                            <li>
                                <a href="ecommerce-products.html">Products</a>
                            </li>
                            <li>
                                <a href="ecommerce-product-detail.html">Product Detail</a>
                            </li>
                            <li>
                                <a href="ecommerce-product-edit.html">Add Product</a>
                            </li>
                            <li>
                                <a href="ecommerce-customers.html">Customers</a>
                            </li>
                            <li>
                                <a href="ecommerce-orders.html">Orders</a>
                            </li>
                            <li>
                                <a href="ecommerce-order-detail.html">Order Detail</a>
                            </li>
                            <li>
                                <a href="ecommerce-sellers.html">Sellers</a>
                            </li>
                            <li>
                                <a href="ecommerce-cart.html">Shopping Cart</a>
                            </li>
                            <li>
                                <a href="ecommerce-checkout.html">Checkout</a>
                            </li>
                        </ul>
                    </div>
                </li>



                <li class="menu-title mt-2">Custom</li>

                <li>
                    <a href="#sidebarAuth" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-circle-outline"></i>
                        <span> Auth Pages </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarAuth">
                        <ul class="nav-second-level">
                            <li>
                                <a href="auth-login.html">Log In</a>
                            </li>
                            <li>
                                <a href="auth-login-2.html">Log In 2</a>
                            </li>
                            <li>
                                <a href="auth-register.html">Register</a>
                            </li>
                            <li>
                                <a href="auth-register-2.html">Register 2</a>
                            </li>
                            <li>
                                <a href="auth-signin-signup.html">Signin - Signup</a>
                            </li>
                            <li>
                                <a href="auth-signin-signup-2.html">Signin - Signup 2</a>
                            </li>
                            <li>
                                <a href="auth-recoverpw.html">Recover Password</a>
                            </li>
                            <li>
                                <a href="auth-recoverpw-2.html">Recover Password 2</a>
                            </li>
                            <li>
                                <a href="auth-lock-screen.html">Lock Screen</a>
                            </li>
                            <li>
                                <a href="auth-lock-screen-2.html">Lock Screen 2</a>
                            </li>
                            <li>
                                <a href="auth-logout.html">Logout</a>
                            </li>
                            <li>
                                <a href="auth-logout-2.html">Logout 2</a>
                            </li>
                            <li>
                                <a href="auth-confirm-mail.html">Confirm Mail</a>
                            </li>
                            <li>
                                <a href="auth-confirm-mail-2.html">Confirm Mail 2</a>
                            </li>
                        </ul>
                    </div>
                </li>



                <li class="menu-title mt-2">Components</li>


                <li>
                    <a href="#sidebarExtendedui" data-bs-toggle="collapse">
                        <i class="mdi mdi-layers-outline"></i>
                        <span class="badge bg-info float-end">Hot</span>
                        <span> Extended UI </span>
                    </a>
                    <div class="collapse" id="sidebarExtendedui">
                        <ul class="nav-second-level">
                            <li>
                                <a href="extended-nestable.html">Nestable List</a>
                            </li>
                            <li>
                                <a href="extended-range-slider.html">Range Slider</a>
                            </li>
                            <li>
                                <a href="extended-dragula.html">Dragula</a>
                            </li>
                            <li>
                                <a href="extended-animation.html">Animation</a>
                            </li>
                            <li>
                                <a href="extended-sweet-alert.html">Sweet Alert</a>
                            </li>
                            <li>
                                <a href="extended-tour.html">Tour Page</a>
                            </li>
                            <li>
                                <a href="extended-scrollspy.html">Scrollspy</a>
                            </li>
                            <li>
                                <a href="extended-loading-buttons.html">Loading Buttons</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="widgets.html">
                        <i class="mdi mdi-gift-outline"></i>
                        <span> Widgets </span>
                    </a>
                </li>




            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
