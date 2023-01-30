@extends('layouts.admin')

@section('title')
    User | BGB SYSTEM
@endsection

@section('content')
    <div class="section-content section-dashboard-home" data-aos="fade-up">
      <div class="container-fluid">
        <div class="dashboard-heading">
          <h2 class="dashboard-title">User</h2>
          <p class="dashboard-subtitle">List of Users</p>
      </div>
      <div class="dashboard-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col text-right">
                                <button
                                    href="{{route('cekregist')}}"
                                    class="btn-primary rounded-lg text-white font-bold py-2 px-4 my-3"
                                >
                                    Check Register
                            </button>
                                <button
                                    @click="openModal()"
                                    class="btn-primary rounded-lg text-white font-bold py-2 px-4"
                                >
                                    Tambah User
                                </button>
                            </div>
                        </div>
                            
                           
                    <div class="table-responsive">
                        <table class="table table-hover scroll-horizontal-vertical w-100" id="crudTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @forelse ($users as $user)
                                        <tr>
                                            <td>{{ $user->id }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td></td>
                                        </tr>
                                    @empty
                                        <tr colspan="4">Not Found data</tr>
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
<script>
    
    $(document).ready(function () {
        $('#crudTable').DataTable();
    });
</script>
@endpush