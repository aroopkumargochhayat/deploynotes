@extends('layouts.backend')
@section('content')
<div class="row">
	<div class="col-md-10">
		<div class="panel panel-default" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title" >
					{{_lang('Edit Chapter')}}
				</div>
			</div>
			<div class="panel-body">
				<form action="{{route('chapter.update',$subject->id)}}" class="validate" autocomplete="off" method="post" accept-charset="utf-8">
					@csrf
					{{ method_field('PATCH') }}
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">{{_lang('Chapter Name')}}</label>
							<input type="text" class="form-control" name="chapter_name" value="{{ $chapter->chapter_name }}"required>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label class="control-label">{{_lang('Chapter Code')}}</label>
							<input type="text" class="form-control" name="chapter_code" value="{{ $chapter->chapter_code }}" required>
						</div>
					</div>
					<div class="col-sm-6">
					    <div class="form-group">
						    <label class="control-label">{{_lang('Type')}}</label>
							<select name="subject_type" class="form-control select2" required>
								<option value="">Select One</option>
								<option @if('Theory'==$chapter->subject_type) selected @endif value="Theory">Theory</option>
								<option @if('Practical'==$chapter->subject_type) selected @endif value="Practical">Practical</option>
							</select>
						</div>
					</div>
					<div class="col-sm-6">
					   <div class="form-group">
						    <label class="control-label">Subject</label>
							<select name="subject_id" class="form-control select2" required>
								<option value="">Select One</option>
								{{ create_option('subjects','id','subject_name',$chapter->subject_id) }}
							</select>
						</div>
					</div>
					
					<!--<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">{{_lang('Full Marks')}}</label>
							<input type="text" class="form-control int-field" name="full_mark" value="{{ $subject->full_mark }}" placeholder="Full Mark" required>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">{{_lang('Passing Marks')}}</label>
							<input type="text" class="form-control int-field" name="pass_mark" value="{{ $subject->pass_mark }}" placeholder="Pass Mark" required>
						</div>
					</div>-->
					
					<div class="form-group">
						<div class="col-md-12">
							<button type="submit" class="btn btn-primary">{{_lang('Update Chapter')}}</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection