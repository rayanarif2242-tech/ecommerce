<div class="row">

    <!-- Collection Name -->
    <div class="col-md-6 mb-3">
        <label class="form-label">Collection Name <span class="text-danger">*</span></label>

        <input
            type="text"
            name="name"
            class="form-control @error('name') is-invalid @enderror"
            value="{{ old('name', $collection->name ?? '') }}"
            placeholder="Enter Collection Name">

        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    {{-- Collection Price --}}
<div class="mb-3">
    <label for="price" class="form-label">
        Collection Price
    </label>

    <input
        type="number"
        name="price"
        id="price"
        class="form-control"
        value="{{ old('price', $collection->price ?? '') }}"
        placeholder="Enter collection price"
        min="0"
        step="0.01"
    >

    @error('price')
        <div class="text-danger mt-1">
            {{ $message }}
        </div>
    @enderror
</div>

    <!-- Slug -->
    <div class="col-md-6 mb-3">
        <label class="form-label">Slug</label>

        <input
            type="text"
            class="form-control"
            value="{{ old('slug', $collection->slug ?? 'Auto Generated') }}"
            readonly>
    </div>

    <!-- Description -->
    <div class="col-md-12 mb-3">
        <label class="form-label">Description</label>

        <textarea
            name="description"
            rows="4"
            class="form-control"
            placeholder="Collection Description">{{ old('description', $collection->description ?? '') }}</textarea>
    </div>

    <!-- Thumbnail -->
    <div class="col-md-4 mb-3">

        <label class="form-label">Thumbnail <span class="text-danger">*</span></label>

        <input
            type="file"
            name="thumbnail"
            class="form-control">

        @if(isset($collection) && $collection->thumbnail)

            <img
                src="{{ asset('uploads/collections/'.$collection->thumbnail) }}"
                width="120"
                class="mt-2 rounded border">

        @endif

    </div>

    <!-- Banner -->
    <div class="col-md-4 mb-3">

        <label class="form-label">Banner <span class="text-danger">*</span></label>

        <input
            type="file"
            name="banner"
            class="form-control">

        @if(isset($collection) && $collection->banner)

            <img
                src="{{ asset('uploads/collections/'.$collection->banner) }}"
                width="120"
                class="mt-2 rounded border">

        @endif

    </div>

    <!-- Icon -->
    <div class="col-md-4 mb-3">

        <label class="form-label">Icon</label>

        <input
            type="file"
            name="icon"
            class="form-control">

        @if(isset($collection) && $collection->icon)

            <img
                src="{{ asset('uploads/collections/'.$collection->icon) }}"
                width="80"
                class="mt-2 rounded border">

        @endif

    </div>

    <!-- Featured -->
    <div class="col-md-3 mb-3">

        <label class="form-label">Featured</label>

        <select
            name="featured"
            class="form-select">

            <option value="1"
                {{ old('featured', $collection->featured ?? 0) == 1 ? 'selected' : '' }}>
                Yes
            </option>

            <option value="0"
                {{ old('featured', $collection->featured ?? 0) == 0 ? 'selected' : '' }}>
                No
            </option>

        </select>

    </div>

    <!-- Show Home -->
    <div class="col-md-3 mb-3">

        <label class="form-label">Show On Home</label>

        <select
            name="show_home"
            class="form-select">

            <option value="1"
                {{ old('show_home', $collection->show_home ?? 0) == 1 ? 'selected' : '' }}>
                Yes
            </option>

            <option value="0"
                {{ old('show_home', $collection->show_home ?? 0) == 0 ? 'selected' : '' }}>
                No
            </option>

        </select>

    </div>

    <!-- Status -->
    <div class="col-md-3 mb-3">

        <label class="form-label">Status</label>

        <select
            name="status"
            class="form-select">

            <option value="1"
                {{ old('status', $collection->status ?? 1) == 1 ? 'selected' : '' }}>
                Active
            </option>

            <option value="0"
                {{ old('status', $collection->status ?? 1) == 0 ? 'selected' : '' }}>
                Inactive
            </option>

        </select>

    </div>

    <!-- Sort -->
    <div class="col-md-3 mb-3">

        <label class="form-label">Sort Order</label>

        <input
            type="number"
            name="sort_order"
            class="form-control"
            value="{{ old('sort_order', $collection->sort_order ?? 0) }}">

    </div>

    <!-- SEO Title -->
    <div class="col-md-12 mb-3">

        <label class="form-label">SEO Title</label>

        <input
            type="text"
            name="seo_title"
            class="form-control"
            value="{{ old('seo_title', $collection->seo_title ?? '') }}">

    </div>

    <!-- SEO Keywords -->
    <div class="col-md-12 mb-3">

        <label class="form-label">SEO Keywords</label>

        <input
            type="text"
            name="seo_keywords"
            class="form-control"
            value="{{ old('seo_keywords', $collection->seo_keywords ?? '') }}">

    </div>

    <!-- SEO Description -->
    <div class="col-md-12 mb-3">

        <label class="form-label">SEO Description</label>

        <textarea
            name="seo_description"
            rows="3"
            class="form-control">{{ old('seo_description', $collection->seo_description ?? '') }}</textarea>

    </div>

</div>






