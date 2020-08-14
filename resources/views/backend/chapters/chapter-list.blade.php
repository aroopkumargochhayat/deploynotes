@extends('layouts.backend')
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default" data-collapsed="0">
			<div class="panel-heading">
				<span class="panel-title" >
					{{_lang('Chapter List')}}
				</span>
				<select id="class" class="select_class pull-right" onchange="showClass(this);">
				   <option value="">Select Subject</option>
				   {{ create_option('subjects','id','subject_name',$subject) }}
				</select>
				
				<a class="btn btn-primary btn-sm pull-right" data-title="Add Grade" href="{{ url('chapters/create') }}">{{ _lang('Add New Chapter') }}</a>
			</div>
			<div class="panel-body no-export">
				<table class="table table-bordered data-table">
					<thead>
						<th>{{ _lang('Chapter Name') }}</th>
						<th>{{ _lang('Chapter Code') }}</th>
						<th>{{ _lang('Subject') }}</th>
						<!--<th>{{ _lang('Full mark') }}</th>
						<th>{{ _lang('Pass mark') }}</th>-->
						<th>{{ _lang('Action') }}</th>
					</thead>
					<tbody>
						@foreach($chapters AS $data)
						<tr>
							<td>{{ $data->chapter_name }}</td>
							<td>{{ $data->chapter_code }}</td>
							<td>{{ $data->subject_name }}</td>
							<!--<td>{{ $data->full_mark }}</td>
							<td>{{ $data->pass_mark }}</td>-->
							<td>
								<form action="{{route('chapters.destroy',$data->id)}}" method="post">
									<a href="{{route('chapters.edit',$data->id)}}" class="btn btn-warning btn-xs"><i class="fa fa-pencil" aria-hidden="true"></i></a>
									{{ method_field('DELETE') }}
									@csrf
									<button type="submit" class="btn btn-danger btn-xs btn-remove"><i class="fa fa-eraser" aria-hidden="true"></i></button>
								</form>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection

@section('js-script')
<script>
function showClass(elem){
	if($(elem).val() == ""){
		return;
	}
	window.location = "<?php echo url('chapters/subject') ?>/"+$(elem).val();
}
</script>
@stop