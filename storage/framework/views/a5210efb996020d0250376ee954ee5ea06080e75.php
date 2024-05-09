
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

  <title>Art</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('js/app.js')); ?>">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('admin/dist/img/logo.ico')); ?>" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.js"></script>
  <link href="https://cdn.jsdelivr.net/timepicker.js/latest/timepicker.min.css" rel="stylesheet"/>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


  <style>

    .table-hover tbody tr:hover td, .table-hover tbody tr:hover th {
    background-color: #2995fa;

    }


    /* Extra small devices (phones, 600px and down) */
    @media  only screen and (max-width: 600px) {
      . {height: 150px;}
    }

    /* Small devices (portrait tablets and large phones, 600px and up) */
    @media  only screen and (min-width: 600px) {
      . {height: 200px;}
    }

    /* Medium devices (landscape tablets, 768px and up) */
    @media  only screen and (min-width: 768px) {
      . {height: 250px;}
    }

    /* Large devices (laptops/desktops, 992px and up) */
    @media  only screen and (min-width: 992px) {
      . {height: 400px;}
    }

    /* Extra large devices (large laptops and desktops, 1200px and up) */
    @media  only screen and (min-width: 1200px) {
      . {height: 470px;}
    }

    @media  only screen and (min-width: 1366px ) {
      . {height: 520px;}
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
  <?php echo $__env->yieldContent('nav'); ?>

  <!-- Main Sidebar Container -->
  <aside style="background-color:#A7C7E7"class="main-sidebar sidebar-light-success elevation-1" style="max-height: calc(100vh - 9rem);
      overflow-y: auto; z-index: 9999" >
    <!-- Brand Logo -->


      <center>
          <img src="<?php echo e(asset('/justnpot/images/menu/main4.png')); ?>" alt="JNP"  style ="height:100px; width:100px;">
      </center>
      <span class="brand-text font-weight-light"></span>


    <!-- Sidebar -->
    <div class="sidebar" >
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-4 pb-2 mb-3 d-flex">
        <div class="image">
          <img src="<?php echo e(asset('admin/dist/img/user.png')); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <p style="color:black">Admin</p>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">


          <!-- Dashboard -->
          <li class="nav-item ">
            <a href="/admin/dashboard" class="nav-link ">
                <i class="fa fa-tachometer fa-lg" aria-hidden="true"></i>
              <p style="color:black">
                 Dashboard
                <i class="fas  right"></i>
              </p>
            </a>

          </li>
          <!-- Dashboard -->


            <!-- Events -->
            <li class="nav-item ">
                <a href="/admin/transaction/order" class="nav-link ">
                <i class="fas fa-cart-plus fa-lg"></i>
                <p style="color:black">
                    Transactions
                    <i class="fas right"></i>
                </p>
                </a>
            </li>
            <!-- Events -->
    <!-- categories -->
    <li class="nav-item ">
        <a href="/admin/product" class="nav-link ">
            <i class="fas fa-palette fa-lg"></i>
            <p style="color:black">
                     Products
                <i class="fas right"></i>
            </p>
            </a>
        </li>
    <!-- categories -->
            <!-- Materials -->
            <li class="nav-item ">
                <a href="/admin/category" class="nav-link ">
                <i class="fa fa-book fa-lg" aria-hidden="true"></i>
                    <p style="color:black">
                       Categories
                        <i class="fas right"></i>
                    </p>
                    </a>
                </li>
            <!-- Materials -->


             <!-- customer -->
             <li class="nav-item <?php echo e((Illuminate\Support\Facades\Route::currentRouteName() == 'pending.index' || Illuminate\Support\Facades\Route::currentRouteName() == 'completed.index'|| Illuminate\Support\Facades\Route::currentRouteName() == 'approved.index' || Illuminate\Support\Facades\Route::currentRouteName() == 'declined.index'  ? 'menu-open' : '')); ?>" >

                <a href="" class="nav-link ">
                <i class="fa fa-cog fa-lg" aria-hidden="true"></i>
                  <p style="color:black">
                    New Accounts
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item ">
                      <a href="/admin/user/pending" class="nav-link <?php echo e((Illuminate\Support\Facades\Route::currentRouteName() == 'pending.index' ? 'active' : '')); ?>">
                        <i class="fas fa-user-edit nav-icon"></i>
                        <p style="<?php echo e((Illuminate\Support\Facades\Route::currentRouteName() == 'pending.index' ? 'color:black' : '')); ?>; color:black">Pending</p>
                        <?php
                        $con = new mysqli('localhost','root','','art');
                        $query = $con->query("
                            SELECT COUNT(id) as pending
                            FROM users
                            WHERE is_verified = 0
                        ");
                        $row = $query->fetch_assoc();
                        $pending = $row['pending'];

                        if ($pending > 0) {
                           ?>
                                <span class="badge bg-danger"><?php echo $pending?> </span>
                        <?php
                        } else {
                          ?>
                                <span class="badge bg-danger">0</span>
                                <?php
                        }
                    ?>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="/admin/user/approved" class="nav-link <?php echo e((Illuminate\Support\Facades\Route::currentRouteName() == 'approved.index' ? 'active' : '')); ?>">
                        <i class="fas fa-user-edit nav-icon"></i>
                        <p style="<?php echo e((Illuminate\Support\Facades\Route::currentRouteName() == 'approved.index' ? 'color:black' : '')); ?>;color:black ">Approved</p>
                        <?php
                        $con = new mysqli('localhost','root','','art');
                        $query = $con->query("
                            SELECT COUNT(id) as approved
                            FROM users
                            WHERE is_verified = 1 AND role != 1
                        ");
                        $row = $query->fetch_assoc();
                        $approved = $row['approved'];

                        if ($approved > 0) {
                           ?>
                                <span class="badge bg-info"><?php echo $approved?> </span>
                        <?php
                        } else {
                          ?>
                                <span class="badge bg-info">0</span>
                                <?php
                        }
                    ?>
                      </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/user/declined" class="nav-link <?php echo e((Illuminate\Support\Facades\Route::currentRouteName() == 'declined.index' ? 'active' : '')); ?>">
                        <i class="fas fa-user-edit nav-icon"></i>
                        <p style="<?php echo e((Illuminate\Support\Facades\Route::currentRouteName() == 'declined.index' ? 'color:black' : '')); ?>; color:black">Declined</p>
                        <?php
                        $con = new mysqli('localhost','root','','art');
                        $query = $con->query("
                            SELECT COUNT(id) as decline
                            FROM users
                            WHERE is_verified = 2
                        ");
                        $row = $query->fetch_assoc();
                        $decline = $row['decline'];

                        if ($decline > 0) {
                           ?>
                                <span class="badge bg-info"><?php echo $decline?> </span>
                        <?php
                        } else {
                          ?>
                                <span class="badge bg-info">0</span>
                                <?php
                        }
                    ?>
                        </a>
                    </li>
                </ul>
              </li>
              <!-- customer -->


            <!-- categories -->
            <li class="nav-item ">
                <a href="/admin/membership" class="nav-link ">
                <i class="fas fa-user-check" aria-hidden="true"></i>
                    <p style="color:black">
                        Memberships
                        <i class="fas right"></i>
                    </p>
                    </a>
                </li>
            <!-- categories -->

           <!-- categories -->
           <!-- <li class="nav-item ">
            <a href="/admin/career" class="nav-link ">
            <i class="fas fa-user-check" aria-hidden="true"></i>
                <p>
                    Careers
                    <i class="fas right"></i>
                </p>
                </a>
            </li> -->
        <!-- categories -->

            <!-- Transaction -->
            <!-- <li class="nav-item ">
            <a href="" class="nav-link ">
               <i class="fa fa-credit-card fa-lg" aria-hidden="true"></i>
              <p>
                Approval of Transactions
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/admin/transaction/material" class="nav-link ">
                      <i class="fa fa-book" aria-hidden="true"></i>
                    <p>Transaction 1</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/admin/transaction/event" class="nav-link">
                  <i class="fa fa-calendar " aria-hidden="true"></i>
                    <p>Transaction 2</p>
                  </a>
                </li>
            </ul>
          </li> -->
          <!-- customer -->


          <!-- customer -->
          <li class="nav-item ">
            <a href="" class="nav-link ">
            <i class="fa fa-cog fa-lg" aria-hidden="true"></i>
              <p style="color:black">
                 Manage Accounts
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/admin/client" class="nav-link ">
                    <i class="fas fa-user-edit nav-icon"></i>
                    <p style="color:black">Customer</p>
                  </a>
                </li>

                <li class="nav-item">
                    <a href="/admin/member" class="nav-link">
                    <i class="fas fa-user-edit nav-icon"></i>
                      <p style="color:black">Member</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/admin" class="nav-link">
                    <i class="fas fa-user-edit nav-icon"></i>
                      <p style="color:black">Admin</p>
                    </a>
                </li>
            </ul>
          </li>
          <!-- customer -->


            <!-- logout -->
        <li class="nav-item ">
            <a href="/logout" class="nav-link ">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p style="color:black">
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
        <?php echo $__env->yieldContent('content'); ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo e(asset('admin/plugins/jquery/jquery.min.js')); ?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo e(asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('admin/dist/js/adminlte.min.js')); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo e(asset('admin/dist/js/demo.js')); ?>"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\artisanhub\resources\views/layouts/admin.blade.php ENDPATH**/ ?>