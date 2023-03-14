@extends('layouts.customer')

@section('title')
    Customer | BGB SYSTEM
@endsection

@push('addon-style')

<link href="{{asset('assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
    <div class="container mt-4">
      <section class="store-carousel">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <div
                id="storeCarousel"
                class="carousel slide"
                data-ride="carousel"
                data-aos="zoom-in-up"
              >
                <ol class="carousel-indicators">
                  <li
                    data-target="#storeCarousel"
                    data-slide-to="0"
                    class="active"
                  ></li>
                  <li data-target="#storeCarousel" data-slide-to="0"></li>
                  <li data-target="#storeCarousel" data-slide-to="1"></li>
                </ol>
                <div class="carousel-inner">
                  @php($no = 1)
                  @foreach($katalog as $category)
                  @php($product = collect($category->product)->first())
                  @isset($product)
                  <div class="carousel-item {{ $product->id == 2 ? 'active' : ''}}">
                    <img
                      src="{{ Storage::url($product->image)}}"
                      class="d-block w-100"
                      alt="..."
                    />
                  </div>
                  @endisset
                  @endforeach
                </div>
                <a
                  class="carousel-control-prev"
                  href="#storeCarousel"
                  role="button"
                  data-slide="prev"
                >
                  <span
                    class="carousel-control-prev-icon"
                    aria-hidden="true"
                  ></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a
                  class="carousel-control-next"
                  href="#storeCarousel"
                  role="button"
                  data-slide="next"
                >
                  <span
                    class="carousel-control-next-icon"
                    aria-hidden="true"
                  ></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
        <section class="store-new-products mt-4">
          <div class="container">
            <h2>Kategory</h2>
            <div class="row">
              @php($incrementproduct = 0)
              @foreach($catalog as $category)
              @php($product = collect($category->product)->first())
                <div
                  class="col-6 col-md-6 col-lg-4 shadow mt-2"
                  data-aos="fade-up"
                  data-aos-delay="{{ $incrementproduct += 100}}"
                >
                  <a href="{{ route('customer.edit', $category->id )}}" class="component-products d-block">
                    <div class="products-thumbnail pt-2">
                      <div
                        class="products-image"
                        style="background-image: url('{{ Storage::url($product->image)}}')"
                      ></div>
                    </div>
                    <div class="products-text">{{ $category->category ?? "Rumah 1" }}</div>
                  </a>
                </div>
              
            @endforeach
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