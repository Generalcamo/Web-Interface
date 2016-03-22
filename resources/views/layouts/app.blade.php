{{--Copyright (c) 2016 "Werner Maisl"--}}

{{--This file is part of the Aurora Webinterface--}}

{{--The Aurora Webinterface is free software: you can redistribute it and/or modify--}}
{{--it under the terms of the GNU Affero General Public License as--}}
{{--published by the Free Software Foundation, either version 3 of the--}}
{{--License, or (at your option) any later version.--}}

{{--This program is distributed in the hope that it will be useful,--}}
{{--but WITHOUT ANY WARRANTY; without even the implied warranty of--}}
{{--MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the--}}
{{--GNU Affero General Public License for more details.--}}

{{--You should have received a copy of the GNU Affero General Public License--}}
{{--along with this program. If not, see <http://www.gnu.org/licenses/>.<!DOCTYPE html>--}}
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Aurora-WI</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/css/dropdown-submenu.css')}}" rel="stylesheet">
    {{--<link href="{{asset('assets/css/fixed-footer.css')}}" rel="stylesheet">--}}
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    @yield('styles')

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    Aurora WI
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>
                    @if(Auth::check())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                User Menu <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                @can("byond_linked")
                                <li><a href="{{route('user.dashboard')}}"><i class="fa fa-btn"></i>User Dashboard</a></li>
                                <li class="disabled"><a href="#"><i class="fa fa-btn"></i>Show / Edit / Add Characters</a></li>
                                <li class="disabled"><a href="#"><i class="fa fa-btn"></i>Messaging System</a></li>
                                <li><a href="{{route('user.warnings')}}"><i class="fa fa-btn"></i>Warnings / DO Notes</a></li>
                                @else
                                    <li><a href="{{route('user.link')}}"><i class="fa fa-btn"></i>Link Byond</a></li>
                                    @endcan
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Contract Database <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{route('syndie.contracts.index')}}"><i class="fa fa-btn"></i>Show available Contracts</a></li>
                                <li><a href="{{route('syndie.contracts.add.get')}}"><i class="fa fa-btn"></i>Submit new Contract</a></li>
                                {{--<li><a href="{{route()}}"><i class="fa fa-btn"></i>Moderate Contracts</a></li>--}}
                            </ul>
                        </li>

                        @can('admin_menu_view')
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                Admin Menu <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li class="dropdown-submenu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Player</a>
                                    <ul class="dropdown-menu">
                                        <li @cannot('admin_players_show')class="disabled"@endcannot>
                                            <a href="{{route('admin.players.index')}}"><i class="fa fa-btn"></i>Players</a>
                                        </li>
                                        <li @cannot('admin_character_records_show')class="disabled"@endcannot>
                                            <a href="#"><i class="fa fa-btn"></i>Character Records <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">DO</a>
                                    <ul class="dropdown-menu">
                                        <li @cannot('admin_do_recorder_logs_show')class="disabled"@endcannot>
                                            <a href="#"><i class="fa fa-btn"></i>DO Recorder Logs <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                        </li>
                                        <li @cannot('admin_do_actions_show')class="disabled"@endcannot>
                                            <a href="#"><i class="fa fa-btn"></i>DO Actions <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Site</a>
                                    <ul class="dropdown-menu">
                                        <li @cannot('admin_site_roles_show')class="disabled"@endcannot>
                                            <a href="{{route('admin.roles.index')}}"><i class="fa fa-btn"></i>Site Roles</a>
                                        </li>
                                        <li @cannot('admin_site_permissions_show')class="disabled"@endcannot>
                                            <a href="#"><i class="fa fa-btn"></i>Site Permissions <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                        </li>
                                        <li @cannot('admin_site_logs_show')class="disabled"@endcannot>
                                            <a href="#"><i class="fa fa-btn"></i>WebSite Logs <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                        </li>
                                        <li @cannot('admin_staff_roster_show')class="disabled"@endcannot>
                                            <a href="#"><i class="fa fa-btn"></i>Staff Roster <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown-submenu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Server</a>
                                    <ul class="dropdown-menu">
                                        <li @cannot('admin_forms_show')class="disabled"@endcannot>
                                            <a href="{{route('admin.forms.index')}}"><i class="fa fa-btn"></i>Forms</a>
                                        </li>
                                        <li @cannot('admin_server_permissions_show')class="disabled"@endcannot>
                                            <a href="#"><i class="fa fa-btn"></i>Server Permissions <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                        </li>
                                        <li @cannot('admin_server_stats_show')class="disabled"@endcannot>
                                            <a href="{{route('admin.stats.index')}}"><i class="fa fa-btn"></i>Statistics <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                        </li>
                                        <li @cannot('admin_server_logs_show')class="disabled"@endcannot>
                                            <a href="#"><i class="fa fa-btn"></i>Server Logs <span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        @endcan
                    @endif
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        {{--<li><a href="{{ url('/register') }}">Register</a></li>--}}
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->username }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <div id="wrap">
        @yield('content')
    </div>


    <footer>
        <div class="footer navbar-fixed-bottom">
            <small><p class="text-muted">Aurora Webinterface &copy; 2016 by Werner Maisl - Licensed under the AGPL - Version 0.0.9</p></small>
        </div>
    </footer>

    <!-- JavaScripts -->
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    @yield('javascripts')
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>