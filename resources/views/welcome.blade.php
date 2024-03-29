<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <form method="post" action="">
                        @csrf
                        <input type="text" name="link" placeholder="Type in link address" />
                        <button type="submit">Get short link</button>
                    </form>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php
                        if (isset($encodedUri)) {
                            echo "<p>Your share url: " . url("/" . $encodedUri) . '</p>';
                            echo "<p>Your stats url: " . url("/" . $encodedUri . "/stats") . '</p>';
                        }

                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
