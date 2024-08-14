@extends('layouts.default')

@section('page')
<div class="container">



  <div class="tab">
    <button class="tablinks" onclick="openCity(event, 'Details')">Details</button>
    <button class="tablinks" onclick="openCity(event, 'Additional')">Additional</button>
    <button class="tablinks" onclick="openCity(event, 'Tokyo')">Tokyo</button>
  </div>
  <div id="Details" class="tabcontent">


    <div class="row ng-scope">
      <div class="col-md-12">
        <div class="col-md-6">
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

        <div class="col-md-6">
          <div class="form-group row">
            <label for="country" class="col-md-3 ng-binding">Country</label>
            <div class="col-md-9">
              <select name="country_id" id="country" class="form-control input-sm ng-pristine ng-untouched ng-valid ng-not-empty" ng-model="customer.country_id" ng-options="countries.id as countries.title for countries in countries" ng-change="loadRegion(customer.country_id)" style="">
                <option value="" disabled="" class="ng-binding">Select Country</option>
                <option label="Saudi Arabia" value="number:1" selected="selected">Saudi Arabia</option>
              </select>
              <span class="badge badge-danger ng-hide" ng-show="hasError &amp;&amp; customerForm.country_id.$error.required">Country
                is required</span>
            </div>
          </div>

          <div class="form-group row">
            <label for="region" class="col-md-3 ng-binding">Region</label>
            <div class="col-md-9">
              <!-- ngIf: dataRegionLoading -->
              <select name="region_id" id="region" class="form-control input-sm ng-pristine ng-untouched ng-valid ng-empty" ng-model="customer.region_id" ng-options="regions.id as regions.title for regions in regions" ng-change="loadArea(customer.region_id)">
                <option value="" disabled="" class="ng-binding" selected="selected">Select Region</option>
                <option label="Mecca" value="number:1">Mecca</option>
                <option label="Riyadh" value="number:2">Riyadh</option>
              </select>
              <span class="badge badge-danger ng-hide" ng-show="hasError &amp;&amp; customerForm.region_id.$error.required">Region
                is required</span>
            </div>
          </div>

          <div class="form-group row">
            <label for="area" class="col-md-3 ng-binding">Area</label>
            <div class="col-md-9">
              <!-- ngIf: dataLoading -->
              <select name="area_id" id="area" class="form-control input-sm ng-pristine ng-untouched ng-valid ng-empty" ng-model="customer.area_id" ng-options="areas.id as areas.title for areas in areas" ng-change="loadMalls(customer.area_id)">
                <option value="" disabled="" class="ng-binding" selected="selected">Select Area</option>
              </select>
              <span class="badge badge-danger ng-hide" ng-show="hasError &amp;&amp; customerForm.area_id.$error.required">Area
                is required</span>
            </div>
          </div>

          <div class="form-group row">
            <label for="mall" class="col-md-3 ng-binding">Malls</label>
            <div class="col-md-9">
              <!-- ngIf: dataMallLoading -->
              <select name="mall_id" id="mall" class="form-control input-sm ng-pristine ng-untouched ng-valid ng-empty" ng-model="customer.mall_id" ng-options="malls.id as malls.title for malls in malls">
                <option value="" disabled="" class="ng-binding" selected="selected">Select Mall</option>
              </select>
              <span class="badge badge-danger ng-hide" ng-show="hasError &amp;&amp; customerForm.mall_id.$error.required">Mall
                is required</span>
            </div>
          </div>

          <div class="form-group row">
            <label for="customerEmail" class="col-md-3 ng-binding">Email</label>
            <div class="col-md-9">
              <input id="customerEmail" name="email" type="text" placeholder="Enter Email" class="form-control input-sm ng-pristine ng-untouched ng-valid ng-empty" ng-model="customer.email">
              <span class="badge badge-danger ng-hide" ng-show="hasError &amp;&amp; customerForm.email.$error.required">Email is
                required</span>
            </div>
          </div>

          <div class="form-group row">
            <label for="customercommercialname" class="col-md-3 ng-binding">Commercial Name</label>
            <div class="col-md-9">
              <input id="customercommercialname" name="commercial_name" type="text" placeholder="Enter Commercial Name" class="form-control input-sm ng-pristine ng-untouched ng-valid ng-empty" ng-model="customer.commercial_name">
              <span class="badge badge-danger ng-hide" ng-show="hasError &amp;&amp; customerForm.commercial_name.$error.required">Commercial Name is
                required</span>
            </div>
          </div>

          <div class="form-group row">
            <label for="customercommercialnameinar" class="col-md-3 ng-binding">Commercial Name in Arabic</label>
            <div class="col-md-9">
              <input id="customercommercialnameinar" name="commercial_name_ar" type="text" placeholder="Enter Commercial Name in Arabic" class="form-control input-sm ng-pristine ng-untouched ng-valid ng-empty" ng-model="customer.commercial_name_ar">
              <span class="badge badge-danger ng-hide" ng-show="hasError &amp;&amp; customerForm.commercial_name_ar.$error.required">Commercial Name
                name in
                Arabic
                is required</span>
            </div>
          </div>

          <div class="form-group row">
            <label for="country" class="col-md-3 ng-binding">Currencies</label>
            <div class="col-md-9">
              <select name="currency_id" id="country" class="form-control input-sm ng-pristine ng-untouched ng-valid ng-not-empty" ng-model="customer.currency_id" ng-options="currencies.id as currencies.title for currencies in currencies" style="">
                <option value="" disabled="" class="ng-binding">Select Currencies</option>
                <option label="SAR" value="number:1" selected="selected">SAR</option>
                <option label="USD" value="number:2">USD</option>
              </select>
              <span class="badge badge-danger ng-hide" ng-show="hasError &amp;&amp; customerForm.currency_id.$error.required">Currency
                is required</span>
            </div>
          </div>

          <div class="form-group row">
            <label for="customer_group_id" class="col-md-3 ng-binding">Customer Group</label>
            <div class="col-md-9">
              <select name="customer_group_id" id="customer_group_id" class="form-control input-sm ng-pristine ng-untouched ng-valid ng-empty" ng-model="customer.customer_group_id" ng-options="customer_groups.id as customer_groups.title for customer_groups in customer_groups">
                <option value="" disabled="" class="ng-binding" selected="selected">Select Customer Group</option>
                <option label="A" value="number:1">A</option>
                <option label="B" value="number:2">B</option>
                <option label="C" value="number:3">C</option>
                <option label="D" value="number:4">D</option>
              </select>
              <span class="badge badge-danger ng-binding ng-hide" ng-show="hasError &amp;&amp; customerForm.customer_group_id.$error.required">Customer Group is requiredHome</span>
            </div>
          </div>

          <div class="form-group row">
            <label for="account_id" class="col-md-3 ng-binding">Account</label>
            <div class="col-md-9">
              <select ng-show="lang != 'ar'" name="account_id" id="account_id" class="form-control input-sm ng-pristine ng-untouched ng-not-empty ng-valid ng-valid-required" ng-model="customer.account_id" ng-disabled="!branch_customer_mappings_for_accounts" ng-options="customerAccounts.id as customerAccounts.name for customerAccounts in customerAccounts" required="" style="">
                <option value="" disabled="" class="ng-binding">Select Account</option>
                <option label="Debtors" value="number:65" selected="selected">Debtors</option>
              </select>
              <select ng-show="lang == 'ar'" name="account_id" id="account_id" class="form-control input-sm ng-pristine ng-untouched ng-hide ng-not-empty ng-valid ng-valid-required" ng-model="customer.account_id" ng-disabled="!branch_customer_mappings_for_accounts" ng-options="customerAccounts.id as customerAccounts.name_ar for customerAccounts in customerAccounts" required="" style="">
                <option value="" disabled="" class="ng-binding">Select Account</option>
                <option label="العمــــلاء" value="number:65" selected="selected">العمــــلاء</option>
              </select>
              <span class="badge badge-danger ng-hide" ng-show="hasError &amp;&amp; customerForm.account_id.$error.required">Account is required</span>
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