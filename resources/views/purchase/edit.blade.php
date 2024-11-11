@include('sidebar.head')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
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
<div class="main-panel">
    <div class="content-wrapper">
        <div class="container">
            <h1>Edit Purchase</h1>
            <form action="{{ route('purchases.update', $sale->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div id="creditFields" class="mt-4" style="display: block;">
                    <div class="row">
                        <div class="col-md-8">
                            <div style="display: flex;">
                                <input type="text" class="form-control w-40" name="party_name" id="myInput" list="partyList" placeholder="Select Party" value="{{ old('party_name', $sale->party_name) }}">
                                <datalist id="partyList">
                                    @foreach($allparty as $party)
                                    <option value="{{ $party->id }}" {{ $party->id == $sale->party_name ? 'selected' : '' }}> {{ $party->party_name }}</option>
                                    @endforeach
                                </datalist>
                                <input type="number" name="phone_number" class="form-control mx-4 mt-1" placeholder="Add Phone number" id="myInput" style="width:300px;" value="{{ old('phone_number', $sale->phone_number) }}" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <input type="text" id="myInput" name="invoice_number" class="form-control" placeholder="Enter Invoice number" value="{{ old('invoice_number', $sale->invoice_number) }}" />
                            <input type="date" name="date" id="myInput" class="form-control mt-4" value="{{ old('date', $sale->date ? \Carbon\Carbon::parse($sale->date)->format('Y-m-d') : '') }}" />

                        </div>
                        <div class="col-md-12 grid-margin stretch-card" style="margin-top: 150px;">
                            <table id="salesTable" class="table table-bordered" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Item Type</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Discount (%)</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sale->items as $index => $item)
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name="items[{{ $index }}][item_type]" list="itemTypeList" placeholder="Select Item Type" value="{{ old('items.'.$index.'.item_type', $item->item_type) }}">
                                            <datalist id="itemTypeList">
                                                @foreach($allitems as $item)
                                                <option value="{{ $item->id }}" {{ $item->id == $item->item_type ? 'selected' : '' }}> {{ $item->item_name }}</option>
                                                @endforeach
                                            </datalist>
                                        </td>
                                        <td><input type="number" class="form-control" name="items[{{ $index }}][quantity]" placeholder="Quantity" value="{{ old('items.'.$index.'.quantity', $item->quantity) }}" oninput="calculateTotal(this)"></td>
                                        <td><input type="number" class="form-control" name="items[{{ $index }}][price]" placeholder="Price" value="{{ old('items.'.$index.'.price', $item->price) }}" oninput="calculateTotal(this)"></td>
                                        <td><input type="number" class="form-control" name="items[{{ $index }}][discount]" placeholder="Discount" value="{{ old('items.'.$index.'.discount', $item->discount) }}" oninput="calculateTotal(this)"></td>
                                        <td><input type="number" class="form-control" name="items[{{ $index }}][total]" placeholder="Total" value="{{ old('items.'.$index.'.total', $item->total) }}" readonly></td>
                                        <td>
                                            <button type="button" class="btn btn-primary" onclick="removeRow(this)">Remove</button>
                                            <button type="button" class="btn btn-success" onclick="addRow()">Add New Row</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-11 mb-3 my-3">
                            <div class="row justify-content-end">
                                <div class="col-md-3">
                                    <h4><i>Select Cash & Credit</i></h4>
                                    <select class="form-control" name="payment_method" onchange="toggleCashDetails(this)">
                                        <option value="Credit" {{ old('payment_method', $sale->payment_method) == 'Credit' ? 'selected' : '' }}>Credit</option>
                                        <option value="Cash" {{ old('payment_method', $sale->payment_method) == 'Cash' ? 'selected' : '' }}>Cash</option>
                                    </select>
                                    <input type="text" class="form-control cash-details mt-3" name="cash_details" placeholder="Enter Payment" style="{{ old('payment_method', $sale->payment_method) == 'Cash' ? 'display: block;' : 'display: none;' }}" value="{{ old('cash_details', $sale->cash_details) }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-11 mb-3 my-3">
                            <div class="row justify-content-end">
                                <div class="col-md-3">
                                    <input type="submit" class="btn btn-primary" value="Update" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <script>
        function calculateTotal(input) {
            const row = input.closest('tr');
            const quantity = parseFloat(row.querySelector('input[name$="[quantity]"]').value) || 0;
            const price = parseFloat(row.querySelector('input[name$="[price]"]').value) || 0;
            const discount = parseFloat(row.querySelector('input[name$="[discount]"]').value) || 0;
            const total = (quantity * price) - ((quantity * price) * (discount / 100));
            row.querySelector('input[name$="[total]"]').value = total.toFixed(2);
        }

        function addRow() {
            const tableBody = document.querySelector('#salesTable tbody');
            const rowCount = tableBody.rows.length;
            const newRow = `
            <tr>
                <td>
                    <input type="text" class="form-control" name="items[${rowCount}][item_type]" list="itemTypeList" placeholder="Select Item Type">
                    <datalist id="itemTypeList">
                        @foreach($allitems as $item)
                        <option value="{{ $item->id }}"> {{ $item->item_name }}</option>
                        @endforeach
                    </datalist>
                </td>
                <td><input type="number" class="form-control" name="items[${rowCount}][quantity]" placeholder="Quantity" oninput="calculateTotal(this)"></td>
                <td><input type="number" class="form-control" name="items[${rowCount}][price]" placeholder="Price" oninput="calculateTotal(this)"></td>
                <td><input type="number" class="form-control" name="items[${rowCount}][discount]" placeholder="Discount" oninput="calculateTotal(this)"></td>
                <td><input type="number" class="form-control" name="items[${rowCount}][total]" placeholder="Total" readonly></td>
                <td>
                    <button type="button" class="btn btn-primary" onclick="removeRow(this)">Remove</button>
                </td>
            </tr>
        `;
            tableBody.insertAdjacentHTML('beforeend', newRow);
        }

        function removeRow(button) {
            const row = button.closest('tr');
            row.remove();
        }

        function toggleCashDetails(select) {
            const cashDetailsInput = document.querySelector('.cash-details');
            cashDetailsInput.style.display = select.value === 'Cash' ? 'block' : 'none';
        }
    </script>





    @include('sidebar.footbar')