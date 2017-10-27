<!DOCTYPE html>
<html lang="en">
    <head>
        @include("layout.header")
        <title>@yield("title")</title>
        @include("layout.css")
        @yield("css")
    </head>

    <body>
        @include("components.navbar")
        @include("components.flash-message")
        <div class="container">
            @yield("container")
        </div>

        @include("layout.js")
        @yield("js")
    </body>
</html>
