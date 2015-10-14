	@if(session()->has('success'))
  	@include('admin.partials.feedback', ['type' => 'success', 'message' => session('success')])
	@endif
	@if(session()->has('error'))
    	@include('admin.partials.feedback', ['type' => 'danger', 'message' => session('error')])
	@endif
  <!-- validation message -->
	@if (count($errors) > 0)
    <div class="alert alert-error">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
	@endif