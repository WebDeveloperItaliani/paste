<!DOCTYPE html>
<html lang="en">
    <head>
        @include("layout.header")
        <title>@yield("title")</title>
        @include("layout.css")
        @yield("css")
    </head>

    <body>
        <div id="wdi" class="pb-5 mb-5">
            @include("components.navbar")
            @include("components.flash-message")
            <div class="container">
                @yield("container")
            </div>
        </div>

        @include("layout.js")
        @yield("js")
    </body>
</html>
