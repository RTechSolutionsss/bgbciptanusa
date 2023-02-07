@extends('layouts.admin')

@section('title')
    User | BGB SYSTEM
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
      <div class="container-fluid">
        <div class="dashboard-heading">
          <h2 class="dashboard-title">User</h2>
          <p class="dashboard-subtitle">Katalog</p>
      </div>
      <div class="dashboard-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between m-2">                            
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Tambah Katalog</button>
                        </div>
                    <div class="table-responsive">
                        <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Sales</th>
                                    <th>Url</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Udin</td>
                                        <td>
                                            www.url.com 
                                        </td>
                                        <td></td>
                                    </tr>
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
      <form action="">
        @csrf
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="">Sales</label>
                    <select class="form-control">
                        <option>Udin</option>
                        <option>Juki</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="">Katalog</label>
                    <select class="form-control">
                        <option>Grahayana</option>
                        <option>KGV3</option>
                    </select>
                </div>
            </div>
        </div>
      </form>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="button" class="btn btn-primary">Save changes</button>
    </div>
  </div>
</div>
</div>
<script>
    
    $(document).ready(function () {
        $('#crudTable').DataTable();
    });
</script>
@endpush