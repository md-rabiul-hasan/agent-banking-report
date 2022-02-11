<?php
namespace App\Http\View\Composers;

use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class SidebarComposer{
    public function compose(View $view){
        if (Cache::has('menu_cache')){
            $json_cache_menu = Cache::get('menu_cache');
            $menus = json_decode($json_cache_menu, true);
            $view->with('menus', $menus);
        } else {
            $menus = [];
            $menu_list = DB::select(DB::raw("exec [dbo].[get_menus] :role_id"),[
                ':role_id' => Auth::user()->role_id
            ]);

            if(count($menu_list) > 0) {
                foreach($menu_list as $single_menu){
                    // parent menu
                    if($single_menu->menu_level == 1){              
                        $menus['parent_menu'][$single_menu->id] = [
                            'title'             => $single_menu->title,
                            'full_url'          => $single_menu->full_url,
                            'request_url'       => $single_menu->request_url,
                            'route'             => $single_menu->route,
                            'menu_level'        => $single_menu->menu_level,
                            'submenu_parent_id' => $single_menu->parent_id,
                            'icon'              => $single_menu->icon,
                            'submenu'           => []
                        ];
                    }
                    
                    // submenu
                    if($single_menu->menu_level == 2){
                        $menus['parent_menu'][$single_menu->parent_id]['submenu'][$single_menu->id] = [
                            'title'             => $single_menu->title,
                            'full_url'          => $single_menu->full_url,
                            'request_url'       => $single_menu->request_url,
                            'route'             => $single_menu->route,
                            'menu_level'        => $single_menu->menu_level,
                            'submenu_parent_id' => $single_menu->parent_id,
                            'icon'              => $single_menu->icon,
                            'submenu_submenu'   => []
                        ];
                    }
                    
                    if($single_menu->menu_level == 3 && $single_menu->root_parent_id!= 0 ){                
                        $menus['parent_menu'][$single_menu->root_parent_id]['submenu'][$single_menu->parent_id]['submenu_submenu'][$single_menu->id] = [
                            'title'             => $single_menu->title,
                            'full_url'          => $single_menu->full_url,
                            'request_url'       => $single_menu->request_url,
                            'route'             => $single_menu->route,
                            'menu_level'        => $single_menu->menu_level,
                            'submenu_parent_id' => $single_menu->parent_id,
                            'icon'              => $single_menu->icon
                        ];
                    }
                }
            }

            $report_menus = [];
            foreach($menus['parent_menu'] as $menu){
                $menu_title = strtolower(str_replace(" ","", $menu['title']));
                if($menu_title == "report"){
                    array_push($report_menus, $menu);
                }
            }

            
            Cache::put('menu_cache', json_encode($report_menus));
            $view->with('menus', $report_menus);
        }
        
    }


}