
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm p-4">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Elearn') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                            <a class="nav-link" href="/">{{ __('Home') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/#about">{{ __('About Us') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('courses.index') }}">{{ __('Courses') }}</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/#contactus">{{ __('Contact Us') }}</a>
                        </li>
                        @guest

                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif

                        @else

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>


                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                 <a class="dropdown-item" href="{{ route('users.index') }}">{{ __('MyProfile') }}</a>
                                 @if (Auth::user()->role=='teacher')
                                 <a class="dropdown-item" href="{{ route('mycourses',Auth::user()->id) }}">{{ __('MyCourses') }}</a>
                                 @endif

                                 @if (Auth::user()->role=='student')
                                 <a class="dropdown-item" href="{{ route('students.show',Auth::user()->id)}}">{{ __('My Enrollments') }}</a>
                                 @endif

                                @if (Auth::user()->role=='student')
                                 <a class="dropdown-item" href="{{ route('students.index')}}">{{ __('Availabe Courses') }}</a>
                                 @endif


                                 <a class="dropdown-item" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                              </form>

                                </div>
                            </li>



                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

           @yield('content')
           <div class="container-fluid">
            @yield('_content')
        </div>

    </div>

    @extends('template.footer')
