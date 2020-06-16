<br/>
<form id="frm" class="form-horizontal" method="post" action="/rights/update/{{ $right->id }}">
	{{ csrf_field() }}

	@if (Auth::user()->hasRole(['administrator']))
	<div class="form-group">
		<label for="company_id" class="col-sm-3 control-label">Company:</label>
		<div class="col-sm-8">
			<select class="form-control" id="company_id" name="company_id">
				@foreach ($companies as $company)
					<option {{ (($company->id == $right->company_id) ? " selected " : "") }} value="{{ $company->id }}">{{ $company->company_name }}</option>
				@endforeach
			</select>
		</div>
	</div>
	@endif

	<div class="form-group">
		<label for="status" class="col-sm-3 control-label">Status:</label>
		<div class="col-sm-8">
			<select class="form-control" id="status" name="status">
				<option {{ (($right->status == 1) ? " selected " : "") }} value="1">Active</option>
				<option {{ (($right->status == 0) ? " selected " : "") }} value="0">Inactive</option>
			</select>
		</div>
	</div>

	<div class="form-group">
		<label for="name" class="col-sm-3 control-label">Name:</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="name" name="name" value="{{ $right->name }}" />
		</div>
	</div>

	<div class="form-group">
		<label for="description" class="col-sm-3 control-label">Description:</label>
		<div class="col-sm-8">
			<textarea class="form-control" rows="5" id="description" name="description">{{ $right->description }}</textarea>
		</div>
	</div>

	<div class="form-group">
		<label for="created_at" class="col-sm-3 control-label">Created:</label>
		<div class="col-sm-8" style="padding-top: 7px;">
			{{ $right->created_at }}
		</div>
	</div>

	<div class="form-group">
		<label for="updated_at" class="col-sm-3 control-label">Updated:</label>
		<div class="col-sm-8" style="padding-top: 7px;">
			{{ $right->updated_at }}
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-3 col-sm-9">
			<button id="add_btn" type="submit" class="btn btn-primary">Update</button>
			<button data-href="/rights/delete/{{ $right->id }}" id="delete_btn" type="button" class="btn btn-delete">Delete Right</button>
		</div>
	</div>

</form>
