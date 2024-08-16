@extends('layouts.default')

@section('page')
<div class="container">



  <div class="tab">
    <button class="tablinks" onclick="openCity(event, 'Details')">Details</button>
    <button class="tablinks" onclick="openCity(event, 'Additional')">Additional</button>
    <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>
  </div>
  <div id="Details" class="tabcontent">
    <div class="container text-center">
    <div class="row">
      <div class="col">
      <div class="form-group row">
            <label for="categorycode" class="col-md-3 ng-binding">Code</label>
            <div class="col-md-9">
              <input id="categorycode" name="code" type="text" placeholder="Enter Customer Code" class="form-control input-sm ng-pristine ng-untouched ng-valid ng-empty" ng-model="customer.code" disabled="">
              <span class="badge badge-danger ng-hide" ng-show="hasError &amp;&amp; customerForm.code.$error.required">Code is
                required</span>
            </div>
          </div>

          <div class="form-group row">
            <label for="customername" class="col-md-3 ng-binding">Customer</label>
            <div class="col-md-9">
              <input id="customername" name="name" type="text" placeholder="Enter Customer name" class="form-control input-sm ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" ng-model="customer.name" required="">
              <span class="badge badge-danger ng-hide" ng-show="hasError &amp;&amp; customerForm.name.$error.required">Customer is
                required</span>
            </div>
          </div>

          <div class="form-group row">
            <label for="customernameinar" class="col-md-3 ng-binding">Customer in Arabic</label>
            <div class="col-md-9">
              <input id="customernameinar" name="name_ar" type="text" placeholder="Enter Customer in arabic" class="form-control input-sm ng-pristine ng-untouched ng-empty ng-invalid ng-invalid-required" ng-model="customer.name_ar" required="">
              <span class="badge badge-danger ng-hide" ng-show="hasError &amp;&amp; customerForm.name_ar.$error.required">Customer
                name in
                Arabic
                is required</span>
            </div>
          </div>

          <div class="form-group row">
            <label for="customerPhone" class="col-md-3 ng-binding">Phone</label>
            <div class="col-md-9">
              <div class="row">
                <div class="col-md-4">
                  <input id="customerPhoneCode" name="phone_code" type="text" placeholder="Code" class="form-control input-sm ng-pristine ng-valid ng-empty ng-valid-maxlength ng-touched" ng-model="customer.phone_code" maxlength="8" only-digits="" style="">
                  <span class="badge badge-danger ng-hide" ng-show="hasError &amp;&amp; customerForm.phone_code.$error.required">
                    Required</span>
                  <span class="badge badge-danger ng-hide" ng-show="hasError &amp;&amp; customerForm.phone_code.$error.maxlength">
                    Maxlength is 8</span>
                </div>
                <div class="col-md-8">
                  <input id="customerPhone" name="phone" type="text" placeholder="Enter Phone" class="form-control input-sm ng-pristine ng-untouched ng-valid ng-empty" ng-model="customer.phone" only-digits="">
                  <span class="badge badge-danger ng-hide" ng-show="hasError &amp;&amp; customerForm.phone.$error.required">Phone is
                    required</span>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group row">
            <label for="customerMobile" class="col-md-3 ng-binding">Mobile</label>
            <div class="col-md-9">
              <input id="customerMobile" name="mobile" type="text" placeholder="Enter Mobile" class="form-control input-sm ng-pristine ng-untouched ng-valid ng-empty" ng-model="customer.mobile">
              <span class="badge badge-danger ng-hide" ng-show="hasError &amp;&amp; customerForm.mobile.$error.required">Mobile
                is required</span>
            </div>
          </div>
      </div>
      <div class="col">
      <div class="form-group row">
            <label for="customeraddress" class="col-md-3 ng-binding">Address</label>
            <div class="col-md-9">
              <textarea id="customeraddress" name="address" type="text" placeholder="Enter Address" class="form-control input-sm ng-pristine ng-untouched ng-valid ng-empty" ng-model="customer.address"></textarea>
              <span class="badge badge-danger ng-hide" ng-show="hasError &amp;&amp; customerForm.address.$error.required">Address
                is required</span>
            </div>
          </div>

          <div class="form-group row">
            <label for="customeraddressinar" class="col-md-3 ng-binding">Address in arabic</label>
            <div class="col-md-9">
              <textarea id="customeraddressinar" name="address_ar" type="text" placeholder="Enter Address in arabic" class="form-control input-sm ng-pristine ng-untouched ng-valid ng-empty" ng-model="customer.address_ar"></textarea>
              <span class="badge badge-danger ng-hide" ng-show="hasError &amp;&amp; customerForm.address_ar.$error.required">Address in
                arabic
                is required</span>
            </div>
          </div>

          <div class="form-group row">
            <label for="customervat" class="col-md-3 ng-binding">Vat No</label>
            <div class="col-md-9">
              <input id="customervat" name="vat_no" ng-maxlength="15" type="text" placeholder="Enter Vat No" class="form-control input-sm ng-pristine ng-untouched ng-valid ng-empty ng-valid-maxlength" ng-model="customer.vat_no">
              <span class="badge badge-danger ng-hide" ng-show="hasError &amp;&amp; customerForm.vat_no.$error.required">Vat No is
                required</span>
              <span class="badge badge-danger ng-hide" ng-show="hasError &amp;&amp; customerForm.vat_no.$error.maxlength">Maxlength is 15</span>
            </div>
          </div>

          <div class="form-group row">
            <label for="cr_no" class="col-md-3 ng-binding">CR No</label>
            <div class="col-md-9">
              <input id="cr_no" name="cr_no" type="text" placeholder="Enter CR No" class="form-control input-sm ng-pristine ng-untouched ng-valid ng-empty" ng-model="customer.cr_no">
              <span class="badge badge-danger ng-hide" ng-show="hasError &amp;&amp; customerForm.cr_no.$error.required">CR No
                is
                required</span>
            </div>
          </div>

          <div class="form-group row">
            <label for="customeroff_no" class="col-md-3 ng-binding">Office No</label>
            <div class="col-md-9">
              <input id="customeroff_no" name="office_no" type="text" placeholder="Enter Office No" class="form-control input-sm ng-pristine ng-untouched ng-valid ng-empty" ng-model="customer.office_no">
              <span class="badge badge-danger ng-hide" ng-show="hasError &amp;&amp; customerForm.office_no.$error.required">Office
                No is
                required</span>
            </div>
          </div>
      </div>
     
    </div>
  </div>


  </div>

  <div id="Additional" class="tabcontent">
  <h3>Additional</h3>
  <p>Additional is.</p> 
</div>

</div>
@endsection
@section('js')
<script>
  function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }
</script>
@endsection