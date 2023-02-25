@extends('layouts.admin')

@section('title')
    Profile
@endsection

@section('content')
<div class="section-content section-dashboard-home" data-aos="fade-up">
    <div class="container-fluid">
        <div class="dashboard-heading">
            <h3>Profile {{ $user->name }} </h3>
        </div>
        <div class="dashboard-content">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="{{ route('profile.update', $user->id )}}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12 my-2">
                                        <div class="form-gorup">
                                            <label for="name">Name</label>
                                            <input class="form-control" id="name" type="text" value="{{ $user->name }}" name="name"> 
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 my-2">
                                        <div class="form-gorup">
                                            <label for="email">E-mail</label>
                                            <input class="form-control" value="{{ $user->email }}" id="email" type="email" name="email"> 
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 my-2">
                                        <div class="form-gorup">
                                            <label for="password">Password</label>
                                            <input class="form-control" id="password" type="password" name="password"> 
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 my-2">
                                        <div class="form-gorup">
                                            <label for="confirmpassword">Confirm Password</label>
                                            <input class="form-control" type="password" id="confirmpassword" name="confirmpassword"> 
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-sm-12 my-2">
                                        <div class="form-gorup">
                                            <label for="phone">Phone</label>
                                            <input class="form-control" value="{{ $user->phone }}" type="number" id="phone" name="phone"> 
                                        </div>
                                    </div>
                                    @if(Auth::user()->role_id == 1)
                                        <div class="col-lg-3 col-md-12 col-sm-12 my-2">
                                            <div class="form-gorup">
                                                <label for="ktp">KTP</label>
                                                <input class="form-control" type="file" id="ktp" name="attachment_ktp"> 
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-12 col-sm-12 my-2">
                                            <img class="img-responsive img-thumbnail w-75" src="{{ Storage::url($user->attachment_ktp) }}">
                                        </div>
                                        <div class="col-lg-3 col-md-12 col-sm-12 my-2">
                                            <div class="form-gorup">
                                                <label for="npwp">NPWP</label>
                                                <input class="form-control" type="file" id="npwp" name="attachment_npwp"> 
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-12 col-sm-12 my-2">
                                            <img class="img-responsive img-thumbnail w-75" src="{{ Storage::url($user->attachment_npwp) }}">
                                        </div>
                                        <div class="col-lg-3 col-md-12 col-sm-12 my-2">
                                            <div class="form-gorup">
                                                <label for="saving_book">Buku Tabungan</label>
                                                <input class="form-control" type="file" id="saving_book" name="attachment_saving_book"> 
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-12 col-sm-12 my-2">
                                            <img class="img-responsive img-thumbnail w-75" src="{{ Storage::url($user->attachment_saving_book) }}">
                                        </div>
                                    @endif
                                </div>
                                <div class="mr-auto my-3">
                                    <button type="submit" class="btn btn-info">Updated</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection