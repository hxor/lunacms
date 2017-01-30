<div class="row">
    <div class="col-lg-9 col-md-8">
        <div class="card-box">
            {!! Form::hidden('user_id', Auth::user()->id) !!}
            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                {!! Form::label('title', 'Title') !!}
                {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
                <small class="text-danger">{{ $errors->first('title') }}</small>
            </div>

            <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                {!! Form::label('body', 'Body Contenyt') !!}
                {!! Form::textarea('body', null, ['class' => 'form-control my-editor', 'required' => 'required', 'rows' => 30]) !!}
                <small class="text-danger">{{ $errors->first('body') }}</small>
            </div>

        </div>
    </div>


    <div class="col-md-4 col-lg-3">
        <div class="card-box">
            <div class="form-group{{ $errors->has('author') ? ' has-error' : '' }}">
                {!! Form::text('author', Auth::user()->name, ['class' => 'form-control', 'required' => 'required', 'readonly']) !!}
                <small class="text-danger">{{ $errors->first('author') }}</small>
            </div>
            <div class="form-group{{ $errors->has('published') ? ' has-error' : '' }}">
                {!! Form::label('published', 'Active') !!}
                {!! Form::select('published',['1' => 'Published', '0'=>'Unpublished'], null, ['class' => 'form-control',]) !!}
                <small class="text-danger">{{ $errors->first('published') }}</small>
            </div>
            <div class="form-group text-right m-b-0">
              <button type="reset" class="btn btn-default waves-effect waves-light m-l-5">
                Reset
              </button>
              <button class="btn btn-primary waves-effect waves-light" type="submit">
                Submit
              </button>
            </div>
        </div>

        <div class="card-box">
          <div class="form-group {!! $errors->has('category_lists') ? 'has-error' : '' !!}">
              {!! Form::label('category_lists', 'Categories') !!}
                {{-- Simplify things, no need to implement ajax for now --}}
                {!! Form::select('category_lists[]', [''=>'']+App\Models\Category::pluck('title','id')->all(), null, ['class'=>'form-control js-selectize', 'multiple', 'placeholder' => 'Click Here!']) !!}
              {!! $errors->first('category_lists', '<p class="help-block">:message</p>') !!}
            </div>
        </div>

        <div class="card-box">
            <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                {!! Form::label('image', 'Featured Image') !!}
                <div class="input-group">
                  {!! Form::text('image', null, ['id' => 'thumbnail', 'class' => 'form-control', 'readonly' => 'readonly']) !!}
                  <span class="input-group-btn">
                    <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-default">
                      <i class="fa fa-cloud-upload"></i> Choose
                    </a>
                  </span>
                </div>
                @if (isset($post) && $post->image !== '')
                <img src="{{ $post->image }}" id="holder" style="margin-top:15px;max-height:254px;max-width: 152px;">
                @endif
                <img id="holder" style="margin-top:15px;max-height:254px;max-width: 152px;">
                <small class="text-danger">{{ $errors->first('image') }}</small>
            </div>
        </div>
    </div>

</div>
