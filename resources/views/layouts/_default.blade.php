<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title></title>

    <!-- Bootstrap core CSS -->
    <link href="/bower_compoents/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

  </head>

  <body>

    @yield("navbar")

    @yield("content")

    @yield("footer")

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="/bower_compoents/jquery/dist/jquery.min.js"></script>
    <script src="/bower_compoents/bootstrap/dist/js/bootstrap.min.js"></script>

    @yield("js_include")

  </body>
</html>
