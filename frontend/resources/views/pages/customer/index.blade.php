@extends('layouts.customer')

@section('title')
    Customer | BGB SYSTEM
@endsection

@push('addon-style')

<link href="{{asset('assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
    <div class="container mt-4">
      @foreach($katalog as $category)
        <h3 class="my-3">{{ $category->category }}</h3>
        <section class="store-new-products">
          <div class="container">
            <div class="row">
              @php
                  $incrementProduct = 0
              @endphp
              @foreach($category->product as $product)
                <div
                  class="col-6 col-md-6 col-lg-3 shadow"
                  data-aos="fade-up"
                  data-aos-delay="{{ $incrementProduct += 100}}"
                >
                  <a href="{{ route('customer.edit', $product->id )}}" class="component-products d-block">
                    <div class="products-thumbnail pt-2">
                      <div
                        class="products-image"
                        style="background-image: url('{{ Storage::url($product->image)}}')"
                      ></div>
                    </div>
                    <div class="products-text">{{ $product->name_product ?? "Rumah 1" }}</div>
                  </a>
                </div> 
              @endforeach
          </div>
        </section>
      @endforeach
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