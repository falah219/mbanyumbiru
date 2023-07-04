@extends('layouts.app')

@section('title')
    Cupang - Homepage
@endsection

@section('content')
    <div class="page-content page-home">
        <!-- Carousel -->
        <section class="store-carousel">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12" data-aos="zoom-in">
                        <div id="storeCarousel" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li class="active" data-target="#storeCarousel" data-slide-to="0"></li>
                                <li data-target="#storeCarousel" data-slide-to="1"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="images/banner2.jpg" alt="Image banner" class="d-block w-100">
                                </div>
                                <div class="carousel-item">
                                    <img src="images/banner3.jpg" alt="Image banner" class="d-block w-100">
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Categories -->
        <section class="store-categories">
            <div class="container">
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <h5>Kategori Terbaru</h5>
                    </div>
                </div>
                <div class="row">
                    @php
                        $incrementCategory = 0;
                    @endphp
                    @forelse ($categories as $category)
                        <div class="col-4 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="{{ $incrementCategory += 100  }}">
                            <a href="{{ route('categories-detail', $category->slug) }}" class="component-categories d-block">
                                <div class="categories-image">
                                    <img src="{{ Storage::url($category->photo) }}" alt="" class="w-100">
                                </div>
                                <p class="categories-text">
                                    {{ $category->name }}
                                </p>
                            </a>
                        </div>
                    @empty
                        <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100" >
                            No categories found
                        </div>
                    @endforelse
                    
                </div>
            </div>
        </section>

        <!-- Products -->
        <section class="store-products">
            <div class="container">
                <div class="row">
                    <div class="col-12" data-aos="fade-up">
                        <h5>Produk Terbaru</h5>
                    </div>
                </div>
                
                    @php
                        $incrementProduct =0;
                        
                    @endphp
                    <div class="row">
                        @forelse ($products as $product)
                        <div class="col-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="{{ $incrementProduct += 100 }}">
                            <a href="{{ route('detail', $product->slug) }}" class="component-products d-block">
                                <div class="products-thumbnail">
                                    <div class="products-image" 
                                        style="
                                                @if ($product->galleries)
                                                    background-image: url(' {{ Storage::url($product->galleries->first()->photos) }} ')
                                                @else
                                                    background-color:#eee
                                                @endif
                                        ">
                                    </div>
                                </div>
                                <div class="products-text">{{ $product->name }}</div>
                                <div class="products-price">Rp. {{ $product->price }}</div>
                            </a>
                        </div>
                        @empty
                            <div class="col-12 text-center py-5" data-aos="fade-up" data-aos-delay="100" >
                            No categories found
                            </div>
                        @endforelse
                    </div>

                
                
            </div>
        </section>
    </div>
@endsection