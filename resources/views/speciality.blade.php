@extends('layouts.master')
@section('headlinks')
<script src="https://cdnjs.cloudflare.com/ajax/libs/react/0.14.3/react.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/react/0.14.3/react-dom.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/babel-core/5.8.23/browser.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/marked/0.3.2/marked.min.js"></script>
@endsection
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
		<div class="display--more" id="display-near">
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
	<div class="col-sm-12 col-md-2"></div>
	</div>
@endforeach
</div>
</div>
</div>
<script type="text/babel">
	var data = [];
	var Checkboxes = React.createClass({
		render: function(){
			return (
				<input type="checkbox" className="close--town" >
					Welcome
				</input>
			);
		}
	});
	var CheckboxList = React.createClass({
		render: function(){
			var Localities = this.props.data.map(function(locality){
				return (
					<Checkboxes />
				);
			});
			return (
				{Localities}
			);
		}
	});
	var CheckboxFrame = React.createClass({
		getInitialState : function(){
			$.ajax({
				url : this.props.url,
				datatype : 'json',
				cache : false,
				success : function(data) {
					data : data;
				}.bind(this),
				error : function(xhr,status,err) {
					console.error(this.props.url,status,err.toString());
				}.bind(this)
			});
			return {data:data};
		},
		render: function(){
			return (
				<CheckboxList data={data} />
			);
		}
	});
	ReactDOM.render(
		<CheckboxFrame url="http://{{env('APP_URL')}}/adjacent/{{$locality}}/{{$speciality}}" pollInterval={2000}/>,
		document.getElementById("display-near")
	);
</script>
@endsection
