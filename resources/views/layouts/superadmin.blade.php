
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  Art</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <link rel="stylesheet" href="{{ asset('js/app.js') }}">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('admin/dist/img/logo.ico') }}" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
  <link href="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">



  <style>

    .table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
    background-color: #2995fa;

    }


    /* Extra small devices (phones, 600px and down) */
    @media only screen and (max-width: 600px) {
      .tablesizes {height: 150px;}
    }

    /* Small devices (portrait tablets and large phones, 600px and up) */
    @media only screen and (min-width: 600px) {
      .tablesizes {height: 200px;}
    }

    /* Medium devices (landscape tablets, 768px and up) */
    @media only screen and (min-width: 768px) {
      .tablesizes {height: 250px;}
    }

    /* Large devices (laptops/desktops, 992px and up) */
    @media only screen and (min-width: 992px) {
      .tablesizes {height: 400px;}
    }

    /* Extra large devices (large laptops and desktops, 1200px and up) */
    @media only screen and (min-width: 1200px) {
      .tablesizes {height: 470px;}
    }

    @media only screen and (min-width: 1366px ) {
      .tablesizes {height: 520px;}
    }
    p{
        font-size: 14px;
        color: white;
    }


    .modal-xl {
    width: 90%;
   max-width:1200px;


  }
</style>

</head>
<body class="hold-transition sidebar-mini" >
<div class="wrapper">
  <!-- Navbar -->
  @yield('nav')

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-1" style="max-height: calc(100vh - 9rem);
      overflow-y: auto; z-index: 9999" >
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link" >

      <center>
          <img src="{{ asset('admin/dist/img/logo.png') }}" alt="JNP"  style ="height:70px; width:80px;">
      </center>
      <span class="brand-text font-weight-light"></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" >
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-4 pb-2 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('admin/dist/img/user.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <p style="color:white">Admin</p>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Dashboard -->
          <li class="nav-item ">
            <a href="/dashboard" class="nav-link ">
                <i class="fa fa-tachometer fa-lg" aria-hidden="true"></i>
              <p>
                 Dashboard
                <i class="fas  right"></i>
              </p>
            </a>

          </li>
          <!-- Dashboard -->


            <!-- Events -->
            <li class="nav-item ">
                <a href="/admin/event" class="nav-link ">
                   <i class="fa fa-calendar fa-lg" aria-hidden="true"></i>
                <p>
                    Events
                    <i class="fas right"></i>
                </p>
                </a>
            </li>
            <!-- Events -->

            <!-- Materials -->
            <li class="nav-item ">
                <a href="/admin/material" class="nav-link ">
                <i class="fa fa-book fa-lg" aria-hidden="true"></i>
                    <p>
                        Materials
                        <i class="fas right"></i>
                    </p>
                    </a>
                </li>
            <!-- Materials -->

                <!-- categories -->
                <li class="nav-item ">
                <a href="/admin/category" class="nav-link ">
                <i class="fa fa-sitemap fa-lg" aria-hidden="true"></i>
                    <p>
                        Category
                        <i class="fas right"></i>
                    </p>
                    </a>
                </li>
            <!-- categories -->




            <!-- Transaction -->
            <li class="nav-item ">
            <a href="" class="nav-link ">
               <i class="fa fa-credit-card fa-lg" aria-hidden="true"></i>
              <p>
                Transactions
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/admin/transaction/material" class="nav-link ">
                      <i class="fa fa-book" aria-hidden="true"></i>
                    <p>Materials</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/admin/transaction/event" class="nav-link">
                  <i class="fa fa-calendar " aria-hidden="true"></i>
                    <p>Events</p>
                  </a>
                </li>
            </ul>
          </li>
          <!-- customer -->


          <!-- customer -->
          <li class="nav-item ">
            <a href="" class="nav-link ">
            <i class="fa fa-cog fa-lg" aria-hidden="true"></i>
              <p>
                 Accounts
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/invoice" class="nav-link ">
                    <i class="fas fa-user-edit nav-icon"></i>
                    <p>User</p>
                  </a>
                </li>
                <li class="nav-item">
                    <a href="../tables/data.html" class="nav-link">
                    <i class="fas fa-user-edit nav-icon"></i>
                      <p>Admin</p>
                    </a>
                </li>
            </ul>
          </li>
          <!-- customer -->


            <!-- logout -->
        <li class="nav-item ">
            <a href="/logout" class="nav-link ">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
                <i class="fas right"></i>
              </p>
            </a>

          </li>
          <!-- logout -->

                      <!-- SMS Burst -->

          <!-- SMS Burst -->


      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header" style="padding-top: 1px !important;
   margin: 0 !important;">
      <div class="container-fluid">
        <!-- <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Simple Tables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Simple Tables</li>
            </ol>
          </div>
        </div> -->
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
        @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  {{-- <footer class="main-footer ">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; by Filsotech Inc Powered by <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer> --}}

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('admin/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin/dist/js/demo.js') }}"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

</body>
</html>
