<!doctype html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="author" content="John Doe">
    <meta name="description" content="">
    <meta name="keywords" content="HTML,CSS,XML,JavaScript">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>JopZ</title>

    <script src="{{ asset('js/4n2NXumNjtg5LPp6VXLlDicTUfA.js') }}"></script>
    <link rel="apple-touch-icon" href="images/apple-touch-icon.html">
    <link rel="shortcut icon" type="image/ico" href="images/favicon.html" />

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <link href="{{ asset('font-awesome-4.7.0/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    <link href="{{ asset('css/matrialize.css') }}" rel="stylesheet">

    <link href="{{ asset('owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery-ui.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <header class="header">

        <div class="header_container background-color-orange-light">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="header_content d-flex flex-row align-items-center justify-content-start">
                            <div class="logo_container">
                                <a href="#">
                                    <img src="{{ asset('imags/logo.png" class="logo-text') }}" alt="">
                                </a>
                            </div>

                            <nav class="main_nav_contaner ml-auto">

                                <ul class="main_nav">
                                    <li class="dropdown active">
                                        <a class="dropdown-toggle" data-toggle="dropdown"
                                            href="{{ route('home') }}">Home
                                            <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ route('home') }}">@lang('main.home')</a></li>
                                        </ul>
                                    </li>
                                    <li class="dropdown active"> @lang('main.lang')
                                        <span class="caret"></span>
                                        <ul class="dropdown-menu">
                                            @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                                <li>
                                                    <a class="dropdown-toggle" rel="alternate"
                                                        hreflang="{{ $localeCode }}"
                                                        href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                                        {{ $properties['native'] }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>

                                    @guest
                                        <li><a href="{{ route('login') }}">@lang('main.login')</a></li>
                                        <li><a href="{{ route('register') }}">@lang('main.register')</a></li>
                                    @endguest
                                    @auth
                                        <li class="dropdown active ">
                                            <a class="dropdown-toggle" data-toggle="dropdown"
                                                href="{{ route('users.show', Auth::user()->name) }}"> <img
                                                    src="{{ asset('files/profile/images/' . Auth::user()->image) }}"
                                                    class="rounded-circle" width="30" height="30">
                                                {{ Auth::user()->name }}
                                                <span class="caret"></span></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{ route('users.edit', Auth::user()->name) }}">
                                                        @lang('main.User Dashboard')
                                                    </a></li>
                                                <li>
                                                    <form action="{{ route('logout') }}" method="post">
                                                        @csrf
                                                        <button type="submit"
                                                            class="btn btn-sm btn-outline-dark">@lang('main.logout')</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>
                                    @endauth
                                </ul>
                                <div class=" Post-Jobs">
                                    <a href="{{ route('post_job') }}" class="">
                                        @lang('main.Post Jobs')
                                    </a>
                                </div>
                                <div class="hamburger menu_mm menu-vertical">
                                    <i class="large material-icons font-color-white menu_mm menu-vertical">menu</i>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
            <div class="menu_close_container">
                <div class="menu_close">
                    <div></div>
                    <div></div>
                </div>
            </div>
            <div class="search">
                <form action="#" class="header_search_form menu_mm">
                    <input type="search" class="search_input menu_mm" placeholder="Search" required="required">
                    <button
                        class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
                        <i class="fa fa-search menu_mm" aria-hidden="true"></i>
                    </button>
                </form>
            </div>
            <nav class="menu_nav">
                {{-- <ul class="menu_mm">
                    <li class="dropdown menu_mm">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Home
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="index.html">Home 1</a></li>
                            <li><a href="index2.html">Home 2</a></li>
                        </ul>
                    </li>
                    <li class="dropdown menu_mm">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Job
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="job_category.html">Job List</a></li>
                            <li><a href="job_detail.html">Job Detail</a></li>
                        </ul>
                    </li>
                    <li class="menu_mm"><a href="blog_page.html">Blog</a></li>
                    <li class="menu_mm"><a href="about_us.html">About</a></li>
                    <li class="menu_mm"><a href="contact.html">Contact</a></li>
                </ul> --}}
            </nav>
        </div>
    </header>


    <section id="intro">
        <div class="carousel-item active">
            <div class="carousel-background"><img src="{{ asset('imags/slider/slider1.jpg') }}" alt="">
            </div>
            <div class="carousel-container">
                <div class="carousel-content">
                    <h2 class="font-color-white">@lang('main.Find Jobs Now more Easy Way')</h2>
                    <p class="font-color-white">Lorem ipsum tempus amet conubia adipiscing fermentum viverra gravida,
                        mollis suspendisse pretium dictumst inceptos mattis euismod lorem nulla, magna duis nostra
                        sodales luctus nulla praesent fermentum a elit mollis purus aenean curabitur eleifend </p>
                    <a href="#" data-toggle="modal" data-target="#myModal"><i
                            class=" material-icons play">play_arrow</i></a>
                </div>
            </div>
        </div>
    </section>

    @php
        $categories = App\Models\Category::all();
        $companies = App\Models\Company::all();
    @endphp
    <div id="search-box">
        <div class="container search-box rounded">
            <form action="{{ route('search') }}" id="search-box_search_form_3"
                class="search-box_search_form d-flex flex-lg-row flex-column align-items-center justify-content-between ">
                <div class="d-flex flex-row align-items-center justify-content-start inline-block">
                    <span class="large material-icons search">@lang('main.search')</span>
                    <input class="search-box_search_input" placeholder="@lang('main.Search Keyword')" type="text"
                        name="name">
                    <select class="dropdown_item_select search-box_search_input" name="category_id">
                        <option>@lang('main.Select Category')</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <select class="dropdown_item_select search-box_search_input" name="company_id">
                        <option>@lang('main.Select Company')</option>
                        @foreach ($companies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="search-box_search_button rounded">@lang('main.Search Jobs')</button>
            </form>
        </div>
    </div>


    @yield('content')


    <footer id="footer" class="background-color-white">
        <div class="container">
            <div class="vertical-space-100"></div>
            {{-- <div class="row">
                <div class="col-lg-4 col-md-6 vertical-space-2">
                    <h5>About Us</h5>
                    <p class="paregraf">Tristique velit phasellus sed auctor leo eros luctus nibh fermentu ad impediet
                        rhonus dolor habitant purus velit aliquet donecurna ut in turpis faucibus</p>
                    <a href="#">
                        <i class="fa fa-facebook social-icon facebook"></i></a>
                    <a href="#">
                        <i class="fa fa-twitter social-icon twitter"></i></a>
                    <a href="#">
                        <i class="fa fa-pinterest-p social-icon pinterest-p"></i></a>
                    <a href="#">
                        <i class="fa fa-map-marker social-icon map-marker"></i></a>
                </div>
                <div class="col-lg-2 col-md-6 vertical-space-2">
                    <h5>Company</h5>
                    <div class="text">
                        <a href="#">About</a>
                        <a href="#">Support</a>
                        <a href="#">Tems</a>
                        <a href="#">Privacy</a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 vertical-space-2">
                    <h5>Supports</h5>
                    <div class="text">
                        <a href="#">About</a>
                        <a href="#">Support</a>
                        <a href="#">Tems</a>
                        <a href="#">Privacy</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 vertical-space-2">
                    <h5>Subscribe Us</h5>
                    <p>Get latest update and newsletter</p>
                    <div class="vertical-space-30"></div>
                    <form>
                        <input type="email" class="email " placeholder="Email Address " required="">
                        <span class="fa fa-envelope email-icone "></span>
                        <input type="submit" class="Subscribe" value="Subscribe">
                    </form>
                </div>
            </div> --}}
            <div class="vertical-space-60"></div>
        </div>
        <div class="container-fluid background-color-orange main-footer">
            <div class="container text-center">
                <div class="vertical-space-30"></div>
            </div>
        </div>
    </footer>


    <div class="modal" id="myModal">
        <div class="container">
            <div class="vertical-space-85"></div>
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                    <div class="modal-body">
                        <button class="button button-rounded  close" data-dismiss="modal">&times;</button>
                        <video class="" controls>
                            <source src="{{ asset('video/Pexels_Videos_2706.mp4" type="video/mp4') }}">
                        </video>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>

    <script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
