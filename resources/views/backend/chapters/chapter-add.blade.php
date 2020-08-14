@extends('layouts.backend')
@section('content')
<div class="row">
	<div class="col-md-10">
		<div class="panel panel-default" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title" >
					{{_lang('Add New Chapter')}}
				</div>
			</div>
			<div class="panel-body">
				<form action="{{route('chapters.store')}}" class="validate" autocomplete="off" method="post" accept-charset="utf-8">
					@csrf
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">{{_lang('Chapter Name')}}</label>
							<input type="text" class="form-control" name="chapter_name" value="{{ old('chapter_name') }}" placeholder="Chapter Name" required>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">{{_lang('Chapter Code')}}</label>
							<input type="text" class="form-control" name="chapter_code" value="{{ old('chapter_code') }}" placeholder="Chapter Code" required>
						</div>
					</div>
					<div class="col-sm-6">
					    <div class="form-group">
						    <label class="control-label">{{_lang('Type')}}</label>
							<select name="subject_type" class="form-control select2" required>
								<option value="">Select One</option>
								<option value="Theory">Theory</option>
								<option value="Practical">Practical</option>
							</select>
						</div>
					</div>
					<div class="col-sm-6">
					   <div class="form-group">
						    <label class="control-label">Subject</label>
							<select name="subject_id" class="form-control select2" required>
								<option value="">Select One</option>
								{{ create_option('subjects','id','subject_name',old('subject_id')) }}
							</select>
						</div>
					</div>
					
					<!--<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">{{_lang('Full Marks')}}</label>
							<input type="text" class="form-control int-field" name="full_mark" value="{{ old('full_mark') }}" placeholder="Full Mark" required>
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">
							<label class="control-label">{{_lang('Passing Marks')}}</label>
							<input type="text" class="form-control int-field" name="pass_mark" value="{{ old('pass_mark') }}" placeholder="Pass Mark" required>
						</div>
					</div>-->
					
					<div class="col-md-12">
						<div class="form-group">
							<button type="submit" class="btn btn-primary">{{_lang('Add Chapter')}}</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection