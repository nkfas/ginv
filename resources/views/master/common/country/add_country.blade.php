@extends('layouts.default')

@section('page')
    <div class="container">
        <div class="card o-hidden border-0 shadow-lg my-5">          
                <div class="row">                
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">New Country</h1>
                            </div>
                            <form id="country-frm" class="user" method="POST">
                                @csrf
                                <table style="width:100%">
                                    <tr>
                                        <th>
                                            <label for="">Cus Code :</label>
                                        </th>
                                        <th style="width:70%">
                                             
                                      <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="cuscode" placeholder="Code" name="code" 
                                        value="{{ old('code')}}">
                                        @error('code')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                     </div>
                               
                                        </th>      
                                    </tr>
                                    <tr>
                                        <th>
                                            <label for="">Country Name En. :</label>
                                        </th>
                                        <th style="width:70%">
                                        <div class="">       
                                            <input type="text" class="form-control form-control-user" id="inputEnglishName" placeholder="Country English Name" name="name_en" 
                                            value="{{ old('name_en')}}">
                                            @error('name_en')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                             @enderror
                                         </div>
                                        </th>
                                    </tr>
                                    <tr>
                                    <th>
                                            <label for="">Country Name Ar. :</label>
                                        </th>
                                        <th style="width:70%">
                                        <div class="">
                                        <input type="text" class="form-control form-control-user" id="inputArabicName" placeholder="Country Arabic Name" name="name_ar" value="{{ old('name_ar')}}">
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
                                        <input type="checkbox" name="status">
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
