@include('sidebar.head')
<style>
    .modal-backdrop {
        z-index: 1040 !important;
    }

    .modal {
        z-index: 1050 !important;
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
            </ul>
        </nav>

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <h4 class="card-title">Single color buttons</h4>
                                        <p class="card-description">Add class <code>.btn-{color}</code> for buttons in theme colors</p>
                                        <form action="{{route('add.item')}}" method="POST">
                                            @csrf


                                            <div class="modal-body">
                                                <!-- Item Form Fields -->
                                                <div class="row">
                                                    <div class="col-xl-4">
                                                        <div class="mb-3">
                                                            <label for="itemName" class="form-label">Item Name</label>
                                                            <input type="text" class="form-control" id="itemName" name="item_name" placeholder="Enter item name">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4">
                                                        <div class="mt-4">
                                                            <select class="form-select" id="categorySelect" name="item_category" onchange="handleCategoryChange()">
                                                                <option value="">Select an option</option>
                                                                <option value="addCategory" style="color: blue;">Add Category</option>

                                                                @foreach($getcate as $cate)
                                                                <option value="{{ $cate->category_name }}">{{ $cate->category_name }}</option>
                                                                @endforeach

                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4">
                                                        <div class="mb-3">
                                                            <label for="itemImage" class="form-label">Add Item Image</label>
                                                            <input type="file" name="item_image" class="form-control" id="itemImage">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4">
                                                        <div class="mb-3">
                                                            <label for="itemCode" class="form-label">Add Item Code</label>
                                                            <input type="number" name="item_code" class="form-control" id="itemCode" placeholder="Enter item code">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4">
                                                        <div class="text-start">
                                                            <button type="button" class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#selectUnitModal">Select Unit</button>

                                                            <button type="button" class="btn btn-primary mt-4 mx-4" data-bs-toggle="modal" data-bs-target="#addUnitsModal">Add Unit</button>

                                                            <p id="selectedUnitText">No units selected.</p>

                                                            <!-- Hidden Input to Store Combined Unit Value -->
                                                            <input type="hidden" id="combinedUnit" name="item_unit">

                                                        </div>
                                                    </div>
                                                </div>

                                                <p id="descriptionText" class="text-primary d-inline me-3" style="cursor: pointer; font-weight: bold;">Pricing</p>
                                                <p id="addFieldsText" class="text-primary d-inline" style="cursor: pointer; font-weight: bold;">Stock</p>
                                                <hr>

                                                <!-- Pricing Input Field -->
                                                <div id="descriptionField" style="display: none;">
                                                    <div class="mb-3">
                                                        <label for="itemSalePrice" class="form-label">Sale Price</label>
                                                        <input type="number" class="form-control" name="item_saleprice" id="itemSalePrice" placeholder="Sale price">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="itemPurchasePrice" class="form-label">Purchase Price</label>
                                                        <input type="number" class="form-control" name="item_purchaseprice" id="itemPurchasePrice" placeholder="Purchase price">
                                                    </div>
                                                    <div class="form-check form-switch" style="margin-left: 40px;">
                                                        <input class="form-check-input" type="checkbox" id="switchToggle">
                                                        <label class="form-check-label" for="switchToggle">Credit's Limit</label>
                                                    </div>
                                                    <div id="toggleInputField" style="display: none;">
                                                        <div class="mb-3">
                                                            <label for="itemCredit" class="form-label">Add Credit's Limit</label>
                                                            <input type="text" class="form-control" name="item_credit" id="itemCredit" placeholder="Enter Credit's Limit">
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Additional Fields -->
                                                <div id="additionalFields" style="display: none;">
                                                    <div class="mb-3">
                                                        <label for="itemQuantity" class="form-label">Opening Quantity</label>
                                                        <input type="number" class="form-control" name="item_quantity" id="itemQuantity" placeholder="Enter Quantity">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="itemQuantityPrice" class="form-label">AT Price</label>
                                                        <input type="number" name="item_quantityprice" class="form-control" id="itemQuantityPrice" placeholder="Price">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="itemDate" class="form-label">Date</label>
                                                        <input type="date" name="item_date" class="form-control" id="itemDate">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="itemMinStock" class="form-label">Min Stock to Maintain</label>
                                                        <input type="number" name="item_minimumstock" class="form-control" id="itemMinStock" placeholder="Enter min stock number">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="itemAddress" class="form-label">Address</label>
                                                        <input type="text" name="item_address" class="form-control" id="itemAddress" placeholder="Enter Address">
                                                    </div>
                                                </div>

                                                <button type="submit" class="btn btn-primary">Save</button>
                                            </div>



                                        </form>

                                        <!--Add Category-->

                                        <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="addCategoryModalLabel">Add Category</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('add.category') }}" method="POST">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label for="categoryName" class="form-label">Category Name</label>
                                                                <input type="text" name="category_name" class="form-control" id="categoryName" placeholder="Enter category name">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Add Category</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--Select  Unit-->
                                        <div class="modal fade" id="selectUnitModal" tabindex="-1" aria-labelledby="selectUnitModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="selectUnitModalLabel">Select Units</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="unitSelect1" class="form-label">Unit Name</label>
                                                            <select class="form-select" id="unitSelect1" name="unitone">
                                                                <option selected>Select an option</option>
                                                                @foreach($getunit as $unit)
                                                                <option value="{{ $unit->unitone }}">{{ $unit->unitone }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="unitSelect2" class="form-label">Unit</label>
                                                            <select class="form-select" id="unitSelect2" name="unittwo">
                                                                <option selected>Select an option</option>
                                                                @foreach($getunit as $unit)
                                                                <option value="{{ $unit->unittwo }}">{{ $unit->unittwo }}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="updateSelectedUnits()">Select Unit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--End-->
                                        <!--Add Unit-->
                                        <div class="modal fade" id="addUnitsModal" tabindex="-1" aria-labelledby="addUnitsModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="addUnitsModalLabel">Add Units</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('item') }}" method="POST">
                                                            @csrf
                                                            <div class="mb-3">
                                                                <label for="unitName" class="form-label">Unit Name</label>
                                                                <input type="text" class="form-control" name="unitone" id="unitName" placeholder="Enter unit name">
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="unitDescription" class="form-label">Unit Description</label>
                                                                <input type="text" class="form-control" name="unittwo" id="unitDescription" placeholder="Enter unit description">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-primary">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--End Add Unit-->
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

    function handleCategoryChange() {
        const categorySelect = document.getElementById('categorySelect');
        if (categorySelect.value === 'addCategory') {
            new bootstrap.Modal(document.getElementById('addCategoryModal')).show();
        }
    }

    function showSelectedUnit() {
        const unitSelect1 = document.getElementById('unitSelect1');
        const unitSelect2 = document.getElementById('unitSelect2');
        const selectedUnitText = document.getElementById('selectedUnitText');

        const unitOne = unitSelect1.options[unitSelect1.selectedIndex].text;
        const unitTwo = unitSelect2.options[unitSelect2.selectedIndex].text;

        selectedUnitText.textContent = `Unit One: ${unitOne}, Unit Two: ${unitTwo}`;
    }

    function updateSelectedUnits() {
        const unitSelect1 = document.getElementById('unitSelect1');
        const unitSelect2 = document.getElementById('unitSelect2');
        const selectedUnitText = document.getElementById('selectedUnitText');
        const combinedUnitInput = document.getElementById('combinedUnit');

        const unitOneText = unitSelect1.options[unitSelect1.selectedIndex].text;
        const unitTwoText = unitSelect2.options[unitSelect2.selectedIndex].text;

        // Update the paragraph with selected units
        selectedUnitText.textContent = `Unit One: ${unitOneText}, Unit Two: ${unitTwoText}`;

        // Update the hidden input with combined unit values (IDs)
        combinedUnitInput.value = `${unitSelect1.value},${unitSelect2.value}`;
    }
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
</script>
@include('sidebar.footbar')