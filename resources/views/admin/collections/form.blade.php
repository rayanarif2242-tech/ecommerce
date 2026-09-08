
<div class="row">

    {{-- Collection Name --}}
    <div class="col-md-6 mb-3">
        <label for="name" class="form-label">
            Collection Name <span class="text-danger">*</span>
        </label>

        <input
            type="text"
            name="name"
            id="name"
            class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name', $collection->name ?? '') }}"
            placeholder="Enter Collection Name"
            required
        >

        @error('name')
            <div class="text-danger mt-1">
                {{ $message }}
            </div>
        @enderror
    </div>


    {{-- Collection Price --}}
    <div class="col-md-6 mb-3">
        <label for="price" class="form-label">
            Collection Price <span class="text-danger">*</span>
        </label>

        <input
            type="number"
            name="price"
            id="price"
            class="form-control @error('price') is-invalid @enderror"
            value="{{ old('price', $collection->price ?? '') }}"
            placeholder="Enter collection price"
            min="0"
            step="0.01"
            required
        >

        @error('price')
            <div class="text-danger mt-1">
                {{ $message }}
            </div>
        @enderror
    </div>


    {{-- Collection Stock --}}
    <div class="col-md-6 mb-3">
        <label for="stock" class="form-label">
            Collection Stock <span class="text-danger">*</span>
        </label>

        <input
            type="number"
            name="stock"
            id="stock"
            class="form-control @error('stock') is-invalid @enderror"
            value="{{ old('stock', $collection->stock ?? 0) }}"
            placeholder="Enter collection stock"
            min="0"
            step="1"
            required
        >

        @error('stock')
            <div class="text-danger mt-1">
                {{ $message }}
            </div>
        @enderror
    </div>


    {{-- Slug --}}
    <div class="col-md-6 mb-3">
        <label for="slug" class="form-label">
            Slug
        </label>

        <input
            type="text"
            id="slug"
            class="form-control"
            value="{{ old('slug', $collection->slug ?? 'Auto Generated') }}"
            readonly
        >
    </div>


    {{-- Description --}}
    <div class="col-md-12 mb-3">
        <label for="description" class="form-label">
            Description
        </label>

        <textarea
            name="description"
            id="description"
            rows="4"
            class="form-control @error('description') is-invalid @enderror"
            placeholder="Collection Description"
        >{{ old('description', $collection->description ?? '') }}</textarea>

        @error('description')
            <div class="text-danger mt-1">
                {{ $message }}
            </div>
        @enderror
    </div>


    {{-- Thumbnail --}}
    <div class="col-md-4 mb-3">
        <label for="thumbnail" class="form-label">
            Thumbnail <span class="text-danger">*</span>
        </label>

        <input
            type="file"
            name="thumbnail"
            id="thumbnail"
            class="form-control @error('thumbnail') is-invalid @enderror"
            accept=".jpg,.jpeg,.png,.webp"
            {{ isset($collection) ? '' : 'required' }}
        >

        @error('thumbnail')
            <div class="text-danger mt-1">
                {{ $message }}
            </div>
        @enderror

        @if(isset($collection) && $collection->thumbnail)
            <div class="mt-2">
                <img
                    src="{{ asset('uploads/collections/' . $collection->thumbnail) }}"
                    width="120"
                    height="120"
                    class="rounded border"
                    style="object-fit: cover;"
                    alt="Collection Thumbnail"
                >
            </div>
        @endif
    </div>


    {{-- Banner --}}
    <div class="col-md-4 mb-3">
        <label for="banner" class="form-label">
            Banner <span class="text-danger">*</span>
        </label>

        <input
            type="file"
            name="banner"
            id="banner"
            class="form-control @error('banner') is-invalid @enderror"
            accept=".jpg,.jpeg,.png,.webp"
            {{ isset($collection) ? '' : 'required' }}
        >

        @error('banner')
            <div class="text-danger mt-1">
                {{ $message }}
            </div>
        @enderror

        @if(isset($collection) && $collection->banner)
            <div class="mt-2">
                <img
                    src="{{ asset('uploads/collections/' . $collection->banner) }}"
                    width="120"
                    height="120"
                    class="rounded border"
                    style="object-fit: cover;"
                    alt="Collection Banner"
                >
            </div>
        @endif
    </div>


    {{-- Icon --}}
    <div class="col-md-4 mb-3">
        <label for="icon" class="form-label">
            Icon
        </label>

        <input
            type="file"
            name="icon"
            id="icon"
            class="form-control @error('icon') is-invalid @enderror"
            accept=".jpg,.jpeg,.png,.webp"
        >

        @error('icon')
            <div class="text-danger mt-1">
                {{ $message }}
            </div>
        @enderror

        @if(isset($collection) && $collection->icon)
            <div class="mt-2">
                <img
                    src="{{ asset('uploads/collections/' . $collection->icon) }}"
                    width="80"
                    height="80"
                    class="rounded border"
                    style="object-fit: cover;"
                    alt="Collection Icon"
                >
            </div>
        @endif
    </div>


    {{-- Featured --}}
    <div class="col-md-3 mb-3">
        <label for="featured" class="form-label">
            Featured
        </label>

        <select
            name="featured"
            id="featured"
            class="form-select @error('featured') is-invalid @enderror"
        >
            <option
                value="1"
                {{ old('featured', $collection->featured ?? 0) == 1 ? 'selected' : '' }}
            >
                Yes
            </option>

            <option
                value="0"
                {{ old('featured', $collection->featured ?? 0) == 0 ? 'selected' : '' }}
            >
                No
            </option>
        </select>

        @error('featured')
            <div class="text-danger mt-1">
                {{ $message }}
            </div>
        @enderror
    </div>


    {{-- Show On Home --}}
    <div class="col-md-3 mb-3">
        <label for="show_home" class="form-label">
            Show On Home
        </label>

        <select
            name="show_home"
            id="show_home"
            class="form-select @error('show_home') is-invalid @enderror"
        >
            <option
                value="1"
                {{ old('show_home', $collection->show_home ?? 0) == 1 ? 'selected' : '' }}
            >
                Yes
            </option>

            <option
                value="0"
                {{ old('show_home', $collection->show_home ?? 0) == 0 ? 'selected' : '' }}
            >
                No
            </option>
        </select>

        @error('show_home')
            <div class="text-danger mt-1">
                {{ $message }}
            </div>
        @enderror
    </div>


    {{-- Status --}}
    <div class="col-md-3 mb-3">
        <label for="status" class="form-label">
            Status
        </label>

        <select
            name="status"
            id="status"
            class="form-select @error('status') is-invalid @enderror"
        >
            <option
                value="1"
                {{ old('status', $collection->status ?? 1) == 1 ? 'selected' : '' }}
            >
                Active
            </option>

            <option
                value="0"
                {{ old('status', $collection->status ?? 1) == 0 ? 'selected' : '' }}
            >
                Inactive
            </option>
        </select>

        @error('status')
            <div class="text-danger mt-1">
                {{ $message }}
            </div>
        @enderror
    </div>


    {{-- Sort Order --}}
    <div class="col-md-3 mb-3">
        <label for="sort_order" class="form-label">
            Sort Order
        </label>

        <input
            type="number"
            name="sort_order"
            id="sort_order"
            class="form-control @error('sort_order') is-invalid @enderror"
            value="{{ old('sort_order', $collection->sort_order ?? 0) }}"
            min="0"
        >

        @error('sort_order')
            <div class="text-danger mt-1">
                {{ $message }}
            </div>
        @enderror
    </div>


    {{-- SEO Title --}}
    <div class="col-md-12 mb-3">
        <label for="seo_title" class="form-label">
            SEO Title
        </label>

        <input
            type="text"
            name="seo_title"
            id="seo_title"
            class="form-control @error('seo_title') is-invalid @enderror"
            value="{{ old('seo_title', $collection->seo_title ?? '') }}"
            placeholder="Enter SEO title"
        >

        @error('seo_title')
            <div class="text-danger mt-1">
                {{ $message }}
            </div>
        @enderror
    </div>


    {{-- SEO Keywords --}}
    <div class="col-md-12 mb-3">
        <label for="seo_keywords" class="form-label">
            SEO Keywords
        </label>

        <input
            type="text"
            name="seo_keywords"
            id="seo_keywords"
            class="form-control @error('seo_keywords') is-invalid @enderror"
            value="{{ old('seo_keywords', $collection->seo_keywords ?? '') }}"
            placeholder="Enter SEO keywords"
        >

        @error('seo_keywords')
            <div class="text-danger mt-1">
                {{ $message }}
            </div>
        @enderror
    </div>


    {{-- SEO Description --}}
    <div class="col-md-12 mb-3">
        <label for="seo_description" class="form-label">
            SEO Description
        </label>

        <textarea
            name="seo_description"
            id="seo_description"
            rows="3"
            class="form-control @error('seo_description') is-invalid @enderror"
            placeholder="Enter SEO description"
        >{{ old('seo_description', $collection->seo_description ?? '') }}</textarea>

        @error('seo_description')
            <div class="text-danger mt-1">
                {{ $message }}
            </div>
        @enderror
    </div>

</div>

