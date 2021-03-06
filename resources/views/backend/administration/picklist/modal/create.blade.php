<form method="post" class="ajax-submit" autocomplete="off" action="{{route('picklists.store')}}" enctype="multipart/form-data">
	{{ csrf_field() }}
	
	<div class="col-md-12">
	  <div class="form-group">
			<label class="control-label">{{ _lang('Type') }}</label>	
			<select name="type" class="form-control select2" required>
			   <option value="">{{ _lang('Select Type') }}</option>
			   <option>Religion</option>
			   <option>Designation</option>
			</select>
	   </div>
	</div>

	<div class="col-md-12">
	  <div class="form-group">
		<label class="control-label">{{ _lang('Value') }}</label>						
		<input type="text" class="form-control" name="value" value="{{ old('value') }}" required>
	  </div>
	</div>

				
	<div class="col-md-12">
	  <div class="form-group">
	    <button type="reset" class="btn btn-danger">{{ _lang('Reset') }}</button>
		<button type="submit" class="btn btn-primary">{{ _lang('Save') }}</button>
	  </div>
	</div>
</form>
