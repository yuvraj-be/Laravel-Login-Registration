<!doctype html>
<html lang="en">
    <head>
        <?php $favicon = favicon(); ?>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" href="{{ asset('assets/images/'. $favicon->favicon) }}" />
        <title>{{$cms->title}}</title>
        <style type="text/css">
            img{
                max-width: 100%;
                height: auto;
            }
        </style>
    </head>
    <body>
        {!!$cms->content!!}
    </body>
</html>