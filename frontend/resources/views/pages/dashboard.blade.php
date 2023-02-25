@extends('layouts.admin')

@section('title')
    User | BGB SYSTEM
@endsection

@push('addon-style')

<link href="{{asset('assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
    <div class="section-content section-dashboard-home mt-md-5" data-aos="fade-up">
      <div class="container-fluid">
      <div class="dashboard-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="text-right">
                            <h2 class="">{{ Carbon\Carbon::now()->format('d-M-Y') }}</h2>

                            @if(Auth::user()->role_id == 1)
                            <form action="{{ route('home')}}" method="GET">
                                @csrf
                                <div class="d-lg-flex row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div class="form-group mx-2">
                                            <input type="text" id="startdate" class="form-control" placeholder="Start Date">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group mx-2">
                                        <input type="text" id="enddate" class="form-control" placeholder="End Date">
                                    </div>
                                    <button class="btn btn-success p-2" style="height: 2.4rem">Search</button>
                                    </div>
                                </div>
                               
                            </form>
                            @endif
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="card rounded m-3 p2">
                                    <div class="card-header">
                                        <p>{{ Auth::user()->role_id == 1 ? 'Data Baru' : 'Open LInk'}}</p>
                                    </div>
                                    @php($databgb = $user->where('role_id', 2)->count())
                                    @php($datacustomer = $user->where('role_id', 3)->count())
                                    <div class="card-body text-right">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <h4>Customer</h4>
                                                <p>{{ $datacustomer }}</p>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <h4>BGB</h4>
                                                <p>{{ $databgb }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="card rounded m-3 p2">
                                    @php($closesp = $tracking->where('name', 'Pembuatan SP/Closing')->where('status', 'COMPLETED')->count())
                                    <div class="card-header">
                                        <p>Closing/Pembuatan SP</p>
                                    </div>
                                    <div class="card-body text-right">
                                        <h2>{{ $closesp }}</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="card rounded m-3 p2">
                                    @php($ppjb = $tracking->where('name', 'PPJB')->where('status', 'COMPLETED')->count())
                                    <div class="card-header">
                                        <p>PPJB</p>
                                    </div>
                                    <div class="card-body text-right">
                                        <h2>{{ $ppjb }}</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="card rounded m-3 p2">
                                    @php($dana = $tracking->where('name', 'Pencairan Dana')->where('status', 'COMPLETED')->count())
                                    <div class="card-header">
                                        <p>Pencairan dana</p>
                                    </div>
                                    <div class="card-body text-right">
                                        <h2>{{ $dana }}</h2>
                                    </div>
                                </div>
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

<script src="{{asset('assets/libs/flatpickr/flatpickr.min.js')}}"></script>
<script>
    $(document).ready(function () {
        var startDateInput = $('#startdate').flatpickr({
                altInput: true,
                altFormat: "d M, Y",
                dateFormat: "Y-m-d",
                allowInput: true
            });
            var startDateInput = $('#enddate').flatpickr({
                altInput: true,
                altFormat: "d M, Y",
                dateFormat: "Y-m-d",
                allowInput: true
            });
    })
</script>
@endpush