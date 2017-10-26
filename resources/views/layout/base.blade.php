<!DOCTYPE html>
<html lang="en">
    <head>
        @include("layout.header")
        <title>@yield("title")</title>
        @include("layout.css")
    </head>

    <body>
        @include("components.navbar")
        <div class="container">
            @yield("container")
        </div>
    </body>
</html>
