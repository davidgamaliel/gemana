<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
    <!-- Basic Page Needs
    ================================================== -->
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    {{-- <link href="css/app.css" rel="stylesheet"> --}}
    {{-- <link href="../css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/colors/main.css" id="colors"> --}}
    <link rel="shortcut icon" href="{{{ URL::asset('favicon.ico') }}}">
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" >
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" >
    <link rel="stylesheet" href="{{ URL::asset('css/icons.css') }}" >
    {{-- <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}" > --}}
    <link rel="stylesheet" href="{{ URL::asset('css/colors/main.css') }}" id="colors" >

     <link rel="stylesheet" href="//codeorigin.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="//codeorigin.jquery.com/ui/1.10.2/jquery-ui.min.js"></script>
    

</head>

<body>

<!-- Wrapper -->
<div id="Wrapper" class="initFront">

    <!-- Header Container
    ================================================== -->
    <header id="header-container">

        <!-- Header -->
        <div id="header">
            <div class="container">

                <!-- Left Side Content -->
                <div class="left-side">

                    <!-- Logo -->
                    <div id="logo">
                        <a href="{{ URL::route('home') }}"><img src="{{ URL::asset('images/logo.png') }}" alt=""></a>
                    </div>

                    <!-- Mobile Navigation -->
                    <div class="menu-responsive">
                        <i class="fa fa-reorder menu-trigger"></i>
                    </div>

                    <!-- Main Navigation -->
                    <nav id="navigation" class="style-1">
                        <ul id="responsive">

                        {{-- <li><a class="current" href="#">Home</a>
                            <ul>
                                <li><a href="index.html">Home 1</a></li>
                                <li><a href="index-2.html">Home 2</a></li>
                                <li><a href="index-3.html">Home 3</a></li>
                                <li><a href="index-4.html">Home 4</a></li>
                            </ul>
                        </li>

                        <li><a href="#">Listings</a>
                            <ul>
                                <li><a href="#">List Layout</a>
                                    <ul>
                                        <li><a href="listings-list-with-sidebar.html">With Sidebar</a></li>
                                        <li><a href="listings-list-full-width.html">Full Width</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Grid Layout</a>
                                    <ul>
                                        <li><a href="listings-grid-with-sidebar-1.html">With Sidebar 1</a></li>
                                        <li><a href="listings-grid-with-sidebar-2.html">With Sidebar 2</a></li>
                                        <li><a href="listings-grid-full-width.html">Full Width</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Half Screen Map</a>
                                    <ul>
                                        <li><a href="listings-half-screen-map-list.html">List Layout</a></li>
                                        <li><a href="listings-half-screen-map-grid-1.html">Grid Layout 1</a></li>
                                        <li><a href="listings-half-screen-map-grid-2.html">Grid Layout 2</a></li>
                                    </ul>
                                </li>
                                <li><a href="listings-single-page.html">Single Listing</a></li>
                            </ul>
                        </li>

                        <li><a href="#">User Panel</a>
                            <ul>
                                <li><a href="dashboard.html">Dashboard</a></li>
                                <li><a href="dashboard-messages.html">Messages</a></li>
                                <li><a href="dashboard-my-listings.html">My Listings</a></li>
                                <li><a href="dashboard-reviews.html">Reviews</a></li>
                                <li><a href="dashboard-bookmarks.html">Bookmarks</a></li>
                                <li><a href="dashboard-add-listing.html">Add Listing</a></li>
                                <li><a href="dashboard-my-profile.html">My Profile</a></li>
                                <li><a href="dashboard-invoice.html">Invoice</a></li>
                            </ul>
                        </li>

                        <li><a href="#">Pages</a>
                            <ul>
                                <li><a href="pages-blog.html">Blog</a>
                                    <ul>
                                        <li><a href="pages-blog.html">Blog</a></li>
                                        <li><a href="pages-blog-post.html">Blog Post</a></li>
                                    </ul>
                                </li>
                                <li><a href="pages-contact.html">Contact</a></li>
                                <li><a href="pages-elements.html">Elements</a></li>
                                <li><a href="pages-pricing-tables.html">Pricing Tables</a></li>
                                <li><a href="pages-typography.html">Typography</a></li>
                                <li><a href="pages-404.html">404 Page</a></li>
                                <li><a href="pages-icons.html">Icons</a></li>
                            </ul>
                        </li> --}}
                        
                    </ul>
                    </nav>
                    <div class="clearfix"></div>
                    <!-- Main Navigation / End -->

                </div>
                <!-- Left Side Content / End -->


                

            </div>
        </div>
        <!-- Header / End -->

    </header>
    <div class="header-container">
        @yield('content')
    </div>
    <!-- Footer
    ================================================== -->
    @section('footer')
    <div id="footer" class="sticky-footer">
        <!-- Main -->
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-6">
                    
                    <br><br>
                    <p>Kami merupakan kelompok yang dengan sukarela mengumpulkan dan membagikan informasi gereja dan jadwal ibadah. Kiranya aplikasi ini bisa menjadi berkat bagi sesama</p>
                </div>

                <!-- <div class="col-md-4 col-sm-6 ">
                    <h4>Helpful Links</h4>
                    <ul class="footer-links">
                        <li><a href="#">Login</a></li>
                        <li><a href="#">Sign Up</a></li>
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Add Listing</a></li>
                        <li><a href="#">Pricing</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>

                    <ul class="footer-links">
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Our Partners</a></li>
                        <li><a href="#">How It Works</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>

                <div class="col-md-3  col-sm-12">
                    <h4>Contact Us</h4>
                    <div class="text-widget">
                        <span>12345 Little Lonsdale St, Melbourne</span> <br>
                        Phone: <span>(123) 123-456 </span><br>
                        E-Mail:<span> <a href="#">office@example.com</a> </span><br>
                    </div>

                    <ul class="social-icons margin-top-20">
                        <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
                        <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
                        <li><a class="gplus" href="#"><i class="icon-gplus"></i></a></li>
                        <li><a class="vimeo" href="#"><i class="icon-vimeo"></i></a></li>
                    </ul>

                </div> -->

            </div>

            <!-- Copyright -->
<!--            <div class="row">-->
<!--                <div class="col-md-12">-->
<!--                    <div class="copyrights">© 2017 Listeo. All Rights Reserved.</div>-->
<!--                </div>-->
<!--            </div>-->

        </div>

    </div>
    @show
    <!-- Footer / End -->


    <!-- Back To Top Button -->
    <div id="backtotop"><a href="#"></a></div>


</div>
<!-- Wrapper / End -->

<style>
    .initFront {
        background-image: url("{{ URL::asset('images/back.png') }}");
    }
</style>

<!-- Scripts
================================================== -->
{{-- <script type="text/javascript" src="{{ URL::asset('js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/moment.js') }}"></script> --}}
<script type="text/javascript" src="{{ URL::asset('js/transition.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/collapse.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/bootstrap-datetimepicker.min.js') }}"></script>


</body>
    @yield('support')
</html>

