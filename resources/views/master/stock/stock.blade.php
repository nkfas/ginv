@extends('layouts.default')

@section('page')


<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Stock</h1>
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

                    <a href="{{route('add-stock')}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-plus fa-sm text-white-50"></i>Add Stock</a>
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
                                <th>Stock code

                                </th>
                                <th>Stock Name<div><input type="text" name="stkname"></div>
                                </th>
                                <th>Stock Arabic Name <div><input type="text"></div>
                                </th>
                                <th>Vat type <div><input type="text" name="vattype"></div>
                                </th>
                                <th>Vat persentage <div><input type="text" name="vpersentage"></div>
                                </th>
                                <th>Status
                                    <div>
                                        <select name="status" id="" class="">
                                            <option value="active">Active</option>
                                            <option value="inactive">Inactive</option>
                                    </div>
                                </th>
                                <th colspan="2">Actions
                                    <div><button>Go</button></div>
                                </th>
                        </form>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($stocks as $stock)
                        <tr>
                            <td>{{$stock->code}}</td>
                            <td>{{$stock->name}}</td>
                            <td>{{$stock->name_ar}}</td>
                            <td>{{$stock->vat_type}}</td>
                            <td>{{$stock->vat_percent}}</td>
                            <td>{{$stock->status}}</td>
                            <th width="3%">
                                <a class="btn-actions text-info" href="{{route('stock.edit',['id'=>$stock->id])}}" data-ng-click="edit(data.id)">
                                    <i class="fa fa-fw fa-edit font-action-icons"></i>
                                </a>
                            </th>
                            <th width="3%">                               
                                <a class="btn-actions text-danger" href="" data-toggle="modal" id="" data-target="#deleteModal">
                                    <i class="fa fa-trash font-action-icons"></i>
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

@include('master.stock.delete_stock')
@endsection

@section('js')
<!-- <script>
    $(document).on('click', 'a#delete-stock', function(e) {
        e.preventDefault();

        var stockId = $(this).data('id'); // Get the data-id attribute

        if (confirm('Are you sure you want to delete this stock?')) {
           
        }
    });
</script> -->

@endsection