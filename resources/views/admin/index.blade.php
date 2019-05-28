@extends('layouts.app')

@section('title', '| AdminIndex')

@section('content')

<script>
	function Click()
	{
		alert('Uspesno ste izabrali kategoriju pitanja');
	}
</script>
<div class="col-lg-10 col-lg-offset-1">
	<h2>Dobrodosli na Admin stranicu!</h2>

	<a href='users'>Roles i Permissions</a>

	<h3>Izaberite kategoriju pitanja</h3>
	<form action='/odabir_kategorije' method='GET'>
		<select name='izaberi'>
			<option value="lako">Laka pitanja</option>
			<option value="srednje">Srednja pitanja</option>
			<option value="tesko">Teska pitanja</option>
		<select>
		<br>
		<br>
		<button  type="submit" class="btn btn-default">Submit Button</button>
	</form>
</div>

@endsection