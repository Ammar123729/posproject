@include('sidebar.head')
<style>
    /* Style for the dropdown */
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    .show {
        display: block;
    }

    #myInput {
        box-sizing: border-box;
        background-image: url('searchicon.png');
        background-position: 14px 12px;
        background-repeat: no-repeat;
        font-size: 16px;
        padding: 14px 20px 12px 45px;
        border: none;
        border-bottom: 1px solid #ddd;
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
                        <a href="{{url('users')}}" class="dropdown-item"><i class="bi bi-person-add mdi mdi-calendar-check-outline text-primary me-2"></i> Add User </a>
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
        <!-- start design page -->

        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <h4 class="card-title"><i> Sale Form </i></h4>
                                        <p class="card-description" style="margin-top: -20px;">

                                            <!-- <div class="form-check-inline form-switch">
                                            <label class="form-check-label" for="flexSwitchCheckChecked" style="margin-left: -40px;">Credit</label>
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked style="margin-left: 0px;">
                                            <label class="form-check-label" for="flexSwitchCheckChecked">Cash</label>
                                        </div> -->
                                        </p>
                                        <!--Credit's-->
                                        <!-- Success Message -->
                                        @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                        @endif

                                        <!-- Error Messages -->
                                        @if(session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                        @endif

                                        <!-- Validation Errors -->
                                        @if($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
                                        <form action="{{route('sale.item.return')}}" method="POST">
                                            @csrf

                                            <label for="party_name">Party Name:</label>
                                            <input type="text" class="form-control" name="party_name" id="party_name" list="partyList" required>
                                            <datalist id="partyList">
                                                @foreach($allparty as $party)
                                                <option value="{{ $party->id }}"> {{ $party->party_name }}</option>
                                                @endforeach
                                            </datalist>

                                            <div id="item-rows">
                                                <!-- JavaScript will clone these rows for multiple item returns -->
                                                <div class="item-row">
                                                    <label for="item_id">Item:</label>
                                                    <input type="text" class="form-control" name="item_id[]" id="item_id" list="itemList" required>
                                                    <datalist id="itemList">
                                                        @foreach($allitems as $item)
                                                        <option value="{{ $item->id }}"> {{ $item->item_name }}</option>
                                                        @endforeach
                                                    </datalist>

                                                    <label for="return_quantity">Return Quantity:</label>
                                                    <input type="number" name="return_quantity[]" class="return_quantity form-control" oninput="calculateTotal(this)" required>

                                                    <label for="return_payment">Return Payment:</label>
                                                    <input type="number" name="return_payment[]" class="return_payment form-control" oninput="calculateTotal(this)" required>

                                                    <label for="total_value">Total Value:</label>
                                                    <input type="number" name="total_value[]" class="total_value form-control" readonly>
                                                </div>
                                            </div>

                                            <button type="button" class="btn btn-success mt-2 rounded" onclick="addItemRow()">Add Another Item</button>
                                            <button type="submit" class="btn btn-primary mt-2 rounded">Submit Return</button>
                                        </form>

                                    </div>
                                </div>



                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!--End-->
    </div>
</div>
<script>
    function addItemRow() {
        const itemRow = document.querySelector('.item-row');
        const newItemRow = itemRow.cloneNode(true);
        document.getElementById('item-rows').appendChild(newItemRow);
    }


    function calculateTotal(input) {
        const itemRow = input.closest('.item-row');
        const returnQuantity = itemRow.querySelector('.return_quantity').value || 0;
        const returnPayment = itemRow.querySelector('.return_payment').value || 0;
        const totalValueField = itemRow.querySelector('.total_value');

        // Calculate total value and display it
        const totalValue = returnQuantity * returnPayment;
        totalValueField.value = totalValue.toFixed(2); // Show two decimal places
    }
</script>

@include('sidebar.footbar')