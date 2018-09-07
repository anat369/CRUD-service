<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Тестовый сайт</title>

    <link rel="stylesheet" href="/css/admin.css">
    <style>
        table.table form
        {
            display: inline-block;
        }
        button.delete        {
            background: transparent;
            border: none;
            color: #337ab7;
            padding: 0px;
        }
    </style>

</head>

<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

    <header class="main-header">
        <!-- Logo -->
        <a href="/" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">А</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">Админ-панель</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
        </nav>
    </header>

    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->

            @include('sidebar');
        </section>
        <!-- /.sidebar -->
    </aside>


    @yield('content')

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
        </div>
    </footer>

</div>
<!-- ./wrapper -->

<script src="/js/admin.js"></script>

</body>
</html>
