@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{asset('css/sales.css')}}">
<link rel="stylesheet" href="{{ asset('css/sales_foot.css')}}">
@endsection
@extends('layouts.default')
@section('page')
<form action="" id="inv-frm" method="POST">
  @csrf
  <div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
      <h1 class="h3 mb-0 text-gray-800">Sales</h1>
      <table>
        <tr>
          <th>
            <a href="{{ route('country') }}" class="d-none d-sm-inline-block btn btn-sm btn-success">
              <i class="fas fa-none fa-sm text-white-50"></i> Pdf
            </a>
            <a href="{{route('country')}}" class="d-none d-sm-inline-block btn btn-sm btn-success ">
              <i class="fas fa-none fa-sm text-white-50"></i>Excel</a>

            <a href="{{route('country')}}" class="d-none d-sm-inline-block btn btn-sm btn-info  ">
              <i class="fas fa-none fa-sm text-white-50"></i>Country</a>

            <a href="{{route('add-sales')}}" id="btn-save" type="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm save-invoice">
              <i class="fas fa-save fa-sm text-white-50"></i>Save</a>
          </th>
        </tr>
      </table>

    </div>
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="table-responsive">
          <div class="firstRow">
            <div class="">
              <div class="row">
                <div class="col-sm">
                  <div>
                    <table style="width:100%">
                      <tr>
                        <td style="width: 150px;">Date: </td>
                        <td>
                          <div><input type="date" id="invdate" name="invdate" value="<?php echo date("Y-m-d"); ?>"></div>
                        </td>
                      </tr>
                      <tr>

                        <td style="width: 150px;">Customer Code :</td>
                        <td><select id="customercode" name="customercode" class="customercode" style="width: 100%;"></select></td>

                      </tr>
                    </table>

                  </div>

                </div>
                <div class="col-sm">
                  <table style="width:100%">
                    <tr>
                      <td style="width: 150px;">Customer Name :</td>
                      <td><Input type="text" id="cusname" name="cusname" class="textwidht"></Input></td>
                    </tr>
                    <tr>
                      <td style="width: 150px;">Customer Vat No :</td>
                      <td><Input id="vatno" type="text" name="vatno" class="textwidht"></Input></td>
                    </tr>
                  </table>
                </div>
                <div class="col-sm">
                  <table style="width:100%">
                    <tr>
                      <td style="width: 150px;">Invoice No :</td>
                      <td><input id="invoiceno" name="invoiceno" type="text" class="textwidht" value="{{ old('invoiceno') ?? '' }}"></td>
                      <td><a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                          <i class="fas fa-search fa-sm text-white-50"></i></a></td>
                    </tr>
                  </table>


                </div>
              </div>
            </div>
          </div>
          <div class="secondRow">
            <div>
              <a href="#" id="addRowBtn" class="d-none d-sm-inline-block btn btn-sm btn-success">
                <i class="fas fa-none fa-sm text-white-50"></i> Add
              </a>
              <table id="itemTable" class="table_details">
                <thead>
                  <tr>
                    <th>Slno</th>
                    <th>Item Code</th>
                    <th>Item Name</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>befordisc</th>
                    <th>Discount%</th>
                    <th>Discount Amount</th>
                    <th>After Discount</th>
                    <th>Vat %</th>
                    <th>Vat Amount</th>
                    <th>Grand Total</th>
                    <th>Vat Code</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <!-- <td><input type="text" name="invoice[0][sno]" class="slno sno"></td> -->
                    <td><input type="text" name="invoice[0][sno]" class="slno sno" value="1" readonly></td>
                    <td><select name="invoice[0][stock_id]" class="stock_id select2"></select></td>
                    <td><input type="text" name="invoice[0][itemname]" class="itemname"></td>
                    <td>
                      <input type="number" name="invoice[0][uprice]" class="uprice numeric-input textright">
                    </td>

                    <td><input type="number" name="invoice[0][qty]" class="qty textright"></td>
                    <td><input type="number" name="invoice[0][befordisc]" class="befordisc textright"></td>
                    <td><input type="number" name="invoice[0][discp]" class="discp textright"></td>
                    <td><input type="number" name="invoice[0][discamt]" class="discamt textright"></td>
                    <td><input type="number" name="invoice[0][afterdisc]" class="afterdisc textright"></td>
                    <td><input type="number" name="invoice[0][vatp]" class="vatp textright"></td>
                    <td><input type="number" name="invoice[0][vatamt]" class="vatamt textright"></td>
                    <td><input type="number" name="invoice[0][aftervat]" class="aftervat textright"></td>
                    <td><input type="text" name="invoice[0][vat_id]" class="vat_id"></td>
                    <td>
                      <a class="btn-actions text-danger deleteRowBtn" href="#">
                        <i class="fa fa-trash font-action-icons" aria-hidden="true"></i>
                      </a>
                    </td>
                  </tr>

                </tbody>
              </table>
            </div>


          </div>


        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col">

      </div>
      <div class="col">

      </div>
      <div class="col">
        <div>
          <table>
            <tr>
              <td>befordisc :</td>
              <td>
                <input type="text" id="sumbefordisc" name="sumbefordisc" placeholder="Sum of befordiscs" class="textright" readonly>
              </td>
            </tr>
            <tr>
              <td>befordisc VAT :</td>
              <td>
                <input type="text" id="sumVat" name="sumVat" placeholder="Sum of VAT" class="textright" readonly>
              </td>
            </tr>
            <tr>
              <td>Net befordisc</td>
              <td>
                <input type="text" id="grandbefordisc" name="grandbefordisc" placeholder="Grand befordisc" class="textright" readonly>
              </td>
            </tr>
          </table>
        </div>


      </div>
    </div>
  </div>

</form>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
  
  $(document).on('click', 'a.save-invoice', function (e) {
    e.preventDefault(); // Prevent default anchor click behavior
    var invoiceid = $(this).attr('href');
    $('a#btn-save').attr('href', invoiceid); // Assign the href to the save button
});

$(document).on('click', 'a#btn-save', function (e) {
    e.preventDefault();
    var saveUrl = $(this).attr('href'); // Get the href value from the button

    if (saveUrl) {
        $.ajax({
            url: saveUrl,
            type: 'POST', // Use POST for creating or updating data
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'), // Include the CSRF token
            },
            success: function (result) {
                alert(result.message); // Assuming the response has a message property
                // Perform any additional actions here
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
                alert('An error occurred while saving.'); // Error handling
            },
        });
    } else {
        alert('Save URL is missing!');
    }
});




  let row = 0; // Initialize row count to 0
  document.getElementById("addRowBtn").addEventListener("click", function(event) {
    row++;
    event.preventDefault();
    var tableBody = document.querySelector("#itemTable tbody");
    var newRow = document.createElement("tr");

    // List of input field names
    ['sno', 'stock_id', 'itemname', 'uprice', 'qty', 'befordisc', 'discp', 'discamt', 'afterdisc', 'vatp', 'vatamt', 'aftervat', 'vat_id'].forEach(function(item) {
      let td = document.createElement('td');
      let input;

      // Create inputs based on the field type
      if (item === 'sno') {
        input = document.createElement('input');
        input.setAttribute("class", 'slno sno');
        input.type = "text"; // Set type to text (or number if preferred)
        input.value = row + 1; // Set the default serial number starting from 1
        input.setAttribute("readonly", true); // Optional: make it readonly if it shouldn't be editable
      } else if (item === 'stock_id') {
        input = document.createElement('select');
        input.setAttribute("class", 'stock_id');
        // Optionally add options to the select element here
      } else {
        input = document.createElement('input');
        if (item != 'itemname') {
          input.setAttribute("class", 'textright');
          input.type = "number";
        } else {
          input.type = "text"; // Set input type to text
        }

      }

      // Set the name attribute dynamically
      let rowName = `invoice[${row}][${item}]`;
      input.setAttribute("name", rowName);

      td.appendChild(input);
      newRow.appendChild(td);
    });

    // Create and append the delete button cell
    var actionCell = document.createElement("td");
    var deleteButton = document.createElement("a");
    deleteButton.className = "btn-actions text-danger deleteRowBtn";
    deleteButton.href = "#";
    deleteButton.innerHTML = '<i class="fa fa-trash font-action-icons" aria-hidden="true"></i>';

    // Add event listener to handle row deletion
    deleteButton.addEventListener("click", function(event) {
      event.preventDefault();
      newRow.remove(); // Remove the row from the table
    });

    actionCell.appendChild(deleteButton);
    newRow.appendChild(actionCell);

    // Append the new row to the table body
    tableBody.appendChild(newRow);

    // Call the itemselect function if needed
    itemselect();
  });


  // Delegate event to handle delete button clicks
  document.querySelector("#itemTable").addEventListener("click", function(event) {
    if (event.target.closest(".deleteRowBtn")) {
      event.preventDefault();
      var row = event.target.closest("tr");
      row.remove();
    }
  });


  $('.customercode').select2({
    ajax: {
      url: "{{route('show_customer')}}",
      type: 'GET',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include the CSRF token
      },
      dataType: 'json',
      processResults: function(data, params) {
        return {
          results: data
        };
      }
    }
  });

  $('.customercode').on('select2:select', function(e) {

    $('input#vatno').val(e.params.data.vat_no)
  });

  function itemselect() {
    $('.stock_id').select2({
      ajax: {
        url: "{{route('show_Stock')}}",
        type: 'GET',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include the CSRF token
        },
        dataType: 'json',
        processResults: function(data, params) {
          return {
            results: data
          };
        }
      }
    });
  };

  itemselect();

  // $('.itemcode').on('select2:select',function(e){
  //   $('input#itemcode').val(e.params.data.code)
  //   $('input#itemname').val(e.params.data.text)
  //   $('input#vatp').val(e.params.data.vat_percent)
  //   $('input#vatcode').val(e.params.data.vat_id)
  // });
  //   $('.itemcode').on('select2:select', function(e) {
  //     // Find the closest tr (current row) to the select element
  //     let currentRow = $(this).closest('tr');

  //     // Fill the inputs within the current row based on the selection
  //     currentRow.find('input#itemcode').val(e.params.data.code);
  //     currentRow.find('input#itemname').val(e.params.data.text);
  //     currentRow.find('input#vatp').val(e.params.data.vat_percent);
  //     currentRow.find('input#vatcode').val(e.params.data.vat_id);
  // });

  $(document).on('select2:select', '.stock_id', function(e) {
    let currentRow = $(e.target).closest('tr');
    // console.log('Row identified:', currentRow); // Debug row identification
    // console.log('Selected data:', e.params.data); // Inspect the selected data
    let tbody = currentRow.closest('tbody');
    let rowIndex = tbody.find('tr').index(currentRow) + 1; // Add 1 to convert zero-based index to one-based
    console.log(rowIndex);
    // Set the values in the corresponding inputs within the current row
    console.log('Current Row:', currentRow);
    console.log('Row Index:', rowIndex);

    // Set the values in the corresponding inputs within the current row
    let slnoInput = currentRow.find('input[name="sno"]');
    console.log('SL No Input:', slnoInput);

    // Check if the input is found and set the value
    if (slnoInput.length) {
      slnoInput.val(rowIndex);
    } else {
      console.error('SL No input field not found.');
    }
    // currentRow.find('input[name="sno"]').val(rowIndex);
    currentRow.find('input[name*="itemname"]').val(e.params.data.text);
    currentRow.find('input[name*="uprice"]').val(e.params.data.uprice);
    currentRow.find('input[name*="vatp"]').val(e.params.data.vat_percent);
    currentRow.find('input[name*="vat_id"]').val(e.params.data.vat_id);
  });


  // $(document).on("blur", 'input[name="qty"]', function(e) {
  //   let tr = $(e.target.closest('tr'));
  //   let price = tr.find('input[name="uprice"]').val();
  //   let qty = tr.find('input[name="qty"]').val();
  //   let befordisc = tr.find('input[name="befordisc"]').val(price * qty);

  // })

  $(document).on("input", 'input[name^="invoice"][name*="[uprice]"], input[name^="invoice"][name*="[qty]"], input[name^="invoice"][name*="[discp]"], input[name^="invoice"][name*="[vatp]"]', function(e) {
    // Handle the input for price, quantity, discount, and VAT calculations
    let tr = $(e.target).closest('tr');

    // Calculate befordisc
    let price = parseFloat(tr.find('input[name*="[uprice]"]').val()) || 0;
    let qty = parseFloat(tr.find('input[name*="[qty]"]').val()) || 0;
    let total = price * qty;
    // Format total to 2 decimal places
    let formattedTotal = total.toFixed(2);
    // Set the formatted value to the input field
    tr.find('input[name*="[befordisc]"]').val(formattedTotal);

    // tr.find('input[name*="[befordisc]"]').val(price * qty);

    // Calculate Discount
    let befordiscamt = parseFloat(tr.find('input[name*="[befordisc]"]').val()) || 0;
    let discp = parseFloat(tr.find('input[name*="[discp]"]').val()) || 0;
    if (discp > 0) {
      let disamt =(befordiscamt * discp) / 100;
      let formattedDiscp = disamt.toFixed(2);
      tr.find('input[name*="[discamt]"]').val(formattedDiscp);
    }

    // Calculate After Discount
    let discv = parseFloat(tr.find('input[name*="[discamt]"]').val()) || 0;
    let discmatBformat = befordiscamt - discv;
    let formDiscamt = discmatBformat.toFixed(2);
    // tr.find('input[name*="[afterdisc]"]').val(befordiscamt - discv);
    tr.find('input[name*="[afterdisc]"]').val(formDiscamt);

    // Calculate VAT
    let Aftdisc = parseFloat(tr.find('input[name*="[afterdisc]"]').val());
    let vatp = parseFloat(tr.find('input[name*="[vatp]"]').val()) || 0;
    if (vatp > 0) {
      let vatbformat = (Aftdisc * vatp) / 100;
      let formatVatamt =vatbformat.toFixed(2);
      // tr.find('input[name*="[vatamt]"]').val((Aftdisc * vatp) / 100);
      tr.find('input[name*="[vatamt]"]').val(formatVatamt);
    }

    // Calculate Grand befordisc per row
    let vatvalue = parseFloat(tr.find('input[name*="[vatamt]"]').val()) || 0;
    let aftervatbformat = Aftdisc + vatvalue;
    let formatAfterdisc = aftervatbformat.toFixed(2);
    tr.find('input[name*="[aftervat]"]').val(formatAfterdisc);

    // Call the function to update the sums of befordiscs and VAT
    updateSums();
  });


  function updateSums() {
    let sumbefordisc = 0;
    let sumVat = 0;
    let grandbefordisc = 0;


    // Iterate over each row to calculate the sum of 'befordisc' and 'vatamt'
    $('#itemTable tr').each(function() {
      let rowbefordisc = parseFloat($(this).find('input[name*="afterdisc"]').val()) || 0;
      let rowVat = parseFloat($(this).find('input[name*="vatamt"]').val()) || 0;

      sumbefordisc += rowbefordisc;
      sumVat += rowVat;
    });

    // Calculate the grand befordisc
    grandbefordisc = sumbefordisc + sumVat;

    // Update the values in the sum text boxes
    $('#sumbefordisc').val(sumbefordisc.toFixed(2));
    $('#sumVat').val(sumVat.toFixed(2));
    $('#grandbefordisc').val(grandbefordisc.toFixed(2));
  }
</script>
@endsection