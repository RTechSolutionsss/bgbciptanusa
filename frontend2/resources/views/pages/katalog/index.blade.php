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
                    <div class="table-responsive">
                        <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                            <thead>
                                <tr>
                                    <th>Nomor</th>
                                    <th>Category</th>
                                    <th>Katalog</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Grahayana</td>
                                        <td>
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">{JumlahPic}</button>
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
      <h5 class="modal-title" id="exampleModalLongTitle">Details Picture</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
        <table class="table table-hover scroll-horizontal-vertical w-100">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Pict</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>{Gambar}</td>
                    <td></td>
                </tr>
            </tbody>
        </table>
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