<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The default title of your admin panel, this goes into the title tag
    | of your page. You can override it per page with the title section
    | like so: @section('title', 'Dashboard | My Great Admin Panel')
    |
    */

    'title' => 'AdminLTE 2',

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | This logo is displayed at the upper left corner of your admin panel.
    | You can use basic HTML here if you want. The logo has also a mini
    | variant, used for the mini side bar. Make it 3 letters or so
    |
    */

    'logo' => '<b>Admin</b>LTE',

    'logo_mini' => '<b>A</b>LT',

    /*
    |--------------------------------------------------------------------------
    | Skin Color
    |--------------------------------------------------------------------------
    |
    | Choose a skin color for your admin panel. The available skin colors:
    | blue, black, purple, yellow, red, and green. Each skin also has a
    | ligth variant: blue-light, purple-light, purple-light, etc.
    |
    */

    'skin' => 'blue',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Choose a layout for your admin panel. The available layout options:
    | null, 'boxed', 'fixed', 'top-nav'. null is the default, top-nav
    | removes the sidebar and places your menu in the top navbar
    |
    */

    'layout' => null,

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Register here your dashboard, logout, login and register URLs. The
    | first two must respond to a GET request, the last two to a POST.
    | Set register_url to null if you don't want a register link.
    |
    */

    'dashboard_url' => 'home',

    'logout_url' => 'logout',

    'login_url' => 'login',

    'register_url' => 'register',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Specify your menu items to display in the left sidebar. Each menu item
    | should have a text and and a URL. You can also specify an icon from
    | Font Awesome. A string instead of an array represents a header.
    |
    */

    'menu' => [
        [
            'text' => 'Pendaftaran',
            'url' => '#',
            'submenu' => [
                [
                    'text' => 'Daftar Pendaftaran',
                    'url' => '/backend/pendaftaran'
                ],
                [
                    'text' => 'Pendaftaran Baru',
                    'url' => '/backend/pendaftaran/create'
                ],
            ]
        ],
        [
            'text' => 'Siswa',
            'url' => '/backend/siswa'
        ],
        [
            'text' => 'Guru',
            'url' => '#',
            'submenu' => [
                [
                    'text' => 'Daftar Guru',
                    'url' => '/backend/guru'
                ],
                [
                    'text' => 'Tambah Guru',
                    'url' => '/backend/guru/create'
                ],
            ]
        ],
        [
            'text' => 'Kelas',
            'url' => '#',
            'submenu' => [
                [
                    'text' => 'Daftar Kelas',
                    'url' => '/backend/kelas'
                ],
                [
                    'text' => 'Tambah Kelas',
                    'url' => '/backend/kelas/create'
                ],
            ]
        ],
        [
            'text' => 'Mata Pelajaran',
            'url' => '#',
            'submenu' => [
                [
                    'text' => 'Daftar Mata Pelajaran',
                    'url' => '/backend/matpel'
                ],
                [
                    'text' => 'Tambah Mata Pelajaran',
                    'url' => '/backend/matpel/create'
                ],
            ]
        ],
        [
            'text' => 'Jadwal',
            'url' => '#',
            'submenu' => [
                [
                    'text' => 'Daftar Jadwal',
                    'url' => '/backend/jadwal'
                ],
                [
                    'text' => 'Tambah Jadwal',
                    'url' => '/backend/jadwal/create'
                ],
            ]
        ],
    ],

];
