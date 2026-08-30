 <style>
    /* =========================================================
   KAIRA AI FLOATING BUTTON
========================================================= */

.kaira-ai-button {
    position: fixed;
    right: 30px;
    bottom: 90px;

    width: 60px;
    height: 60px;

    border-radius: 50%;

    background: #ffffff;
    color: #111111;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 26px;

    cursor: pointer;

    z-index: 999998;

    border: 1px solid #eeeeee;

    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.18);

    transition: all 0.25s ease;
}

.kaira-ai-button:hover {
    transform: scale(1.08);
}


/* =========================================================
   AI PANEL
========================================================= */

/* =========================================================
   KAIRA AI FLOATING BUTTON
========================================================= */

.kaira-ai-button {
    position: fixed;
    right: 30px;
    bottom: 25px;

    width: 60px;
    height: 60px;

    border-radius: 50%;
    background: #ffffff;
    color: #111111;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 26px;
    cursor: pointer;

    z-index: 999998;

    border: 1px solid #eeeeee;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.18);

    transition: all 0.25s ease;
}

.kaira-ai-button:hover {
    transform: scale(1.08);
}


/* =========================================================
   AI PANEL
========================================================= */

.kaira-ai-panel {
    position: fixed;

    right: 30px;

    /* PANEL WILL NOW SIT LOWER */
    bottom: 5px;

    width: 380px;
    height: 570px;

    max-width: calc(100vw - 30px);

    background: #ffffff;

    border-radius: 22px;

    overflow: hidden;

    z-index: 999999;

    display: none;
    flex-direction: column;

    border: 1px solid #eeeeee;

    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.20);
}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 576px) {

    .kaira-ai-panel {
        right: 12px;
        bottom: 100px;

        width: calc(100vw - 24px);
        height: 70vh;
    }

    .kaira-ai-button {
        right: 18px;
        bottom: 20px;
    }
}


/* =========================================================
   HEADER
========================================================= */

.kaira-ai-header {
    height: 70px;

    padding: 0 18px;

    background: #111111;
    color: #ffffff;

    display: flex;
    align-items: center;
    justify-content: space-between;
}

.kaira-ai-title {
    display: flex;
    align-items: center;

    gap: 10px;
}

.kaira-ai-sparkle {
    width: 38px;
    height: 38px;

    border-radius: 50%;

    background: #ffffff;
    color: #111111;

    display: flex;
    align-items: center;
    justify-content: center;
}

.kaira-ai-title strong {
    display: block;

    font-family: "Cormorant Garamond", serif;

    font-size: 22px;
    font-weight: 600;
}

.kaira-ai-title small {
    display: block;

    font-family: "Montserrat", sans-serif;

    font-size: 9px;

    text-transform: uppercase;

    letter-spacing: 1px;

    opacity: .65;
}

#kairaAiClose {
    border: none;

    background: transparent;

    color: #ffffff;

    font-size: 28px;

    cursor: pointer;
}


/* =========================================================
   CHAT
========================================================= */

.kaira-ai-messages {
    flex: 1;

    overflow-y: auto;

    padding: 20px;

    background: #fafafa;
}


/* AI MESSAGE */

.kaira-ai-message {
    background: #ffffff;

    padding: 15px;

    border-radius: 15px;

    margin-bottom: 18px;

    font-family: "Montserrat", sans-serif;

    font-size: 12px;

    line-height: 1.6;

    box-shadow: 0 3px 15px rgba(0,0,0,.04);
}

.kaira-ai-message p {
    margin: 5px 0;
}


/* USER MESSAGE */

.kaira-user-message {
    background: #111111;

    color: #ffffff;

    padding: 12px 15px;

    border-radius: 15px;

    margin: 10px 0 10px auto;

    max-width: 85%;

    font-family: "Montserrat", sans-serif;

    font-size: 13px;

    line-height: 1.5;
}


/* =========================================================
   CATEGORY
========================================================= */

.kaira-ai-question {
    font-family: "Montserrat", sans-serif;

    font-size: 10px;

    text-transform: uppercase;

    letter-spacing: 1px;

    color: #777777;

    margin-bottom: 12px;
}

.kaira-category-button {
    width: 100%;

    padding: 14px 15px;

    margin-bottom: 9px;

    background: #ffffff;

    border: 1px solid #e5e5e5;

    border-radius: 12px;

    text-align: left;

    cursor: pointer;

    font-family: "Montserrat", sans-serif;

    font-size: 12px;

    transition: .25s;
}

.kaira-category-button:hover {
    background: #111111;

    color: #ffffff;

    border-color: #111111;
}


/* =========================================================
   INPUT
========================================================= */

.kaira-ai-input-area {
    display: flex;

    gap: 8px;

    padding: 12px;

    background: #ffffff;

    border-top: 1px solid #eeeeee;
}

#kairaAiInput {
    flex: 1;

    height: 44px;

    border: 1px solid #dddddd;

    border-radius: 24px;

    padding: 0 16px;

    outline: none;

    font-family: "Montserrat", sans-serif;

    font-size: 11px;
}

#kairaAiSend {
    width: 44px;
    height: 44px;

    border-radius: 50%;

    border: none;

    background: #111111;

    color: #ffffff;

    cursor: pointer;
}


/* =========================================================
   LOADING
========================================================= */

.kaira-ai-loading {
    padding: 15px;

    color: #888888;

    font-family: "Montserrat", sans-serif;

    font-size: 11px;
}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 576px) {

    .kaira-ai-panel {
        right: 12px;
        bottom: 85px;

        width: calc(100vw - 24px);

        height: 70vh;
    }

    .kaira-ai-button {
    bottom: 25px;
}
}
 </style><section id="billboard" class="bg-light py-5">
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

            {{-- View all products --}}
            <a href="{{ route('user.products') }}" class="btn-link">
                VIEW ALL PRODUCTS
            </a>
        </div>

        <div class="swiper product-swiper open-up" data-aos="zoom-out">

            <div class="swiper-wrapper d-flex">

                @foreach($products as $product)

                    <div class="swiper-slide">

                        <div class="product-item image-zoom-effect link-effect">

                            <div class="image-holder position-relative">

                                {{-- PRODUCT IMAGE --}}
                                <a href="{{ route('product.show', $product->slug) }}">

                                    <img
                                        src="{{ asset('uploads/products/' . $product->image) }}"
                                        alt="{{ $product->name }}"
                                        class="product-image img-fluid"
                                        style="width: 100%; height: 420px; object-fit: cover; display: block;"
                                    >

                                </a>


                                {{-- WISHLIST --}}
                                <a href="{{ route('product.show', $product->slug) }}"
                                   class="btn-icon btn-wishlist">

                                    <svg width="24" height="24" viewBox="0 0 24 24">
                                        <use xlink:href="#heart"></use>
                                    </svg>

                                </a>


                                {{-- PRODUCT CONTENT --}}
                                <div class="product-content">

                                    {{-- PRODUCT NAME --}}
                                    <h5 class="element-title text-uppercase fs-5 mt-3">

                                        <a href="{{ route('product.show', $product->slug) }}">
                                            {{ $product->name }}
                                        </a>

                                    </h5>


                                    {{-- PRODUCT PRICE --}}
                                    <div class="product-price mt-2">

                                        @if($product->discount_price)

                                            <span>
                                                Rs.{{ number_format($product->discount_price, 2) }}
                                            </span>

                                            <del class="text-muted ms-2">
                                                Rs.{{ number_format($product->price, 2) }}
                                            </del>

                                        @else

                                            <span>
                                                Rs.{{ number_format($product->price, 2) }}
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


        {{-- LEFT ARROW --}}
        <div class="icon-arrow icon-arrow-left">

            <svg width="50" height="50" viewBox="0 0 24 24">
                <use xlink:href="#arrow-left"></use>
            </svg>

        </div>


        {{-- RIGHT ARROW --}}
        <div class="icon-arrow icon-arrow-right">

            <svg width="50" height="50" viewBox="0 0 24 24">
                <use xlink:href="#arrow-right"></use>
            </svg>

        </div>

    </div>
</section>

 
<section class="collection bg-light position-relative py-5">

    <div class="container">

        <div class="row">

            <div class="title-xlarge text-uppercase txt-fx domino">
                Collection
            </div>

            @php
                $collection = $collections->first();
            @endphp

            @if($collection)

                <div class="collection-item d-flex flex-wrap my-5">

                    {{-- ONE COLLECTION IMAGE --}}
                    <div class="col-md-6 column-container">

                        <div class="image-holder">

                            @if($collection->banner)

                                <img
                                    src="{{ asset('uploads/collections/' . $collection->banner) }}"
                                    alt="{{ $collection->name }}"
                                    class="product-image img-fluid"
                                >

                            @elseif($collection->thumbnail)

                                <img
                                    src="{{ asset('uploads/collections/' . $collection->thumbnail) }}"
                                    alt="{{ $collection->name }}"
                                    class="product-image img-fluid"
                                >

                            @else

                                <img
                                    src="{{ asset('homes/images/single-image-2.jpg') }}"
                                    alt="Collection"
                                    class="product-image img-fluid"
                                >

                            @endif

                        </div>

                    </div>

                    {{-- COLLECTION TEXT --}}
                    <div class="col-md-6 column-container bg-white">

                        <div class="collection-content p-5 m-0 m-md-5">

                            <h3 class="element-title text-uppercase">
                                {{ $collection->name }}
                            </h3>

                            <p>
                                {{ $collection->description }}
                            </p>

                            <a
                                href="{{ route('user.collections') }}"
                                class="btn btn-dark text-uppercase mt-3"
                            >
                                Explore Collection
                            </a>

                        </div>

                    </div>

                </div>

            @else

                {{-- DEFAULT IMAGE IF NO COLLECTION EXISTS --}}
                <div class="collection-item d-flex flex-wrap my-5">

                    <div class="col-md-6 column-container">

                        <div class="image-holder">

                            <img
                                src="{{ asset('homes/images/single-image-2.jpg') }}"
                                alt="Collection"
                                class="product-image img-fluid"
                            >

                        </div>

                    </div>

                    <div class="col-md-6 column-container bg-white">

                        <div class="collection-content p-5 m-0 m-md-5">

                            <h3 class="element-title text-uppercase">
                                Our Collection
                            </h3>

                            <p>
                                Explore our latest collection.
                            </p>

                            <a
                                href="{{ route('user.collections') }}"
                                class="btn btn-dark text-uppercase mt-3"
                            >
                                Explore Collection
                            </a>

                        </div>

                    </div>

                </div>

            @endif

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

 <section id="related-products"
    class="related-products product-carousel py-5 position-relative overflow-hidden">

    <div class="container">

        {{-- Section Heading --}}
        <div class="d-flex flex-wrap justify-content-between align-items-center mt-5 mb-4">

            <h4 class="text-uppercase mb-0">
                You May Also Like
            </h4>

            <a href="{{ route('signatures') }}" class="btn-link">
                View All Products
            </a>

        </div>


        {{-- Products Slider --}}
        <div class="swiper product-swiper open-up" data-aos="zoom-out">

            <div class="swiper-wrapper d-flex">

                @forelse($signatures as $signature)

                    <div class="swiper-slide">

                        <div class="product-item image-zoom-effect link-effect">

                            {{-- Product Image --}}
                            <div class="image-holder position-relative">

                                <a href="{{ route('signature.show', $signature->signature_id) }}">

                                    @if($signature->image && file_exists(public_path($signature->image)))

                                        <img
                                            src="{{ asset($signature->image) }}"
                                            alt="{{ $signature->product_name }}"
                                            class="product-image img-fluid"
                                        >

                                    @else

                                        <img
                                            src="{{ asset('homes/images/product-item-1.jpg') }}"
                                            alt="{{ $signature->product_name }}"
                                            class="product-image img-fluid"
                                        >

                                    @endif

                                </a>


                                {{-- Wishlist --}}
                                <a href="#"
                                   class="btn-icon btn-wishlist">

                                    <svg width="24"
                                         height="24"
                                         viewBox="0 0 24 24">

                                        <use xlink:href="#heart"></use>

                                    </svg>

                                </a>

                            </div>


                            {{-- Product Content --}}
                            <div class="product-content">

                                <h5 class="text-uppercase fs-5 mt-3">

                                    <a href="{{ route('signature.show', $signature->signature_id) }}">

                                        {{ $signature->product_name }}

                                    </a>

                                </h5>


                                {{-- Price --}}
                                <div class="product-price">

                                    @if($signature->discount_price)

                                        <span class="text-muted text-decoration-line-through me-2">
                                            Rs. {{ number_format($signature->price, 0) }}
                                        </span>

                                        <span>
                                            Rs. {{ number_format($signature->discount_price, 0) }}
                                        </span>

                                    @else

                                        <span>
                                            Rs. {{ number_format($signature->price, 0) }}
                                        </span>

                                    @endif

                                </div>


                                {{-- Add To Cart --}}
                                <a href="{{ route('signature.show', $signature->signature_id) }}"
                                   class="text-decoration-none"
                                   data-after="View Product">

                                    <span>View Product</span>

                                </a>

                            </div>

                        </div>

                    </div>

                @empty

                    <div class="col-12 text-center py-5">

                        <h5>No products available.</h5>

                    </div>

                @endforelse

            </div>


            {{-- Pagination --}}
            <div class="swiper-pagination"></div>

        </div>


        {{-- Previous Button --}}
        <div class="icon-arrow icon-arrow-left">

            <svg width="50"
                 height="50"
                 viewBox="0 0 24 24">

                <use xlink:href="#arrow-left"></use>

            </svg>

        </div>


        {{-- Next Button --}}
        <div class="icon-arrow icon-arrow-right">

            <svg width="50"
                 height="50"
                 viewBox="0 0 24 24">

                <use xlink:href="#arrow-right"></use>

            </svg>

        </div>

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
<section
    class="newsletter bg-light"
    style="background: url('{{ asset('homes/images/pattern-bg.png') }}') no-repeat;"
>
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8 py-5 my-5">

                <div class="subscribe-header text-center pb-3">

                    <h3 class="section-title text-uppercase">
                        Sign Up for our newsletter
                    </h3>

                </div>


                {{-- SUCCESS MESSAGE --}}

                @if(session()->has('newsletter_success'))

                    <div
                        class="alert alert-success text-center mb-4"
                        role="alert"
                    >
                        <i class="bi bi-check-circle me-2"></i>

                        {{ session('newsletter_success') }}

                    </div>

                @endif


                {{-- ERROR MESSAGE --}}

                @if($errors->has('email'))

                    <div
                        class="alert alert-danger text-center mb-4"
                        role="alert"
                    >
                        <i class="bi bi-exclamation-circle me-2"></i>

                        {{ $errors->first('email') }}

                    </div>

                @endif


                {{-- NEWSLETTER FORM --}}

                <form
                    action="{{ route('newsletter.subscribe') }}"
                    method="POST"
                    class="d-flex flex-wrap gap-2"
                >

                    @csrf

                    <input
                        type="email"
                        name="email"
                        placeholder="Your Email Address"
                        class="form-control form-control-lg"
                        value="{{ old('email') }}"
                        required
                    >

                    <button
                        type="submit"
                        class="btn btn-dark btn-lg text-uppercase w-100"
                    >
                        <i class="bi bi-envelope me-2"></i>
                        Sign Up
                    </button>

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

    <!-- =========================================================
     KAIRA AI SHOPPING ASSISTANT
========================================================= -->

<div id="kairaAiButton" class="kaira-ai-button">
    ✨
</div>

<div id="kairaAiPanel" class="kaira-ai-panel">

    <!-- Header -->
    <div class="kaira-ai-header">

        <div class="kaira-ai-title">

            <span class="kaira-ai-sparkle">
                ✨
            </span>

            <div>
                <strong>Kaira AI</strong>
                <small>Shopping Assistant</small>
            </div>

        </div>

        <button type="button" id="kairaAiClose">
            ×
        </button>

    </div>


    <!-- Messages -->
    <div id="kairaAiMessages" class="kaira-ai-messages">

        <div class="kaira-ai-message">

            <strong>Hello! 👋</strong>

            <p>
                Welcome to Kaira AI.
            </p>

            <p>
                What are you looking for today?
            </p>

        </div>

        <div id="kairaCategoryArea">

            <div class="kaira-ai-question">
                Choose a category
            </div>

            <div id="kairaCategoryButtons">
                <div class="kaira-ai-loading">
                    Loading categories...
                </div>
            </div>

        </div>

    </div>


    <!-- Input -->
    <div class="kaira-ai-input-area">

        <input
            type="text"
            id="kairaAiInput"
            placeholder="Ask about Kaira products..."
            autocomplete="off"
        >

        <button
            type="button"
            id="kairaAiSend"
        >
            ➤
        </button>

    </div>

</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const button = document.getElementById('kairaAiButton');
    const panel = document.getElementById('kairaAiPanel');
    const close = document.getElementById('kairaAiClose');

    const input = document.getElementById('kairaAiInput');
    const sendButton = document.getElementById('kairaAiSend');

    const messagesBox =
        document.getElementById('kairaAiMessages');

    const categoryButtons =
        document.getElementById('kairaCategoryButtons');

    const categoryArea =
        document.getElementById('kairaCategoryArea');


    let selectedCategory = null;
    let chatHistory = [];


    /* =====================================================
       CHECK ELEMENTS
    ===================================================== */

    if (!button || !panel) {

        console.error('Kaira AI elements not found.');

        return;
    }


    /* =====================================================
       OPEN AI
    ===================================================== */

    button.addEventListener('click', function () {

        panel.style.display = 'flex';

        loadCategories();

        input.focus();
    });


    /* =====================================================
       CLOSE AI
    ===================================================== */

    close.addEventListener('click', function () {

        panel.style.display = 'none';

    });


    /* =====================================================
       LOAD CATEGORIES
    ===================================================== */

    function loadCategories() {

        categoryButtons.innerHTML =
            '<div class="kaira-ai-loading">Loading categories...</div>';


        fetch("{{ route('ai.categories') }}")

            .then(response => {

                if (!response.ok) {
                    throw new Error('HTTP error ' + response.status);
                }

                return response.json();

            })

            .then(data => {

                categoryButtons.innerHTML = '';


                if (!data.success) {

                    categoryButtons.innerHTML =
                        '<div class="kaira-ai-loading">' +
                        'Unable to load categories.' +
                        '</div>';

                    return;
                }


                data.categories.forEach(category => {

                    const btn =
                        document.createElement('button');

                    btn.type = 'button';

                    btn.className =
                        'kaira-category-button';

                    btn.innerHTML =
                        '🛍️ ' + escapeHtml(category.name);


                    btn.addEventListener('click', function () {

                        selectCategory(category);

                    });


                    categoryButtons.appendChild(btn);

                });

            })

            .catch(error => {

                console.error('Category error:', error);

                categoryButtons.innerHTML =
                    '<div class="kaira-ai-loading">' +
                    'Unable to connect to categories.' +
                    '</div>';

            });
    }


    /* =====================================================
       SELECT CATEGORY
    ===================================================== */

    function selectCategory(category) {

        selectedCategory =
            category.category_id;


        addUserMessage(
            'I want to shop for ' +
            category.name
        );


        categoryArea.style.display = 'none';


        addAiMessage(
            '<strong>' +
            escapeHtml(category.name) +
            '</strong>' +

            '<p>Great choice! 👋</p>' +

            '<p>' +
            'Ask me anything about the available ' +
            'products in this category.' +
            '</p>'
        );


        input.focus();
    }


    /* =====================================================
       SEND BUTTON
    ===================================================== */

    sendButton.addEventListener(
        'click',
        sendMessage
    );


    /* =====================================================
       ENTER KEY
    ===================================================== */

    input.addEventListener(
        'keydown',
        function (event) {

            if (event.key === 'Enter') {

                event.preventDefault();

                sendMessage();

            }

        }
    );


    /* =====================================================
       SEND MESSAGE
    ===================================================== */

    function sendMessage() {

        const message =
            input.value.trim();


        if (!message) {
            return;
        }


        addUserMessage(message);


        input.value = '';


        const loading =
            addAiMessage(
                'Thinking... ✨'
            );


        fetch("{{ route('ai.chat') }}", {

            method: 'POST',

            headers: {

                'Content-Type':
                    'application/json',

                'Accept':
                    'application/json',

                'X-CSRF-TOKEN':
                    document
                        .querySelector(
                            'meta[name="csrf-token"]'
                        )
                        .getAttribute('content')

            },

           body: JSON.stringify({
    message: message,
    category_id: selectedCategory,
    history: chatHistory
})

        })

        .then(response => {

            if (!response.ok) {
                throw new Error(
                    'HTTP error ' +
                    response.status
                );
            }

            return response.json();

        })

        .then(data => {

            loading.remove();


           if (data.success) {

    addAiMessage(
        formatResponse(data.message)
    );

    chatHistory.push({
        role: 'user',
        content: message
    });

    chatHistory.push({
        role: 'assistant',
        content: data.message
    });
}else {

                addAiMessage(
                    'Sorry, I could not answer that right now.'
                );

            }

        })

        .catch(error => {

            console.error(
                'AI error:',
                error
            );


            loading.remove();


            addAiMessage(
                'Unable to connect to Kaira AI.'
            );

        });

    }


    /* =====================================================
       ADD USER MESSAGE
    ===================================================== */

    function addUserMessage(text) {

        const div =
            document.createElement('div');

        div.className =
            'kaira-user-message';

        div.textContent =
            text;

        messagesBox.appendChild(div);

        scrollMessages();
    }


    /* =====================================================
       ADD AI MESSAGE
    ===================================================== */

    function addAiMessage(html) {

        const div =
            document.createElement('div');

        div.className =
            'kaira-ai-message';

        div.innerHTML =
            html;

        messagesBox.appendChild(div);

        scrollMessages();

        return div;
    }


    /* =====================================================
       FORMAT RESPONSE
    ===================================================== */

    function formatResponse(text) {

        let safe =
            escapeHtml(text);


        safe = safe.replace(
            /\*\*(.*?)\*\*/g,
            '<strong>$1</strong>'
        );


        safe = safe.replace(
            /\n/g,
            '<br>'
        );


        return safe;
    }


    /* =====================================================
       ESCAPE HTML
    ===================================================== */

    function escapeHtml(text) {

        const div =
            document.createElement('div');

        div.textContent =
            text;

        return div.innerHTML;
    }


    /* =====================================================
       SCROLL
    ===================================================== */

    function scrollMessages() {

        messagesBox.scrollTop =
            messagesBox.scrollHeight;
    }

});
</script>
  </body>