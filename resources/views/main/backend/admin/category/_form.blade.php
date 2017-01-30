<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    {!! Form::label('title', 'Title Category') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('title') }}</small>
</div>

<div class="form-group{{ $errors->has('parent_id') ? ' has-error' : '' }}">
    {!! Form::label('parent_id', 'Parent') !!}
    {!! Form::select('parent_id',[''=>' - ']+App\Models\Category::pluck('title', 'id')->all(), null, ['class' => 'form-control',]) !!}
    <small class="text-danger">{{ $errors->first('parent_id') }}</small>
</div>

<div class="form-group text-right m-b-0">
  <button class="btn btn-primary waves-effect waves-light" type="submit">
    Submit
  </button>
  <button type="reset" class="btn btn-default waves-effect waves-light m-l-5">
    Reset
  </button>
</div>
