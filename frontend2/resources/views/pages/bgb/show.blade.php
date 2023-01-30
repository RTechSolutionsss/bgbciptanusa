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
                                <h4>Tracking Link</h4>

                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover scroll-horizontal-vertical w-100" >
                                    <thead>
                                        <tr>
                                            <th>{ Nama Sales }</th>
                                            <th>{ Status }</th>
                                            <th>{ Link Tracking }</th>
                                        </tr>
                                    </thead>
                                </table>
                                <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                                    <thead>
                                        <tr>
                                            <th>Customer</th>
                                            <th>Progress</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Ibu Fandi</td>
                                            <td class="bg-warning text-black">On Progress</td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Details</button>
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
      <h5 class="modal-title" id="exampleModalLongTitle">Cek Details Tracking</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <div class="row">
        <div class="col">
            <div class="card rounded m-3 p2">
                <div class="card-body">
                    <p>{ Name Sales }</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card rounded m-3 p2">
                <div class="card-body">
                    <p>{ Status }</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card rounded m-3 p2">
                <div class="card-body">
                    <p>{ Link Tracking }</p>
                </div>
            </div>
        </div>
      </div>
        <div class="card rounded m-3 p2">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <p>{ Customer }</p>
                    </div>
                    <div class="col">
                        <p>Cek Details</p>
                    </div>
                </div>
            </div>
        </div>
      <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Activity</th>
                <th>Ip Address</th>
                <th>Create Date</th>
                <th>Status</th>
                <th>Checklist</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Open Link BGB</td>
                <td>257.283.0.12</td>
                <td>{{ Carbon\Carbon::now()->format('d-M-Y')}}</td>
                <td>Success</td>
                <td>
                    V
                </td>
            </tr>
        </tbody>
    </table>
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