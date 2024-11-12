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
    <a href="{{url('dashboard')}}">
        <i class="bi bi-arrow-left mx-2" style="font-size:50px; font-weight:900"></i>
    </a>

    <a href="{{url('dashboard')}}">
        <i class="bi bi-arrow-left mx-2" style="font-size:50px; font-weight:900"></i>
    </a>

    <!-- partial:partials/_navbar.html -->

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->

        <!-- start design page -->

        <div class="main-panel" style="margin-top: -120px; width:140%  ">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
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
                                        <form action="{{ route('item.store') }}" method="POST" id="salesForm1">
                                            @csrf
                                            <div id="creditFields" class="" style="display: block;">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <div style="display: flex;">
                                                            <input type="text" class="form-control w-40" name="party_name" id="" list="partyList" placeholder="Select Party" onkeydown="checkEnter(event)">
                                                            <datalist id="partyList">
                                                                @foreach($allparty as $party)
                                                                <option value="{{ $party->id}}"> {{ $party->party_name }}</option>
                                                                @endforeach
                                                            </datalist>
                                                            <input type="number" name="phone_number" class="form-control mx-4 mt-1" placeholder="Add Phone number" id="" style="width:300px;     " onkeydown="checkEnter(event)" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input type="text" id="myInput" name="invoice_number" class="form-control" placeholder="Enter Invoice number" style="padding: 0;" />
                                                        <input type="date" name="date" id="myInput" class="form-control mt-4" onkeydown="checkEnter(event)" style="padding: 0;" />
                                                    </div>
                                                    <div class="col-md-12 grid-margin stretch-card" style="margin-top: 30px;">
                                                        <table id="salesTable" class="table table-bordered" style="width: 100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th>Item</th>
                                                                    <th>Qty</th>
                                                                    <th>Price</th>
                                                                    <th>Dis</th>
                                                                    <th>Total</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td style="padding: 0px;">
                                                                        <input type="text" class="form-control" name="items[0][item_type]" list="itemTypeList" placeholder="Select Item Type" onkeydown="checkEnter(event)" id="" style="padding: 0; font-size:14px; height:30px; ">
                                                                        <datalist id="itemTypeList">
                                                                            @foreach($allitems as $item)
                                                                            <option value="{{ $item->id }}"> {{ $item->item_name }}</option>
                                                                            @endforeach
                                                                        </datalist>
                                                                    </td>
                                                                    <td class="p-0"><input type="number" class="form-control mx-1" name="items[0][quantity]" placeholder="Quantity" oninput="calculateTotal(this)" onkeydown="checkEnter(event)" id="" style="padding: 0; height:30px"></td>
                                                                    <td class="p-0"><input type="number" class="form-control mx-1" name="items[0][price]" placeholder="Price" oninput="calculateTotal(this)" onkeydown="checkEnter(event)" id="" style="padding: 0; height:30px"></td>
                                                                    <td class="p-0"><input type="number" class="form-control mx-1" name="items[0][discount]" placeholder="Discount" oninput="calculateTotal(this)" onkeydown="checkEnter(event)" id="" style="padding: 0; height:30px"></td>
                                                                    <td class="p-0"><input type="number" class="form-control mx-1" name="items[0][total]" placeholder="Total" id="" readonly style="padding: 0; height:30px; "></td>
                                                                    <td>
                                                                        <!-- <button type="button" class="btn btn-primary" onclick="removeRow(this)"></button> -->
                                                                        <i class="bi bi-node-minus-fill mx-2" onclick="removeRow(this)" style="font-size: 35px;"></i>
                                                                        <!-- <button type="button" class="btn btn-success" onclick="addRow()"> -->
                                                                        <i class="bi bi-node-plus-fill" onclick="addRow()" style="font-size: 35px;"></i>
                                                                        <!-- </button> -->
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="col-md-11 mb-3 my-3">
                                                        <div class="row justify-content-end">
                                                            <div class="col-md-3">
                                                                <label for="totalPayment">Total Payment:</label>
                                                                <input type="text" id="totalPayment" class="form-control h-25" readonly />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- <div class="col-md-11 mb-3 my-3">
                                                        <div class="row justify-content-end">
                                                            <div class="col-md-3">
                                                                <h4><i>Select Cash & Credit</i></h4>
                                                                <select class="form-control" name="payment_method" onchange="toggleCashDetails(this)">
                                                                    <option value="Credit">Credit</option>
                                                                    <option value="Cash">Cash</option>
                                                                </select>
                                                                <input type="text" class="form-control cash-details mt-3" name="cash_details" placeholder="Enter Payment" style="display: none;">
                                                            </div>
                                                        </div>
                                                    </div> -->

                                                    <div class="col-md-11 mb-3 my-3">
                                                        <div class="row justify-content-end">
                                                            <div class="col-md-3">
                                                                <h4><i>Select Payment Method</i></h4>
                                                                <select class="form-control h-50" name="payment_method" onchange="togglePaymentDetails(this)">
                                                                    <option value="Credit">Credit</option>
                                                                    <option value="Cash">Cash</option>
                                                                </select>
                                                                <input type="text" class="form-control cash-details mt-3" name="cash_details" placeholder="Enter Payment" style="display: none;">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Add a field to display the total amount -->
                                                    <input type="hidden" id="totalPayment" name="total_payment">
                                                    <div class="col-md-11 mb-3 my-3">
                                                        <div class="row justify-content-end">
                                                            <div class="col-md-3">
                                                                <input type="submit" class="btn btn-primary mt-4" value="Submit" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        <!--End-->

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
    document.getElementById('flexSwitchCheckChecked').addEventListener('change', function() {
        if (this.checked) {
            // Show Credit fields, hide Cash fields
            document.getElementById('creditFields').style.display = 'block';
            document.getElementById('cashFields').style.display = 'none';
        } else {
            // Show Cash fields, hide Credit fields
            document.getElementById('creditFields').style.display = 'none';
            document.getElementById('cashFields').style.display = 'block';
        }
    });

    function toggleDropdown() {
        const dropdown = document.getElementById("myDropdown");
        dropdown.classList.toggle("show");
    }

    function filterFunction() {
        const input = document.getElementById("myInput");
        const filter = input.value.toUpperCase();
        const div = document.getElementById("myDropdown");
        const a = div.getElementsByTagName("a");
        for (let i = 0; i < a.length; i++) {
            let txtValue = a[i].textContent || a[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                a[i].style.display = "";
            } else {
                a[i].style.display = "none";
            }
        }
    }

    function selectItem(element) {
        // Set the selected value into the input field
        const input = document.getElementById("myInput");
        input.value = element.textContent;

        // Close the dropdown after selection
        document.getElementById("myDropdown").classList.remove("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('#myInput')) {
            const dropdown = document.getElementById("myDropdown");
            if (dropdown.classList.contains('show')) {
                dropdown.classList.remove('show');
            }
        }
    }




    function togglePaymentDetails(select) {
        const cashDetailsInput = document.querySelector('.cash-details');
        const totalPaymentInput = document.getElementById('totalPayment');

        if (select.value === "Cash") {
            cashDetailsInput.style.display = "block"; // Show the input field if "Cash" is selected
            cashDetailsInput.value = ''; // Clear any previous value
            totalPaymentInput.value = ''; // Clear total payment value
        } else {
            cashDetailsInput.style.display = "none"; // Hide the input field if "Credit" is selected
            // Set the cash details to total payment value
            cashDetailsInput.value = totalPaymentInput.value;
        }
    }

    function togglePaymentDetails2(select) {
        const cashDetailsInput = document.querySelector('.cash-details2');
        const totalPaymentInput = document.getElementById('totalPayment2');

        if (select.value === "Cash2") {
            cashDetailsInput.style.display = "block"; // Show the input field if "Cash" is selected
            cashDetailsInput.value = ''; // Clear any previous value
            totalPaymentInput.value = ''; // Clear total payment value
        } else {
            cashDetailsInput.style.display = "none"; // Hide the input field if "Credit" is selected
            // Set the cash details to total payment value
            cashDetailsInput.value = totalPaymentInput.value;
        }
    }



    function calculateTotal(input) {
        const row = input.closest('tr'); // Get the closest parent row
        const quantity = row.querySelector('input[name$="[quantity]"]').value;
        const price = row.querySelector('input[name$="[price]"]').value;
        const discount = row.querySelector('input[name$="[discount]"]').value;
        const totalField = row.querySelector('input[name$="[total]"]');

        // Calculate total after applying discount
        let total = quantity * price; // Multiply quantity and price
        if (discount) {
            total -= (total * discount / 100); // Apply discount
        }

        // Set the calculated total in the Total field
        totalField.value = total.toFixed(2); // Format to 2 decimal places

        // Update the overall total payment
        updateTotalPayment();
    }

    function calculateTotal2(input) {
        const row = input.closest('tr'); // Get the closest parent row
        const quantity = row.querySelector('input[name$="[quantity]"]').value;
        const price = row.querySelector('input[name$="[price]"]').value;
        const discount = row.querySelector('input[name$="[discount]"]').value;
        const totalField = row.querySelector('input[name$="[total]"]');

        // Calculate total after applying discount
        let total = quantity * price; // Multiply quantity and price
        if (discount) {
            total -= (total * discount / 100); // Apply discount
        }

        // Set the calculated total in the Total field
        totalField.value = total.toFixed(2); // Format to 2 decimal places

        // Update the overall total payment
        updateTotalPayment2();
    }


    function updateTotalPayment() {
        const totalFields = document.querySelectorAll('input[name$="[total]"]');
        let totalPayment = 0;

        totalFields.forEach(field => {
            const value = parseFloat(field.value) || 0;
            totalPayment += value;
        });

        document.getElementById('totalPayment').value = totalPayment.toFixed(2); // Update the Total Payment field

        // Update cash details input when "Credit" is selected
        const paymentMethod = document.querySelector('select[name="payment_method"]').value;
        if (paymentMethod === "Credit") {
            document.querySelector('.cash-details').value = totalPayment.toFixed(2);
        }
    }

    function updateTotalPayment2() {
        const totalFields = document.querySelectorAll('input[name$="[total]"]');
        let totalPayment = 0;

        totalFields.forEach(field => {
            const value = parseFloat(field.value) || 0;
            totalPayment += value;
        });

        document.getElementById('totalPayment2').value = totalPayment.toFixed(2); // Update the Total Payment field

        // Update cash details input when "Credit" is selected
        const paymentMethod = document.querySelector('select[name="payment_method"]').value;
        if (paymentMethod === "Credit") {
            document.querySelector('.cash-details').value = totalPayment.toFixed(2);
        }
    }

    // Prevent the default form submission
    document.getElementById("salesForm").addEventListener("submit", function(event) {
        event.preventDefault(); // Prevent the form from submitting
    });

    function addRow() {
        const table = document.getElementById("salesTable").getElementsByTagName('tbody')[0];
        const rowCount = table.rows.length;
        const newRow = table.insertRow();

        newRow.innerHTML = `
    <td class="p-0">
        <input type="text" class="form-control mx-1" name="items[${rowCount}][item_type]" list="itemTypeList" placeholder="Select Item Type" onkeydown="checkEnter(event)"
        style="padding: 0; font-size:14px; height:30px; ">
        <datalist id="itemTypeList">
            @foreach($allitems as $item)
            <option value="{{ $item->id }}"> {{ $item->item_name }}</option>
            @endforeach
        </datalist>
    </td>
    <td class="p-0"><input type="number" class="form-control mx-1" name="items[${rowCount}][quantity]" placeholder="Quantity" oninput="calculateTotal(this)" onkeydown="checkEnter(event)"  style="padding: 0; font-size:14px; height:30px; " ></td>
    <td class="p-0"><input type="number" class="form-control mx-1" name="items[${rowCount}][price]" placeholder="Price" oninput="calculateTotal(this)" onkeydown="checkEnter(event)"  style="padding: 0; font-size:14px; height:30px; "></td>
    <td class="p-0"><input type="number" class="form-control mx-1" name="items[${rowCount}][discount]" placeholder="Discount" oninput="calculateTotal(this)" onkeydown="checkEnter(event)"  style="padding: 0; font-size:14px; height:30px; "></td>
    <td class="p-0"><input type="number" class="form-control mx-1" name="items[${rowCount}][total]" placeholder="Total" readonly  style="padding: 0; font-size:14px; height:30px; "></td>
    <td>
    <i class="bi bi-node-minus-fill mx-2" onclick="removeRow(this)" style="font-size: 35px;"></i>
                                                                       
                                                                        <i class="bi bi-node-plus-fill" onclick="addRow()" style="font-size: 35px;"></i>
    </td>
    `;

        // Call to update the total payment whenever a new row is added
        updateTotalPayment();

    }

    function addRow2() {
        const table = document.getElementById("salesTable2").getElementsByTagName('tbody')[0];
        const rowCount = table.rows.length;
        const newRow = table.insertRow();

        newRow.innerHTML = `
    <td class="p-0">
        <input type="text" class="form-control mx-1" name="items[${rowCount}][item_type]" list="itemTypeList" placeholder="Select Item Type" onkeydown="checkEnter(event)"
        style="padding: 0; font-size:14px; height:30px; ">
        <datalist id="itemTypeList">
            @foreach($allitems as $item)
            <option value="{{ $item->id }}"> {{ $item->item_name }}</option>
            @endforeach
        </datalist>
    </td>
    <td class="p-0"><input type="number" class="form-control mx-1" name="items[${rowCount}][quantity]" placeholder="Quantity" oninput="calculateTotal(this)" onkeydown="checkEnter(event)"  style="padding: 0; font-size:14px; height:30px; " ></td>
    <td class="p-0"><input type="number" class="form-control mx-1" name="items[${rowCount}][price]" placeholder="Price" oninput="calculateTotal(this)" onkeydown="checkEnter(event)"  style="padding: 0; font-size:14px; height:30px; "></td>
    <td class="p-0"><input type="number" class="form-control mx-1" name="items[${rowCount}][discount]" placeholder="Discount" oninput="calculateTotal(this)" onkeydown="checkEnter(event)"  style="padding: 0; font-size:14px; height:30px; "></td>
    <td class="p-0"><input type="number" class="form-control mx-1" name="items[${rowCount}][total]" placeholder="Total" readonly  style="padding: 0; font-size:14px; height:30px; "></td>
    <td>
    <i class="bi bi-node-minus-fill mx-2" onclick="removeRow(this)" style="font-size: 35px;"></i>
                                                                       
                                                                        <i class="bi bi-node-plus-fill" onclick="addRow()" style="font-size: 35px;"></i>
    </td>
    `;

        // Call to update the total payment whenever a new row is added
        updateTotalPayment2();
    }

    function checkEnter(event) {
        if (event.key === "Enter") {
            event.preventDefault(); // Prevent default action (form submission)
            addRow(); // Call the addRow function to add a new row
        }


    }



    function removeRow(button) {
        const row = button.closest('tr');
        row.parentNode.removeChild(row);

        // Call to update the total payment after removing a row
        updateTotalPayment();
    }


    function toggleCashDetails(select) {
        const cashDetailsInput = document.querySelector('.cash-details');

        if (select.value === "Cash") {
            cashDetailsInput.style.display = "block"; // Show the input field if "Cash" is selected
        } else {
            cashDetailsInput.style.display = "none"; // Hide the input field if "Credit" is selected
        }
    }


    // function handleSubmit(event, form) {
    //     event.preventDefault(); // Prevent default form submission
    //     const formData = new FormData(form); // Collect form data

    //     // Submit form via AJAX
    //   fetch(form.action, {
    //     method: 'POST',
    //     body: formData,
    //     headers: {
    //         'X-CSRF-TOKEN': '{{ csrf_token() }}', // This should be outside of quotes if you're using a templating engine
    // 'Accept': 'application/json',
    //     }
    // })
    // .then(response => {
    //     // Check if the response is okay (status code 200-299)
    //     if (!response.ok) {
    //         throw new Error(`HTTP error! status: ${response.status}`);
    //     }
    //     return response.json(); // Parse the JSON if response is okay
    // })
    // .then(data => {
    //     // Handle response (success or error messages)
    //     console.log(data);
    //     if (data.success) {
    //         form.reset(); // Reset the form fields
    //         alert('Form submitted successfully!'); // Notify the user
    //     } else {
    //         alert('There was an error submitting the form.');
    //     }
    // })
    // .catch(error => {
    //     console.error('Error:', error);
    //     alert('An error occurred while submitting the form.'); // Notify the user about the error
    // });
    //     return false; // Prevent form submission
    // }

    // Second Form 
</script>
@include('sidebar.footbar')