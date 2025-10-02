<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-topbar="light" data-body-image="img-1" data-sidebar-image="none" data-bs-theme="light">

    <head>
    <meta charset="utf-8" />
    <title>@yield('title') | Moneyfrog 3.0</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="MoneyFrog - Financial Services | Mutual Funds Distributor | Investment Platform" name="description" />
    <meta content="CodeSpark Infotech Private Limited" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="https://moneyfrog.in/images/new_home/favicon.ico">
        @include('layouts.head-css')
  </head>

    @yield('body')

    @yield('content')

    @include('layouts.vendor-scripts')
    </body>
</html>
