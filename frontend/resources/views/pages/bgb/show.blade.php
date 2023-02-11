@extends('layouts.admin')

@section('title')
    User | BGB SYSTEM
@endsection

@push('addon-style')  
  <style>
    .mySelect option[value="COMPLETED"] { background-color: #28a745; color: white }
    .mySelect option[value="REJECT"] { background-color: #dc3545 ; color: white }
  </style>  
@endpush
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
                                            <th>Ahmad</th>
                                            <th style="background-color: gold">Gold</th>
                                            <th>www.customer.com/</th>
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
        <div class="card rounded m-3 p2">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <p>Ibu Cristin</p>
                    </div>
                    <div class="col">
                        <p>Details Progress Customer</p>
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
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Open Link BGB</td>
                <td>257.283.0.12</td>
                <td>{{ Carbon\Carbon::now()->format('d-M-Y')}}</td>
                <td>
                    @if(Auth::user()->role_id == 1)
                    <select class="form-control myselect" id="mySelect" onchange="onSelectChange()">
                        <option value="ON PROGRESS">ON PROGRESS</option>
                        <option value="COMPLETED" class="text-white bg-success">COMPLETED</option>
                        <option value="REJECT" class="text-white bg-danger">REJECT</option>
                    </select>
                    @else
                        <p id="status">Success</p>
                    @endif
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>Follow Up Ha</td>
                <td></td>
                <td>{{ Carbon\Carbon::now()->format('d-M-Y')}}</td>
                <td>
                    @if(Auth::user()->role_id == 1)
                    <select class="form-control myselect" id="mySelect" onchange="onSelectChange()">
                        <option value="ON PROGRESS">ON PROGRESS</option>
                        <option value="COMPLETED" class="text-white bg-success">COMPLETED</option>
                        <option value="REJECT" class="text-white bg-danger">REJECT</option>
                    </select>
                    @else
                        <p id="status">Success</p>
                    @endif
                </td>
            </tr>
            <tr>
                <td>3</td>
                <td>Pembuatan SP/Closing</td>
                <td></td>
                <td>{{ Carbon\Carbon::now()->format('d-M-Y')}}</td>
                <td>
                    @if(Auth::user()->role_id == 1)
                    <select class="form-control myselect" id="mySelect" onchange="onSelectChange()">
                        <option value="ON PROGRESS">ON PROGRESS</option>
                        <option value="COMPLETED" class="text-white bg-success">COMPLETED</option>
                        <option value="REJECT" class="text-white bg-danger">REJECT</option>
                    </select>
                    @else
                        <p id="status">Success</p>
                    @endif
                </td>
            </tr>
            <tr>
                <td>4</td>
                <td>PPJB</td>
                <td></td>
                <td>{{ Carbon\Carbon::now()->format('d-M-Y')}}</td>
                <td>
                    @if(Auth::user()->role_id == 1)
                    <select class="form-control myselect" id="mySelect" onchange="onSelectChange()">
                        <option value="ON PROGRESS">ON PROGRESS</option>
                        <option value="COMPLETED" class="text-white bg-success">COMPLETED</option>
                        <option value="REJECT" class="text-white bg-danger">REJECT</option>
                    </select>
                    @else
                        <p id="status">Success</p>
                    @endif
                </td>
            </tr>
            <tr>
                <td>5</td>
                <td>Pencairan Dana</td>
                <td></td>
                <td>{{ Carbon\Carbon::now()->format('d-M-Y')}}</td>
                <td>
                    @if(Auth::user()->role_id == 1)
                    <select class="form-control myselect" id="mySelect" onchange="onSelectChange()">
                        <option value="ON PROGRESS">ON PROGRESS</option>
                        <option value="COMPLETED" class="text-white bg-success">COMPLETED</option>
                        <option value="REJECT" class="text-white bg-danger">REJECT</option>
                    </select>
                    @else
                        <p id="status">Success</p>
                    @endif
                </td>
            </tr>
        </tbody>
    </table>
    </div>
    @if(Auth::user()->role_id == 1)
    <div class="modal-footer">
      <button type="button" class="btn btn-warning">Updated</button>
    </div>
    @endif
  </div>
</div>
</div>
<script>

        function onSelectChange(){
            if (document.getElementById('mySelect').value == "COMPLETED"){
                document.getElementById('mySelect').className = 'form-control text-white bg-success';
                document.getElementById('mySelect').className = 'text-success';
            } else if(document.getElementById('mySelect').value == "REJECT") {
                document.getElementById('mySelect').className = 'form-control text-white bg-danger'
            }else{
                document.getElementById('mySelect').className = 'form-control'
            }
        }
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