@include('sidebar.head')
<style>
  @media (max-width:425px) {
    .med {
      width: 100%;

    }

    .mod {
      margin-left: -20px;
    }
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
              <button class="btn btn-primary rounded" style="font-size: large;"><i class="bi bi-plus" style="font-size:larger; margin-right:10px; font-weight:900; "></i> Add Sale</button>
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
        <!-- <li class="nav-item dropdown">
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
        </li> -->
        <!-- Notification Icon -->
        <li class="nav-item dropdown">
          <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
            <i class="icon-bell"></i>
            <span class="count">{{ $notifications->count() }}</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
            <a class="dropdown-item py-3 border-bottom">
              <p class="mb-0 fw-medium float-start">You have {{ $notifications->count() }} new notifications </p>
              <span class="badge badge-pill badge-primary float-end">View all</span>
            </a>
            @foreach($notifications as $notification)
            <a class="dropdown-item preview-item py-3">
              <div class="preview-thumbnail">
                <i class="mdi mdi-alert m-auto text-primary"></i>
              </div>
              <div class="preview-item-content">
                <h6 class="preview-subject fw-normal text-dark mb-1">{{ $notification->reminder }}</h6>
                <p class="fw-light small-text mb-0">{{ \Carbon\Carbon::parse($notification->reminder_date)->diffForHumans() }}</p>
              </div>
            </a>
            @endforeach
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
            <a href="{{url('users')}}" class="dropdown-item"><i class="bi bi-person-add mdi mdi-calendar-check-outline text-primary me-2"></i> Add User</a>
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

        <li class="nav-item">
          <a class="nav-link" data-bs-toggle="collapse" href="#chart" aria-expanded="false" aria-controls="chart">
            <!--<i class="bi bi-cash-coin mdi mdi-chart-line mr-1"></i>-->
            <i class="bi bi-cash-coin" style="margin-right:10px; font-size:20px; font-weight:bold;"></i>
            <span class="menu-title">Transction Report</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="chart">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="">Sale </a></li>
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
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">

          <div style="display: flex; flex-wrap: wrap;">
            <div class="col-md-8 col-sm-8 grid-margin stretch-card med" style="margin-right: 20px;">
              <div class="card">
                <div class="card-body">
                  <!-- <div class="text-end">
                    <a href="#" class="btn btn-warning">Add Party </a>
                  </div> -->
                  <p class="">
                    @if(session('success'))
                  <div class="alert alert-success">
                    {{session('success')}}
                  </div>

                  @endif
                  </p>
                  <div class="text-end">
                    <div class="btn-group">
                      <!-- Main button -->

                      <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus" style="font-size: large; margin-left: -20px;"></i> <span style="margin-left: 10px;">Add Party</span> </button>
                      <!--Model -->

                      <form action="{{route('add.party')}}" method="POST">
                        @csrf
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-md">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Party Details</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <!-- Option Texts -->
                                <div id="firstStep">
                                  <div class="mb-3">
                                    <label for="partyName" class="form-label">Party Name</label>
                                    <input type="text" name="party_name" class="form-control" id="partyName" placeholder="Enter party name" required>
                                  </div>
                                  <div class="mb-3">
                                    <label for="amount" class="form-label">Phone Number</label>
                                    <input type="number" name="phone" class="form-control" id="amount" placeholder="Enter Phone Number" required>
                                  </div>
                                  <div class="mb-3">
                                    <label for="partyName" class="form-label">Email</label>
                                    <input type="text" name="email" class="form-control" id="partyName" placeholder="Enter party name" required>
                                  </div>

                                  <div class="mb-3">
                                    <label for="partyName" class="form-label">Address</label>
                                    <input type="text" name="address" class="form-control" id="partyName" placeholder="Enter party name" required>
                                  </div>
                                  <div class="mb-3">
                                    <label for="description" class="form-label">Date</label>
                                    <input type="date" name="date" class="form-control" id="description" placeholder="Enter Opening Balance" required>
                                  </div>
                                </div>
                                <p id="descriptionText" class="text-primary d-inline me-3 text-" style="cursor: pointer; font-weight:bold">Credit's & Balance</p>
                                <p id="addFieldsText" class="text-primary d-inline" style="cursor: pointer; font-weight:bold">Add Additional Fields</p>
                                <hr>

                                <!-- Description Input Field -->
                                <div id="descriptionField" style="display: none;">
                                  <div class="mb-3">
                                    <label for="description" class="form-label">Opening Balance</label>
                                    <input type="Number" name="opening_balance" class="form-control" id="description" placeholder="Enter Opening Balance">
                                  </div>



                                  <div class="form-check form-switch" style="margin-left: 40px;">
                                    <input class="form-check-input" type="checkbox" id="switchToggle" role="switch">
                                    <label class="form-check-label" for="switchToggle">Credit's Limit's</label>
                                  </div>

                                  <!-- Input Field to Show/Hide -->
                                  <div id="toggleInputField" style="display: none;">
                                    <div class="mb-3">
                                      <label for="toggleInput" class="form-label">Add Credit's Limit</label>
                                      <input type="text" name="credit_limit" class="form-control" id="toggleInput" placeholder="Enter Credit's Limit">
                                    </div>
                                  </div>
                                </div>

                                <!-- Additional Fields -->
                                <div id="additionalFields" style="display: none;">
                                  <div class="mb-3">
                                    <label for="fieldName1" class="form-label">Field 1</label>
                                    <input type="text" name="fieldone" class="form-control" id="fieldName1" placeholder="Enter field 1">
                                  </div>
                                  <div class="mb-3">
                                    <label for="fieldName2" class="form-label">Field 2</label>
                                    <input type="text" name="fieldtwo" class="form-control" id="fieldName2" placeholder="Enter field 2">
                                  </div>
                                </div>
                                <button class=" btn btn-primary"> Save </button>
                              </div>

                            </div>
                          </div>

                        </div>
                      </form>
                      <!--End-->
                      <!-- Dropdown button -->
                      <button type="button" class="btn btn-warning dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="visually-hidden">Toggle Dropdown</span>
                      </button>

                      <!-- Dropdown menu -->
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Import Excel file</a></li>

                      </ul>
                    </div>
                  </div>
                  <!-- <h4 class="card-title">Block buttons</h4> -->
                  <!-- <button type="button" class="btn btn-primary align-self-end">
                        <i class="ti-user"></i> Block buttons </button> -->

                  <div class="template-demo d-grid gap-2 mt-4">
                    <div class="row">
                      <div class="col-xl-6 col-md-6 col-sm-6 text-center mod">
                        <h4 class="">Party Name</h4>
                        @foreach($getparty as $party)
                        <h5 class="text text-secondary" style="margin-bottom:-10px;">
                          <!-- Form to handle the party name click -->
                          <form action="{{ route('party.detail') }}" method="GET" class="d-inline">
                            <input type="hidden" name="party_id" value="{{ $party->id }}">
                            <button type="submit" class="btn btn-link text-decoration-none">
                              <span style="font-weight:700"> {{ $party->party_name }} </span>
                            </button>
                          </form>
                        </h5>
                        @endforeach
                      </div>

                      <div class="col-xl-6 col-md-6 col-sm-6 text-end mde">
                        <h4 class="mb-3">Amount</h4>
                        @foreach($getparty as $party)
                        <h5 class="text text-success" style="margin-top: 18px;">
                          <span style="font-weight: 700;"> {{ $party->opening_balance ?? 0 }} </span>
                        </h5>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div style="display: block; width:100%;">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="row">
                    @if(isset($selectparty))
                    <div class="col-md-7">
                      <div class="card-body">
                        <h4 class="card-title">CASH SALE</h4>
                        <p class="card-description" style="font-size: 16px; font-weight:700">Phone:
                          <i class="fa fa-phone" aria-hidden="true"></i> <span class="text-success"> {{$selectparty->phone}} </span>
                        </p>
                        <p class="card-description" style="font-size: 16px; font-weight:700">Email:
                          <i class="fa fa-envelope" aria-hidden="true"></i> <span class="text-success"> {{$selectparty->email}} </span>
                        </p>
                        <p class="card-description" style="font-size: 16px; font-weight:700">No Credit Limit Set: Rs
                          <span class="text-success">{{$selectparty->credit_limit ?? 0}}</span>
                        </p>
                      </div>
                    </div>
                    <div class="col-md-5" style="height:50px;">
                      <div class="card-body">
                        <h2 class="card-title text-end">
                          <a> <i class="fa fa-whatsapp" aria-hidden="true" style="margin-right: 10px; color:lightgreen; font-size:larger"></i> </a>
                          <a href=""> <i class="fa fa-bell" aria-hidden="true" style="color: orange;"></i> </a>
                        </h2>
                        <p class="card-description text-center" style="font-size: 16px; margin-left:70px; font-weight:700"> Address:
                          <i class="fa fa-address-card" aria-hidden="true"></i> <span class="text-success"> {{$selectparty->address}} </span>
                        </p>
                      </div>
                    </div>


                    @else
                    <div class="col-md-7">
                      <div class="card-body">
                        <h4 class="card-title">CASH SALE</h4>
                        <p class="card-description" style="font-size: 16px; font-weight:700">Phone:
                          <i class="fa fa-phone" aria-hidden="true"></i> <span class="text-success"> </span>
                        </p>
                        <p class="card-description" style="font-size: 16px; font-weight:700">Email:
                          <i class="fa fa-envelope" aria-hidden="true"></i> <span class="text-success"> </span>
                        </p>
                        <p class="card-description" style="font-size: 16px; font-weight:700">No Credit Limit Set: Rs
                          <span class="text-success"></span>
                        </p>
                      </div>
                    </div>
                    <div class="col-md-5" style="height:50px;">
                      <div class="card-body">
                        <h2 class="card-title text-end">
                          <a> <i class="fa fa-whatsapp" aria-hidden="true" style="margin-right: 10px; color:lightgreen; font-size:larger"></i> </a>
                          <!-- <a href=""> <i class="fa fa-bell" aria-hidden="true" style="color: orange;"></i> </a> -->

                          <!-- Button to trigger modal -->
                          <!-- Button to Open Modal -->
                          <a href="#" data-bs-toggle="modal" data-bs-target="#reminderModal">
                            <i class="fa fa-bell" aria-hidden="true" style="color: orange;"></i>
                          </a>
                        </h2>
                        <p class="card-description text-center" style="font-size: 16px; margin-left:70px; font-weight:700"> Address:
                          <i class="fa fa-address-card" aria-hidden="true"></i> <span class="text-success"> </span>
                        </p>
                      </div>
                    </div>
                    @endif
                  </div>

                </div>
              </div>
              <!-- Modal -->
              <div class="modal fade" id="reminderModal" tabindex="-1" aria-labelledby="reminderModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="reminderModalLabel">Add Reminder</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('notifications.store') }}" method="POST">
                      @csrf
                      <div class="modal-body">
                        <div class="mb-3">
                          <label for="party_name" class="form-label">Party Name</label>
                          <input type="text" class="form-control" name="party_name" id="party_name" list="party_names" required>
                          <datalist id="party_names">
                            @foreach($getparty as $party)
                            <option value="{{ $party->name }}">{{ $party->name }}</option>
                            @endforeach
                          </datalist>
                        </div>
                        <div class="mb-3">
                          <label for="reminder" class="form-label">Reminder</label>
                          <input type="text" class="form-control" name="reminder" id="reminder" required>
                        </div>
                        <div class="mb-3">
                          <label for="reminder_date" class="form-label">Reminder Date</label>
                          <input type="date" class="form-control" name="reminder_date" id="reminder_date" required>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Reminder</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!--End Model-->

              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="row">
                    <div class="col-xl-12">
                      <div class="card-body">

                        <div class="card">
                          <!-- @if(isset($selectparty) && ($purchasedata ->isNotEmpty()))
                          <table class="table table-bordered table-striped data-table1" style="min-width: 100%">
                            <thead>
                              <tr>
                                <th> #</th>
                                <th>Type</th>
                                <th>Number</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Balance</th>
                              </tr>
                            </thead>
                            @foreach($purchasedata as $index => $purchase)
                            <tbody>
                              <tr>
                                <td>{{$index +1 }}</td>
                                <td>{{$purchase->status ?? 'N/A'}}</td>
                                <td>{{$purchase->phone_number ?? 'N/A'}}</td>
                                <td>{{$purchase->date ?? 'N/A'}}</td>
                                <td>{{$purchase->total ?? 'N/A'}}</td>
                                <td>{{$purchase->party->opening_balance ?? 'N/A'}}</td>
                              </tr>

                            </tbody>
                            @endforeach
                          </table>
                          @endif -->
                          @if(isset($selectparty) && ($purchasedata->isNotEmpty()))
                          <table class="table table-bordered table-striped data-table1" style="min-width: 100%">
                            <thead>
                              <tr>
                                <th> #</th>
                                <th>Type</th>
                                <th>Number</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Balance</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($purchasedata as $index => $purchase)
                              <tr>
                                <td>
                                  <span style="color: Green; font-size:large">&#x25CF;</span>
                                </td>
                                <td>{{ $purchase->status ?? 'N/A' }}</td>
                                <td>{{ $purchase->phone_number ?? 'N/A' }}</td>
                                <td>{{ $purchase->date ? $purchase->date->format('Y-m-d') : 'N/A' }}</td>
                                <td>
                                  {{-- Calculate the sum of the total from SaleItem --}}
                                  @php
                                  $total = $purchase->items->sum('total');
                                  @endphp
                                  {{ $total }}
                                </td>
                                <td>{{ $purchase->party->opening_balance ?? 'N/A' }}</td>
                              </tr>
                              @endforeach

                              @foreach($seconddata as $index => $data)
                              <tr>
                                <td>
                                  <span style="color: red; font-size:large">&#x25CF;</span>
                                </td>
                                <td>{{ $data->status ?? 'N/A' }}</td>
                                <td>{{ $data->phone_number ?? 'N/A' }}</td>
                                <td>{{ $data->date ? $data->date->format('Y-m-d') : 'N/A' }}</td>
                                <td>
                                  {{-- Calculate the sum of the total from SaleItem --}}
                                  @php
                                  $total = $data->items->sum('total');
                                  @endphp
                                  {{ $total }}
                                </td>
                                <td>{{ $data->party->opening_balance ?? 'N/A' }}</td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>

                          @else

                          <table class="table table-bordered table-striped data-table1" style="min-width: 100%">
                            <thead>
                              <tr>
                                <th> #</th>
                                <th>Type</th>
                                <th>Number</th>
                                <th>Date</th>
                                <th>Total</th>
                                <th>Balance</th>
                              </tr>
                            </thead>
                            <tbody>

                              <tr>
                                <td>
                                  <span style="color: Green; font-size:large">&#x25CF;</span>
                                </td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>

                                </td>
                                <td></td>
                              </tr>

                            </tbody>
                          </table>
                          @endif

                        </div>


                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
<script>
  document.getElementById('descriptionText').addEventListener('click', function() {
    // Toggle the visibility of the description input field
    var descriptionField = document.getElementById('descriptionField');
    descriptionField.style.display = descriptionField.style.display === 'none' ? 'block' : 'none';
  });

  document.getElementById('addFieldsText').addEventListener('click', function() {
    // Toggle the visibility of the additional input fields
    var additionalFields = document.getElementById('additionalFields');
    additionalFields.style.display = additionalFields.style.display === 'none' ? 'block' : 'none';
  });

  // Handle Switch Toggle to Show/Hide Input Field
  document.getElementById('switchToggle').addEventListener('change', function() {
    var toggleInputField = document.getElementById('toggleInputField');
    toggleInputField.style.display = this.checked ? 'block' : 'none'; // Show or hide based on switch state
  });


  const notifications = []; // Array to hold notifications

  // Function to filter the select options based on the input
  function filterParties() {
    const input = document.getElementById('partyInput').value.toLowerCase();
    const select = document.getElementById('partyName');
    const options = select.querySelectorAll('option');

    // Reset select box to show all options
    options.forEach(option => {
      option.style.display = 'none'; // Hide all options initially
      if (option.value === "") {
        option.style.display = 'block'; // Always show the first option (Select Party)
      }
    });

    // Filter options based on input
    let foundMatch = false; // Variable to track if we found a match
    options.forEach(option => {
      if (option.text.toLowerCase().includes(input) && input.trim() !== "") {
        option.style.display = 'block'; // Show matching options
        foundMatch = true; // Set foundMatch to true if a match is found
      }
    });

    // If no matches found, show a message (optional)
    if (!foundMatch) {
      console.log('No matching party names found.'); // Debugging message
    }
  }

  // Function to check reminders and display notifications
  function checkReminders() {
    const today = new Date();
    notifications.forEach(notification => {
      const reminderDate = new Date(notification.date);
      if (reminderDate.setHours(0, 0, 0, 0) === today.setHours(0, 0, 0, 0)) {
        showNotification(notification);
      }
    });
    updateNotificationCount();
  }

  function showNotification(notification) {
    const notificationList = document.getElementById('notificationList');
    notificationList.innerHTML += `
        <a class="dropdown-item preview-item py-3">
            <div class="preview-item-content">
                <h6 class="preview-subject fw-normal text-dark mb-1">Reminder: ${notification.partyName}</h6>
                <p class="fw-light small-text mb-0">Payment of ${notification.payment} is due today.</p>
            </div>
        </a>
    `;
  }

  function updateNotificationCount() {
    const count = notifications.length;
    document.getElementById('notificationCount').innerText = count;
    document.getElementById('notificationCountText').innerText = count;
  }

  // Handle form submission
  document.getElementById('reminderForm').addEventListener('submit', function(event) {
    event.preventDefault();
    const partyId = document.getElementById('partyName').value;
    const partyName = document.getElementById('partyName').options[document.getElementById('partyName').selectedIndex].text;
    const reminderDate = document.getElementById('reminderDate').value;
    const payment = document.getElementById('payment').value;

    // Push the reminder into the notifications array
    notifications.push({
      partyId,
      partyName,
      date: reminderDate,
      payment
    });

    // Close the modal
    var modal = bootstrap.Modal.getInstance(document.getElementById('reminderModal'));
    modal.hide();

    // Reset the form
    document.getElementById('reminderForm').reset();

    // Check reminders for notifications
    checkReminders();
  });
</script>

@include('sidebar.footbar')