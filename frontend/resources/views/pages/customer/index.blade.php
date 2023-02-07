@extends('layouts.customer')

@section('title')
    Customer | BGB SYSTEM
@endsection

@push('addon-style')

<link href="{{asset('assets/libs/flatpickr/flatpickr.min.css')}}" rel="stylesheet" type="text/css"/>
@endpush

@section('content')
    <div class="container mt-4">
        <h1>Katalog Grahayana</h1>
        <section class="store-new-products">
            <div class="container">
              <div class="row">
                <div class="col-12" data-aos="fade-up">
                  <h5>New Products</h5>
                </div>
              </div>
              <div class="row">
                @php
                    $incrementProduct = 0
                @endphp
                <div
                  class="col-6 col-md-6 col-lg-3 shadow"
                  data-aos="fade-up"
                  data-aos-delay="{{ $incrementProduct += 100}}"
                >
                  <a href="{{ route('customer.create')}}" class="component-products d-block">
                    <div class="products-thumbnail">
                      <div
                        class="products-image"
                        style="background-image: url('img/aswana_01A.png')"
                      ></div>
                    </div>
                    <div class="products-text">Rumah 1</div>
                    <div class="products-price">Rp. 200.000.000</div>
                  </a>
                </div> 
                <div
                  class="col-6 col-md-6 col-lg-3 shadow"
                  data-aos="fade-up"
                  data-aos-delay="{{ $incrementProduct += 100}}"
                >
                  <a href="{{ route('customer.create')}}" class="component-products d-block">
                    <div class="products-thumbnail">
                      <div
                        class="products-image"
                        style="background-image: url('img/bhuvana_3.png')"
                      ></div>
                    </div>
                    <div class="products-text">Rumah 2</div>
                    <div class="products-price">Rp. 329.000.000</div>
                  </a>
                </div> 
                <div
                  class="col-6 col-md-6 col-lg-3 shadow"
                  data-aos="fade-up"
                  data-aos-delay="{{ $incrementProduct += 100}}"
                >
                  <a href="{{ route('customer.create')}}" class="component-products d-block">
                    <div class="products-thumbnail">
                      <div
                        class="products-image"
                        style="background-image: url('img/bhuvana_5.png')"
                      ></div>
                    </div>
                    <div class="products-text">Rumah 3</div>
                    <div class="products-price">Rp. 988.000.000</div>
                  </a>
                </div> 
                <div
                  class="col-6 col-md-6 col-lg-3 shadow"
                  data-aos="fade-up"
                  data-aos-delay="{{ $incrementProduct += 100}}"
                >
                  <a href="{{ route('customer.create')}}" class="component-products d-block">
                    <div class="products-thumbnail">
                      <div
                        class="products-image"
                        style="background-image: url('img/aswana_01A.png')"
                      ></div>
                    </div>
                    <div class="products-text">Rumah 4</div>
                    <div class="products-price">Rp. 200.000.000</div>
                  </a>
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