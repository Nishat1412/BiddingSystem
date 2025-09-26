<div class="user_navbar">
     @auth('user_record')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('user.dashboard') }}">
             Dashboard
        </a>
      
        <div class="ml-auto d-flex align-items-center">
            <span class="mr-3">
                {{ Auth::guard('user_record')->user()->username }} <br>
                {{ Auth::guard('user_record')->user()->email }}
            </span>
            <a href="{{ route('logout') }}" class="btn btn-danger btn-sm">Logout</a>
        </div>
        @endauth
    </nav>
</div>
