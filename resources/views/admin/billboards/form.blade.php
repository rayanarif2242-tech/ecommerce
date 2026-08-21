<div class="row">

    {{-- Title --}}
    <div class="col-md-6 mb-3">
        <label class="form-label">
            Title <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            name="title"
            class="form-control @error('title') is-invalid @enderror"
            value="{{ old('title', $billboard->title ?? '') }}"
            placeholder="Enter billboard title"
        >

        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>


    {{-- Subtitle --}}
    <div class="col-md-6 mb-3">
        <label class="form-label">Subtitle</label>

        <input
            type="text"
            name="subtitle"
            class="form-control @error('subtitle') is-invalid @enderror"
            value="{{ old('subtitle', $billboard->subtitle ?? '') }}"
            placeholder="Enter subtitle"
        >

        @error('subtitle')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>


    {{-- Button Text --}}
    <div class="col-md-6 mb-3">
        <label class="form-label">Button Text</label>

        <input
            type="text"
            name="button_text"
            class="form-control @error('button_text') is-invalid @enderror"
            value="{{ old('button_text', $billboard->button_text ?? '') }}"
            placeholder="Shop Now"
        >

        @error('button_text')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>


    {{-- Button Link --}}
    <div class="col-md-6 mb-3">
        <label class="form-label">Button Link</label>

        <input
            type="text"
            name="button_link"
            class="form-control @error('button_link') is-invalid @enderror"
            value="{{ old('button_link', $billboard->button_link ?? '') }}"
            placeholder="/products"
        >

        @error('button_link')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>


    {{-- Position --}}
    <div class="col-md-4 mb-3">
        <label class="form-label">Position</label>

        <select name="position" class="form-select @error('position') is-invalid @enderror">

            <option value="Home Top"
                {{ old('position', $billboard->position ?? '') == 'Home Top' ? 'selected' : '' }}>
                Home Top
            </option>

            <option value="Home Middle"
                {{ old('position', $billboard->position ?? '') == 'Home Middle' ? 'selected' : '' }}>
                Home Middle
            </option>

            <option value="Sidebar"
                {{ old('position', $billboard->position ?? '') == 'Sidebar' ? 'selected' : '' }}>
                Sidebar
            </option>

            <option value="Popup"
                {{ old('position', $billboard->position ?? '') == 'Popup' ? 'selected' : '' }}>
                Popup
            </option>

        </select>

        @error('position')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>


    {{-- Featured --}}
    <div class="col-md-4 mb-3">
        <label class="form-label">Featured</label>

        <select name="featured" class="form-select">

            <option value="1"
                {{ old('featured', $billboard->featured ?? 0) == 1 ? 'selected' : '' }}>
                Yes
            </option>

            <option value="0"
                {{ old('featured', $billboard->featured ?? 0) == 0 ? 'selected' : '' }}>
                No
            </option>

        </select>
    </div>


    {{-- Status --}}
    <div class="col-md-4 mb-3">
        <label class="form-label">Status</label>

        <select name="status" class="form-select">

            <option value="1"
                {{ old('status', $billboard->status ?? 1) == 1 ? 'selected' : '' }}>
                Active
            </option>

            <option value="0"
                {{ old('status', $billboard->status ?? 1) == 1 ? '' : 'selected' }}>
                Inactive
            </option>

        </select>
    </div>


    {{-- Sort Order --}}
    <div class="col-md-4 mb-3">
        <label class="form-label">Sort Order</label>

        <input
            type="number"
            name="sort_order"
            class="form-control @error('sort_order') is-invalid @enderror"
            value="{{ old('sort_order', $billboard->sort_order ?? 0) }}"
        >

        @error('sort_order')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>


    {{-- Start Date --}}
    <div class="col-md-4 mb-3">
        <label class="form-label">Start Date</label>

        <input
            type="date"
            name="start_date"
            class="form-control @error('start_date') is-invalid @enderror"
            value="{{ old('start_date', $billboard->start_date ?? '') }}"
        >

        @error('start_date')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>


    {{-- End Date --}}
    <div class="col-md-4 mb-3">
        <label class="form-label">End Date</label>

        <input
            type="date"
            name="end_date"
            class="form-control @error('end_date') is-invalid @enderror"
            value="{{ old('end_date', $billboard->end_date ?? '') }}"
        >

        @error('end_date')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>


    {{-- Desktop Image --}}
    <div class="col-md-6 mb-3">
        <label class="form-label">Desktop Image</label>

        <input
            type="file"
            name="image"
            class="form-control @error('image') is-invalid @enderror"
            accept="image/*"
        >

        @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        @if(isset($billboard) && $billboard->image)

            <img
                src="{{ asset('uploads/billboards/' . $billboard->image) }}"
                width="150"
                class="mt-2 rounded border"
                alt="Desktop Image"
            >

        @endif
    </div>


    {{-- Mobile Image --}}
    <div class="col-md-6 mb-3">
        <label class="form-label">Mobile Image</label>

        <input
            type="file"
            name="mobile_image"
            class="form-control @error('mobile_image') is-invalid @enderror"
            accept="image/*"
        >

        @error('mobile_image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        @if(isset($billboard) && $billboard->mobile_image)

            <img
                src="{{ asset('uploads/billboards/' . $billboard->mobile_image) }}"
                width="150"
                class="mt-2 rounded border"
                alt="Mobile Image"
            >

        @endif
    </div>

</div>