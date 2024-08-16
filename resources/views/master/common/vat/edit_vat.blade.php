@extends('layouts.default')

@section('page')
<div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="row">
            <div class="col-lg-7">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">New Vat</h1>
                    </div>
                    <form action="" id="country-frm" class="user" method="POST">
                        @csrf
                        @method('PUT')
                        <table style="width:100%">
                            <tr>
                                <th>
                                    <label for="">Type of Vat En. :</label>
                                </th>
                                <th style="width:70%">
                                    <div class="">
                                        <input type="text" class="form-control form-control-user" id="inputEnglishName" placeholder="Country English Name" name="name_en"
                                            value="{{ old('name_en') ?? $taxes->title }}">
                                        @error('name_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <label for="">Type of Vat Ar. :</label>
                                </th>
                                <th style="width:70%">
                                    <div class="">
                                        <input type="text" class="form-control form-control-user" id="inputArabicName" placeholder="Country Arabic Name" name="name_ar"
                                            value="{{ old('name_ar') ?? $taxes->title_ar }}">
                                        @error('name_ar')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </th>
                            </tr>

                            <tr>
                                <th>
                                    <label for="">Persentage :</label>
                                </th>
                                <th style="width:70%">
                                    <div class="">
                                        <input type="text" class="form-control form-control-user" id="inputArabicName" placeholder="Country Arabic Name" name="persentage"
                                            value="{{ old('persentage') ?? $taxes->title_ar }}">
                                        @error('persentage')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </th>
                            </tr>


                            <tr>
                                <th> <label for="">Status :</label></th>
                                <th>
                                    <div class="">
                                        <div class="col-sm-6 mb-3 mb-sm-0">

                                            <!-- Rounded switch -->
                                            <label class="switch">
                                                <input type="checkbox" name="status" value="active" {{ $taxes->status == 'active' ? 'checked' : '' }}>
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

@endsection