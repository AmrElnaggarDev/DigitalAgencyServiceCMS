<!-- Top bar -->
<header class="topbar">
    <div class="d-flex align-items-center gap-3">
        <button onclick="toggleSidebar()" class="topbar-btn d-lg-none">
            <i class="fa-solid fa-bars"></i>
        </button>

    </div>
    <div class="d-flex align-items-center gap-3">
        <a href="{{ url('/') }}" class="btn-primary-custom">FrontEnd</a>
        <div class="position-relative" id="userDropdown">
            <button onclick="$('#userMenu').toggleClass('show')" class="user-dropdown-btn">
                <img src="images/user.jpg" >
                <span class="hidden-mobile">{{ auth('admin')->user()->name }}</span>
                <i class="fa-solid fa-chevron-down"></i>
            </button>
            <div id="userMenu" class="user-dropdown-menu">
                <a href="profile.html">
                    <i class="fa-regular fa-user"></i>Profile
                </a>
                <a href="#" class="text-danger-custom"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"style="display: none;">
                    @csrf
                </form>

            </div>
        </div>
    </div>
</header>
