@extends('layouts.default')

@section('page')
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="row">
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Edit Stcok</h1>
                    </div>
                    <form action="{{ route('stock.edit',['id'=> $stock->id]) }}" id="country-frm" class="user" method="POST">
                        @csrf
                        @method('PUT')
                        <table style="width:100%">
                        <tr>
                                <th>
                                    <label for="">Stock Code :</label>
                                </th>
                                <th style="width:70%">

                                    <div class="  mb-sm-0">
                                        <input type="text" class="form-control " id="stcode" placeholder="Stock Code" name="code"
                                            value="{{ old('code') ?? $stock->code }}">
                                        @error('code')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </th>
                            </tr>

                            <tr>
                                <th>
                                    <label for="">Stock Name En. :</label>
                                </th>
                                <th style="width:70%">
                                    <div class="">
                                        <input type="text" class="form-control " id="inputEnglishName" placeholder="Stock Name" name="name_en"
                                            value="{{ old('name_en') ?? $stock->name}}">
                                        @error('name_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </th>
                            </tr>

                            <tr>
                                <th>
                                    <label for="">Stock Name Ar. :</label>
                                </th>
                                <th style="width:70%">
                                    <div class="">
                                        <input type="text" class="form-control" id="inputArabicName" placeholder="Stock Arabic Name" name="name_ar" 
                                        value="{{ old('name_ar') ?? $stock->name_ar}}">
                                        @error('name_ar')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </th>
                            </tr>

                            <tr>
                                <th>
                                    <label for="">Vat :</label>
                                </th>
                                <th style="width:70%">
                                    <div class="dropdown no-arrow alongside">
                                        <select name="vat_id" id="vatDropdown" class="form-control" onchange="updatePercentage()">
                                            <option value="" disabled selected>Select VAT</option>
                                            @foreach($vats as $vat)
                                            <option data-persentage="{{$vat->persentage}}" value="{{$vat->id}}"@if($vat->id == $stock->vat_id) selected @endif >{{$vat->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </th>
                            </tr>

                            <tr>
                                <th><label for="">Percentage</label></th>
                                <th><input type="number" value="{{old('persentage') ?? $stock->vat_percent}}" id="percentageInput" name="percentage" readonly></th>
                            </tr>

                            <tr>
                                <th> <label for="">Status :</label></th>
                                <th>
                                    <div class="">
                                        <div class="col-sm-6 mb-3 mb-sm-0">

                                            <!-- Rounded switch -->
                                            <label class="switch">

                                                <input type="checkbox" name="status" value="active" {{ $stock->status == 'active' ? 'checked' : '' }}>
                                                <span class="slider round"></span>
                                            </label>


                                        </div>
                                    </div>

                                </th>
                            </tr>
                            
                            <tr>
                                <th>
                                    <a id="reg-frm-btn" type="submit" class="btn btn-primary btn-user btn-block">
                                        Save
                                    </a>
                                </th>
                            </tr>
                        </table>


                    </form>


                </div>
            </div>
        </div>

    </div>
</div>
@endsection

@section('js')

<script>
    $(document).on('click', 'a#reg-frm-btn', function(e) {
        e.preventDefault();
        $('form#country-frm').submit();
    });
</script>
<script>
    $(document).on('change','select#vatDropdown',function(e){
        let perc = $(this).find(':selected').data('persentage');
        $('#percentageInput').val(perc);
    });
</script>


@endsection