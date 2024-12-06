@include('sidebar.head')
<style>
  .modal-backdrop {
    z-index: 1040 !important;
  }

  .modal {
    z-index: 1050 !important;
  }

  @media (max-width:768px) {
    .adj {
      flex-wrap: wrap;
    }
  }

  @media (max-width:1024px) {
    .adj {
      flex-wrap: wrap;
    }
  }

  @media (max-width:425px) {
    .med {
      width: 115%;

    }

    .mod {
      /* margin-left: -100px; */
      width: 50%;
    }

    .mde {
      /* margin-top: -100px; */
      width: 50%;
    }
  }
</style>
<div class="container-scroller">

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
            <!-- <a class="dropdown-item preview-item py-3">
                  <div class="preview-thumbnail">
                    <i class="mdi mdi-lock-outline m-auto text-primary"></i>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject fw-normal text-dark mb-1">Settings</h6>
                    <p class="fw-light small-text mb-0"> Private message </p>
                  </div>
                </a> -->
            <!-- <a class="dropdown-item preview-item py-3">
                  <div class="preview-thumbnail">
                    <i class="mdi mdi-airballoon m-auto text-primary"></i>
                  </div>
                  <div class="preview-item-content">
                    <h6 class="preview-subject fw-normal text-dark mb-1">New user registration</h6>
                    <p class="fw-light small-text mb-0"> 2 days ago </p>
                  </div>
                </a> -->
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
              <p class="mb-1 mt-3 fw-semibold">Allen Moreno</p>
              <p class="fw-light text-muted mb-0">allenmoreno@gmail.com</p>
            </div>
            <a href="{{route('profile')}}" class="dropdown-item"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile <span class="badge badge-pill badge-danger">1</span></a>
            <a href="{{url('roles')}}" class="dropdown-item"><i class="bi bi-check-circle mdi mdi-message-text-outline text-primary me-2"></i> Roles</a>
            <a href="{{url('users')}}" class="dropdown-item"><i class="bi bi-person-add mdi mdi-calendar-check-outline text-primary me-2"></i> Add User</a>
            <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-help-circle-outline text-primary me-2"></i> FAQ</a>
            <!-- <a class="dropdown-item"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a> -->
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
              <li class="nav-item"> <a class="nav-link" href="{{url('saleinvreport')}}">Sale </a></li>
            </ul>
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{url('purchasereport')}}">Purchase</a></li>
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
              <li class="nav-item"> <a class="nav-link" href="{{url('partystatement')}}">Party Statement </a></li>
            </ul>
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="">Party Wiese Profit&Loss</a></li>
            </ul>
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="{{url('allparty')}}">All parties</a></li>
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

          <div style="display: flex; " class="adj">
            <div class="col-xl-4 col-md-12 col-sm-12 grid-margin stretch-card" style="margin-right: 20px;">
              <div class="card">
                <div class="card-body">
                  <!-- <div class="text-end">
    <a href="#" class="btn btn-warning">Add Party </a>
</div> -->
                  <div class="text-end">
                    <div class="btn-group">
                      <!-- Main button -->
                      <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target=""><i class="bi bi-plus" style="font-size: large; margin-left: -20px;"></i> <span style="margin-left: 10px;"> <a href="{{route('item.page')}}"> Add Item </a> </span> </button>

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
                        <h4 class="mb-3"> Item Name</h4>
                        @foreach($getallitem as $allitem)
                        <h5 class="text text-secondary" style="margin-bottom:-12px;">

                          <form action="{{ route('get.item') }}" method="GET" class="d-inline">
                            <input type="hidden" name="item_id" value="{{ $allitem->id }}">
                            <button type="submit" class="btn btn-link text-decoration-none">
                              <span style="font-weight:700"> {{$allitem->item_name ?? 0 }} </span>
                            </button>
                          </form>
                        </h5>
                        @endforeach
                      </div>
                      <div class="col-xl-6 col-md-6 col-sm-6 text-end mde">
                        <h4 class="mb-3"> Quantity</h4>
                        @foreach($getallitem as $allitem)
                        <h5 class="text text-success mb-3"> {{$allitem->item_quantity ?? 0}}</h5>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div style="display: block;">
              <div class="col-md-12 grid-margin stretch-card" style="width: 99%;">
                <div class="card">
                  <div class="row">
                    @if(isset($selectitem))
                    <div class="col-md-4">
                      <div class="card-body">
                        <h4 class="card-title">Item Name</h4>
                        <p class="card-description">Sale Price: <i class="fa fa-money" aria-hidden="true"></i> <span class="text-success"> {{$selectitem->item_saleprice ?? 0}} </span></p>
                        <p class="card-description">Puchase Price: <i class="fa fa-money" aria-hidden="true"></i> <span class="text-success"> {{$selectitem->item_purchaseprice ?? 0}} </span> </p>

                        <div class="template-demo d-flex justify-content-between flex-nowrap">
                        </div>

                      </div>
                    </div>
                    <div class="col-md-4" style="height:50px;">
                      <div class="card-body">
                        <h2 class="card-title text-end">

                          <a href="">
                            <i class="fa fa-bell" aria-hidden="true" style="color: orange;"></i>
                          </a>
                        </h2>
                        <p class="card-description text-center"> Stock Quantity:<i class="bi bi-list"></i> <span class="text-success"> {{$selectitem->item_quantity ?? 0}} </span> </p>

                        <p class="card-description text-center"> Stock Value:<i class="bi bi-list"></i>
                          <span class="text-success">
                            <!-- Calculate and show the stock value -->
                            {{$selectitem ? ($selectitem->item_purchaseprice * $selectitem->item_quantity) : 0}}
                          </span>
                        </p>


                      </div>

                    </div>

                    @else
                    <div class="col-md-7">
                      <div class="card-body">
                        <h4 class="card-title">Item Name</h4>
                        <p class="card-description">Sale Price: <i class="fa fa-money" aria-hidden="true"></i> <span class="text-success"> </span></p>
                        <p class="card-description">Puchase Price: <i class="fa fa-money" aria-hidden="true"></i> <span class="text-success"> </span> </p>

                        <div class="template-demo d-flex justify-content-between flex-nowrap">
                        </div>

                      </div>
                    </div>
                    <div class="col-md-5" style="height:50px;">
                      <div class="card-body">
                        <h2 class="card-title text-end">

                          <a href="">
                            <i class="fa fa-bell" aria-hidden="true" style="color: orange;"></i>
                          </a>
                        </h2>
                        <p class="card-description text-center"> Stock Quantity:<a href=""><i class="bi bi-list"></i></a> </p>

                        <p class="card-description text-center"> Stock Value:<a href=""><i class="bi bi-list"></i></a> </p>


                      </div>

                    </div>
                    @endif
                  </div>
                </div>
              </div>
              <div class="col-md-12 grid-margin stretch-card" style="width: 99%;">
                <div class="card">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card-body">

                        <div class="card">
                          <div style="max-width: 800px; overflow-y: auto;">

                            @if(isset($selectitem) && ($saleData->isNotEmpty() || $purchaseData->isNotEmpty()))
                            <table class="table table-bordered table-striped data-table1">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Type</th>
                                  <th>Invoice Number</th>
                                  <th>Party Name</th>
                                  <th>Date</th>
                                  <th>Quantity</th>
                                  <th>Price/Unit</th>
                                  <th>Payment Method</th>
                                  <th>Status</th>
                                  <th>Action</th> <!-- Action column -->
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($saleData as $index => $sale)
                                <tr>
                                  <td>
                                    <span style="color: green; font-size:large">&#x25CF;</span> <!-- Green dot for Sale -->
                                  </td>
                                  <td>Sale</td>
                                  <td>{{ $sale->invoice_number ?? 'N/A' }}</td>
                                  <td>{{ $sale->party->party_name ?? 'N/A' }}</td>
                                  <td>{{ $sale->date ?? 'N/A' }}</td>
                                  <td>{{ $sale->items->where('item_type', $selectitem->id)->sum('quantity') }}</td>
                                  <td>{{ $sale->items->where('item_type', $selectitem->id)->sum('price') }}</td>
                                  <td>{{ $sale->payment_method ?? 'N/A' }}</td>
                                  <td>{{ $sale->status ?? 'N/A' }}</td>
                                  <td>
                                    <!-- Action Dropdown -->
                                    <div class="dropdown">
                                      <button class="btn btn-link dropdown-toggle" type="button" id="actionMenuSale{{ $index }}" data-bs-toggle="dropdown" aria-expanded="false">
                                        &#x2026; <!-- Three dots symbol -->
                                      </button>
                                      <ul class="dropdown-menu" aria-labelledby="actionMenuSale{{ $index }}">
                                        <li><a class="dropdown-item" href="{{ route('sales.edit', $sale->id) }}">Edit</a></li>
                                        <li>
                                          <form action="" method="POST" onsubmit="return confirm('Are you sure you want to delete this sale?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item">Delete</button>
                                          </form>
                                        </li>
                                      </ul>
                                    </div>
                                  </td>
                                </tr>
                                @endforeach

                                @foreach($purchaseData as $index => $purchase)
                                <tr>
                                  <td>
                                    <span style="color: red; font-size:large">&#x25CF;</span> <!-- Red dot for Purchase -->
                                  </td>
                                  <td>Purchase</td>
                                  <td>{{ $purchase->invoice_number ?? 'N/A' }}</td>
                                  <td>{{ $purchase->party->party_name ?? 'N/A' }}</td>
                                  <td>{{ $purchase->date ?? 'N/A' }}</td>
                                  <td>{{ $purchase->items->where('item_type', $selectitem->id)->sum('quantity') }}</td>
                                  <td>{{ $purchase->items->where('item_type', $selectitem->id)->sum('price') }}</td>
                                  <td>{{ $purchase->payment_method ?? 'N/A' }}</td>
                                  <td>{{ $purchase->status ?? 'N/A' }}</td>
                                  <td>
                                    <!-- Action Dropdown -->
                                    <div class="dropdown">
                                      <button class="btn btn-link dropdown-toggle" type="button" id="actionMenuPurchase{{ $index }}" data-bs-toggle="dropdown" aria-expanded="false">
                                        &#x2026; <!-- Three dots symbol -->
                                      </button>
                                      <ul class="dropdown-menu" aria-labelledby="actionMenuPurchase{{ $index }}">
                                        <li><a class="dropdown-item" href="{{ route('purchases.edit', $purchase->id) }}">Edit</a></li>
                                        <li>
                                          <form action="" method="POST" onsubmit="return confirm('Are you sure you want to delete this purchase?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item">Delete</button>
                                          </form>
                                        </li>
                                      </ul>
                                    </div>
                                  </td>
                                </tr>
                                @endforeach
                              </tbody>
                            </table>

                            @else
                            <table class="table table-bordered table-striped data-table1">
                              <thead>
                                <tr>
                                  <th> #</th>
                                  <th>Type</th>
                                  <th>Invoice Number</th>
                                  <th>Party_Name</th>
                                  <th>Date</th>
                                  <th>Quantity</th>
                                  <th> Price/Unit </th>
                                  <th> Payment_Method</th>
                                  <th> Update</th>
                                </tr>
                              </thead>

                              <tbody>
                                <tr>
                                  <td>1</td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                  <td></td>
                                </tr>


                              </tbody>
                            </table>
                            @endif


                          </div>
                        </div>


                      </div>
                    </div>
                    <!-- <div class="col-md-5">
                      <div class="card-body">
                        <h4 class="card-title">Button Size</h4>
                        <p class="card-description">Use class <code>.btn-{size}</code></p>
                        <div class="template-demo">
                          <button type="button" class="btn btn-outline-secondary btn-lg">btn-lg</button>
                          <button type="button" class="btn btn-outline-secondary btn-md">btn-md</button>
                          <button type="button" class="btn btn-outline-secondary btn-sm">btn-sm</button>
                        </div>
                        <div class="template-demo mt-4">
                          <button type="button" class="btn btn-danger btn-lg">btn-lg</button>
                          <button type="button" class="btn btn-success btn-md">btn-md</button>
                          <button type="button" class="btn btn-primary btn-sm">btn-sm</button>
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

  document.getElementById('categorySelect').addEventListener('change', function() {
    if (this.value === 'addCategory') {
      var addCategoryModal = new bootstrap.Modal(document.getElementById('addCategoryModal'));
      addCategoryModal.show(); // Show the modal
      this.value = ''; // Reset the select input to prevent re-triggering
    }
  });

  document.addEventListener('DOMContentLoaded', function() {
    var openModalButton = document.getElementById('openModalButton');
    var selectUnitModal = new bootstrap.Modal(document.getElementById('selectUnitModal'));

    openModalButton.addEventListener('click', function() {
      selectUnitModal.show();
    });
  });


  document.addEventListener('DOMContentLoaded', function() {
    var openModalLink = document.getElementById('openModalLink');
    var addUnitsModal = new bootstrap.Modal(document.getElementById('addUnitsModal'));

    openModalLink.addEventListener('click', function(event) {
      event.preventDefault(); // Prevent the default anchor behavior
      addUnitsModal.show();
    });
  });



  // function showSelectedUnit() {
  //   const categorySelect = document.getElementById('categorySelect');
  //   if (categorySelect.value === 'addCategory') {
  //     new bootstrap.Modal(document.getElementById('addCategoryModal')).show();
  //   }
  // }

  function handleCategoryChange() {
    const categorySelect = document.getElementById('categorySelect');
    if (categorySelect.value === 'addCategory') {
      new bootstrap.Modal(document.getElementById('addCategoryModal')).show();
    }
  }

  // function showSelectedUnit() {
  //   const unitSelect1 = document.getElementById('unitSelect1');
  //   const unitSelect2 = document.getElementById('unitSelect2');
  //   const selectedUnitText = document.getElementById('selectedUnitText');

  //   const unitOne = unitSelect1.options[unitSelect1.selectedIndex].text;
  //   const unitTwo = unitSelect2.options[unitSelect2.selectedIndex].text;

  //   selectedUnitText.textContent = `Unit One: ${unitOne}, Unit Two: ${unitTwo}`;
  // }

  function updateSelectedUnits() {
    const unitSelect1 = document.getElementById('unitSelect1');
    const unitSelect2 = document.getElementById('unitSelect2');
    const selectedUnitText = document.getElementById('selectedUnitText');
    const combinedUnitInput = document.getElementById('combinedUnit');

    const unitOneText = unitSelect1.options[unitSelect1.selectedIndex].text;
    const unitTwoText = unitSelect2.options[unitSelect2.selectedIndex].text;

    selectedUnitText.textContent = `Unit One: ${unitOneText}, Unit Two: ${unitTwoText}`;
    combinedUnitInput.value = `${unitSelect1.value},${unitSelect2.value}`;
  }
</script>

@include('sidebar.footbar')