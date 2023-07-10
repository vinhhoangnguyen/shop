@extends('frontend.layout.master')

@section('content')

    @include('frontend.home.home_slider')
    <!--End hero slider-->


    @include('frontend.home.featured_category')
    <!--End category slider-->


    @include('frontend.home.banner')
    <!--End banners-->




    @include('frontend.home.new_product')
    <!--Products Tabs-->




    @include('frontend.home.featured_product')
    <!--End Featured Product-->


    <!-- TV Category -->


    @include('frontend.home.tv_category')

    <!--End TV Category -->



    <!-- Tshirt Category -->


    @include('frontend.home.tshirt_category')
    <!--End Tshirt Category -->



    <!-- Computer Category -->


    @include('frontend.home.computer_category')

    <!--End Computer Category -->




    @include('frontend.home.hot_deal')

    <!--End 4 columns: HOT DEAL....-->


    <!--Vendor List -->


    @include('frontend.home.vendor')
    <!--End Vendor List -->

@endsection

