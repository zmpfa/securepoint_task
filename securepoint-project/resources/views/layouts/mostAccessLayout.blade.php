<!doctype html>
<html>

<head>

</head>

<body>
    <div class="container">

        <header class="row">
            @include('includes.header')
        </header>
        <h1 class="title">show Most Access</h1>
        @foreach ($access as $acces)
            <label>Serial</label>
            {{ $acces['serial'] }}
            <label>Count Access</label>
            {{ $acces['count'] }}
            <br>
        @endforeach
        <h1 class="title">Show Serial with More then One Device</h1>


        <label>Serial</label>
        {{ $serialSingle['serial'] }}
        <label>Hardware</label>
        {{ $serialSingle['hardwares_count'] }}
        <br>

        <h1 class="title">Show 10 Serial with More then One Device</h1>
        @foreach ($serialMost as $serialMos)
            <label>Serial</label>
            {{ $serialMos['serial'] }}
            <label>Hardware</label>
            {{ $serialMos['hardwares_count'] }}
            <br>
        @endforeach



        <footer class="row">
            @include('includes.footer')
        </footer>

    </div>
</body>

</html>
