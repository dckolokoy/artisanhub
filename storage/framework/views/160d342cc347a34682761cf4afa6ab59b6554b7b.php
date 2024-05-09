<?php $__env->startSection('nav'); ?>


<nav class="main-header  navbar-expand navbar-white navbar-light " style="padding: 27.5px !important;z-index: 1">
  <!-- Left navbar links -->
     <div class="row mx-0">
          <div class="col-sm-1">
            <a class="nav-link " data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="color: gray"></i></a>
          </div>

          <div class="col-sm-5">
            <h4 style="font-weight: bold" class="mt-1">Dashboard</h4>
          </div>




     </div>




    <!-- <li class="nav-item d-none d-sm-inline-block">
      <a href="../../index3.html" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="#" class="nav-link">Contact</a>
    </li> -->


  <!-- Right navbar links -->

</nav>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style>
    .pac-container {
    background-color: #FFF;
    z-index: 99999;
    position: fixed;
    display: inline-block;
    float: left;
}
.modal{
    z-index: 99999;
}
.modal-backdrop{
    z-index: 10;
}


.panel {
  box-shadow: 0 2px 0 rgba(0,0,0,0.05);
  border-radius: 0;
  border: 0;
  margin-bottom: 24px;
}

.panel-dark.panel-colorful {
  background-color: #FFF2E0;

  color: black;
}

.panel-danger.panel-colorful {
    background-color: #FDE2E7;

  color: black;
}

.panel-primary.panel-colorful {
    background-color: #E0F6F6;

  color: black;
}

.panel-info.panel-colorful {
    background-color: #E2F6ED;

  color: black;
}

.panel-body {
  padding: 25px 20px;
}

.panel hr {
  border-color: rgba(0,0,0,0.1);
}

.mar-btm {
  margin-bottom: 15px;
}

h2, .h2 {
  font-size: 28px;
}

.small, small {
  font-size: 85%;
}

.text-sm {
  font-size: .9em;
}

.text-thin {
  font-weight: 300;
}

.text-semibold {
  font-weight: 600;
}

  </style>

<?php

$con = new mysqli('localhost','root','','art');
$query = $con->query("
    SELECT COUNT(user_id) as user_count, date_login
    FROM `login_counts`
    GROUP BY date_login;
");

$dataPoints = [];

if ($query->num_rows > 0) {
    foreach ($query as $data) {
        $date = date_format(date_create($data['date_login']), "M d");
        $user_count = $data['user_count'];
        $dataPoints[] = [
            "y" => $user_count,
            "label" => $date
        ];
    }
} else {
    $dataPoints[] = [
        "y" => 0,
        "label" => ""
    ];
}

?>


<?php

$con = new mysqli('localhost','root','','art');
$query = $con->query("
SELECT COUNT(*) as user_count, DATE(created_at) as chat_date
FROM `chats`
GROUP BY chat_date;
");

$dataPoints2 = [];

if ($query->num_rows > 0) {
    foreach ($query as $data) {
        $date = date_format(date_create($data['chat_date']), "M d");
        $user_count = $data['user_count'];
        $dataPoints2[] = [
            "y" => $user_count,
            "label" => $date
        ];
    }
} else {
    $dataPoints2[] = [
        "y" => 0,
        "label" => ""
    ];
}

?>




<body>


<div>
        <div class="row">
            <div class="col-3">

                <div class="small-box bg-info">
                <div class="inner">
                <h3><?php echo e($user_count1); ?></h3>
                <p>Total Users</p>
                </div>
                <div class="icon">
                <i class="ion ion-bag"></i>
                </div>
                <a href="/admin/user/approved" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-3">

                <div class="small-box bg-success">
                <div class="inner">
                <h3><?php echo e($membership_count); ?></sup></h3>
          
                <p>Total Memberships</p>
                </div>
                <div class="icon">
                <i class="ion ion-stats-bars"></i>
                </div>
                <a href="/admin/membership" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-3">

                <div class="small-box bg-warning">
                <div class="inner">
                <h3><?php echo e($transaction_count); ?></h3>
                <p>Total Transactions</p>
                </div>
                <div class="icon">
                <i class="ion ion-person-add"></i>
                </div>
                <a href="/admin/transaction/order" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-3">

                <div class="small-box bg-danger">
                <div class="inner">
                <h3><?php echo e(number_format($average, 2)); ?></h3>
                <p>Average Transaction Per Month</p>
                </div>
                <div class="icon">
                <i class="ion ion-pie-graph"></i>
                </div>
                <a href="/admin/transaction/order" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-3">

                <div class="small-box bg-primary">
                <div class="inner">
                <h3><?php echo e(number_format($total_user_per_month1, 2)); ?></h3>
                <p>Average User Logins Per Day</p>
                </div>
                <div class="icon">
                <i class="ion ion-pie-graph"></i>
                </div>
              <br>
                </div>
            </div>
            <div class="col-3">

<div class="small-box bg-secondary">
<div class="inner">
<h3><?php echo e($dataMenu); ?></h3>
<p>Total Artworks Created</p>
</div>
<div class="icon">
<i class="ion ion-pie-graph"></i>
</div>

<a href="/admin/product" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>
<div class="col-3">

<div class="small-box bg-success">
<div class="inner">

<h3><?php echo e(number_format($total_sales, 2)); ?></sup></h3>
<p>Total Sales</p>
</div>
<div class="icon">
<i class="ion ion-stats-bars"></i>
</div>
<a href="/admin/membership" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
</div>
</div>

            <!-- <div class="col-3">

                <div class="small-box bg-secondary" >
                <div class="inner">
                    <?php if(empty($likes)): ?>
                    <h3>0</h3>
                <?php else: ?>
                    <?php $__currentLoopData = $likes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $like): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <h3><?php echo e($like->m_name); ?></h3>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>

                <p >Most Like Artwork</p>
                </div>
                <div class="icon">
                <i class="ion ion-pie-graph"></i>
                </div>
                <a href="/admin/product" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div> -->



        </div>




        <?php
        $con = new mysqli('localhost','root','','art');
        $month[] = '';
            $count[] = '';

        $query = $con->query("
            SELECT
            MONTHNAME(created_at) as monthname,
                COUNT(id) as count
            FROM transactions
            GROUP BY monthname
            ORDER BY MONTH(created_at) ASC

        ");

        foreach($query as $data)

        {
            $month[] = $data['monthname'];
            $count[] = $data['count'];
        }

        ?>

<br><br>
            <div class="row " >
                <div class="col">
                    <div style="width: 600px;">
                        <div id="chartContainer" style="height: 270px; width: 100%;"></div>
                    </div>
                </div>
                <div class="col">
                    <div style="width: 600px;">
                        <div id="chartContainer2" style="height: 270px; width: 100%;"></div>
                    </div>

                </div>
                <div class="col">
                    <div style="width: 600px;">
                        <div id="piechart6" style="height: 270px; width: 100%;"></div>
                    </div>

                </div>

      </div>
      <div class="row " >
      <div class="col mt-5">
                    <div style="width: 600px;">
                        <div id="piechart3" style="height: 270px; width: 100%;"></div>
                    </div>

                </div>
                <!-- <div class="col  mt-5">
                    <div style="width: 600px;">
                        <div id="piechart" style="height: 270px; width: 100%;"></div>
                    </div>

            </div> -->
                <div class="col mt-5">
                    <div style="width: 600px;">
                        <div id="piechart2" style="height: 270px; width: 100%;"></div>
                    </div>

                </div>
                <div class="col mt-5">
                    <div style="width: 600px;">
                        <div id="piechart4" style="height: 270px; width: 100%;"></div>
                    </div>
                   
            </div>



        <script>
        // === include 'setup' then 'config' above ===
        const labels = <?php echo json_encode($month) ?>;
        const data = {
        labels: labels,
        datasets: [{
        label: "Participants",
        data: <?php echo json_encode($count) ?>,
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(255, 205, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(201, 203, 207, 0.2)'
        ],
        borderColor: [
          'rgb(255, 99, 132)',
          'rgb(255, 159, 64)',
          'rgb(255, 205, 86)',
          'rgb(75, 192, 192)',
          'rgb(54, 162, 235)',
          'rgb(153, 102, 255)',
          'rgb(201, 203, 207)'
        ],
        borderWidth: 1
        }]
        };

        const config = {
        type: 'bar',
        data: data,
        options: {
        plugins: {
            legend: {
            display: false
            }
        }
        },
        };

        var myChart = new Chart(
        document.getElementById('myChart'),
        config
        );
        </script>
        </div>
  </html>


  <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

  <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAKOU_JfykYBj4kDS8ryXPSd0kxsygDcGU&libraries=places"></script>


  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>





<script>
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Number of users logins/day"
	},
	axisY: {
		title: "Number of logins"
	},
  axisX: {
		title: "Date"
	},
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Monthly Sales"
	},
	axisY: {
		title: "Sales Per Month"
	},
  axisX: {
		title: "Month"
	},
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($sales_per_month, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();

var chart2 = new CanvasJS.Chart("chartContainer2", {
	title: {
		text: "Number of chats/day"
	},
	axisY: {
		title: "Number of chats"
	},
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
	}]
});
chart2.render();


}
</script>


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Gender', 'Count'],-->
         <!--
        ]);

        var options = {
          title: 'Gender',
          titleTextStyle: {
    fontSize: 40
  }
        };
        

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script> -->
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Membership', 'Count'],
          <?php echo $chartmember; ?>
        ]);

        var options = {
          title: 'Memberships',
          titleTextStyle: {
    fontSize: 40
  }
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart4'));

        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Category', 'Count'],
          <?php echo $chartData2; ?>
        ]);

        var options = {
          title: 'Category',
          titleTextStyle: {
    fontSize: 40
  }
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
      }
    </script>
<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = new google.visualization.arrayToDataTable(<?php echo $chartData3; ?>);

        var options = {
  title: 'Most Liked Artworks',
  titleTextStyle: {
    fontSize: 40
  },
  bar: { groupWidth: "90%" },
  annotations: {
    textStyle: {
      fontSize: 14,
      color: 'black'
    }
  },
  colors: ['#3366CC', '#DC3912', '#FF9900'] // Example colors
};

        var chart = new google.visualization.ColumnChart(document.getElementById('piechart3'));

        chart.draw(data, options);
      }
    </script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = new google.visualization.arrayToDataTable(<?php echo $chartData6; ?>);

        var options = {
  title: 'Top Artworks in Sales',
  titleTextStyle: {
    fontSize: 20
 
  },
  titlePosition: 'center',
  bar: { groupWidth: "90%" },
  annotations: {
    textStyle: {
      fontSize: 14,
      color: 'black'
    }
  },
  colors: ['#3366CC', '#DC3912', '#FF9900'] // Example colors
};

        var chart = new google.visualization.ColumnChart(document.getElementById('piechart6'));

        chart.draw(data, options);
      }
    </script>

<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Art march 15 remake v3.51-uPDATED-latest\resources\views/pages\admin\dashboard\index.blade.php ENDPATH**/ ?>