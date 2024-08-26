@extends('layouts.default')

@section('page')
    <div class="container">

        <div class="tab">
            <button class="tablinks" onclick="openCity(event, 'Details')">Details</button>
            <button class="tablinks" onclick="openCity(event, 'Additional')">Additional Details</button>
            <button class="tablinks" onclick="openCity(event, 'BussinessDetails')">Business Details</button>
      <div class="float-right">
           <a id="reg-frm-btn" type="submit" class="btn btn-primary btn-user btn-block">
                Save
            </a>
      </div>
         


              <form action="{{ route('customer.edit',['id'=> $customer->id]) }}" id="customer-frm" class="user" method="POST">
                @csrf
                @method('PUT')

            <div id="Details" class="tabcontent">
                <div class="container text-center">
                    <div class="row">
                        <div class="col">
                            <div class="form-group row">
                                <table style="width:100%">
                                    <tr>
                                        <td>
                                            <label for="status" class="col-md-3 ng-binding">Status</label>
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
                                            <label for="customercode" class="col-md-3 ng-binding">Code</label>
                                        </td>
                                        <td style="width:70%">
                                            <div class="col-md-auto">
                                                <input type="text" class="form-control form-control-user"
                                                    id="customercode" placeholder="Customer Code" name="code"
                                                    value="{{ old('code') ?? $customer->code  }}">
                                                @error('code')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label for="customername" class="col-md-3 ng-binding">Customer</label>
                                        </td>
                                        <td style="width:70%">
                                            <div class="col-md-auto">
                                                <input type="text" class="form-control form-control-user" id="name"
                                                    placeholder="Customer Name" name="name"
                                                    value="{{ old('name') ?? $customer->name }}">
                                                @error('name')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label for="name_arabic" class="col-md-3 ng-binding">Customer in Arabic</label>
                                        </td>
                                        <td style="width:70%">
                                            <div class="col-md-auto">
                                                <input type="text" class="form-control form-control-user" id="name_ar"
                                                    placeholder="Customer Name In Arabic" name="name_arabic"
                                                    value="{{ old('name_arabic') ?? $customer->name_ar }}">
                                                @error('name_ar')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label for="customerPhone" class="col-md-3 ng-binding">Phone</label>
                                        </td>
                                        <td style="width:70%">
                                            <div class="col-md-auto">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control form-control-user"
                                                            id="phone_code" placeholder="Code" name="customerPhoneCode"
                                                            value="{{ old('customerPhoneCode') ?? $customer->phone_code }}">
                                                        @error('phone_code')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control form-control-user"
                                                            id="phone" placeholder="Phone Number" name="customerPhone"
                                                            value="{{ old('customerPhone') ?? $customer->phone }}">
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
                                            <label for="customerMobile" class="col-md-3 ng-binding">Mobile</label>
                                        </td>
                                        <td style="width:70%">
                                            <div class="col-md-auto">
                                                <input type="text" class="form-control form-control-user" id="mobile"
                                                    placeholder="Mobile Number" name="customerMobile"
                                                    value="{{ old('customerMobile') ?? $customer->mobile }}">
                                                @error('mobile')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label for="email" class="col-md-3 ng-binding">Email</label>
                                        </td>
                                        <td style="width:70%">
                                            <div class="col-md-auto">
                                                <input type="text" class="form-control form-control-user" id="email"
                                                    placeholder="E-mail" name="email"
                                                    value="{{ old('email') ?? $customer->email }}">
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
                                            <label for="customeraddress" class="col-md-3 ng-binding">Address</label>
                                        </td>
                                        <td>
                                            <div class="col-md-auto">
                                                <textarea type="text" class="form-control form-control-user" id="address" placeholder="Address In English"
                                                    name="customeraddress" value="{{ old('address') ?? $customer->address }}"></textarea>
                                                @error('address')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label for="customeraddressinar" class="col-md-3 ng-binding">Address in Arabic</label>
                                        </td>
                                        <td>
                                            <div class="col-md-auto">
                                                <textarea type="text" class="form-control form-control-user" id="address_ar" placeholder="Address In Arabic"
                                                    name="customeraddressinar" value="{{ old('address_ar') ?? $customer->address_ar }}"></textarea>
                                                @error('address_ar')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label for="customervat" class="col-md-3 ng-binding">Vat No</label>
                                        </td>
                                        <td>
                                            <div class="col-md-auto">
                                                <input type="text" class="form-control form-control-user"
                                                    id="vat_no" placeholder="VAT Number" name="customervat"
                                                    value="{{ old('customervat') ?? $customer->vat_no }}">
                                                @error('vat_no')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label for="cr_no" class="col-md-3 ng-binding">CR No</label>
                                        </td>
                                        <td>
                                            <div class="col-md-auto">
                                                <input type="text" class="form-control form-control-user"
                                                    id="cr_no" placeholder="CR Number" name="cr_no"
                                                    value="{{ old('cr_no') ?? $customer->cr_no }}">
                                                @error('cr_no')
                                                    <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <label for="customeroff_no" class="col-md-3 ng-binding">Office No</label>
                                        </td>
                                        <td>
                                            <div class="col-md-auto">
                                                <input type="text" class="form-control form-control-user"
                                                    id="customeroff_no" placeholder="Office Number" name="customeroff_no"
                                                    value="{{ old('office_no') ?? $customer->office_no }}">
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
                                            <label for="country" class="col-md-3 ng-binding">Country</label>
                                        </td>
                                        <td style="width:70%">
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control form-control-user"
                                                            id="country_code" placeholder="Code" name="country_code"
                                                            value="{{ old('country_code') ?? $customer->country_id }}">
                                                        @error('country_id')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control form-control-user"
                                                            id="country" placeholder="Counrty" name="country"
                                                            value="{{ old('country_id') ?? $customer->country_id }}">
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
                                            <label for="region" class="col-md-3 ng-binding">Region</label>
                                        </td>
                                        <td>
                                            <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <input type="text" class="form-control form-control-user"
                                                            id="region_code" placeholder="Code" name="region_code"
                                                            value="{{ old('region_code') ?? $customer->region_id }}">
                                                        @error('region_id')
                                                            <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input type="text" class="form-control form-control-user"
                                                            id="region" placeholder="Region" name="region"
                                                            value="{{ old('region_code') ?? $customer->region_id }}">
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
                                <label for="customer_name" class="col-md-3 ng-binding">Customer Name</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control form-control-user" id="customer_name"
                                        placeholder="Customer Name" name="customer_name"
                                        value="{{ old('customer_name') ?? $customer->customer_name }}">
                                    @error('customer_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="vat_reg_number" class="col-md-3 ng-binding">VAT Reg Number</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control form-control-user" id="vat_reg_number"
                                        placeholder="VAT Register Number" name="vat_reg_number"
                                        value="{{ old('vat_reg_number') ?? $customer->vat_reg_number }}">
                                    @error('vat_reg_number')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="customer_identification_number" class="col-md-3 ng-binding">Customer ID
                                    Number</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control form-control-user"
                                        id="customer_identification_number" placeholder="Customer ID Number"
                                        name="customer_identification_number"
                                        value="{{ old('customer_identification_number') ?? $customer->customer_identification_number }}">
                                    @error('customer_identification_number')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city_name" class="col-md-3 ng-binding">City</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control form-control-user" id="city_name"
                                        placeholder="City" name="city_name"
                                        value="{{ old('city_name') ?? $customer->city_name }}">
                                    @error('city_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="city_subdivision_name" class="col-md-3 ng-binding">City SubDivision</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control form-control-user"
                                        id="city_subdivision_name" placeholder="City SubDivision"
                                        name="city_subdivision_name"
                                        value="{{ old('city_subdivision_name') ?? $customer->city_subdivision_name }}">
                                    @error('city_subdivision_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="country_subentity" class="col-md-3 ng-binding">City SubEntity</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control form-control-user" id="country_subentity"
                                        placeholder="City SubEntity" name="country_subentity"
                                        value="{{ old('country_subentity') ?? $customer->country_subentity }}">
                                    @error('country_subentity')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="street_name" class="col-md-3 ng-binding">Street</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control form-control-user" id="street_name"
                                        placeholder="Street" name="street_name"
                                        value="{{ old('street_name') ?? $customer->street_name }}">
                                    @error('street_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="building_no" class="col-md-3 ng-binding">Building No</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control form-control-user" id="building_no"
                                        placeholder="Building Number" name="building_no"
                                        value="{{ old('building_no') ?? $customer->building_no }}">
                                    @error('building_no')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="additional_no" class="col-md-3 ng-binding">Additional No</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control form-control-user" id="additional_no"
                                        placeholder="Additional Number" name="additional_no"
                                        value="{{ old('additional_no') ?? $customer->additional_no }}">
                                    @error('additional_no')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="postal_zone" class="col-md-3 ng-binding">Postal Zone</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control form-control-user" id="postal_zone"
                                        placeholder="Postal Zone" name="postal_zone"
                                        value="{{ old('postal_zone') ?? $customer->postal_zone }}">
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
