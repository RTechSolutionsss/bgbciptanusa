@extends('layouts.admin')

@section('title')
    User | BGB SYSTEM
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
                                
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Tambah Data</button>

                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>No Telpon</th>
                                            <th>Link</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Achmad</td>
                                            <td>08921</td>
                                            <td>link.com</td>
                                            <td>Gold</td>
                                            <td>
                                                <a href="{{ route('url-sales.show', '1')}}">Details</a>
                                            </td>
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
</div>
@endsection

@push('addon-script')

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
      <form action="">
        @csrf
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" required>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="">Username</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="">Link BGB</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="">Send To</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="">Nomor Hp</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                
            <p class="m-2">Attachment</p>
                <div class="form-group">
                    <label for="">KTP</label>
                    <input type="file" class="form-control">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group mt-4 pt-3">
                    <label for="">NPWP</label>
                    <input type="file" class="form-control">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="form-group">
                    <label for="">Buku Tabungan/ Rek</label>
                    <input type="file" class="form-control">
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
        $('#crudTable').DataTable({
            dom: 'Bfrtip',
                buttons: [
                    {extend: 'copyHtml5', footer: true},
                    {extend: 'excelHtml5', footer: true},
                    {extend: 'csvHtml5', footer: true},
                    {extend: 'pdfHtml5', footer: true},
                ],
                order: [0, 'desc'],
                scrollX: true,
                scrollY: "500px",
                autoWidth : true,
                scrollCollapse: true,
                responsive: false,
                fixedColumns:   {
                    leftColumns: 1
                },
                previous: "<i class='mdi mdi-chevron-left'>",
                next: "<i class='mdi mdi-chevron-right'>",
                drawCallback: function drawCallback() {
                    $('.dataTables_paginate > .pagination').addClass('pagination-rounded');
                },
        });
    });
</script>
@endpush