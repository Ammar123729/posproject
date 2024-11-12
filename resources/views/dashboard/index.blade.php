@include('sidebar.head')
<style>
  .no-underline {
    text-decoration: none;
  }
</style>
<div class="container-scroller">

  <!-- partial:partials/_navbar.html -->
  <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
      <div class="me-3">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
      </div>
      <div>
        <a class="navbar-brand brand-logo" href="{{url('/dashboard')}}">
          <img src="assets/images/logo.jpg" alt="logo" style="border-radius:20px" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="{{url('/dashboard')}}">
          <img src="assets/images/logo.jpg" alt="logo" style="border-radius: 20px;" />
        </a>
      </div>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-top">
      <!-- <ul class="navbar-nav">
            <li class="nav-item fw-semibold d-none d-lg-block ms-0">
              <h1 class="welcome-text">Good Morning, <span class="text-black fw-bold">John Doe</span></h1>
              <h3 class="welcome-sub-text">Your performance summary this week </h3>
            </li>
          </ul> -->
      <ul class="navbar-nav ms-auto">
        <li class="nav-item d-none d-lg-block">
          <div id="" class="input-group">
            <a href="{{route('sale.item')}}">
              <button class="btn btn-primary rounded" style="font-size: large;"><i class="bi bi-plus" style="font-size:larger; margin-right:10px; font-weight:900; "></i> Add Sales</button>
            </a>
          </div>
        </li>
        <li class="nav-item d-none d-lg-block">
          <div id="" class="input-group">
            <a href="{{route('purchase.item')}}">
              <button class="btn btn-danger rounded" style="font-size: large;"><i class="bi bi-plus" style="font-size:larger; font-weight:900"></i> Add Purchase</button>
            </a>
          </div>

        </li>
        <li class="nav-item d-none d-lg-block">
          <div id="" class="input-group">
            <a href="{{route('return.item')}}">
              <button class="btn btn-success rounded"><i class="bi bi-plus" style="font-size:larger; font-weight:900"></i>Sale Return</button>
            </a>
          </div>

        </li>
        <li class="nav-item d-none d-lg-block">
          <div id="" class="input-group">
            <a href="{{route('purchase.item.retrun')}}">
              <button class="btn btn-success rounded"><i class="bi bi-plus" style="font-size:larger; font-weight:900"></i>Purchase Return</button>
            </a>
          </div>

        </li>
        <!-- <li class="nav-item dropdown d-none d-lg-block">
          <a class="nav-link dropdown-bordered dropdown-toggle dropdown-toggle-split" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false"> Select Category </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">
            <a class="dropdown-item py-3">
              <p class="mb-0 fw-medium float-start">Select category</p>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
              <div class="preview-item-content flex-grow py-2">
                <p class="preview-subject ellipsis fw-medium text-dark">Bootstrap Bundle </p>
                <p class="fw-light small-text mb-0">This is a Bundle featuring 16 unique dashboards</p>
              </div>
            </a>
     
          </div>
        </li> -->
        <li class="nav-item d-none d-lg-block">
          <div id="datepicker-popup" class="input-group date datepicker navbar-date-picker">
            <span class="input-group-addon input-group-prepend border-right">
              <span class="icon-calendar input-group-text calendar-icon"></span>
            </span>
            <input type="text" class="form-control">
          </div>
        </li>
        <li class="nav-item">
          <form class="search-form" action="#">
            <i class="icon-search"></i>
            <input type="search" class="form-control" placeholder="Search Here" title="Search here">
          </form>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
            <i class="icon-bell"></i>
            <span class="count"></span>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
            <a class="dropdown-item py-3 border-bottom">
              <p class="mb-0 fw-medium float-start">You have 4 new notifications </p>
              <span class="badge badge-pill badge-primary float-end">View all</span>
            </a>
            <a class="dropdown-item preview-item py-3">
              <div class="preview-thumbnail">
                <i class="mdi mdi-alert m-auto text-primary"></i>
              </div>
              <div class="preview-item-content">
                <h6 class="preview-subject fw-normal text-dark mb-1">Application Error</h6>
                <p class="fw-light small-text mb-0"> Just now </p>
              </div>
            </a>

          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link count-indicator" id="countDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="icon-mail icon-lg"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="countDropdown">
            <a class="dropdown-item py-3">
              <p class="mb-0 fw-medium float-start">You have 7 unread mails </p>
              <span class="badge badge-pill badge-primary float-end">View all</span>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item preview-item">
              <div class="preview-thumbnail">
                <img src="assets/images/faces/face10.jpg" alt="image" class="img-sm profile-pic">
              </div>
              <div class="preview-item-content flex-grow py-2">
                <p class="preview-subject ellipsis fw-medium text-dark">Marian Garner </p>
                <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
              </div>
            </a>
            <!-- <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="assets/images/faces/face12.jpg" alt="image" class="img-sm profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow py-2">
                    <p class="preview-subject ellipsis fw-medium text-dark">David Grey </p>
                    <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                  </div>
                </a> -->
            <!-- <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    <img src="assets/images/faces/face1.jpg" alt="image" class="img-sm profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow py-2">
                    <p class="preview-subject ellipsis fw-medium text-dark">Travis Jenkins </p>
                    <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                  </div>
                </a> -->
          </div>
        </li>
        <li class="nav-item dropdown d-none d-lg-block user-dropdown">
          <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
            <img class="img-xs rounded-circle" src="assets/images/faces/face8.jpg" alt="Profile image"> </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
            <div class="dropdown-header text-center">
              <img class="img-md rounded-circle" src="assets/images/faces/face8.jpg" alt="Profile image">
              <p class="mb-1 mt-3 fw-semibold">{{Auth::user()->name}}</p>
              <p class="fw-light text-muted mb-0">{{Auth::user()->email}}</p>
            </div>
            <a href="{{route('profile')}}" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
            <a href="{{url('roles')}}" class="dropdown-item"><i class="bi bi-check-circle mdi mdi-message-text-outline text-primary me-2"></i> Roles</a>
            <a href="{{url('/users')}}" class="dropdown-item"><i class="bi bi-person-add mdi mdi-calendar-check-outline text-primary me-2"></i> Add User </a>
            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i> FAQ</a>
            <form action="{{route('logout')}}" method="POST">
              @csrf
              <button type="submit" class="dropdown-item">
                <i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out
              </button>
            </form>
          </div>
        </li>
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
        <span class="mdi mdi-menu"></span>
      </button>
    </div>
  </nav>
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
        <li class="nav-item">
          <a class="nav-link" href="{{url('/dashboard')}}">
            <!-- <i class="mdi mdi-grid-large menu-icon"></i> -->
            <i class="fa fa-home menu-icon" aria-hidden="true"></i>
            <span class="menu-title">Home</span>
          </a>
        </li>
        <!-- <li class="nav-item nav-category">Parties</li> -->
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <!-- <i class="menu-icon mdi mdi-floor-plan"></i> -->
            <i class="fa fa-users menu-icon" aria-hidden="true"></i>
            <span class="menu-title">Parties</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{route('party.detail')}}">Parties Detail</a></li>
              <!-- <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li> -->
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('get.item')}}">
            <!-- <i class="menu-icon mdi mdi-card-text-outline"></i> -->
            <img src="assets/images/2 .png" class="menu-icon">
            <span class="menu-title" style="margin-left: 18px;">Items</span>
            <!-- <i class="menu-arrow"></i> -->
          </a>
          <!-- <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"><a class="nav-link" href="pages/forms/basic_elements.html">Basic Elements</a></li>
                </ul>
              </div> -->
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
            <i class="menu-icon mdi mdi-chart-line"></i>
            <span class="menu-title">Sale</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="charts">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{route('sale.inv')}}">Sale Invoice</a></li>
            </ul>
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{route('sale.payment')}}">Payment In/Out</a></li>
            </ul>
            <!-- <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="">Sale Order</a></li>
            </ul> -->
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{route('sale.retrun')}}">Sale Return</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
            <!-- <i class="menu-icon mdi mdi-table"></i> -->
            <i class="fa fa-shopping-cart menu-icon" aria-hidden="true"></i>
            <span class="menu-title">Purchase</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="tables">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{route('purchase.bill')}}">Purchase bills</a></li>
            </ul>
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{route('purchase.payment')}}">Payment In/Out</a></li>
            </ul>
            <!-- <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="">Purchase Order</a></li>
            </ul> -->
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{route('purchase.retrun')}}">Purchase Return</a></li>
            </ul>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
            <!-- <i class="menu-icon mdi mdi-layers-outline"></i> -->
            <i class="fa fa-money menu-icon"></i>
            <span class="menu-title">Cash & Bank</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="icons">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{route('bank.detail')}}">Bank Accounts</a></li>
            </ul>
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{route('cash.in.hand')}}">Cash in Hand</a></li>
            </ul>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{route('expenses')}}">
            <!-- <i class="menu-icon mdi mdi-file-document"></i> -->
            <i class="fa fa-gbp menu-icon"></i>
            <span class="menu-title">Expenses</span>
          </a>
        </li>
        <!--Transaction Reports-->
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#chart" aria-expanded="false" aria-controls="chart">
            <!--<i class="bi bi-cash-coin mdi mdi-chart-line mr-1"></i>-->
            <i class="bi bi-cash-coin" style="margin-right:10px; font-size:20px; font-weight:bold;"></i>
            <span class="menu-title">Transction Report</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="chart">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{url('saleinvreport')}}">Sale </a></li>
            </ul>
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="">Purchase</a></li>
            </ul>
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="">All Transaction</a></li>
            </ul>
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="">Profit & Loss</a></li>

            </ul>
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="">Bill Wise Profit</a>
              </li>
            </ul>
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="">Trail Balance Report</a>
              </li>
            </ul>
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="">Balance Sheet</a>
              </li>
            </ul>
          </div>
        </li>

        <!--Party Reports-->
        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#partyreport" aria-expanded="false" aria-controls="partyreport">
            <!--<i class="menu-icon mdi mdi-chart-line"></i>-->
            <i class="bi bi-person-lines-fill" style="margin-right:10px; font-size:20px; font-weight:bold;"></i>
            <span class="menu-title">Party Reports</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="partyreport">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="">Party Statement </a></li>
            </ul>
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="">Party Wiese Profit&Loss</a></li>
            </ul>
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="">All parties</a></li>
            </ul>
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="">Party Report By item</a></li>

            </ul>
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="">Sale Purchase By Party</a>
              </li>
            </ul>
          </div>
        </li>

        <!--Item Stock Report-->

        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#itemreport" aria-expanded="false" aria-controls="itemreport">
            <!--<i class="menu-icon mdi mdi-chart-line"></i>-->
            <i class="bi bi-diagram-3-fill" style="margin-right:10px; font-size:20px; font-weight:bold;"></i>
            <span class="menu-title">Item/Stock Report</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="itemreport">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="">Stock Summary </a></li>
            </ul>
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="">Item Serial Report</a></li>
            </ul>
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="">Item Report By Party</a></li>
            </ul>
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="">Item Wise Profit&Loss</a></li>

            </ul>
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="">Low Stock Summary</a>
              </li>
            </ul>
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="">Stock Detail</a>
              </li>
            </ul>
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="">Item Detailt</a>
              </li>
            </ul>
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="">Sale/Purchase Report By Item</a>
              </li>
            </ul>
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="">Item Wise Discount</a>
              </li>
            </ul>
          </div>
        </li>

        <!--Bussniess Status-->

        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#bussniess" aria-expanded="false" aria-controls="bussniess">
            <!--<i class="menu-icon mdi mdi-chart-line"></i>-->
            <i class="bi bi-briefcase-fill" style="margin-right:10px; font-size:20px; font-weight:bold;"></i>
            <span class="menu-title">Bussniess Status</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="bussniess">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="">Bank Statement</a></li>
            </ul>
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="">Discount Report</a></li>
            </ul>

          </div>
        </li>

        <!--Expenses Report-->

        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#expens" aria-expanded="false" aria-controls="expens">
            <!--<i class="menu-icon mdi mdi-chart-line"></i>-->
            <!--<i class="bi bi-briefcase-fill" style="margin-right:10px; font-size:20px; font-weight:bold;"></i>-->
            <i class="fa fa-gbp menu-icon"></i>
            <span class="menu-title">Epenses Report</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="expens">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="">Expenses</a></li>
            </ul>
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="">Expenses Item Report</a></li>
            </ul>

          </div>
        </li>
      </ul>
    </nav>
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-sm-12">
            <div class="home-tab">
              <div class="d-sm-flex align-items-center justify-content-between border-bottom">
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active ps-0" id="home-tab" data-bs-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Overview</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#audiences" role="tab" aria-selected="false">Audiences</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#demographics" role="tab" aria-selected="false">Demographics</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link border-0" id="more-tab" data-bs-toggle="tab" href="#more" role="tab" aria-selected="false">More</a>
                  </li>
                </ul>
                <div>
                  <div class="btn-wrapper">
                    <a href="#" class="btn btn-otline-dark align-items-center"><i class="icon-share"></i> Share</a>
                    <a href="#" class="btn btn-otline-dark"><i class="icon-printer"></i> Print</a>
                    <a href="#" class="btn btn-primary text-white me-0"><i class="icon-download"></i> Export</a>
                  </div>
                </div>
              </div>
              <div class="tab-content tab-content-basic">
                <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="statistics-details d-flex">
                        <div class="mx-5">
                          <p class="statistics-title " style="font-size: large;">Cash In Hand</p>
                          <h3 class="rate-percentage">{{number_format($totalcashpay, 2  )}}</h3>
                          <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>-0.5%</span></p>
                        </div>
                        <div class="mx-5">
                          <p class="statistics-title" style="font-size: large;">Credirt's</p>
                          <h3 class="rate-percentage">{{number_format($totalcreditpay, 2)}}</h3>
                          <p class="text-success d-flex"><i class="mdi mdi-menu-up"></i><span>+0.1%</span></p>
                        </div>
                        <!-- <div>
                          <p class="statistics-title">New Sessions</p>
                          <h3 class="rate-percentage">68.8</h3>
                          <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p>
                        </div> -->
                        <!-- <div class="d-none d-md-block">
                          <p class="statistics-title">Avg. Time on Site</p>
                          <h3 class="rate-percentage">2m:35s</h3>
                          <p class="text-success d-flex"><i class="mdi mdi-menu-down"></i><span>+0.8%</span></p>
                        </div> -->
                        <!-- <div class="d-none d-md-block">
                          <p class="statistics-title">New Sessions</p>
                          <h3 class="rate-percentage">68.8</h3>
                          <p class="text-danger d-flex"><i class="mdi mdi-menu-down"></i><span>68.8</span></p>
                        </div> -->

                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-8 d-flex flex-column">
                      <div class="row flex-grow">
                        <div class=" col-lg-4 col-lg-6 grid-margin stretch-card h-50 ">
                          <div class="card card-rounded">

                            <div class="card-body">
                              <div class="d-sm-flex justify-content-between align-items-start">
                                <h4 class="card-title card-title-dash">Sale</h4>
                                <div class="d-flex">


                                  <div class="mx-5">

                                    <div class="row">
                                      <div class="col-lg-6">
                                        <div class="dropdown">
                                          <button class="btn btn-light dropdown-toggle toggle-dark btn-lg mb-0 me-0"
                                            type="button"
                                            id="monthDropdown"
                                            data-bs-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false">
                                            {{ $month ? Carbon\Carbon::create()->month($month)->format('F') : 'Select Month' }} <!-- Month Button -->
                                          </button>
                                          <div class="dropdown-menu" aria-labelledby="monthDropdown">
                                            <h6 class="dropdown-header">Select Month</h6>
                                            @for ($i = 1; $i <= 12; $i++)
                                              <a class="dropdown-item"
                                              href="{{ url('/dashboard', ['month' => $i]) }}"> <!-- Month links -->
                                              {{ Carbon\Carbon::create()->month($i)->format('F') }}
                                              </a>
                                              @endfor
                                              <div class="dropdown-divider"></div>
                                              <a class="dropdown-item" href="{{ url('/dashboard', ['month' => null]) }}">Reset</a>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-lg-6">
                                        <div class="dropdown">
                                          <button class="btn btn-light dropdown-toggle toggle-dark btn-lg mb-0 me-0"
                                            type="button"
                                            id="yearDropdown"
                                            data-bs-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false">
                                            {{ $year ?? 'Select Year' }} <!-- Year Button -->
                                          </button>
                                          <div class="dropdown-menu" aria-labelledby="yearDropdown">
                                            <h6 class="dropdown-header">Select Year</h6>
                                            @for ($i = 2020; $i <= date('Y'); $i++) <!-- Adjust start year as needed -->
                                              <a class="dropdown-item"
                                                href="{{ url('/dashboard', ['year' => $i]) }}"> <!-- Year links -->
                                                {{ $i }}
                                              </a>
                                              @endfor
                                              <div class="dropdown-divider"></div>
                                              <a class="dropdown-item" href="{{ url('/dashboard', ['year' => null]) }}">Reset</a>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <br>
                                <br>
                                <!-- Display the total cash value -->



                                <!-- <div id="performanceLine-legend"></div> -->
                              </div>
                              <!-- <div class="chartjs-wrapper mt-4">
                                <canvas id="performanceLine" width=""></canvas>
                              </div> -->
                              <h3 class="mt-3">Total Sale: {{ number_format($totalcash, 2) }}</h3>
                            </div>


                          </div>
                        </div>

                        <!--Expenses-->
                        <div class=" col-lg-4 col-lg-6 grid-margin stretch-card h-50">
                          <div class="card card-rounded">
                            <div class="card-body">
                              <div class="d-sm-flex justify-content-between align-items-start">
                                <div>
                                  <h4 class="card-title card-title-dash">Expenses</h4>
                                  <h4 class="card-subtitle card-subtitle-dash" style="font-weight: 900;"> Total Expenses:-{{$expen}}</h4>
                                </div>
                                <div id="performanceLine-legend"></div>
                              </div>
                              <!-- <div class="chartjs-wrapper mt-4">
                                <canvas id="performanceLine" width=""></canvas>
                              </div> -->
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-4 d-flex flex-column">
                      <div class="row flex-grow">
                        <h3> Stock Inventory</h3>
                        <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                          <div class="card bg-primary card-rounded">

                            <div class="card-body pb-0">
                              <h4 class="card-title card-title-dash text-white mb-4">Stock Value</h4>
                              <div class="row">
                                <div class="col-sm-4">
                                  <p class="status-summary-ight-white mb-1"></p>
                                  <h2 class="text-info">{{$stockvalue}}</h2>
                                </div>
                                <div class="col-sm-8">
                                  <div class="status-summary-chart-wrapper pb-4">
                                    <canvas id="status-summary"></canvas>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-lg-12 grid-margin stretch-card">
                          <div class="card card-rounded">
                            <div class="card-body">
                              <div class="row">
                                <div class="col-lg-12">
                                  <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex">
                                      <p style="font-size:14px; font-weight:900">Low Stock Items</p>
                                    </div>
                                  </div>

                                  @if($lowStockItems->isNotEmpty())
                                  <ul>
                                    @foreach($lowStockItems as $item)
                                    <li>
                                      <strong>{{ $item->item_name }}</strong> - Quantity: {{ $item->item_quantity }}
                                    </li>
                                    @endforeach
                                  </ul>
                                  @else
                                  <p>No low stock items found.</p>
                                  @endif
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row" style="margin-top: -100px;">
                    <div class="col-lg-8 d-flex flex-column">
                      <div class="row flex-grow">
                        <div class="col-6 grid-margin stretch-card">
                          <div class="card card-rounded">
                            <div class="card-body">
                              <div class="d-sm-flex justify-content-between align-items-start">
                                <div>
                                  <h4 class="card-title card-title-dash">You Have Recive</h4>
                                  <!-- <p class="card-subtitle card-subtitle-dash">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>s -->
                                </div>

                              </div>
                              <!-- @foreach($selectdata as $data)
                              <h6 class="mt-2 text-end text-danger">
                                <span style="margin-right: 100px;"> {{$data->party->party_name}}
                                </span>
                                <span class="mx-5">
                                  {{$data->add_payment}}
                                </span>
                              </h6>

                              @endforeach -->
                              <div id="data-container">
                                @foreach($selectdata as $index => $data)
                                @if ($index < 3)
                                  <h6 class="mt-2 text-end text-danger mb-3">
                                  <span style="margin-right: 100px;">{{$data->party->party_name}}</span>
                                  <span class="mx-5">{{$data->add_payment}}</span>
                                  </h6>
                                  @endif
                                  @endforeach
                              </div>

                              @if($selectdata->count() > 3)
                              <button id="view-more" class="btn btn-link mt-3 mx-5 no-underline" style="display: block; margin-top: 10px;">
                                <a href="{{route('sale.payment')}}">View More</a>
                              </button>
                              @endif

                              <div id="additional-data" style="display: none;">
                                @foreach($selectdata as $index => $data)
                                @if ($index >= 3)
                                <h6 class="mt-2 text-end text-danger">
                                  <span style="margin-right: 100px;">{{$data->party->party_name}}</span>
                                  <span class="mx-4">{{$data->add_payment}}</span>
                                </h6>
                                @endif
                                @endforeach
                              </div>

                            </div>
                          </div>
                        </div>

                        <!--You Will PAy-->
                        <div class="col-6 grid-margin stretch-card">
                          <div class="card card-rounded">
                            <div class="card-body">
                              <div class="d-sm-flex justify-content-between align-items-start">
                                <div>
                                  <h4 class="card-title card-title-dash">You Have Pay</h4>
                                  <!-- <p class="card-subtitle card-subtitle-dash">Lorem ipsum dolor sit amet consectetur adipisicing elit</p> -->
                                </div>

                              </div>
                              <div id="data-container">
                                @foreach($purchasedata as $index => $data)
                                @if ($index < 3)
                                  <h6 class="mt-2 text-end text-danger mb-3">
                                  <span style="margin-right: 100px;">{{$data->party->party_name}}</span>
                                  <span class="mx-5">{{$data->add_payment}}</span>
                                  </h6>
                                  @endif
                                  @endforeach
                              </div>

                              @if($purchasedata->count() > 3)
                              <button id="view-mores" class="btn btn-outline-link no-underline" style="display: block; margin-top: 10px;">
                                <a href="{{route('purchase.payment')}}">View More</a>
                              </button>
                              @endif

                              <div id="additional-datas" style="display: none;">
                                @foreach($purchasedata as $index => $data)
                                @if ($index >= 3)
                                <h6 class="mt-2 text-end text-danger">
                                  <span style="margin-right: 100px;">{{$data->party->party_name}}</span>
                                  <span class="mx-5">{{$data->add_payment}}</span>
                                </h6>
                                @endif
                                @endforeach
                              </div>
                            </div>
                          </div>
                        </div>
                        <!--End-->
                      </div>
                      <!-- <div class="row flex-grow">
                        <div class="col-12 grid-margin stretch-card">
                          <div class="card card-rounded table-darkBGImg">
                            <div class="card-body">
                              <div class="col-sm-8">
                                <h3 class="text-white upgrade-info mb-0"> Enhance your <span class="fw-bold">Campaign</span> for better outreach </h3>
                                <a href="#" class="btn btn-info upgrade-btn">Upgrade Account!</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div> -->
                      <!-- <div class="row flex-grow">
                        <div class="col-12 grid-margin stretch-card">
                          <div class="card card-rounded">
                            <div class="card-body">
                              <div class="d-sm-flex justify-content-between align-items-start">
                                <div>
                                  <h4 class="card-title card-title-dash">Pending Requests</h4>
                                  <p class="card-subtitle card-subtitle-dash">You have 50+ new requests</p>
                                </div>
                                <div>
                                  <button class="btn btn-primary btn-lg text-white mb-0 me-0" type="button"><i class="mdi mdi-account-plus"></i>Add new member</button>
                                </div>
                              </div>
                              <div class="table-responsive  mt-1">
                                <table class="table select-table">
                                  <thead>
                                    <tr>
                                      <th>
                                        <div class="form-check form-check-flat mt-0">
                                          <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" aria-checked="false" id="check-all"><i class="input-helper"></i></label>
                                        </div>
                                      </th>
                                      <th>Customer</th>
                                      <th>Company</th>
                                      <th>Progress</th>
                                      <th>Status</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <tr>
                                      <td>
                                        <div class="form-check form-check-flat mt-0">
                                          <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                        </div>
                                      </td>
                                      <td>
                                        <div class="d-flex ">
                                          <img src="assets/images/faces/face1.jpg" alt="">
                                          <div>
                                            <h6>Brandon Washington</h6>
                                            <p>Head admin</p>
                                          </div>
                                        </div>
                                      </td>
                                      <td>
                                        <h6>Company name 1</h6>
                                        <p>company type</p>
                                      </td>
                                      <td>
                                        <div>
                                          <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                            <p class="text-success">79%</p>
                                            <p>85/162</p>
                                          </div>
                                          <div class="progress progress-md">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 85%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                        </div>
                                      </td>
                                      <td>
                                        <div class="badge badge-opacity-warning">In progress</div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <div class="form-check form-check-flat mt-0">
                                          <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                        </div>
                                      </td>
                                      <td>
                                        <div class="d-flex">
                                          <img src="assets/images/faces/face2.jpg" alt="">
                                          <div>
                                            <h6>Laura Brooks</h6>
                                            <p>Head admin</p>
                                          </div>
                                        </div>
                                      </td>
                                      <td>
                                        <h6>Company name 1</h6>
                                        <p>company type</p>
                                      </td>
                                      <td>
                                        <div>
                                          <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                            <p class="text-success">65%</p>
                                            <p>85/162</p>
                                          </div>
                                          <div class="progress progress-md">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                        </div>
                                      </td>
                                      <td>
                                        <div class="badge badge-opacity-warning">In progress</div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <div class="form-check form-check-flat mt-0">
                                          <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                        </div>
                                      </td>
                                      <td>
                                        <div class="d-flex">
                                          <img src="assets/images/faces/face3.jpg" alt="">
                                          <div>
                                            <h6>Wayne Murphy</h6>
                                            <p>Head admin</p>
                                          </div>
                                        </div>
                                      </td>
                                      <td>
                                        <h6>Company name 1</h6>
                                        <p>company type</p>
                                      </td>
                                      <td>
                                        <div>
                                          <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                            <p class="text-success">65%</p>
                                            <p>85/162</p>
                                          </div>
                                          <div class="progress progress-md">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 38%" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                        </div>
                                      </td>
                                      <td>
                                        <div class="badge badge-opacity-warning">In progress</div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <div class="form-check form-check-flat mt-0">
                                          <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                        </div>
                                      </td>
                                      <td>
                                        <div class="d-flex">
                                          <img src="assets/images/faces/face4.jpg" alt="">
                                          <div>
                                            <h6>Matthew Bailey</h6>
                                            <p>Head admin</p>
                                          </div>
                                        </div>
                                      </td>
                                      <td>
                                        <h6>Company name 1</h6>
                                        <p>company type</p>
                                      </td>
                                      <td>
                                        <div>
                                          <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                            <p class="text-success">65%</p>
                                            <p>85/162</p>
                                          </div>
                                          <div class="progress progress-md">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                        </div>
                                      </td>
                                      <td>
                                        <div class="badge badge-opacity-danger">Pending</div>
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>
                                        <div class="form-check form-check-flat mt-0">
                                          <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" aria-checked="false"><i class="input-helper"></i></label>
                                        </div>
                                      </td>
                                      <td>
                                        <div class="d-flex">
                                          <img src="assets/images/faces/face5.jpg" alt="">
                                          <div>
                                            <h6>Katherine Butler</h6>
                                            <p>Head admin</p>
                                          </div>
                                        </div>
                                      </td>
                                      <td>
                                        <h6>Company name 1</h6>
                                        <p>company type</p>
                                      </td>
                                      <td>
                                        <div>
                                          <div class="d-flex justify-content-between align-items-center mb-1 max-width-progress-wrap">
                                            <p class="text-success">65%</p>
                                            <p>85/162</p>
                                          </div>
                                          <div class="progress progress-md">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                          </div>
                                        </div>
                                      </td>
                                      <td>
                                        <div class="badge badge-opacity-success">Completed</div>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div> -->
                      <!-- <div class="row flex-grow">
                        <div class="col-md-6 col-lg-6 grid-margin stretch-card">
                          <div class="card card-rounded">
                            <div class="card-body card-rounded">
                              <h4 class="card-title  card-title-dash">Recent Events</h4>
                              <div class="list align-items-center border-bottom py-2">
                                <div class="wrapper w-100">
                                  <p class="mb-2 fw-medium"> Change in Directors </p>
                                  <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                      <i class="mdi mdi-calendar text-muted me-1"></i>
                                      <p class="mb-0 text-small text-muted">Mar 14, 2019</p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="list align-items-center border-bottom py-2">
                                <div class="wrapper w-100">
                                  <p class="mb-2 fw-medium"> Other Events </p>
                                  <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                      <i class="mdi mdi-calendar text-muted me-1"></i>
                                      <p class="mb-0 text-small text-muted">Mar 14, 2019</p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="list align-items-center border-bottom py-2">
                                <div class="wrapper w-100">
                                  <p class="mb-2 fw-medium"> Quarterly Report </p>
                                  <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                      <i class="mdi mdi-calendar text-muted me-1"></i>
                                      <p class="mb-0 text-small text-muted">Mar 14, 2019</p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="list align-items-center border-bottom py-2">
                                <div class="wrapper w-100">
                                  <p class="mb-2 fw-medium"> Change in Directors </p>
                                  <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center">
                                      <i class="mdi mdi-calendar text-muted me-1"></i>
                                      <p class="mb-0 text-small text-muted">Mar 14, 2019</p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="list align-items-center pt-3">
                                <div class="wrapper w-100">
                                  <p class="mb-0">
                                    <a href="#" class="fw-bold text-primary">Show all <i class="mdi mdi-arrow-right ms-2"></i></a>
                                  </p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6 col-lg-6 grid-margin stretch-card">
                          <div class="card card-rounded">
                            <div class="card-body">
                              <div class="d-flex align-items-center justify-content-between mb-3">
                                <h4 class="card-title card-title-dash">Activities</h4>
                                <p class="mb-0">20 finished, 5 remaining</p>
                              </div>
                              <ul class="bullet-line-list">
                                <li>
                                  <div class="d-flex justify-content-between">
                                    <div><span class="text-light-green">Ben Tossell</span> assign you a task</div>
                                    <p>Just now</p>
                                  </div>
                                </li>
                                <li>
                                  <div class="d-flex justify-content-between">
                                    <div><span class="text-light-green">Oliver Noah</span> assign you a task</div>
                                    <p>1h</p>
                                  </div>
                                </li>
                                <li>
                                  <div class="d-flex justify-content-between">
                                    <div><span class="text-light-green">Jack William</span> assign you a task</div>
                                    <p>1h</p>
                                  </div>
                                </li>
                                <li>
                                  <div class="d-flex justify-content-between">
                                    <div><span class="text-light-green">Leo Lucas</span> assign you a task</div>
                                    <p>1h</p>
                                  </div>
                                </li>
                                <li>
                                  <div class="d-flex justify-content-between">
                                    <div><span class="text-light-green">Thomas Henry</span> assign you a task</div>
                                    <p>1h</p>
                                  </div>
                                </li>
                                <li>
                                  <div class="d-flex justify-content-between">
                                    <div><span class="text-light-green">Ben Tossell</span> assign you a task</div>
                                    <p>1h</p>
                                  </div>
                                </li>
                                <li>
                                  <div class="d-flex justify-content-between">
                                    <div><span class="text-light-green">Ben Tossell</span> assign you a task</div>
                                    <p>1h</p>
                                  </div>
                                </li>
                              </ul>
                              <div class="list align-items-center pt-3">
                                <div class="wrapper w-100">
                                  <p class="mb-0">
                                    <a href="#" class="fw-bold text-primary">Show all <i class="mdi mdi-arrow-right ms-2"></i></a>
                                  </p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div> -->
                    </div>


                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script>
        document.getElementById('view-more').addEventListener('click', function() {
          var additionalData = document.getElementById('additional-data');
          if (additionalData.style.display === 'none') {
            additionalData.style.display = 'block';
            this.style.display = 'none'; // Hide the "View More" button after clicking
          }
        });

        document.getElementById('view-mores').addEventListener('click', function() {
          var additionalData = document.getElementById('additional-datas');
          if (additionalData.style.display === 'none') {
            additionalData.style.display = 'block';
            this.style.display = 'none'; // Hide the "View More" button after clicking
          }
        });
      </script>
      @include('sidebar.footbar')