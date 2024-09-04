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

            <a href="" id="inv-frm-btn" type="submit" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
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
                        <td><select id="customercode" class="customercode" style="width: 100%;"></select></td>

                      </tr>
                    </table>

                  </div>

                </div>
                <div class="col-sm">
                  <table style="width:100%">
                    <tr>
                      <td style="width: 150px;">Customer Name :</td>
                      <td><Input type="text" class="textwidht"></Input></td>
                    </tr>
                    <tr>
                      <td style="width: 150px;">Customer Vat No :</td>
                      <td><Input id="vatno" type="text" class="textwidht"></Input></td>
                    </tr>
                  </table>
                </div>
                <div class="col-sm">
                  <table style="width:100%">
                    <tr>
                      <td style="width: 150px;">Invoice No :</td>
                      <td><input id="invoiceno" type="text" class="textwidht"></td>
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
                    <th>Total</th>
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
                    <td><input type="text" name="invoice[sno][]" class="slno sno"></td>

                    <td><select class="itemcode select2"></select></td>
                    <td><input type="text" name="invoice[itemname][]" class="itemname"></td>
                    <td>
                      <input type="number" name="invoice[].uprice" class="uprice numeric-input" step="0.01">
                    </td>

                    <td><input type="text" name="invoice[].qty" class="qty"></td>
                    <td><input type="text" name="invoice[].total" class="total"></td>
                    <td><input type="text" name="invoice[].discp" class="discp"></td>
                    <td><input type="text" name="invoice[].discvalue" class="discvalue"></td>
                    <td><input type="text" name="invoice[].afterdisc" class="afterdisc"></td>
                    <td><input type="text" name="invoice[].vatp" class="vatp"></td>
                    <td><input type="text" name="invoice[].vatamt" class="vatamt"></td>
                    <td><input type="text" name="invoice[].gtotal" class="gtotal"></td>
                    <td><input type="text" name="invoice[].vatcode" class="vatcode"></td>
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
              <td>Total :</td>
              <td><input type="text" id="sumTotal" placeholder="Sum of Totals" readonly></td>
            </tr>
            <tr>
              <td>Total VAT :</td>
              <td><input type="text" id="sumVat" placeholder="Sum of VAT" readonly></td>
            </tr>
            <tr>
              <td>Net Total</td>
              <td><input type="text" id="grandTotal" placeholder="Grand Total" readonly></td>
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
  $(document).on('click', 'a#inv-frm-btn', function(e) {
    e.preventDefault();
    $('form#inv-frm').submit();
  });


  document.getElementById("addRowBtn").addEventListener("click", function(event) {
    event.preventDefault();
    var tableBody = document.querySelector("#itemTable tbody");
    var newRow = document.createElement("tr");

    // Create and append the search button cell
    // var searchButtonCell = document.createElement("td");
    // var searchButton = document.createElement("a");
    // searchButton.href = "#";
    // searchButton.className = "d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm";
    // searchButton.innerHTML = '<i class="fas fa-search fa-sm text-white-50"></i>';

    // searchButtonCell.appendChild(searchButton);
    // newRow.appendChild(searchButtonCell);

    // Create and append the input cells
    ['invoice[sno][]', 'invoice[itemcode][]', 'invoice[].itemname', 'invoice[].uprice', 'invoice[].qty', 'invoice[].total', 'invoice[].discp', 'invoice[].discvalue', 'invoice[].afterdisc', 'invoice[].vatp', 'invoice[].vatamt', 'invoice[].gtotal', 'invoice[].vatcode'].forEach(function(item) {
      let td = document.createElement('td');
      let input;
      if ("sno" == item) {
        input = document.createElement('input');
        input.setAttribute("class", 'slno')
      }
      if ("itemcode" == item) {
        input = document.createElement('select');
        input.setAttribute("name", item);
        input.setAttribute("class", 'itemcode')
      } else if ("sno" != item) {
        input = document.createElement('input');
        input.setAttribute("name", item);
        input.type = "text"; // Set input type to text
      }
      td.appendChild(input);
      newRow.appendChild(td);

    });

    // Create and append the delete button cell
    var actionCell = document.createElement("td");
    var deleteButton = document.createElement("a");
    deleteButton.className = "btn-actions text-danger deleteRowBtn";
    deleteButton.href = "#";
    deleteButton.innerHTML = '<i class="fa fa-trash font-action-icons" aria-hidden="true"></i>';

    actionCell.appendChild(deleteButton);
    newRow.appendChild(actionCell);

    tableBody.appendChild(newRow);
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
    $('.itemcode').select2({
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

  $(document).on('select2:select', '.itemcode', function(e) {
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
    currentRow.find('input[name="sno"]').val(rowIndex);
    currentRow.find('input[name="itemname"]').val(e.params.data.text);
    currentRow.find('input[name="uprice"]').val(e.params.data.uprice);
    currentRow.find('input[name="vatp"]').val(e.params.data.vat_percent);
    currentRow.find('input[name="vatcode"]').val(e.params.data.vat_id);
  });


  // $(document).on("blur", 'input[name="qty"]', function(e) {
  //   let tr = $(e.target.closest('tr'));
  //   let price = tr.find('input[name="uprice"]').val();
  //   let qty = tr.find('input[name="qty"]').val();
  //   let total = tr.find('input[name="total"]').val(price * qty);

  // })

  $(document).on("input", 'input[name="uprice"], input[name="qty"], input[name="discp"], input[name="vatp"]', function(e) {
    // Handle the input for price, quantity, discount, and VAT calculations
    let tr = $(e.target).closest('tr');

    // Calculate Total
    let price = parseFloat(tr.find('input[name="uprice"]').val()) || 0;
    let qty = parseFloat(tr.find('input[name="qty"]').val()) || 0;
    tr.find('input[name="total"]').val(price * qty);

    // Calculate Discount
    let totalamt = parseFloat(tr.find('input[name="total"]').val()) || 0;
    let discp = parseFloat(tr.find('input[name="discp"]').val()) || 0;
    if (discp > 0) {
      tr.find('input[name="discvalue"]').val((totalamt * discp) / 100);
    }

    // Calculate After Discount
    let discv = parseFloat(tr.find('input[name="discvalue"]').val()) || 0;
    tr.find('input[name="afterdisc"]').val(totalamt - discv);

    // Calculate VAT
    let Aftdisc = parseFloat(tr.find('input[name="afterdisc"]').val());
    let vatp = parseFloat(tr.find('input[name="vatp"]').val()) || 0;
    if (vatp > 0) {
      tr.find('input[name="vatamt"]').val((Aftdisc * vatp) / 100);
    }

    // Calculate Grand Total per row
    let vatvalue = parseFloat(tr.find('input[name="vatamt"]').val()) || 0;
    tr.find('input[name="gtotal"]').val(Aftdisc + vatvalue);

    // Call the function to update the sums of totals and VAT
    updateSums();
  });

  function updateSums() {
    let sumTotal = 0;
    let sumVat = 0;
    let grandTotal = 0;


    // Iterate over each row to calculate the sum of 'total' and 'vatamt'
    $('#itemTable tr').each(function() {
      let rowTotal = parseFloat($(this).find('input[name="afterdisc"]').val()) || 0;
      let rowVat = parseFloat($(this).find('input[name="vatamt"]').val()) || 0;

      sumTotal += rowTotal;
      sumVat += rowVat;
    });

    // Calculate the grand total
    grandTotal = sumTotal + sumVat;

    // Update the values in the sum text boxes
    $('#sumTotal').val(sumTotal.toFixed(2));
    $('#sumVat').val(sumVat.toFixed(2));
    $('#grandTotal').val(grandTotal.toFixed(2));
  }
</script>
@endsection