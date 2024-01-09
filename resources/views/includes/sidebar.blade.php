<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
        Real<span>Estate</span>
        </a>
        <div class="sidebar-toggler not-active">
        <span></span>
        <span></span>
        <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
        <li class="nav-item nav-category">Main</li>
        <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item nav-category">Property</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#property" role="button" aria-expanded="false" aria-controls="property">
                <i class="link-icon" data-feather="mail"></i>
                <span class="link-title">Property Types</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="property">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                    <a href="{{route('all.type')}}" class="nav-link">All Type</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{route('add.type.form')}}" class="nav-link">Add Type</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">Amenity</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#amenity" role="button" aria-expanded="false" aria-controls="amenity">
                <i class="link-icon" data-feather="mail"></i>
                <span class="link-title">Amenity</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="amenity">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                    <a href="{{route('all.amenities')}}" class="nav-link">All Amenities</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{route('add.amenity')}}" class="nav-link">Add Amenity</a>
                    </li>
                </ul>
            </div>
        </li>
        {{-- <li class="nav-item">
            <a href="{{asset('pages/apps/chat.html')}}" class="nav-link">
            <i class="link-icon" data-feather="message-square"></i>
            <span class="link-title">Chat</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{asset('pages/apps/calendar.html')}}" class="nav-link">
            <i class="link-icon" data-feather="calendar"></i>
            <span class="link-title">Calendar</span>
            </a>
        </li> --}}
        <li class="nav-item nav-category">Roles & Permissions</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
                <i class="link-icon" data-feather="feather"></i>
                <span class="link-title">Roles & Permissions</span>
                <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="uiComponents">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                        <a href="{{route('all.permissions')}}" class="nav-link">Permissions</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('all.roles')}}" class="nav-link">Roles</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item nav-category">Docs</li>
        <li class="nav-item">
            <a href="https://www.nobleui.com/html/documentation/docs.html" target="_blank" class="nav-link">
            <i class="link-icon" data-feather="hash"></i>
            <span class="link-title">Documentation</span>
            </a>
        </li>
        </ul>
    </div>
</nav>