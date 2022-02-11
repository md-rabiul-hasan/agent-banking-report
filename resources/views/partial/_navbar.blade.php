<nav id="js-primary-nav" class="primary-nav" role="navigation">
    <div class="nav-filter">
       <div class="position-relative">
          <input type="text" id="nav_filter_input" placeholder="Filter menu" class="form-control" tabindex="0">
          
       </div>
    </div>
    
    <ul id="js-nav-menu" class="nav-menu">
         <li class="{{ request()->is('/') ? 'active' : '' }}">
            <a href="{{ route('home') }}" title="Analytics Dashboard" data-filter-tags="application intel analytics dashboard">
                <i class="fa fa-home"></i>
                <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">Dashboard</span>
            </a>
         </li>
         @if(isset($menus))
            @foreach ($menus as $parent_menu)
                @if(count($parent_menu['submenu']) > 0)
                    <li class="{{ request()->is($parent_menu['request_url']) ? 'active' : '' }}">
                        <a href="#"   data-filter-tags="theme settings">
                            <i class="{{ $parent_menu['icon'] }}"></i>
                            <span class="nav-link-text" data-i18n="nav.theme_settings">{{ $parent_menu['title'] }}</span>
                        </a>
                        <ul class="parent_submenu">
                            @foreach($parent_menu['submenu'] as  $submenu)
                                @if(count($submenu['submenu_submenu']) > 0 )                           
                                    <li class="{{ request()->is($submenu['request_url']) ? 'active' : '' }}" >
                                        <a href="#"  data-filter-tags="utilities menu child">
                                            <i class="fal fa-dot-circle"></i>
                                            <span class="nav-link-text" data-i18n="nav.utilities_menu_child">{{ $submenu['title'] }}</span>
                                        </a>
                                        <ul class="subment_submenu">
                                            @foreach($submenu['submenu_submenu'] as $submenu_submenu)
                                            <li class="{{ request()->is($submenu_submenu['request_url']) ? 'active' : '' }}">
                                                <a href="{{ ($submenu_submenu['route'] != '') ? route($submenu_submenu['route']) : '#' }}"  data-filter-tags="utilities menu child sublevel item">
                                                    <i class="fal fa-dot-circle"></i>
                                                    <span class="nav-link-text" data-i18n="nav.utilities_menu_child_sublevel_item">{{ $submenu_submenu['title'] }}</span>
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @else
                                <li class="{{ request()->is($submenu['request_url']) ? 'active' : '' }}" >
                                    <a href="{{ ($submenu['route'] != '') ? route($submenu['route']) : '#' }}" data-filter-tags="theme settings how it works">
                                        <i class="fal fa-dot-circle"></i>
                                        <span class="nav-link-text" data-i18n="nav.theme_settings_how_it_works">{{ $submenu['title'] }}</span>
                                    </a>
                                </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                    @else 
                    <li  class="{{ request()->is($parent_menu['request_url']) ? 'active' : '' }}">
                        <a href="{{ ($parent_menu['route'] != '') ? route($parent_menu['route']) : '#' }}"  data-filter-tags="application intel analytics dashboard">
                            <i class="{{ $parent_menu['icon'] }}"></i>
                            <span class="nav-link-text" data-i18n="nav.application_intel_analytics_dashboard">{{ $parent_menu['title'] }}</span>
                        </a>
                    </li>
                @endif
            @endforeach
        @endif
    </ul>
    <div class="filter-message js-filter-message bg-success-600"></div>
 </nav>