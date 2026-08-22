<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Contact | Kaira</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

</head>

<body>

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <h1 class="mb-4">
                    Contact Us
                </h1>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">

                        @foreach($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach

                    </div>
                @endif

                <form
                    action="{{ route('contact.store') }}"
                    method="POST"
                >

                    @csrf

                    <div class="mb-3">

                        <label class="form-label">
                            Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="{{ old('name') }}"
                            required
                        >

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Email
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email') }}"
                            required
                        >

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Phone
                        </label>

                        <input
                            type="text"
                            name="phone"
                            class="form-control"
                            value="{{ old('phone') }}"
                        >

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Subject
                        </label>

                        <input
                            type="text"
                            name="subject"
                            class="form-control"
                            value="{{ old('subject') }}"
                            required
                        >

                    </div>

                    <div class="mb-3">

                        <label class="form-label">
                            Message
                        </label>

                        <textarea
                            name="message"
                            class="form-control"
                            rows="6"
                            required
                        >{{ old('message') }}</textarea>

                    </div>

                    <button
                        type="submit"
                        class="btn btn-dark"
                    >
                        Send Message
                    </button>

                </form>

            </div>

        </div>

    </div>

</body>

</html>