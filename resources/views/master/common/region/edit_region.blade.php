@extends('layouts.default')

@section('page')
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">          
                <div class="row">                
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Edit Region</h1>
                            </div>
                            <form action="{{ route('region.edit',['id'=> $region->id]) }}" id="country-frm" class="user" method="POST">
                                @csrf
                                <table style="width:100%">
                                <tr>
                                        <th>
                                            <label for="">Country :</label>
                                        </th>
                                        <th style="width:70%">
                                      
                                    <div class="dropdown no-arrow mb-4 alongside .dropdown .no-arrow">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <select name="country_id" id="" class="">
                                        @foreach($countries as $country)
                                        <option value="{{$country->id}}">{{$country->title}}</option>
                                        @endforeach
                                        </select>
                                        </button>
                                      
                                    </div>
                                   
                             
                                        </th>      
                                    </tr>
                                    <tr>
                                        <th>
                                            <label for="">Region Code :</label>
                                        </th>
                                        <th style="width:70%">
                                             
                                      <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="cuscode" placeholder="Region Code" name="code" 
                                        value="{{ old('code') ?? $region->code }}">
                                        @error('code')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                     </div>
                               
                                        </th>      
                                    </tr>
                                    <tr>
                                        <th>
                                            <label for="">Region Name En. :</label>
                                        </th>
                                        <th style="width:70%">
                                        <div class="">       
                                            <input type="text" class="form-control form-control-user" id="inputEnglishName" placeholder="Region English Name" name="name_en" 
                                            value="{{ old('name_en')?? $region->title}}">
                                            @error('name_en')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                             @enderror
                                         </div>
                                        </th>
                                    </tr>
                                    <tr>
                                    <th>
                                            <label for="">Region Name Ar. :</label>
                                        </th>
                                        <th style="width:70%">
                                        <div class="">
                                        <input type="text" class="form-control form-control-user" id="inputArabicName" placeholder="Region Arabic Name" name="name_ar" value="{{ old('name_ar')?? $region->title_ar}}">
                                        @error('name_ar')
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
                                       
                                        <input type="checkbox" name="status" value="active" {{ $region->status == 'active' ? 'checked' : '' }}>
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
