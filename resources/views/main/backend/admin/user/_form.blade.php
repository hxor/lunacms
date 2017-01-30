<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('name') }}</small>
</div>

<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    {!! Form::label('email', 'Email address') !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'eg: foo@bar.com']) !!}
    <small class="text-danger">{{ $errors->first('email') }}</small>
</div>

<div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
    {!! Form::label('role', 'Role') !!}
    {!! Form::select('role',$role, null, ['class' => 'form-control',]) !!}
    <small class="text-danger">{{ $errors->first('role') }}</small>
</div>

<div class="form-group{{ $errors->has('active') ? ' has-error' : '' }}">
    {!! Form::label('active', 'Active') !!}
    {!! Form::select('active',['0'=>'Inactive', '1' => 'Active'], null, ['class' => 'form-control',]) !!}
    <small class="text-danger">{{ $errors->first('active') }}</small>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
    <small class="text-danger">{{ $errors->first('password') }}</small>
</div>

<div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
    {!! Form::label('photo', 'Photo') !!}
    <div class="input-group">
      {!! Form::text('photo', null, ['id' => 'thumbnail', 'class' => 'form-control', 'readonly' => 'readonly']) !!}
      <span class="input-group-btn">
        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-default">
          <i class="fa fa-cloud-upload"></i> Choose
        </a>
      </span>
    </div>
    @if (isset($user) && $user->photo !== '')
      <img src="{{ $user->photo }}" id="holder" style="margin-top:15px;max-height:254px;max-width: 152px;">
    @endif
      <img id="holder" style="margin-top:15px;max-height:254px;max-width: 152px;">
    <small class="text-danger">{{ $errors->first('photo') }}</small>
</div>

<div class="form-group text-right m-b-0">
  <button class="btn btn-primary waves-effect waves-light" type="submit">
    Submit
  </button>
  <button type="reset" class="btn btn-default waves-effect waves-light m-l-5">
    Reset
  </button>
</div>
