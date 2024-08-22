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
                        @forelse ($taxes as $tax)
                        <tr id="tr_{{ $tax->id }}">
                            <td>{{$tax->title}}</td>
                            <td>{{$tax->title_ar}}</td>
                            <td>{{$tax->persentage}}</td>
                            <td>{{$tax->status}}</td>
                            <td width="3%">
                                <a class="btn-actions text-info" href="{{ route('vat.edit',['id'=> $tax->id]) }}" data-ng-click="edit(data.id)">
                                    <i class="fa fa-fw fa-edit font-action-icons"></i>
                                </a>
                            </td>
                            <td width="3%">                               
                                <a class="btn-actions text-danger delete-vat" href="{{route('vat.delete',['id'=>$tax->id])}}" data-toggle="modal" id="" data-target="#deleteModal">
                                    <i class="fa fa-trash font-action-icons"></i>
                                </a>
                            </td>
                           
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8">No found vat records</td>
                        </tr>
                        @endforelse
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

@endsection

@section('js')
<script>
    $(document).on('click', 'a.delete-vat', function(e) {
        var stockId = $(this).attr('href');
        $('a#btn-delete').attr('href',stockId)
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
