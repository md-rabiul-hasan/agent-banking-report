<header class="page-header" role="banner">
    <div class="page-logo">
       <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
       <img src="img/logo.png" alt="SmartAdmin WebApp" aria-roledescription="logo">
       <span class="page-logo-text mr-1">SmartAdmin WebApp</span>
       <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2"></span>
       <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
       </a>
    </div>
    <!-- DOC: nav menu layout change shortcut -->
    <div class="hidden-md-down dropdown-icon-menu position-relative">
       <a href="#" class="header-btn btn js-waves-off" data-action="toggle" data-class="nav-function-hidden" title="Hide Navigation">
       <i class="ni ni-menu"></i>
       </a>
       <ul>
          <li>
             <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-minify" title="Minify Navigation">
             <i class="ni ni-minify-nav"></i>
             </a>
          </li>
          <li>
             <a href="#" class="btn js-waves-off" data-action="toggle" data-class="nav-function-fixed" title="Lock Navigation">
             <i class="ni ni-lock-nav"></i>
             </a>
          </li>
       </ul>
    </div>
    <!-- DOC: mobile button appears during mobile width -->
    <div class="hidden-lg-up">
       <a href="#" class="header-btn btn press-scale-down" data-action="toggle" data-class="mobile-nav-on">
       <i class="ni ni-menu"></i>
       </a>
    </div>
    <div class="search">
       <form class="app-forms hidden-xs-down" role="search" action="page_search.html" autocomplete="off">
         <strong>
            {{ Auth::user()->name }} is accessing {{ Auth::user()->branch->branch_name }} as a {{ Auth::user()->role->name }}
          </strong>
       </form>
    </div>
    <div class="ml-auto d-flex">
       <!-- activate app search icon (mobile) -->
       <div class="hidden-sm-up">
          <a href="#" class="header-icon" data-action="toggle" data-class="mobile-search-on" data-focus="search-field" title="Search">
          <i class="fal fa-search"></i>
          </a>
       </div>
      
       <!-- app shortcuts -->

       <!-- app message -->
     
      
       <div>
          <a href="#" data-toggle="dropdown" title="drlantern@gotbootstrap.com" class="header-icon d-flex align-items-center justify-content-center ml-2">
             <img src="{{ asset('public/backend/assets/img/logo.png') }}" class="profile-image rounded-circle" alt="Dr. Codex Lantern">
          </a>
          <div class="dropdown-menu dropdown-menu-animated dropdown-lg">
             <div class="dropdown-header bg-trans-gradient d-flex flex-row py-4 rounded-top">
                <div class="d-flex flex-row align-items-center mt-1 mb-1 color-white">
                   <span class="mr-2">
                   <img src="{{ asset('public/backend/assets/img/logo.png') }}" class="rounded-circle profile-image" alt="Dr. Codex Lantern">
                   </span>
                   <div class="info-card-text">
                      <div class="fs-lg text-truncate text-truncate-lg">{{ Auth::user()->name }}</div>
                      <span class="text-truncate text-truncate-md opacity-80">{{ Auth::user()->branch->branch_name }}</span>
                   </div>
                </div>
             </div>
             
             <div class="dropdown-divider m-0"></div>
             
             <div class="dropdown-divider m-0"></div>
             <a href="#" class="dropdown-item" data-action="app-fullscreen">
             <span data-i18n="drpdwn.fullscreen">Fullscreen</span>
             <i class="float-right text-muted fw-n">F11</i>
             </a>
             <div class="dropdown-divider m-0"></div>
             <a class="dropdown-item fw-500 pt-3 pb-3" ref="{{ route('logout') }}"  onclick="event.preventDefault();
             document.getElementById('logout-form').submit();">
                
             <span data-i18n="drpdwn.page-logout">Logout</span>
             <span class="float-right fw-n">&copy;VSL-BANK</span>
             </a>
          </div>
       </div>
    </div>
 </header>

<form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
   @csrf
</form>
