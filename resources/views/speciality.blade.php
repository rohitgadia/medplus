@extends('layouts.master')
@section('content')
<div class="container shade--list">
<div class="row">
	<div class="col-sm-12 col-md-3 suppliment">
	<div class="suppliment--inside">
		<br>
		<p><a href="http://medplus.dev">Home--></a>
		<a href="http://medplus.dev/loc/{{$locality}}">Hospitals in {!!ucfirst($locality)!!}--></a>
		<a href="http://medplus.dev/loc/{{$locality}}/{{$speciality}}">{{$speciality}} in {!!ucfirst($locality)!!}</a></p>
		<hr>
		<h5 class="add--more">Show Hopsitals from:</h5>
		<div class="col-md-12">
		<div class="display--more">
			@foreach($adjacent as $adj)
				<input type="checkbox" class="close--town">&nbsp;{!!ucfirst($adj)!!}
				<br>
			@endforeach
		</div>
		</div>
	</div>
	</div>
	<div class="col-md-1"></div>
	<div class="col-sm-12 col-md-8">
	@foreach($lists as $list)
	<div class="row">
	<div class="col-sm-12 col-md-10 boxes">
	<div class="row">
		<div class="col-sm-12 col-md-10">
			<a class="href-hospital--name" href="http://medplus.dev/loc/{{$locality}}/{{$list->id}}"><p class="hospital--name">
			{{$list->HospitalName}}
			</p></a>
		</div>
		<div class="col-sm-12 col-md-2">
			<a href="javascript:void(0)">
				<p class="map--directions">
				See Map&nbsp;<i class="fa fa-map"></i>
				</p>
			</a>
		</div>	
	</div>
	<hr>
	<div class="col-sm-12 col-md-12">
		<p class="hospital--address"><b>Address:</b>
			{!!preg_replace('/[^A-Za-z0-9\-#,\'".]/',' ',$list->Address)!!}
		</p>
	</div>
	<br>
	<div class="col-sm-12 col-md-12">
		<p class="hospital--contact"><b>Contact:</b>
			{{$list->Contact_info}}
		</p>
	</div>
	<div class="col-sm-12 col-md-12">
	<p class="hospital--speciality">
	This specializes in {{$list->Speciality}}
	</p>
	</div>
	<hr>
	<div class="row">
		<div class="col-sm-5 col-md-3">
		</div>
		<div class="col-sm-1 col-md-7"></div>
		<div class="col-sm-3 col-md-1">
			<a href="javascript:void(0)" title="Appreciations"><i class="fa fa-thumbs-up appreciations"></i></a>
		</div>
		<div class="col-sm-3 col-md-1">
			<a href="javascript:void(0)" title="Experiences"><i class="fa fa-reply experiences"></i></a>
		</div>
	</div>
	</div>
	<div class="col-sm-12 col-md-2	"></div>
	</div>
@endforeach
</div>
</div>
</div>
@endsection