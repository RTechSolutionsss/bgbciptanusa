@extends('layouts.admin')

@section('title')
    User | BGB SYSTEM
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
      <div class="container-fluid">
        <div class="dashboard-heading">
          <h3>Katalog {{ $katalog->category }}</h3>
      </div>
      <div class="dashboard-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-right m-2">  
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Tambah Image</button>
                        </div>
                    <div class="table-responsive">
                        @if ($errors->has('image'))
                            <span class="help-block">
                                <strong>{{ $errors->first('image') }}</strong>
                            </span>
                        @endif 
                        <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Description</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @php($no = 1)
                                    @forelse ($katalog->product as $product)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>
                                            <img src="{{ Storage::url($product->image)}}" class="img-thumbnail img-responsive w-25">
                                        <td>{{ $product->price ?? "" }}</td>
                                        <td>{{ $product->description ?? ""}}</td>
                                        <td class="d-inline-flex justify-content-center">
                                            <a title="Edit" class="mx-1 w-50 open_model" id="edit-customer" data-toggle="modal" data-id="{{ $product->id }}">
                                                <img class="img-responsive" src="{{ url('/img/edit2.png')}}" >
                                            </a>
                                            <form method="POST" action="{{ route('product.destroy', $product->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <a title="Delete" class="mx-1 w-50 show_confirm" type="submit">
                                                    <img class="img-responsive" src="{{ url('/img/trash.png')}}" >
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td>Data Not Found</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    @endforelse
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
      <h5 class="modal-title" id="exampleModalLongTitle">Tambah Image</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form action="{{ route('product.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <input hidden name="id_category" value="{{ $katalog->id }}">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input class="form-control" id="name" name="name_product" type="text">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="img">Image</label>
                    <input class="form-control" id="img" name="image" type="file">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description"></textarea>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="price">Price</label>
                    <textarea class="form-control" id="price" name="description"></textarea>
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