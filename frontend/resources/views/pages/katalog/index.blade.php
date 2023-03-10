@extends('layouts.admin')

@section('title')
    User | BGB SYSTEM
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
      <div class="container-fluid">
        <div class="dashboard-heading">
          <p class="dashboard-subtitle">Katalog</p>
      </div>
      <div class="dashboard-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-right m-2">                            
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Tambah Katalog</button>
                        </div>
                    <div class="table-responsive">
                        <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Katalog</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php($no = 1)
                                    @foreach ($katalog as $category)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $category->category }}</td>
                                        <td class="d-inline-flex justify-content-center">
                                            <a title="Detail" class="mx-1 w-50"href="{{ route('katalog.show', $category->id)}}">
                                                <img class="img-responsive" src="{{ url('/img/eye.png')}}" >
                                            </a>
                                            <a title="Edit" class="mx-1 w-50 open_model" id="edit-customer" data-toggle="modal" data-id="{{ $category->id }}">
                                                <img class="img-responsive" src="{{ url('/img/edit2.png')}}" >
                                            </a>
                                            <form method="POST" action="{{ route('katalog.destroy', $category->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <a title="Delete" class="mx-1 w-50 show_confirm" type="submit">
                                                    <img class="img-responsive" src="{{ url('/img/trash.png')}}" >
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
      </div>          
    </div>
@endsection

@push('addon-script')

<div class="modal fade" id="crud-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Edit Katalog</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" action="{{ route('katalog.editing')}}">
            @csrf
            <input hidden name="id" id="katalog_id"> 
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group error">
                        <label for="inputName">Category</label>
                        <input type="text" class="form-control has-error" id="category" name="category" placeholder="Category" value="">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" id="btn-save">Update</button>
        </form>
        </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLongTitle">Tambah Katalog</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form action="{{ route('katalog.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="katalog">Katalog</label>
                    <input class="form-control" id="katalog" name="category" type="text">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </form>
    </div>
  </div>
</div>
</div>
<script>
    
    $(document).ready(function () {
        $('#crudTable').DataTable();

        /* Edit customer */
        $('body').on('click', '#edit-customer', function () {
                var user_id = $(this).data('id');
                $.get('katalog/'+user_id+'/edit', function (data) {
                        $('#customerCrudModal').html("Edit customer");
                        $('#crud-modal').modal('show');
                        $('#katalog_id').val(data.id);
                        $('#category').val(data.category);
                    })
            });

            $('.show_confirm').click(function(event) {
                var form =  $(this).closest("form");
                var name = $(this).data("name");
                event.preventDefault();
                swal({
                    title: `Are you sure you want to delete this record?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                    form.submit();
                    }
            });
        });
    });
</script>
@endpush