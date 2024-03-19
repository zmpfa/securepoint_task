<!doctype html>
<html>

<head>

</head>

<body>
    <div class="container">

        <header class="row">
            @include('includes.header')
        </header>

        <h1 class="text-center">Upload file</h1>

        <div class="h-100 d-flex align-items-center justify-content-center">
            <form action="{{ route('uploads.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="file_upload">
                <br>
                <div class="text-center">
                <button class="btn btn-primary" type="submit">Upload</button>
            </div>
            </form>
        </div>

        <footer class="row">
            @include('includes.footer')
        </footer>

    </div>
</body>

</html>
