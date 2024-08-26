@extends('layouts.default')

@section('page')


<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Customer</h1>
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
                        @forelse ($customers as $customer)
                        <tr id="tr_{{ $customer->id }}">
                            <td>{{$customer->code}}</td>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->name_ar}}</td>
                            <td>{{$customer->cr_no}}</td>
                            <td>{{$customer->vat_no}}</td>
                            <td>{{$customer->status}}</td>                           
                            <td>
                          
                            <a class="btn-actions text-info" href="{{route('customer.edit',['id'=>$customer->id])}}" data-ng-click="edit(data.id)">
                                    <i class="fa fa-fw fa-edit font-action-icons"></i>
                                </a>                          
                                    <a class="btn-actions text-danger delete-customer" href="{{route('customer.delete',['id'=>$customer->id])}}" data-toggle="modal" id="" data-target="#deleteModal">
                                        <i class="fa fa-trash font-action-icons"></i>
                                    </a>
                            
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8">No Customer found</td>
                        </tr>
                        @endforelse
         
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


@section('js')
<script>
    $(document).on('click', 'a.delete-customer', function(e) {
        var cusid = $(this).attr('href');
        $('a#btn-delete').attr('href',cusid)
    });

    $(document).on('click', 'a#btn-delete', function(e) {
        e.preventDefault();
        $.ajax({
                url: this.href,
                type: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include the CSRF token
                },
                success: function(result){
                    $('tr#tr_'+ result.id).remove();
                    $('#deleteModal').modal('toggle');
                    
                }
        });
        
    });


</script>

@endsection