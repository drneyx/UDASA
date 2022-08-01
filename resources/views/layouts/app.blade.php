<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'UDASA') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <!-- chartist CSS -->
        <link href="{{ url('assets/node_modules/morrisjs/morris.css') }}" rel="stylesheet">
        <!--Toaster Popup message CSS -->
        <link href="{{ url('assets/node_modules/toast-master/css/jquery.toast.css') }}" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="{{ url('dist/css/style.min.css') }}" rel="stylesheet">
        <!-- <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet"> -->
        <!-- Dashboard 1 Page CSS -->
        <!-- <link href="{{ url('dist/css/pages/dashboard1.css') }}" rel="stylesheet"> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <link href="{{ url('assets/node_modules/html5-editor/bootstrap-wysihtml5.css') }}" rel="stylesheet">
        <link href="{{ url('assets/node_modules/Magnific-Popup-master/dist/magnific-popup.css') }}" rel="stylesheet">

        <link href="{{ url('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">


        <link href="{{ url('css/dataTables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
        <link href="{{ url('css/dataTables/responsive.bootstrap4.min.css') }}" rel="stylesheet">

        <script src="{{ url('assets/node_modules/jquery/jquery-3.2.1.min.js') }}"></script>

        <!-- tagsinput -->
        <link href="{{ url('css/bootstrap-tagsinput.css') }}" rel="stylesheet">
        <script src="{{ url('js/bootstrap-tagsinput.js') }}"></script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script src="https://cdn.tiny.cloud/1/9kwmev7of6r1gwfblgyke70ptjc8153as3hzygkrfa2kc91n/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

        @livewireStyles

        <link rel="stylesheet" href="{{ url('css/chosen.css') }}">
        <script src="{{ url('js/chosen.jquery.js') }}"></script>

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <style>
            .err {
            border: 1px solid red;
        }
        </style>
    </head>
    <body class="font-sans antialiased skin-default-dark fixed-layout">
       
        <div id="main-wrapper">
            <!-- ============================================================== -->
            <!-- Topbar header - style you can find in pages.scss -->
            <!-- ============================================================== -->
            <header class="topbar">
                @livewire('navigation-menu')
                
            </header>
            <!-- ============================================================== -->
            <!-- End Topbar header -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <aside class="left-sidebar">
                <!-- Sidebar scroll-->
                <div class="scroll-sidebar">
                    <!-- User Profile-->
                    <div class="user-profile">
                        <div class="user-pro-body">
                            <div><img src="{{ url('front/images/udasa2.png') }}" alt="user-img" class="img- circle"></div>
                            <div class="dropdown">
                                <a href="javascript:void(0)" class="dropdown-toggle u-dropdown link hide-menu" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <!-- {{auth()->user()->name}} -->
                                <h3>UDASA</h3>
                                <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu animated flipInY">
                                
                                    <div class="dropdown-divider"></div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-jet-dropdown-link href="{{ route('logout') }}"
                                                            onclick="event.preventDefault();
                                                                        this.closest('form').submit();">
                                        <i class="fa fa-power-off"></i> {{ __('Logout') }}
                                        </x-jet-dropdown-link>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            <li class="nav-small-cap">--- MAIN MENU</li>
                            
                            <li> 
                                <a class=" waves-effect waves-dark" href="{{ url('/dashboard') }}" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a>
                            </li>
                            <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Managements</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{ url('staffs-management') }}">Staffs</a></li>
                                    <li><a href="{{ url('news') }}">News</a></li>
                                    <li><a href="{{ url('news-letters') }}">Newsletters</a></li>
                                    <li><a href="{{ url('mission-and-vision') }}">Mission&Vision</a></li>
                                    <!-- <li><a href="{{ url('objectives') }}">Objectives</a></li> -->
                                    <!-- <li><a href="app-compose.html">Compose Mail</a></li> -->
                                </ul>
                            </li>
                            <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-cog"></i><span class="hide-menu">Manage Positions</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{ url('positions-management') }}">Positions</a></li>
                                    <li><a href="{{ url('staff-categories') }}">Categories</a></li>
                                    <!-- <li><a href="app-compose.html">Compose Mail</a></li> -->
                                </ul>
                            </li>

                            <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-book fa-spin"></i><span class="hide-menu">Members Publications</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{ url('word-from-chair') }}">Messsage from Chair</a></li>
                                    <li><a href="{{ url('articles/articles-managements') }}">Articles</a></li>
                                </ul>
                            </li>

                            <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="fa fa-picture-o" aria-hidden="true"></i><span class="hide-menu">Gallery</span></a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="{{ url('gallery/manage-albums') }}">Manage Albums</a></li>
                                    <!-- <li><a href="{{ url('articles/articles-managements') }}">Articles</a></li> -->
                                </ul>
                            </li>

                        </ul>
                    </nav>
                    <!-- End Sidebar navigation -->
                </div>
                <!-- End Sidebar scroll-->
            </aside>
            <!-- ============================================================== -->
            <!-- End Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Page wrapper  -->
            <!-- ============================================================== -->
            <div class="page-wrapper">
                <!-- ============================================================== -->
                <!-- Container fluid  -->
                <!-- ============================================================== -->
                <div class="container-fluid">
                    {{ $slot }}
                </div>
                <!-- ============================================================== -->
                <!-- End Container fluid  -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Page wrapper  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
        
        </div>


        @stack('modals')

        @livewireScripts

        <!-- Bootstrap popper Core JavaScript -->
        <script src="{{ url('assets/node_modules/popper/popper.min.js') }}"></script>
        <script src="{{ url('assets/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        <!-- slimscrollbar scrollbar JavaScript -->
        <script src="{{ url('dist/js/perfect-scrollbar.jquery.min.js') }}"></script>
        <!--Wave Effects -->
        <script src="{{ url('dist/js/waves.js') }}"></script>
        <!--Menu sidebar -->
        <script src="{{ url('dist/js/sidebarmenu.js') }}"></script>
        <!--Custom JavaScript -->
        <script src="{{ url('dist/js/custom.min.js') }}"></script>
        <!-- ============================================================== -->
        <!-- This page plugins -->
        <!-- ============================================================== -->
        <!--morris JavaScript -->
        <!-- <script src="{{ url('assets/node_modules/raphael/raphael-min.js') }}"></script> -->
        <!-- <script src="{{ url('assets/node_modules/morrisjs/morris.min.js') }}"></script> -->
        <script src="{{ url('assets/node_modules/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
        <!-- Popup message jquery -->
        <script src="{{ url('assets/node_modules/toast-master/js/jquery.toast.js') }}"></script>
        <!-- Chart JS -->
        <script src="{{ url('dist/js/dashboard1.js') }}"></script>
        <script src="{{ url('assets/node_modules/toast-master/js/jquery.toast.js') }}"></script>
        <!-- jQuery peity -->
        <script src="{{ url('assets/node_modules/peity/jquery.peity.min.js') }}"></script>
        <script src="{{ url('assets/node_modules/peity/jquery.peity.init.js') }}"></script>



        <!-- This is data table -->
        <script src="{{ url('js/plugins/dataTables/datatables.min.js') }}"></script>
        <script src="{{ url('js/plugins/dataTables/dataTables.bootstrap4.min.js') }}"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap4.min.js"></script>

    
        <script>
            $(function () {
                $('.table-data').DataTable({
                    pageLength: 50,
                    responsive: true,
                    dom: '<"html5buttons"B>Tfltgip',
                    buttons: [
                        // { extend: 'copy'},
                        // {extend: 'csv'},
                        {extend: 'excel', title: 'ExampleFile'},
                        {extend: 'pdf', title: 'ExampleFile'},

                        // {extend: 'print',
                        // customize: function (win){
                        //         $(win.document.body).addClass('white-bg');
                        //         $(win.document.body).css('font-size', '10px');

                        //         $(win.document.body).find('table')
                        //                 .addClass('compact')
                        //                 .css('font-size', 'inherit');
                        // }
                        // }
                    ],
                    responsive: {
                        details: {
                            renderer: function ( api, rowIdx, columns ) {
                                var data = $.map( columns, function ( col, j ) {
                                    return col.hidden ?
                                        '<tr data-dt-row="'+col.rowIndex+'" data-dt-column="'+col.columnIndex+'">'+
                                            '<td>'+col.title+':'+'</td> '+
                                            '<td>'+col.data+'</td>'+
                                        '</tr>' :
                                        '';
                                } ).join('');
            
                                return data ?
                                    $('<table/>').append( data ) :
                                    false;
                            }
                        }
                    }
                });
            });

            $(function() {
                $(".choose").chosen({no_results_text: "Oops, nothing found!", width: '100%'});
            });
        </script>

    </body>
</html>
