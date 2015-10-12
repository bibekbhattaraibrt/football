<html>
@include ('admin.partials.header')

<body>
	@include ('admin.partials.nav')

    <div class="container">
    	@include ('admin.partials.messages')

    	@section ('content')
    		<p>Coming soon &hellip;</p>
    	@show
	</div>

	@include ('admin.partials.footer')
</body>
</html>