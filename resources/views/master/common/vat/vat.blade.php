@extends('layouts.default')

@section('page')


<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">VAT</h1>
        <a href="{{ route('add-vat')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i>Add VAT </a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Type of VAT</th>
                            <th>نوع الضريبة</th>
                            <th>Persentage</th>
                            <th>Status</th>
                            <th colspan="2">Actions</th>
                            
                        </tr>
                    </thead>
                    <tfoot>
                        @foreach ($taxes as $tax)
                        <tr>
                            <th>{{$tax->title}}</th>
                            <th>{{$tax->title_ar}}</th>
                            <th>{{$tax->persentage}}</th>
                            <th>{{$tax->status}}</th>
                            <th width="3%">
                                <a class="btn-actions text-info" href="{{ route('vat.edit',['id'=> $tax->id]) }}" data-ng-click="edit(data.id)">
                                    <i class="fa fa-fw fa-edit font-action-icons"></i>
                                </a>
                            </th>
                            <th width="3%">
                                <form id="frm-delete" action="" method="POST">

                                    <a class="btn-actions text-danger" href="" data-target="#deleteModal" id="delete-btn" type="submit">
                                        <i class="fa fa-trash font-action-icons" aria-hidden="true"></i>
                                    </a>
                                </form>
                            </th>
                        </tr>
                        @endforeach
                    </tfoot>

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
@include('master.common.vat.delete_vat')
@endsection
