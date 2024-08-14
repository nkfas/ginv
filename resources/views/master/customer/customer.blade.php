@extends('layouts.default')

@section('page')


<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Region</h1>
        <a href="{{route('add-customer')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i>Add Customer</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Customer</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Name </th>
                            <th>اسم</th>
                            <th>CR No</th>
                            <th>VAT Reg No.</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                        <tr>
                            <td>{{$customer->country_nameEn}}</td>
                            <td>{{$customer->country_nameAr}}</td>
                            <td>{{$customer->code}}</td>
                            <td>{{$customer->title}}</td>
                            <td>{{$customer->title_ar}}</td>
                            <td>{{$customer->status}}</td>                           
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
