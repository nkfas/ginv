@extends('layouts.default')

@section('page')


<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Region</h1>
        <table>
            <tr>
                <th>
                    <a href="{{ route('country') }}" class="d-none d-sm-inline-block btn btn-sm btn-success">
                        <i class="fas fa-none fa-sm text-white-50"></i> Pdf
                    </a>
                    <a href="{{route('country')}}" class="d-none d-sm-inline-block btn btn-sm btn-success ">
                        <i class="fas fa-none fa-sm text-white-50"></i>Excel</a>

                    <a href="{{route('country')}}" class="d-none d-sm-inline-block btn btn-sm btn-info  ">
                        <i class="fas fa-none fa-sm text-white-50"></i>Country</a>
                        
                    <a href="{{route('add-region')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-plus fa-sm text-white-50"></i>Add Region</a>
                </th>
            </tr>
        </table>

    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <form action="">
                            <tr>
                                <th>Country
                                    <div>
                                        <option value="0">All</option>
                                        <select name="country_id" id="" class="">
                                            <option value="0">All</option>
                                            @foreach($countries as $country)
                                            <option value="{{ old('country_id', $country->id) }}">{{ $country->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </th>
                                <th>اسم البلد <div><input type="text" name="arcountry"></div>
                                </th>
                                <th>Code <div><input type="text"></div>
                                </th>
                                <th>Region Name <div><input type="text" name="enregion"></div>
                                </th>
                                <th>اسم المنطقة <div><input type="text" name="arregion"></div>
                                </th>
                                <th>Status
                                    <div>
                                        <select name="status" id="" class="">
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                    </div>
                                </th>
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