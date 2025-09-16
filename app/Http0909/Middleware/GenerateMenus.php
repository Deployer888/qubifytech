<?php

namespace App\Http\Middleware;

use Closure;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        \Menu::make('admin_sidebar', function ($menu) {
            /**
             * Dashboard
             */ 
            $menu->add('<i class="nav-icon fa-solid fa-cubes"></i> '.__('Dashboard'), [
                'route' => 'backend.dashboard',
                'class' => 'nav-item',
            ])->data([
                'order' => 1,
                'activematches' => 'admin/dashboard*',
            ])->link->attr([
                'class' => 'nav-link',
            ]);


            /**
             * Separator: Access Management
             */ 
            // $menu->add(__('Management'), [
            //     'class' => 'nav-title',
            // ])->data([
            //     'order' => 50,
            //     'permission' => ['edit_settings', 'view_backups', 'view_users', 'view_roles', 'view_logs'],
            // ]);

            /**
             * Dynamic Content
             */ 
            $dynamicContentMenu = $menu->add('<i class="nav-icon fas fa-edit"></i> '.__('Dynamic Content'), [
                'class' => 'nav-group',
            ])->data([
                'order' => 60,
                'activematches' => [
                    'admin/homepage*',
                    'admin/aboutpage*',
                    'admin/contactpage*',
                ],
            ]);
            $dynamicContentMenu->link->attr([
                'class' => 'nav-link nav-group-toggle',
                'href' => '#',
            ]);
            
            // Submenu: Homepage Management
            $dynamicContentMenu->add('<i class="nav-icon fas fa-home"></i> '.__('Home Page'), [
                'route' => 'homepage.index',
                'class' => 'nav-item',
            ])->data([
                'order' => 61,
                'activematches' => 'admin/homepage*',
            ])->link->attr([
                'class' => 'nav-link',
            ]);

            // Submenu: About Page Management
            $dynamicContentMenu->add('<i class="nav-icon fas fa-info-circle"></i> '.__('About Page'), [
                'route' => 'aboutpage.index',
                'class' => 'nav-item',
            ])->data([
                'order' => 62,
                'activematches' => 'admin/aboutpage*',
            ])->link->attr([
                'class' => 'nav-link',
            ]);

            // Submenu: Contact Page Management
            $dynamicContentMenu->add('<i class="nav-icon fas fa-envelope"></i> '.__('Contact Page'), [
                'route' => 'contactpage.index',
                'class' => 'nav-item',
            ])->data([
                'order' => 63,
                'activematches' => 'admin/contactpage*',
            ])->link->attr([
                'class' => 'nav-link',
            ]);
            // Submenu: Contact Page Management
            $dynamicContentMenu->add('<i class="nav-icon fa-solid fa-building"></i> '.__('Company policies'), [
                'route' => 'companyPolicy.index',
                'class' => 'nav-item',
            ])->data([
                'order' => 64,
                'activematches' => 'admin/company-policy*',
            ])->link->attr([
                'class' => 'nav-link',
            ]);

         // ================================
// New Parent: Services Management
// ================================
$servicesMenu = $dynamicContentMenu->add('<i class="nav-icon fas fa-cogs"></i> '.__('Services'), [
    'class' => 'nav-group',
])->data([
    'order' => 64,
    'activematches' => [
        'admin/services*',
    ],
]);

$servicesMenu->link->attr([
    'class' => 'nav-link nav-group-toggle',
    'href'  => '#',
]);

// Submenu: Services Overview
$servicesMenu->add('<i class="nav-icon fas fa-briefcase"></i> '.__('Services'), [
    'route' => 'servicespage.index',
    'class' => 'nav-item',
])->data([
    'order' => 1,
    'activematches' => 'admin/services/overview*',
])->link->attr([
    'class' => 'nav-link',
]);

// Submenu: Web Development
$servicesMenu->add('<i class="nav-icon fas fa-globe"></i> '.__('Web Development'), [
    'route' => 'service.webDevelopment.index',
    'class' => 'nav-item',
])->data([
    'order' => 2,
    'activematches' => 'admin/services/web*',
])->link->attr([
    'class' => 'nav-link',
]);

// Submenu: Software Development
$servicesMenu->add('<i class="nav-icon fas fa-desktop"></i> '.__('Software Development'), [
    'route' => 'service.softwareDevelopment.index',
    'class' => 'nav-item',
])->data([
    'order' => 3,
    'activematches' => 'admin/services/software*',
])->link->attr([
    'class' => 'nav-link',
]);

// Submenu: Web App Development
$servicesMenu->add('<i class="nav-icon fas fa-window-restore"></i> '.__('Web App Development'), [
    'route' => 'service.webAppDevelopment.index',
    'class' => 'nav-item',
])->data([
    'order' => 4,
    'activematches' => 'admin/services/webapp*',
])->link->attr([
    'class' => 'nav-link',
]);

// Submenu: Mobile App Development
$servicesMenu->add('<i class="nav-icon fas fa-mobile-alt"></i> '.__('Mobile App Development'), [
    'route' => 'service.mobileAppDevelopment.index',
    'class' => 'nav-item',
])->data([
    'order' => 5,
    'activematches' => 'admin/services/mobile*',
])->link->attr([
    'class' => 'nav-link',
]);

// Submenu: MVP Development
$servicesMenu->add('<i class="nav-icon fas fa-rocket"></i> '.__('MVP Development'), [
    'route' => 'admin.mvp-development.index',
    'class' => 'nav-item',
])->data([
    'order' => 6,
    'activematches' => 'admin/services/mvp*',
])->link->attr([
    'class' => 'nav-link',
]);
           // ================================
// New Parent: Solutions Management
// ================================
$solutionMenu = $dynamicContentMenu->add('<i class="nav-icon fas fa-cog"></i> '.__('Solutions'), [
    'class' => 'nav-group',
])->data([
    'order' => 67,
    'activematches' => [
        'admin/services*',
    ],
]);

$solutionMenu->link->attr([
    'class' => 'nav-link nav-group-toggle',
    'href'  => '#',
]);

// Submenu: HRMS Development
$solutionMenu->add('<i class="nav-icon fas fa-users"></i> '.__('HRMS Development'), [
    'route' => 'admin.hrms-development.index',
    'class' => 'nav-item',
])->data([
    'order' => 1,
])->link->attr([
    'class' => 'nav-link',
]);

// Submenu: CRM Development
$solutionMenu->add('<i class="nav-icon fas fa-handshake"></i> '.__('CRM Development'), [
    'route' => 'admin.crm-development.index',
    'class' => 'nav-item',
])->data([
    'order' => 2,
])->link->attr([
    'class' => 'nav-link',
]);

// Submenu: VMS Development
$solutionMenu->add('<i class="nav-icon fas fa-truck"></i> '.__('VMS Development'), [
    'route' => 'admin.vms-development.index',
    'class' => 'nav-item',
])->data([
    'order' => 3,
])->link->attr([
    'class' => 'nav-link',
]);

// Submenu: HIS Development
$solutionMenu->add('<i class="nav-icon fas fa-hospital"></i> '.__('HIS Development'), [
    'route' => 'admin.his-development.index',
    'class' => 'nav-item',
])->data([
    'order' => 4,
])->link->attr([
    'class' => 'nav-link',
]);

// Submenu: POS Development
$solutionMenu->add('<i class="nav-icon fas fa-cash-register"></i> '.__('POS Development'), [
    'route' => 'admin.pos-development.index',
    'class' => 'nav-item',
])->data([
    'order' => 5,
])->link->attr([
    'class' => 'nav-link',
]);

// Submenu: VPS Development
$solutionMenu->add('<i class="nav-icon fas fa-server"></i> '.__('VPS Development'), [
    'route' => 'admin.vps-development.index',
    'class' => 'nav-item',
])->data([
    'order' => 6,
])->link->attr([
    'class' => 'nav-link',
]);

// Submenu: VTS Development
$solutionMenu->add('<i class="nav-icon fas fa-map-marked-alt"></i> '.__('VTS Development'), [
    'route' => 'admin.vts-development.index',
    'class' => 'nav-item',
])->data([
    'order' => 7,
])->link->attr([
    'class' => 'nav-link',
]);

// Submenu: On-Demand Development
$solutionMenu->add('<i class="nav-icon fas fa-mobile-alt"></i> '.__('On-Demand Development'), [
    'route' => 'admin.on-demand-development.index',
    'class' => 'nav-item',
])->data([
    'order' => 8,
])->link->attr([
    'class' => 'nav-link',
]);



            /**
             * Settings
             */ 
            $menu->add('<i class="nav-icon fas fa-cogs"></i> '.__('Settings'), [
                'route' => 'backend.settings',
                'class' => 'nav-item',
            ])->data([
                'order' => 70,
                'activematches' => 'admin/settings*',
                'permission' => ['edit_settings'],
            ])->link->attr([
                'class' => 'nav-link',
            ]);

            /**
             * Access Control
             */ 
            $accessControl = $menu->add('<i class="nav-icon fa-solid fa-user-gear"></i> '.__('Access Control'), [
                'class' => 'nav-group',
            ])->data([
                'order' => 80,
                'activematches' => [
                    'admin/users*',
                    'admin/roles*',
                ],
                'permission' => ['view_users', 'view_roles'],
            ]);
            $accessControl->link->attr([
                'class' => 'nav-link nav-group-toggle',
                'href' => '#',
            ]);
            // Submenu: Users
            $accessControl->add('<i class="nav-icon fa-solid fa-user-group"></i> '.__('Users'), [
                'route' => 'backend.users.index',
                'class' => 'nav-item',
            ])->data([
                'order' => 81,
                'activematches' => 'admin/users*',
                'permission' => ['view_users'],
            ])->link->attr([
                'class' => 'nav-link',
            ]);
            // Submenu: Roles
            $accessControl->add('<i class="nav-icon fa-solid fa-user-shield"></i> '.__('Roles'), [
                'route' => 'backend.roles.index',
                'class' => 'nav-item',
            ])->data([
                'order' => 82,
                'activematches' => 'admin/roles*',
                'permission' => ['view_roles'],
            ])->link->attr([
                'class' => 'nav-link',
            ]);

            /**
             * Notifications
             */ 
            /* $menu->add('<i class="nav-icon fas fa-bell"></i> '.__('Notifications'), [
                'route' => 'backend.notifications.index',
                'class' => 'nav-item',
            ])->data([
                'order' => 90,
                'activematches' => 'admin/notifications*',
                'permission' => [],
            ])->link->attr([
                'class' => 'nav-link',
            ]); */

            /**
             * Backup
             */ 
            /* $menu->add('<i class="nav-icon fas fa-archive"></i> '.__('Backups'), [
                'route' => 'backend.backups.index',
                'class' => 'nav-item',
            ])->data([
                'order' => 100,
                'activematches' => 'admin/backups*',
                'permission' => ['view_backups'],
            ])->link->attr([
                'class' => 'nav-link',
            ]); */

            /**
             * Log Viewer
             */ 
            /* $accessControl = $menu->add('<i class="nav-icon fa-solid fa-list-check"></i> '.__('Log Viewer'), [
                'class' => 'nav-group',
            ])->data([
                'order' => 110,
                'activematches' => [
                    'log-viewer*',
                ],
                'permission' => ['view_logs'],
            ]);
            $accessControl->link->attr([
                'class' => 'nav-link nav-group-toggle',
                'href' => '#',
            ]);
            // Submenu: Log Viewer Dashboard
            $accessControl->add('<i class="nav-icon fa-solid fa-list"></i> '.__('Logs dashboard'), [
                'route' => 'log-viewer::dashboard',
                'class' => 'nav-item',
            ])->data([
                'order' => 111,
                'activematches' => 'admin/log-viewer',
            ])->link->attr([
                'class' => 'nav-link',
            ]);
            // Submenu: Log Viewer Logs by Days
            $accessControl->add('<i class="nav-icon fa-solid fa-list-ol"></i> '.__('Logs by Days'), [
                'route' => 'log-viewer::logs.list',
                'class' => 'nav-item',
            ])->data([
                'order' => 112,
                'activematches' => 'admin/log-viewer/logs*',
            ])->link->attr([
                'class' => 'nav-link',
            ]); */

            /**
             * Access Permission Check
             */
            $menu->filter(function ($item) {
                if ($item->data('permission')) {
                    if (auth()->check()) {
                        if (auth()->user()->hasRole('super admin')) {
                            return true;
                        }
                        if (auth()->user()->hasAnyPermission($item->data('permission'))) {
                            return true;
                        }
                    }

                    return false;
                }

                return true;
            });

            /**
             * Set Active Menu
             */
            $menu->filter(function ($item) {
                if ($item->activematches) {
                    $activematches = is_string($item->activematches) ? [$item->activematches] : $item->activematches;
                    foreach ($activematches as $pattern) {
                        if (request()->is($pattern)) {
                            $item->active();
                            $item->link->active();
                            if ($item->hasParent()) {
                                $item->parent()->active();
                            }
                        }
                    }
                }

                return true;
            });
        })->sortBy('order');

        return $next($request);
    }
}