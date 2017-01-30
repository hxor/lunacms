{!! Form::model($model, ['url' => $form_url, 'method' => 'delete', 'class' => 'form-inline']) !!}
	  @if(!empty($show_url))
        <a href="{{ $show_url }}"><button type="button" class="btn btn-info btn-xs">Show</button></a> |
    @endif
      	<a href="{{ $edit_url }}"><button type="button" class="btn btn-warning btn-xs">Edit</button></a> |
      	{!! Form::submit('Delete', ['class' => 'btn btn-xs btn-danger js-submit-confirm']) !!}
{!! Form::close() !!}
