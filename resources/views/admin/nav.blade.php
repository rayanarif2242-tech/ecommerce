@php
    $admin = auth('admin')->user();
@endphp

<nav
    class="layout-navbar navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">

    <div class="navbar-nav-right d-flex align-items-center px-3" id="navbar-collapse">

        <!-- Search -->
        <div class="navbar-nav align-items-center">

            <div class="nav-item d-flex align-items-center position-relative search-box">

                <i class="bx bx-search search-icon"></i>

                <input
                    type="text"
                    id="adminSearch"
                    class="form-control border-0 shadow-none search-input"
                    placeholder="Search menu..."
                    autocomplete="off">

                <span id="clearSearch" class="search-clear">&times;</span>

                <div id="searchResult" class="list-group search-result"></div>

            </div>

        </div>

        <!-- Right Navbar -->
        <ul class="navbar-nav flex-row align-items-center ms-auto">

            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">

                <a
                    class="nav-link dropdown-toggle hide-arrow"
                    href="javascript:void(0);"
                    data-bs-toggle="dropdown">

                    <div class="avatar avatar-online">

                        <img
                            src="{{ ($admin && $admin->image)
                                ? asset('uploads/admin/' . $admin->image)
                                : asset('admins/assets/img/avatars/1.png') }}"
                            alt="Profile"
                            class="w-px-40 h-auto rounded-circle">

                    </div>

                </a>

                <ul class="dropdown-menu dropdown-menu-end">

                    <li>

                        <a class="dropdown-item" href="{{ route('admin.profile') }}">

                            <div class="d-flex">

                                <div class="flex-shrink-0 me-3">

                                    <div class="avatar avatar-online">

                                        <img
                                            src="{{ ($admin && $admin->image)
                                                ? asset('uploads/admin/' . $admin->image)
                                                : asset('admins/assets/img/avatars/1.png') }}"
                                            alt="Profile"
                                            class="w-px-40 h-auto rounded-circle">

                                    </div>

                                </div>

                                <div class="flex-grow-1">

                                    <span class="fw-semibold d-block">
                                        {{ $admin ? $admin->name : 'Administrator' }}
                                    </span>

                                    <small class="text-muted">
                                        Administrator
                                    </small>

                                </div>

                            </div>

                        </a>

                    </li>

                    <li>
                        <div class="dropdown-divider"></div>
                    </li>

                    <li>

                        <a class="dropdown-item" href="{{ route('admin.profile') }}">
                            <i class="bx bx-user me-2"></i>
                            <span>My Profile</span>
                        </a>

                    </li>

                    <li>

                        <form action="{{ route('logout') }}" method="POST">

                            @csrf

                            <button
                                type="submit"
                                class="dropdown-item border-0 bg-transparent w-100 text-start">

                                <i class="bx bx-power-off me-2"></i>
                                <span>Log Out</span>

                            </button>

                        </form>

                    </li>

                </ul>

            </li>

        </ul>

    </div>

</nav>