@extends('layouts.default')

@section('page')


<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Region</h1>
        <a href="{{route('add-region')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i>Add Region</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Region</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <form action="">
                        <tr>
                            <th>Country <div><input type="text" name="encountry"></div> </th>
                            <th>اسم البلد <div><input type="text" name="arcountry"></div></th>
                            <th>Code <div><input type="text"></div></th>
                            <th>Region Name <div><input type="text" name="enregion"></div></th>
                            <th>اسم المنطقة <div><input type="text" name="arregion"></div></th>
                            <th>Status 
                                <div>
                                 <select name="status" id="" class="">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </div></th>
                            <th>Action
                                <div><button>Go</button></div>
                            </th>
                        </form>
                       
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($regions as $region)
                        <tr>
                            <td>{{$region->country_nameEn}}</td>
                            <td>{{$region->country_nameAr}}</td>
                            <td>{{$region->code}}</td>
                            <td>{{$region->title}}</td>
                            <td>{{$region->title_ar}}</td>
                            <td>{{$region->status}}</td>                           
                            <th>
                          
                            <a class="btn-actions text-info" href="{{route('region.edit',['id'=>$region->id])}}" data-ng-click="edit(data.id)">
                                    <i class="fa fa-fw fa-edit font-action-icons"></i>
                                </a>
                                <a class="btn-actions text-danger" href="" data-ng-click="delete(data.id)">
                                    <i class="fa fa-trash font-action-icons" aria-hidden="true"></i>
                                </a>
                            </th>
                        </tr>
                        @endforeach
         
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


</div>
<!-- End of Content Wrapper -->



<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

@endsection

