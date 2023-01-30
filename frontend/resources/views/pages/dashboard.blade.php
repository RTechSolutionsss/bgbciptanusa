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
                        <div class="text-right">
                            <h2>{{ Carbon\Carbon::now()->format('d-M-Y') }}</h2>

                            <form action="">
                                @csrf
                                <div class="d-flex">
                                    <div class="form-group mx-2">
                                        <input type="date" class="form-control" placeholder="Start Date">
                                    </div>
                                    <div class="form-group mx-2">
                                        <input type="date" class="form-control" placeholder="End Date">
                                    </div>
                                    <button class="btn btn-success p-2" style="height: 2.4rem">Search</button>
                                </div>
                               
                            </form>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="card rounded m-3 p2">
                                    <div class="card-header">
                                        <p>Data Baru</p>
                                    </div>
                                    <div class="card-body text-right">
                                        <h2>2</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card rounded m-3 p2">
                                    <div class="card-header">
                                        <p>Closing/Pembuatan SP</p>
                                    </div>
                                    <div class="card-body text-right">
                                        <h2>1</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="card rounded m-3 p2">
                                    <div class="card-header">
                                        <p>PPJB</p>
                                    </div>
                                    <div class="card-body text-right">
                                        <h2>2</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card rounded m-3 p2">
                                    <div class="card-header">
                                        <p>Pencairan dana</p>
                                    </div>
                                    <div class="card-body text-right">
                                        <h2>2</h2>
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
<script>

</script>
@endpush