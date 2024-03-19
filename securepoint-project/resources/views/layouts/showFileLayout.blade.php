<!doctype html>
<html>
<head>

</head>
<body>
<div class="container">

    <header class="row">
        @include('includes.header')
    </header>

    <h1 class="text-center">Uploaded files</h1>
    <div class="h-100 d-flex align-items-center justify-content-center">
    <table>
        <tr>
            <th>Filename</th>
            <th>Load</th>
        </tr>
        @forelse($uploadedFiles as $uploadedFile)
            <tr>
                <td>
                    {{ $uploadedFile['file_name'] }}
                    <br>
                    <form action="{{  route('uploads.load') }}" method="POST" >
                        @csrf
                        <input type="hidden" name="file_id" value="{{$uploadedFile['id']}}" >
                        <input type="hidden" name="file_name" value="{{$uploadedFile['file_name']}}" >
                        <input type="hidden" name="original_name" value="{{$uploadedFile['original_name']}}" >
                        <input type="hidden" name="file_path" value="{{$uploadedFile['file_path']}}" >
                        <th>
                        <button type="submit">Load Report</button>
                        </th>
                    </form>
                </td>




            </tr>
        @empty
            <tr>
                <td>No uploads found</td>
            </tr>
        @endforelse
    </table>
    </div>
    <footer class="row">
        @include('includes.footer')
    </footer>

</div>
</body>
</html>