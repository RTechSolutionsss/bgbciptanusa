@extends('layouts.customer')

@section('title')
    Customer | BGB SYSTEM
@endsection

@push('addon-style')

<link href="{{asset('assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
    <div class="container my-4">
        <p class="font-weight-bold h3">{{ $product->name_product ?? "Rumah 1" }} - {{ $product->category->category }}</p>
        <section class="store-new-products">
            <div class="container">
              <div class="row">
                @php
                    $incrementProduct = 0
                @endphp
                <div
                  class="col-md-8 col-sm-12 col-lg-8 shadow"
                  data-aos="fade-up"
                  data-aos-delay="{{ $incrementProduct += 100}}"
                >
                    <div class="component-products d-block">
                        <div class="products-thumbnail my-2" style="height: 200px">
                            <div
                            class="products-image"
                            style="background-image: url('{{ Storage::url($product->image) }}')"
                            ></div>
                        </div>
                        <div class="products-text">{{ $product->name_product ?? "Rumah 1" }}</div>
                        <div class="products-price">{{ $product->price ?? "0" }}</div>
                        <p>{{ $product->description ?? "Rumah bagus" }}</p>
                        <form action="{{ route('customer.store')}}" method="POST">
                            @csrf
                            <input type="text" hidden value="{{ $product->id }}" name="category_id">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Nama</label>
                                        <input class="form-control" name="name" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">No. Telp aktif</label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">+62</div>
                                            </div>
                                            <input class="form-control" name="phone" type="number">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">E-mail</label>
                                        <input class="form-control" name="email" type="email">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Usia</label>
                                        <input class="form-control" name="usia" type="number">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Pekerjaan</label>
                                        <input class="form-control" name="pekerjaan">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Mendapat Informasi darimana</label>
                                        <select class="form-control" name="source_information">
                                            <option value="Link">Link</option>
                                            <option value="Brosur">Brosur</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <button type="submit" class="btn btn-info">Submit</button>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                </div>                
              </div>
            </div>
          </section>
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