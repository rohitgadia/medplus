@extends('layouts.master')
@section('content')
@foreach($datas as $data)
	<?php
		$arr = array();
		$arr = explode('|', $data->speciality);
		// echo $data->speciality;
		$length = count($arr);
		$i=0;
		while($i<$length)
		{
			?>
			<div class="container bodify">
			<div class="row">
			<?php
				$current = $arr[$i];
				$i++;
				$ar = explode(" ", $current);
				$ar = implode("_", $ar);
			?>
				<div class="col-sm-12 col-md-4">
					<a href="/loc/{{$locality}}/{{$ar}}">
					<div class="boxes <?php echo $ar ?>">

					</div>
					<div class="shadow">
						{{$current}}
					</div>
					</a>
				</div>
				<?php
					if($i==$length)
						break;
					$current=$arr[$i];
					$i++;
					$ar = explode(" ", $current);
					$ar = implode("_",$ar);
				?>
				<div class="col-sm-12 col-md-4">
					<a href="/loc/{{$locality}}/{{$ar}}">
					<div class="boxes <?php echo $ar ?>">
					
					</div>
					<div class="shadow">
						{{$current}}
					</div>
					</a>
				</div>
				<?php
					if($i==$length)
						break;
					$current=$arr[$i];
					$i++;
					$ar = explode(" ", $current);
					$ar = implode("_",$ar);
				?>
				<div class="col-sm-12 col-md-4">
					<a href="/loc/{{$locality}}/{{$ar}}">
					<div class="boxes <?php echo $ar ?>">

					</div>
					<div class="shadow">
						{{$current}}
					</div>
					</a>
				</div>
			</div>			
			</div>
		<?php
		}
	?>
@endforeach
@endsection