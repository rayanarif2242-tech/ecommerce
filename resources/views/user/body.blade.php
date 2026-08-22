<section id="billboard" class="bg-light py-5">
    <div class="container">

        <div class="row justify-content-center">

            <h1 class="section-title text-center mt-4" data-aos="fade-up">
                New Collections
            </h1>

            <div class="col-md-6 text-center"
                 data-aos="fade-up"
                 data-aos-delay="300">

                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe voluptas ut dolorum consequuntur, adipisci
                    repellat! Eveniet commodi voluptatem voluptate, eum minima, in suscipit explicabo voluptatibus harum,
                    quibusdam ex repellat eaque!
                </p>

            </div>

        </div>

        <div class="row">

            <div class="swiper main-swiper py-4"
                 data-aos="fade-up"
                 data-aos-delay="600">

                <div class="swiper-wrapper d-flex border-animation-left">

                @foreach($billboards as $billboard)

    <div class="swiper-slide">

        <div class="banner-item image-zoom-effect">

            <div class="image-holder">

                <a href="{{ route('billboard.detail', $billboard->billboard_id) }}">

                    <img
                        src="{{ asset('uploads/billboards/' . $billboard->image) }}"
                        alt="{{ $billboard->title }}"
                        class="img-fluid"
                    >

                </a>

            </div>

            <div class="banner-content py-4">

                <h5 class="element-title text-uppercase">

                    <a href="{{ route('billboard.detail', $billboard->billboard_id) }}"
                       class="item-anchor">

                        {{ $billboard->title }}

                    </a>

                </h5>

                <p>
                    {{ $billboard->subtitle }}
                </p>

                <div class="btn-left">

                    <a
                        href="{{ route('billboard.detail', $billboard->billboard_id) }}"
                        class="btn-link fs-6 text-uppercase item-anchor text-decoration-none"
                    >
                        {{ $billboard->button_text }}
                    </a>

                </div>

            </div>

        </div>

    </div>

@endforeach

                </div>

                <div class="swiper-pagination"></div>

            </div>

            <div class="icon-arrow icon-arrow-left">
                <svg width="50" height="50" viewBox="0 0 24 24">
                    <use xlink:href="#arrow-left"></use>
                </svg>
            </div>

            <div class="icon-arrow icon-arrow-right">
                <svg width="50" height="50" viewBox="0 0 24 24">
                    <use xlink:href="#arrow-right"></use>
                </svg>
            </div>

        </div>

    </div>
</section>

  <section class="features py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3 text-center" data-aos="fade-in" data-aos-delay="0">
          <div class="py-5">
            <svg width="38" height="38" viewBox="0 0 24 24">
              <use xlink:href="#calendar"></use>
            </svg>
            <h4 class="element-title text-capitalize my-3">Book An Appointment</h4>
            <p>At imperdiet dui accumsan sit amet nulla risus est ultricies quis.</p>
          </div>
        </div>
        <div class="col-md-3 text-center" data-aos="fade-in" data-aos-delay="300">
          <div class="py-5">
            <svg width="38" height="38" viewBox="0 0 24 24">
              <use xlink:href="#shopping-bag"></use>
            </svg>
            <h4 class="element-title text-capitalize my-3">Pick up in store</h4>
            <p>At imperdiet dui accumsan sit amet nulla risus est ultricies quis.</p>
          </div>
        </div>
        <div class="col-md-3 text-center" data-aos="fade-in" data-aos-delay="600">
          <div class="py-5">
            <svg width="38" height="38" viewBox="0 0 24 24">
              <use xlink:href="#gift"></use>
            </svg>
            <h4 class="element-title text-capitalize my-3">Special packaging</h4>
            <p>At imperdiet dui accumsan sit amet nulla risus est ultricies quis.</p>
          </div>
        </div>
        <div class="col-md-3 text-center" data-aos="fade-in" data-aos-delay="900">
          <div class="py-5">
            <svg width="38" height="38" viewBox="0 0 24 24">
              <use xlink:href="#arrow-cycle"></use>
            </svg>
            <h4 class="element-title text-capitalize my-3">free global returns</h4>
            <p>At imperdiet dui accumsan sit amet nulla risus est ultricies quis.</p>
          </div>
        </div>
      </div>
    </div>
  </section>


<section class="categories overflow-hidden py-5">

    <div class="container">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h4 class="text-uppercase">
                Shop By CATEGORY
            </h4>

        </div>

        <div class="open-up" data-aos="zoom-out">

            <div class="row">

                @forelse($categories as $category)

                    <div class="col-md-4 mb-4">

                        <div class="cat-item image-zoom-effect">

                            <div class="image-holder">

                                <a href="{{ route('category.show', $category->slug) }}">

                                    @if($category->image)

                                        <img
                                            src="{{ asset('uploads/categories/' . $category->image) }}"
                                            alt="{{ $category->name }}"
                                            class="product-image img-fluid"
                                        >

                                    @else

                                        <img
                                            src="{{ asset('homes/images/cat-item1.jpg') }}"
                                            alt="{{ $category->name }}"
                                            class="product-image img-fluid"
                                        >

                                    @endif

                                </a>

                            </div>

                            <div class="category-content">

                                <div class="product-button">

                                    <a
                                        href="{{ route('category.show', $category->slug) }}"
                                        class="btn btn-common text-uppercase"
                                    >
                                        {{ $category->name }}
                                    </a>

                                </div>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12 text-center">

                        <p>No categories available.</p>

                    </div>

                @endforelse

            </div>

        </div>

    </div>

</section>

  <section id="new-arrival" class="new-arrival product-carousel py-5 position-relative overflow-hidden">
    <div class="container">

        <div class="d-flex flex-wrap justify-content-between align-items-center mt-5 mb-3">
            <h4 class="text-uppercase">Our New Arrivals</h4>
           <a href="{{ route('user.products') }}"class="btn-link">
    VIEW ALL PRODUCTS
</a>
        </div>

        <div class="swiper product-swiper open-up" data-aos="zoom-out">

            <div class="swiper-wrapper d-flex">

                @foreach($products as $product)

                    <div class="swiper-slide">

                        <div class="product-item image-zoom-effect link-effect">

                            <div class="image-holder position-relative">

                              <a href="{{ route('user.products') }}">
    <img
        src="{{ asset('uploads/products/' . $product->image) }}"
        alt="{{ $product->name }}"
        class="product-image img-fluid"
        style="width: 100%; height: 420px; object-fit: cover; display: block;"
    >
</a>

                                <a href="{{ route('user.products') }}" class="btn-icon btn-wishlist">
                                    <svg width="24" height="24" viewBox="0 0 24 24">
                                      <use xlink:href="#heart"></use>
                                    </svg>
                                </a>

                               <div class="product-content">

    <h5 class="element-title text-uppercase fs-5 mt-3">
        <a href="{{ route('user.products') }}">
            {{ $product->name }}
        </a>
    </h5>

    <div class="product-price mt-2">

        @if($product->discount_price)

            <span>
                ${{ number_format($product->discount_price, 2) }}
            </span>

            <del class="text-muted ms-2">
                ${{ number_format($product->price, 2) }}
            </del>

        @else

            <span>
                ${{ number_format($product->price, 2) }}
            </span>

        @endif

    </div>

    

</div>

                            </div>

                        </div>

                    </div>

                @endforeach

            </div>

            <div class="swiper-pagination"></div>

        </div>

        <div class="icon-arrow icon-arrow-left">
            <svg width="50" height="50" viewBox="0 0 24 24">
                <use xlink:href="#arrow-left"></use>
            </svg>
        </div>

        <div class="icon-arrow icon-arrow-right">
            <svg width="50" height="50" viewBox="0 0 24 24">
                <use xlink:href="#arrow-right"></use>
            </svg>
        </div>

    </div>
    
</section>
<section id="collections"
         class="collection product-carousel py-5 position-relative overflow-hidden">

    <div class="container">

        {{-- Collection Heading --}}
        <div class="d-flex flex-wrap justify-content-between align-items-center mt-5 mb-3">

            <h4 class="text-uppercase">
                Our Best Sellers
            </h4>

            
            <a href="{{ route('user.collections') }}" class="btn-link">
    VIEW ALL COLLECTIONS
</a>

        </div>


        {{-- Collection Slider --}}
        <div class="swiper product-swiper open-up" data-aos="zoom-out">

            <div class="swiper-wrapper d-flex">

                @forelse($collections as $collection)

                    <div class="swiper-slide">

                        <div class="product-item image-zoom-effect link-effect">

                            {{-- Collection Image --}}
                            <div class="image-holder position-relative">

                                <a href="#">

                                    @if($collection->thumbnail)

                                        <img
                                            src="{{ asset('uploads/collections/' . $collection->thumbnail) }}"
                                            alt="{{ $collection->name }}"
                                            class="product-image img-fluid"
                                            style="width: 100%; height: 420px; object-fit: cover; display: block;"
                                        >

                                    @elseif($collection->banner)

                                        <img
                                            src="{{ asset('uploads/collections/' . $collection->banner) }}"
                                            alt="{{ $collection->name }}"
                                            class="product-image img-fluid"
                                            style="width: 100%; height: 420px; object-fit: cover; display: block;"
                                        >

                                    @else

                                        <img
                                            src="{{ asset('homes/images/single-image-2.jpg') }}"
                                            alt="{{ $collection->name }}"
                                            class="product-image img-fluid"
                                            style="width: 100%; height: 420px; object-fit: cover; display: block;"
                                        >

                                    @endif

                                </a>


                                {{-- Wishlist --}}
                                <a href="#" class="btn-icon btn-wishlist">

                                    <svg width="24" height="24" viewBox="0 0 24 24">
                                        <use xlink:href="#heart"></use>
                                    </svg>

                                </a>


                                {{-- Collection Content --}}
                                <div class="product-content">

                                    <h5 class="element-title text-uppercase fs-5 mt-3">

                                        <a href="#">
                                            {{ $collection->name }}
                                        </a>

                                    </h5>


                                    @if($collection->description)

                                        <p class="text-muted">
                                            {{ Str::limit($collection->description, 80) }}
                                        </p>

                                    @endif

                                </div>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12 text-center py-5">

                        <h4>No collections available.</h4>

                    </div>

                @endforelse

            </div>


            {{-- Pagination --}}
            <div class="swiper-pagination"></div>

        </div>


        {{-- Arrows --}}
        <div class="icon-arrow icon-arrow-left">

            <svg width="50" height="50" viewBox="0 0 24 24">
                <use xlink:href="#arrow-left"></use>
            </svg>

        </div>

        <div class="icon-arrow icon-arrow-right">

            <svg width="50" height="50" viewBox="0 0 24 24">
                <use xlink:href="#arrow-right"></use>
            </svg>

        </div>

    </div>

</section>

  <section class="video py-5 overflow-hidden">
    <div class="container-fluid">
      <div class="row">
        <div class="video-content open-up" data-aos="zoom-out">
          <div class="video-bg">
            <img src="{{asset('homes/images/video-image.jpg')}}" alt="video" class="video-image img-fluid">
          </div>
          <div class="video-player">
            <a class="youtube" href="https://www.youtube.com/embed/pjtsGzQjFM4">
              <svg width="24" height="24" viewBox="0 0 24 24">
                <use xlink:href="#play"></use>
              </svg>
              <img src="{{asset('homes/images/text-pattern.png')}}" alt="pattern" class="text-rotate">
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="testimonials py-5 bg-light">
    <div class="section-header text-center mt-5">
      <h3 class="section-title">WE LOVE GOOD COMPLIMENT</h3>
    </div>
    <div class="swiper testimonial-swiper overflow-hidden my-5">
      <div class="swiper-wrapper d-flex">
        <div class="swiper-slide">
          <div class="testimonial-item text-center">
            <blockquote>
              <p>“More than expected crazy soft, flexible and best fitted white simple denim shirt.”</p>
              <div class="review-title text-uppercase">casual way</div>
            </blockquote>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="testimonial-item text-center">
            <blockquote>
              <p>“Best fitted white denim shirt more than expected crazy soft, flexible</p>
              <div class="review-title text-uppercase">uptop</div>
            </blockquote>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="testimonial-item text-center">
            <blockquote>
              <p>“Best fitted white denim shirt more white denim than expected flexible crazy soft.”</p>
              <div class="review-title text-uppercase">Denim craze</div>
            </blockquote>
          </div>
        </div>
        <div class="swiper-slide">
          <div class="testimonial-item text-center">
            <blockquote>
              <p>“Best fitted white denim shirt more than expected crazy soft, flexible</p>
              <div class="review-title text-uppercase">uptop</div>
            </blockquote>
          </div>
        </div>
      </div>
    </div>
    <div class="testimonial-swiper-pagination d-flex justify-content-center mb-5"></div>
  </section>

  <section id="related-products" class="related-products product-carousel py-5 position-relative overflow-hidden">
    <div class="container">
      <div class="d-flex flex-wrap justify-content-between align-items-center mt-5 mb-3">
        <h4 class="text-uppercase">You May Also Like</h4>
       <a href="{{ route('signatures') }}" class="btn-link">
    View All Products
</a>
      </div>
      <div class="swiper product-swiper open-up" data-aos="zoom-out">
        <div class="swiper-wrapper d-flex">
          <div class="swiper-slide">
            <div class="product-item image-zoom-effect link-effect">
              <div class="image-holder">
                <a href="{{ route('signatures') }}">
                  <img src="{{asset('homes/images/product-item-5.jpg')}}" alt="product" class="product-image img-fluid">
                </a>
                <a href="" class="btn-icon btn-wishlist">
                  <svg width="24" height="24" viewBox="0 0 24 24">
                    <use xlink:href="{{ route('signatures') }}"></use>
                  </svg>
                </a>
                <div class="product-content">
                  <h5 class="text-uppercase fs-5 mt-3">
                    <a href="{{ route('signatures') }}">Dark florish onepiece</a>
                  </h5>
                  <a href="" class="text-decoration-none" data-after="Add to cart"><span>$95.00</span></a>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="product-item image-zoom-effect link-effect">
              <div class="image-holder">
                <a href="{{ route('signatures') }}">
                  <img src="{{asset('homes/images/product-item-6.jpg')}}" alt="product" class="product-image img-fluid">
                </a>
                <a href="" class="btn-icon btn-wishlist">
                  <svg width="24" height="24" viewBox="0 0 24 24">
                    <use xlink:href="#heart"></use>
                  </svg>
                </a>
                <div class="product-content">
                  <h5 class="text-uppercase fs-5 mt-3">
                    <a href="{{ route('signatures') }}">Baggy Shirt</a>
                  </h5>
                  <a href="{{ route('signatures') }}" class="text-decoration-none" data-after="Add to cart"><span>$55.00</span></a>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="product-item image-zoom-effect link-effect">
              <div class="image-holder">
                <a href="{{ route('signatures') }}">
                  <img src="{{asset('homes/images/product-item-7.jpg')}}" alt="product" class="product-image img-fluid">
                </a>
                <a href="" class="btn-icon btn-wishlist">
                  <svg width="24" height="24" viewBox="0 0 24 24">
                    <use xlink:href="{{ route('signatures') }}"></use>
                  </svg>
                </a>
                <div class="product-content">
                  <h5 class="text-uppercase fs-5 mt-3">
                    <a href="{{ route('signatures') }}">Cotton off-white shirt</a>
                  </h5>
                  <a href="{{ route('signatures') }}" class="text-decoration-none" data-after="Add to cart"><span>$65.00</span></a>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="product-item image-zoom-effect link-effect">
              <div class="image-holder">
                <a href="{{ route('signatures') }}">
                  <img src="{{asset('homes/images/product-item-8.jpg')}}" alt="product" class="product-image img-fluid">
                </a>
                <a href="{{ route('signatures') }}" class="btn-icon btn-wishlist">
                  <svg width="24" height="24" viewBox="0 0 24 24">
                    <use xlink:href="{{ route('signatures') }}"></use>
                  </svg>
                </a>
                <div class="product-content">
                  <h5 class="text-uppercase fs-5 mt-3">
                    <a href="{{ route('signatures') }}">Handmade crop sweater</a>
                  </h5>
                  <a href="{{ route('signatures') }}" class="text-decoration-none" data-after="Add to cart"><span>$50.00</span></a>
                </div>
              </div>
            </div>
          </div>
          <div class="swiper-slide">
            <div class="product-item image-zoom-effect link-effect">
              <div class="image-holder">
                <a href="{{ route('signatures') }}">
                  <img src="{{asset('homes/images/product-item-1.jpg')}}" alt="product" class="product-image img-fluid">
                </a>
                <a href="{{ route('signatures') }}" class="btn-icon btn-wishlist">
                  <svg width="24" height="24" viewBox="0 0 24 24">
                    <use xlink:href="{{ route('signatures') }}"></use>
                  </svg>
                </a>
                <div class="product-content">
                  <h5 class="text-uppercase fs-5 mt-3">
                    <a href="{{ route('signatures') }}">Handmade crop sweater</a>
                  </h5>
                  <a href="{{ route('signatures') }}" class="text-decoration-none" data-after="Add to cart"><span>$70.00</span></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="swiper-pagination"></div>
      </div>
      <div class="icon-arrow icon-arrow-left"><svg width="50" height="50" viewBox="0 0 24 24">
          <use xlink:href="#arrow-left"></use>
        </svg></div>
      <div class="icon-arrow icon-arrow-right"><svg width="50" height="50" viewBox="0 0 24 24">
          <use xlink:href="#arrow-right"></use>
        </svg></div>
    </div>
  </section>

  <section class="blog py-5">

    <div class="container">

        <div class="d-flex flex-wrap justify-content-between align-items-center mt-5 mb-3">

            <h4 class="text-uppercase">
                Read Blog Posts
            </h4>

           
<a href="{{ route('blogs') }}" class="view-all-btn">
    View All
    <i class="bi bi-arrow-right ms-2"></i>
</a>

        </div>


        <div class="row">

            @forelse($blogs as $blog)

                <div class="col-md-4">

                    <article class="post-item">

                      {{-- Blog Image --}}
<div class="post-image">

    <a href="{{ route('blogs') }}">

        @if($blog->image)

            <img 
                src="{{ asset('uploads/blogs/' . $blog->image) }}"
                alt="{{ $blog->title }}"
                class="post-grid-image img-fluid"
            >

        @else

            <img 
                src="{{ asset('homes/images/post-image1.jpg') }}"
                alt="{{ $blog->title }}"
                class="post-grid-image img-fluid"
            >

        @endif

    </a>

</div>


                        {{-- Blog Content --}}
                        <div class="post-content d-flex flex-wrap gap-2 my-3">

                            <div class="post-meta text-uppercase fs-6 text-secondary">

                                <span class="post-category">
                                    {{ $blog->category }}
                                </span>

                                <span class="meta-day">
                                    /
                                    {{ $blog->created_at->format('M d, Y') }}
                                </span>

                            </div>


                            <h5 class="post-title text-uppercase">

                                <a href="{{ route('blogs') }}">

                                    {{ $blog->title }}

                                </a>

                            </h5>


                            <p>

                                {{ $blog->short_description }}

                            </p>

                        </div>

                    </article>

                </div>

            @empty

                <div class="col-12 text-center py-5">

                    <h4>No blog posts available.</h4>

                </div>

            @endforelse

        </div>

    </div>

</section>

  <section class="logo-bar py-5 my-5">
    <div class="container">
      <div class="row">
        <div class="logo-content d-flex flex-wrap justify-content-between">
          <img src="{{asset('homes/images/logo1.png')}}" alt="logo" class="logo-image img-fluid">
          <img src="{{asset('homes/images/logo2.png')}}" alt="logo" class="logo-image img-fluid">
          <img src="{{asset('homes/images/logo3.png')}}" alt="logo" class="logo-image img-fluid">
          <img src="{{asset('homes/images/logo4.png')}}" alt="logo" class="logo-image img-fluid">
          <img src="{{asset('homes/images/logo5.png')}}" alt="logo" class="logo-image img-fluid">
        </div>
      </div>
    </div>
  </section>

  <section class="newsletter bg-light"
    style="background: url('{{ asset('homes/images/pattern-bg.png') }}') no-repeat;">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 py-5 my-5">
          <div class="subscribe-header text-center pb-3">
            <h3 class="section-title text-uppercase">Sign Up for our newsletter</h3>
          </div>
          <form id="form" class="d-flex flex-wrap gap-2">
            <input type="text" name="email" placeholder="Your Email Addresss" class="form-control form-control-lg">
            <button class="btn btn-dark btn-lg text-uppercase w-100">Sign Up</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <section class="instagram position-relative">
    <div class="d-flex justify-content-center w-100 position-absolute bottom-0 z-1">
      <a href="https://www.instagram.com/templatesjungle/" class="btn btn-dark px-5">Follow us on Instagram</a>
    </div>
    <div class="row g-0">
      <div class="col-6 col-sm-4 col-md-2">
        <div class="insta-item">
          <a href="https://www.instagram.com/templatesjungle/" target="_blank">
            <img src="{{asset('homes/images/insta-item1.jpg')}}" alt="instagram" class="insta-image img-fluid">
          </a>
        </div>
      </div>
      <div class="col-6 col-sm-4 col-md-2">
        <div class="insta-item">
          <a href="https://www.instagram.com/templatesjungle/" target="_blank">
            <img src="{{asset('homes/images/insta-item2.jpg')}}" alt="instagram" class="insta-image img-fluid">
          </a>
        </div>
      </div>
      <div class="col-6 col-sm-4 col-md-2">
        <div class="insta-item">
          <a href="https://www.instagram.com/templatesjungle/" target="_blank">
            <img src="{{asset('homes/images/insta-item3.jpg')}}" alt="instagram" class="insta-image img-fluid">
          </a>
        </div>
      </div>
      <div class="col-6 col-sm-4 col-md-2">
        <div class="insta-item">
          <a href="https://www.instagram.com/templatesjungle/" target="_blank">
            <img src="{{asset('homes/images/insta-item4.jpg')}}" alt="instagram" class="insta-image img-fluid">
          </a>
        </div>
      </div>
      <div class="col-6 col-sm-4 col-md-2">
        <div class="insta-item">
          <a href="https://www.instagram.com/templatesjungle/" target="_blank">
            <img src="{{asset('homes/images/insta-item5.jpg')}}" alt="instagram" class="insta-image img-fluid">
          </a>
        </div>
      </div>
      <div class="col-6 col-sm-4 col-md-2">
        <div class="insta-item">
          <a href="https://www.instagram.com/templatesjungle/" target="_blank">
            <img src="{{asset('homes/images/insta-item6.jpg')}}" alt="instagram" class="insta-image img-fluid">
          </a>
        </div>
      </div>
    </div>
  </section>