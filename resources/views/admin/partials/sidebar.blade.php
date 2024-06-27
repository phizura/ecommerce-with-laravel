@php
    $contents = [
        [
            'route' => 'admin.dashboard',
            'parph' => 'Dashboard',
            'icon' => '<i class="nav-icon fas fa-tachometer-alt"></i>',
        ],
        [
            'route' => 'admin.dashboard',
            'parph' => 'Category',
            'icon' => '<i class="nav-icon fas fa-file-alt"></i>',
        ],
        [
            'route' => 'admin.dashboard',
            'parph' => 'Sub Category',
            'icon' => '<i class="nav-icon fas fa-file-alt"></i>',
        ],
        [
            'route' => 'admin.dashboard',
            'parph' => 'Brands',
            'icon' => '<svg class="h-6 nav-icon w-6 shrink-0" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16 4v12l-4-2-4 2V4M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                            </path>
                        </svg>',
        ],
        [
            'route' => 'admin.dashboard',
            'parph' => 'Products',
            'icon' => '<i class="nav-icon fas fa-tag"></i>',
        ],
        [
            'route' => 'admin.dashboard',
            'parph' => 'Shipping',
            'icon' => '<i class="fas fa-truck nav-icon"></i>',
        ],
        [
            'route' => 'admin.dashboard',
            'parph' => 'Orders',
            'icon' => '<i class="nav-icon fas fa-shopping-bag"></i>',
        ],
        [
            'route' => 'admin.dashboard',
            'parph' => 'Discount',
            'icon' => '<i class="nav-icon  fa fa-percent" aria-hidden="true"></i>',
        ],
        [
            'route' => 'admin.dashboard',
            'parph' => 'Users',
            'icon' => '<i class="nav-icon  fas fa-users"></i>',
        ],
        [
            'route' => 'admin.dashboard',
            'parph' => 'Pages',
            'icon' => '<i class="nav-icon  far fa-file-alt"></i>',
        ],
    ];
@endphp

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('admin-assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">LARAVEL SHOP</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                @foreach ($contents as $content)
                    <li class="nav-item">
                        <a href="{{ route($content['route']) }}" class="nav-link">
                            {!! $content['icon'] !!}
                            <p>{{ $content['parph'] }}</p>
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
