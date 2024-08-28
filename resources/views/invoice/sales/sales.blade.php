@extends('layouts.default')

@section('page')
<form action="">
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

            <a href="{{route('add-region')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
              <i class="fas fa-plus fa-sm text-white-50"></i>Add Region</a>
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
                        <td><select class="js-customer-ajax" style="width: 100%;"></select></td>
                       
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
                      <td><Input type="text" class="textwidht"></Input></td>
                    </tr>
                  </table>
                </div>
                <div class="col-sm">
                  <table style="width:100%">
                    <tr>
                      <td style="width: 150px;">Invoice No :</td>
                      <td><input type="text" class="textwidht"></td>
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
              <a href="#" id="addRowBtn" class="d-none d-sm-inline-block btn btn-sm btn-success" >
                <i class="fas fa-none fa-sm text-white-50"></i> Add
              </a>
              <table id="itemTable" style="width: 100%;">
                <thead>
                  <tr>
                    <th>s</th>
                    <th style="width:10px;">Slno</th> 
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
                    <td><a href="" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-search fa-sm text-white-50"></i></a></td>
                    <!-- <td style="width:10px;"><input type="text" name="slno"></td> -->
                    <td style="width: 10px !important;"><input type="text" name="slno" style="width: 100%;"></td>
                    <td><input type="text" name="itemcode"></td>
                    <td><input type="text" name="itemname"></td>
                    <td><input type="text" name="uprice"></td>
                    <td><input type="text" name="qty"></td>
                    <td><input type="text" name="total"></td>
                    <td><input type="text" name="discp"></td>
                    <td><input type="text" name="discvalue"></td>
                    <td><input type="text" name="afterdisc"></td>
                    <td><input type="text" name="vatp"></td>
                    <td><input type="text" name="vatamt"></td>
                    <td><input type="text" name="gtotal"></td>
                    <td><input type="text" name="vatcode"></td>
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
          <div class="thirdRow"></div>

        </div>
      </div>
    </div>
  </div>

</form>
@endsection

@section('js')
<script>
  document.getElementById("addRowBtn").addEventListener("click", function(event) {
    event.preventDefault();
    var tableBody = document.querySelector("#itemTable tbody");
    var newRow = document.createElement("tr");

    // Create and append the search button cell
    var searchButtonCell = document.createElement("td");
    var searchButton = document.createElement("a");
    searchButton.href = "#";
    searchButton.className = "d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm";
    searchButton.innerHTML = '<i class="fas fa-search fa-sm text-white-50"></i>';
    
    searchButtonCell.appendChild(searchButton);
    newRow.appendChild(searchButtonCell);

    // Create and append the input cells
    ['slno','itemcode','itemname','uprice','qty','total','discp','discvalue','afterdisc','vatp','vatamt','gtotal','vatcode'].forEach(function(item){
      let td = document.createElement('td');
      let input = document.createElement('input');
      input.setAttribute("name", item);
      input.type = "text";  // Set input type to text
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
});

// Delegate event to handle delete button clicks
document.querySelector("#itemTable").addEventListener("click", function(event) {
    if (event.target.closest(".deleteRowBtn")) {
        event.preventDefault();
        var row = event.target.closest("tr");
        row.remove();
    }
});


$('.js-customer-ajax').select2({
  ajax: {
    // url: 'https://api.github.com/search/repositories',
    url: '{{ route("show_customer")}}',
    dataType: 'json'
    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
  }
});

</script>

@endsection