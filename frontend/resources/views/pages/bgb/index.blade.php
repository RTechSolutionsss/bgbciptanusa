@extends('layouts.admin')

@section('title')
     | BGB DATA
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between m-2">
                                <h4>Data BGB</h4>
                                @if(Auth::user()->role_id == 1)
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Tambah Data</button>
                                @endif
                            </div>
                            <div class="table-responsive">
                                
                                @if($errors->has())
                                    @foreach ($errors->all() as $error)
                                        <div>{{ $error }}</div>
                                    @endforeach
                                @endif
                                <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>No Telpon</th>
                                            @if(in_array(Auth::user()->role_id , [1,2]))
                                            <th>Link</th>
                                            @endif
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>Nomor KTP</th>
                                            <th>Notes</th>
                                            <th>Birth Date</th>
                                            @if(in_array(Auth::user()->role_id , [1,2]))
                                            <th>Status</th>
                                            <th>Action</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php($no = 1)
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $user->name}}</td>
                                                <td>{{ $user->phone}}</td>
                                                @if(in_array(Auth::user()->role_id , [1,2]))
                                                <td>
                                                    <a class="mx-1 w-50 text-primary" data-toggle="modal" data-target="#view-link{{$user->id}}">
                                                    {{ $user->usersales != null ? "View Link" : " "}}
                                                    </a>
                                                </td>
                                                @endif
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                @if(in_array(Auth::user()->role_id , [1,2]))
                                                <td>{{ $user->usersales->status ?? " "}}</td>
                                                <td class="d-inline-flex justify-content-center">
                                                    <a title="Detail" class="mx-1 w-50"href="{{ route('url-sales.show', $user->id)}}">
                                                        <img class="img-responsive" src="{{ url('/img/eye.png')}}" >
                                                    </a>
                                                    <a title="Edit" class="mx-1 w-50 open_model" id="edit-customer" data-toggle="modal" data-id="{{ $user->id }}">
                                                        <img class="img-responsive" src="{{ url('/img/edit2.png')}}" >
                                                    </a>
                                                    <a href="{{ route('sendwa',$user->id)}}" class="mx-1 w-50">
                                                        <img class="img-responsive" src="{{ url('/img/wa.png')}}" >
                                                    </a>
                                                    <form method="POST" action="{{ route('user.destroy', $user->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a title="Delete" class="mx-1 w-50 show_confirm" type="submit">
                                                            <img class="img-responsive" src="{{ url('/img/trash.png')}}" >
                                                        </a>
                                                    </form>
                                                </td>
                                                @endif
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
</div>
@endsection

@push('addon-script')
@foreach ($users as $user)
@if($user->usersales != null)
<div class="modal fade" id="view-link{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Link </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <textarea readonly class="form-control"  id="text-copy{{ $user->id }}">
                        {{ route('customer.show', Illuminate\Support\Facades\Crypt::encrypt($user->usersales->link))}}
                    </textarea>
                </div>
                <div class="col-12 text-right mt-2">
                    <button class="btn btn-success p-1 text-white" onclick="copyText{{ $user->id }}()">
                        Copy Link
                    </button>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
@endif
@endforeach

<div class="modal fade" id="crud-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
       <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Edit Data BGB</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
        <form class="form-horizontal" action="{{ route('usersales.edit')}}"novalidate="" enctype="multipart/form-data">
            @csrf
            <input hidden name="id" id="bgb_id"> 
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group error">
                        <label for="inputName">Name</label>
                        <input type="text" class="form-control has-error" id="name" name="name" placeholder="Name" value="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group error">
                        <label for="inputName">E-mail</label>
                        <input type="text" class="form-control has-error" id="email" name="email" placeholder="E-mail" value="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group error">
                        <label for="inputName">Link</label>
                        <input type="text" readonly class="form-control has-error" id="link" name="link" placeholder="Name" value="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group error">
                        <label for="inputName">Phone</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">+62</div>
                            </div>
                            <input class="form-control" name="phone" id="phone" type="number">
                        </div>
                    </div>
                </div>
                @if(Auth::user()->role_id == 1)
                <div class="col-lg-6">
                    <div class="form-group error">
                        <label for="inputName">ROLES</label>
                        <select class="form-control" name="roles">
                            <option id="roles"></option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id}}">{{ $role->role_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @endif
                <div class="col-lg-6">
                    <div class="form-group error">
                        <label for="inputName">KTP</label>
                        <input type="file" class="form-control has-error" name="attachment_ktp" value="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group error">
                        <label for="inputName">NPWP</label>
                        <input type="file" class="form-control has-error" name="attachment_npwp" placeholder="Product Name" value="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group error">
                        <label for="inputName">Buku Tabungan/ Rek</label>
                        <input type="file" class="form-control has-error" name="attachment_saving_book" placeholder="Product Name" value="">
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
      <h5 class="modal-title" id="exampleModalLongTitle">Tambah BGB</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="">E-mail</label>
                    <input type="email" name="email" class="form-control">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="">Send To</label>
                    <select name="link" class="form-control">
                        <option value="email">E-mail</option>
                        <option value="wa">Whatsapp</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="">Nomor Hp</label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text">+62</div>
                        </div>
                        <input class="form-control" name="phone" type="number">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                
            <p class="m-2">Attachment</p>
                <div class="form-group">
                    <label for="">KTP</label>
                    <input type="file" name="ktp" class="form-control">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group mt-4 pt-3">
                    <label for="">NPWP</label>
                    <input type="file" name="npwp" class="form-control">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="">Buku Tabungan/ Rek</label>
                    <input type="file" name="saving_book" class="form-control">
                </div>
            </div>
        </div>
        
        <button type="submit" class="btn btn-primary">Save changes</button>
      </form>
    </div>
  </div>
</div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script>
    
@foreach ($users as $user)
@if($user->usersales != null)
    function copyText{{ $user->id }}() {  
        var copyText = document.getElementById("text-copy{{$user->id}}");  
        copyText.select();  
        document.execCommand("copy");
    }
    @endif
    @endforeach
    $(document).ready(function () {
        $('#crudTable').DataTable({
                    scrollX: true,
                    scrollY: "500px",
                    autoWidth : true,
                    scrollCollapse: true,
                    responsive: true,
                    previous: "<i class='mdi mdi-chevron-left'>",
                    next: "<i class='mdi mdi-chevron-right'>",
                    drawCallback: function drawCallback() {
                        $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
                    },
                });

        /* When click New customer button */
        $('#new-customer').click(function () {
            $('#btn-save').val("create-customer");
            $('#customer').trigger("reset");
            $('#customerCrudModal').html("Add New Customer");
            $('#crud-modal').modal('show');
        });

            /* Edit customer */
            $('body').on('click', '#edit-customer', function () {
                var user_id = $(this).data('id');
                $.get('user/'+user_id+'/edit', function (data) {
                        $('#customerCrudModal').html("Edit customer");
                        $('#btn-update').val("Update");
                        $('#btn-save').prop('disabled',false);
                        $('#crud-modal').modal('show');
                        $('#bgb_id').val(data.id);
                        $('#name').val(data.name);
                        $('#email').val(data.email);
                        $('#phone').val(data.phone);
                        $('#link').val(data.usersales.link);
                        $("#roles").val(data.userrole.id).html(data.userrole.role_name).prop('selected', true);
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