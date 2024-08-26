@extends('layouts.default')

@section('page')
<div class="container">
  <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="p-5">

          <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'Details')">Details</button>
            <button class="tablinks" onclick="openCity(event, 'Additional')">Additional Details</button>
            <button class="tablinks" onclick="openCity(event, 'BussinessDetails')">Business Details</button>
            <div class="float-right">
              <a id="reg-frm-btn" type="submit" class="btn btn-primary btn-user btn-block">
                Save
              </a>
            </div>

          </div>

          <form id="customer-frm" class="user" method="POST">
            @csrf

            <div id="Details" class="tabcontent">
              <div class="container text-center">
                <div class="row">
                  <div class="col">
                    <div class="form-group row">
                      <table style="width:100%">
                        <tr>
                          <td>
                            <label for="status" class="col ng-binding">Status</label>
                          </td>
                          <td style="width:70%">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                              <!-- Rounded switch -->
                              <label class="switch">
                                <input type="checkbox" name="status">
                                <span class="slider round"></span>
                              </label>
                            </div>
                          </td>
                        </tr>

                        <tr>
                          <td>
                            <label for="customercode" class="col ng-binding">Code</label>
                          </td>
                          <td style="width:70%">
                            <div class="col-md-auto">
                              <input type="text" class="form-control "
                                id="customercode" placeholder="Customer Code" name="code"
                                value="{{ old('code') }}">
                              @error('code')
                              <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </td>
                        </tr>

                        <tr>
                          <td>
                            <label for="customername" class="col ng-binding">Customer</label>
                          </td>
                          <td style="width:70%">
                            <div class="col-md-auto">
                              <input type="text" class="form-control " id="name"
                                placeholder="Customer Name" name="name"
                                value="{{ old('name') }}">
                              @error('name')
                              <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </td>
                        </tr>

                        <tr>
                          <td>
                            <label for="name_arabic" class="col ng-binding">Customer in Arabic</label>
                          </td>
                          <td style="width:70%">
                            <div class="col-md-auto">
                              <input type="text" class="form-control " id="name_ar"
                                placeholder="Customer Name In Arabic" name="name_arabic"
                                value="{{ old('name_arabic') }}">
                              @error('name_ar')
                              <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </td>
                        </tr>

                        <tr>
                          <td>
                            <label for="customerPhone" class="col ng-binding">Phone</label>
                          </td>
                          <td style="width:70%">
                            <div class="col-md-auto">
                              <div class="row">
                                <div class="col-md-4">
                                  <input type="text" class="form-control "
                                    id="phone_code" placeholder="Code" name="customerPhoneCode"
                                    value="{{ old('customerPhoneCode') }}">
                                  @error('phone_code')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror
                                </div>
                                <div class="col-md-8">
                                  <input type="text" class="form-control "
                                    id="phone" placeholder="Phone Number" name="customerPhone"
                                    value="{{ old('customerPhone') }}">
                                  @error('phone')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>

                        <tr>
                          <td>
                            <label for="customerMobile" class="col ng-binding">Mobile</label>
                          </td>
                          <td style="width:70%">
                            <div class="col-md-auto">
                              <input type="text" class="form-control " id="mobile"
                                placeholder="Mobile Number" name="customerMobile"
                                value="{{ old('customerMobile') }}">
                              @error('mobile')
                              <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </td>
                        </tr>

                        <tr>
                          <td>
                            <label for="email" class="col ng-binding">Email</label>
                          </td>
                          <td style="width:70%">
                            <div class="col-md-auto">
                              <input type="text" class="form-control " id="email"
                                placeholder="E-mail" name="email"
                                value="{{ old('email') }}">
                              @error('email')
                              <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>

                  <div class="col">
                    <div class="form-group row">
                      <table>
                        <tr>
                          <td>
                            <label for="customeraddress" class="col ng-binding">Address</label>
                          </td>
                          <td>
                            <div class="col-md-auto">
                              <textarea type="text" class="form-control " id="address" placeholder="Address In English"
                                name="customeraddress" value="{{ old('customeraddress') }}"></textarea>
                              @error('address')
                              <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </td>
                        </tr>

                        <tr>
                          <td>
                            <label for="customeraddressinar" class="col ng-binding">Address in
                              arabic</label>
                          </td>
                          <td>
                            <div class="col-md-auto">
                              <textarea type="text" class="form-control " id="address_ar" placeholder="Address In Arabic"
                                name="customeraddressinar" value="{{ old('customeraddressinar') }}"></textarea>
                              @error('address_ar')
                              <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </td>
                        </tr>

                        <tr>
                          <td>
                            <label for="customervat" class="col ng-binding">Vat No</label>
                          </td>
                          <td>
                            <div class="col-md-auto">
                              <input type="text" class="form-control "
                                id="vat_no" placeholder="VAT Number" name="customervat"
                                value="{{ old('customervat') }}">
                              @error('vat_no')
                              <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </td>
                        </tr>

                        <tr>
                          <td>
                            <label for="cr_no" class="col ng-binding">CR No</label>
                          </td>
                          <td>
                            <div class="col-md-auto">
                              <input type="text" class="form-control "
                                id="cr_no" placeholder="CR Number" name="cr_no"
                                value="{{ old('cr_no') }}">
                              @error('cr_no')
                              <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </td>
                        </tr>

                        <tr>
                          <td>
                            <label for="customeroff_no" class="col ng-binding">Office No</label>
                          </td>
                          <td>
                            <div class="col-md-auto">
                              <input type="text" class="form-control "
                                id="customeroff_no" placeholder="Office Number" name="customeroff_no"
                                value="{{ old('office_no') }}">
                              @error('office_no')
                              <div class="alert alert-danger">{{ $message }}</div>
                              @enderror
                            </div>
                          </td>
                        </tr>

                      </table>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            <div id="Additional" class="tabcontent">
              <div class="container text-center">
                <div class="row">
                  <div class="col">
                    <div class="form-group row">
                      <table style="width:100%">
                        <tr>
                          <td>
                            <label for="country" class="col ng-binding">Country</label>
                          </td>
                          <td style="width:70%">
                            <div class="col-md-9">
                              <div class="row">
                                <div class="col-md-4">
                                  <input type="text" class="form-control "
                                    id="country_code" placeholder="Code" name="country_code"
                                    value="{{ old('country_code') }}">
                                  @error('country_id')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror
                                </div>
                                <div class="col-md-8">
                                  <input type="text" class="form-control "
                                    id="country" placeholder="Counrty" name="country"
                                    value="{{ old('country_id') }}">
                                  @error('country_id')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>

                        <tr>
                          <td>
                            <label for="region" class="col ng-binding">Region</label>
                          </td>
                          <td>
                            <div class="col-md-9">
                              <div class="row">
                                <div class="col-md-4">
                                  <input type="text" class="form-control "
                                    id="region_code" placeholder="Code" name="region_code"
                                    value="{{ old('region_code') }}">
                                  @error('region_id')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror
                                </div>
                                <div class="col-md-8">
                                  <input type="text" class="form-control "
                                    id="region" placeholder="Region" name="region">
                                  @error('region_id')
                                  <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror
                                </div>
                              </div>
                            </div>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div id="BussinessDetails" class="tabcontent">
              <div class="container text-center">
                <div class="row">
                  <div class="col">

                    <div class="form-group row">
                      <label for="customer_name" class="col ng-binding">Customer Name</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control " id="customer_name"
                          placeholder="Customer Name" name="customer_name">
                        @error('customer_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="vat_reg_number" class="col ng-binding">VAT Reg Number</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control " id="vat_reg_number"
                          placeholder="VAT Register Number" name="vat_reg_number">
                        @error('vat_reg_number')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="customer_identification_number" class="col ng-binding">Customer ID
                        Number</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control "
                          id="customer_identification_number" placeholder="Customer ID Number"
                          name="customer_identification_number">
                        @error('customer_identification_number')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="city_name" class="col ng-binding">City</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control " id="city_name"
                          placeholder="City" name="city_name">
                        @error('city_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="city_subdivision_name" class="col ng-binding">City SubDivision</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control "
                          id="city_subdivision_name" placeholder="City SubDivision"
                          name="city_subdivision_name">
                        @error('city_subdivision_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="country_subentity" class="col ng-binding">City SubEntity</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control " id="country_subentity"
                          placeholder="City SubEntity" name="country_subentity">
                        @error('country_subentity')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="street_name" class="col ng-binding">Street</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control " id="street_name"
                          placeholder="Street" name="street_name">
                        @error('street_name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="building_no" class="col ng-binding">Building No</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control " id="building_no"
                          placeholder="Building Number" name="building_no">
                        @error('building_no')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="additional_no" class="col ng-binding">Additional No</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control " id="additional_no"
                          placeholder="Additional Number" name="additional_no">
                        @error('additional_no')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="postal_zone" class="col ng-binding">Postal Zone</label>
                      <div class="col-md-9">
                        <input type="text" class="form-control " id="postal_zone"
                          placeholder="Postal Zone" name="postal_zone">
                        @error('postal_zone')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            </div>

          </form>
        </div>
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

  $(document).on('click', 'a#reg-frm-btn', function(e) {
    e.preventDefault();
    $('form#customer-frm').submit();
  });
</script>
@endsection