@extends('layouts.master')
@section('title','Home Page')
@section('content')

<main id="main" class="main">

<div class="pagetitle">
  <h1>Findnoy Dashboard</h1>
  <!--<nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="index.html">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </nav>-->
</div><!-- End Page Title -->

<section class="section dashboard">
  <div class="row">

    <!-- Left side columns -->
    <div class="col-lg-12">
      <div class="row">

        <!-- Missing Person Card -->
        <div class="col-xxl-4 col-md-4">
          <div class="card info-card sales-card">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <!-- <li><a class="dropdown-item" id="today_missing_p">Today</a></li> -->
                <li><a class="dropdown-item" id="month_missing_p">This Month</a></li>
                <li><a class="dropdown-item" id="yearly_missing_p" >This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Missing Person/s <span>| This Week</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="ri-user-search-line"></i>
                </div>
                <div class="ps-3">
                  <h6 id="missing_p_text">{{isset($count_missing_persons) ? $count_missing_persons : "" }}</h6>
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Missing Person Card -->

        <!-- Missing Vehicle Card -->
        <div class="col-xxl-4 col-md-4">
          <div class="card info-card revenue-card">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <!-- <li><a class="dropdown-item" href="#">Today</a></li> -->
                <li><a class="dropdown-item" id="month_missing_v">This Month</a></li>
                <li><a class="dropdown-item" id="yearly_missing_v">This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Missing Vehicle/s <span>| This Week</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="ri-car-line"></i>
                </div>
                <div class="ps-3">
                  <h6 id="carnapped_text">{{isset($count_carnapped) ? $count_carnapped : "" }}</h6>
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Missing Vehicle Card -->

      <!-- Wanted Card -->
      <div class="col-xxl-4 col-md-4">
          <div class="card info-card sales-card">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <!-- <li><a class="dropdown-item" id="month_missing_v" >Today</a></li> -->
                <li><a class="dropdown-item" id="month_missing_w">This Month</a></li>
                <li><a class="dropdown-item" id="yearly_missing_w" >This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Wanted Person/s<span>| This Week</span></h5>

              <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                  <i class="ri-skull-2-line"></i>
                </div>
                <div class="ps-3">
                   <h6 id="wanted_text" >{{isset($count_wanted_criminals) ? $count_wanted_criminals : "" }}</h6>
                </div>
              </div>
            </div>

          </div>
        </div><!-- End Sales Card -->

        <!-- Reports -->
        <div class="col-12">
          <div class="card">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

            <div class="card-body">
              <h5 class="card-title">Reports <span>/Monthly</span></h5>

              <!-- Line Chart -->
              <div id="reportsChart"></div>

              <script>
                document.addEventListener("DOMContentLoaded", () => {
                  new ApexCharts(document.querySelector("#reportsChart"), {
                    series: [{
                      name: 'Person/s',
                      data: [31, 40, 28, 51, 42, 82, 56],
                    }, {
                      name: 'Vehicle/s',
                      data: [11, 32, 45, 32, 34, 52, 41]
                    }, {
                      name: 'Wanted',
                      data: [15, 11, 32, 18, 9, 24, 11]
                    }],
                    chart: {
                      height: 350,
                      type: 'area',
                      toolbar: {
                        show: false
                      },
                    },
                    markers: {
                      size: 4
                    },
                    colors: ['#4154f1', '#2eca6a', '#ff771d'],
                    fill: {
                      type: "gradient",
                      gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.3,
                        opacityTo: 0.4,
                        stops: [0, 90, 100]
                      }
                    },
                    dataLabels: {
                      enabled: false
                    },
                    stroke: {
                      curve: 'smooth',
                      width: 2
                    },
                    xaxis: {
                      type: 'datetime',
                      categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                    },
                    tooltip: {
                      x: {
                        format: 'dd/MM/yy HH:mm'
                      },
                    }
                  }).render();
                });
              </script>
              <!-- End Line Chart -->

            </div>

          </div>
        </div><!-- End Reports -->


        <!-- Top Selling -->
        <div class="col-12">
          <div class="card top-selling overflow-auto">

            <div class="filter">
              <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
              <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <li class="dropdown-header text-start">
                  <h6>Filter</h6>
                </li>

                <li><a class="dropdown-item" href="#">Today</a></li>
                <li><a class="dropdown-item" href="#">This Month</a></li>
                <li><a class="dropdown-item" href="#">This Year</a></li>
              </ul>
            </div>

          </div>
        </div><!-- End Top Selling -->

      </div>
    </div><!-- End Left side columns -->

    <!-- Right side columns -->
    <div class="col-lg-4">

      <!-- Recent Activity -->
      <div class="card">
        <div class="filter">
          <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
            <li class="dropdown-header text-start">
              <h6>Filter</h6>
            </li>

            <li><a class="dropdown-item" href="#">Today</a></li>
            <li><a class="dropdown-item" href="#">This Month</a></li>
            <li><a class="dropdown-item" href="#">This Year</a></li>
          </ul>
        </div>

        
      </div><!-- End Recent Activity -->
     
      <!-- News & Updates Traffic -->
    

    </div><!-- End Right side columns -->

  </div>
</section>

</main>
<!-- End #main -->
<script src="{{asset('assets/js/dashboard_police_station/dashboard_police_station.js')}}"></script>
@endsection
