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
                        <td><Input type="text" class="textwidht"></Input></td>
                        <td><a href="{{}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                            <i class="fas fa-search fa-sm text-white-50"></i></a></td>
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
              <a href="#" id="addRowBtn" class="d-none d-sm-inline-block btn btn-sm btn-success">
                <i class="fas fa-none fa-sm text-white-50"></i> Add
              </a>
              <table id="itemTable" style="width: 100%;">
                <thead>
                  <tr>
                    <th style="width:50px;">Slno</th>
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
                    <td style="width:50px;"><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
                    <td><input type="text"></td>
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

    for (var i = 0; i < 13; i++) {
      var newCell = document.createElement("td");
      var inputElement = document.createElement("input");
      inputElement.type = "text";
      newCell.appendChild(inputElement);
      newRow.appendChild(newCell);
    }

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
</script>

@endsection