<div class="admin_navbar">
      @auth('admin')
    <nav class="navbar navbar-expand-lg navbar-light">
     <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
             Dashboard
        </a>

    <div class="ml-auto d-flex align-items-center">
        <span class="mr-3">
           {{ Auth::guard('admin')->user()->email }}
           
        </span>
        <a href="{{ route('admin.logout') }}" class="btn btn-danger">Logout</a>
    </div>
    @endauth
    </nav>
</div>