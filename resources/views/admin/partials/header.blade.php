<head>
	<meta charset="UTF-8">
	<title>
		@section ('page_title')
		Footies Report
		@show
	</title>

    @section('styles')
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    </style>
    @show
</head>