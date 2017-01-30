@extends('layouts.backend.app')

@section('styles')
    <script src="{{ asset('back/plugins/tinymce/tinymce.min.js') }}"></script>
    <link href="{{ asset('back/plugins/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('content')
  <div class="container">

        @include('layouts.backend.partials._bread', ['data' => empty($bread) ? '' : $bread])


            {!! Form::model($post, ['route' => ['admin.post.update', $post->id],  'method' => 'PUT']) !!}

                @include('main.backend.admin.post._form')

            {!! Form::close() !!}

  </div>
@endsection

@section('scripts')
    <script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
    <script src="{{ asset('back/plugins/selectize/js/standalone/selectize.min.js') }}"></script>
    <script>
      var editor_config = {
        path_absolute : "/",
        selector: "textarea",
        plugins: [
          "advlist autolink lists link image charmap print preview hr anchor pagebreak",
          "searchreplace wordcount visualblocks visualchars code fullscreen",
          "insertdatetime media nonbreaking save table contextmenu directionality",
          "emoticons template paste textcolor colorpicker textpattern",
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
          var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
          var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

          var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
          if (type == 'image') {
            cmsURL = cmsURL + "&type=Images";
          } else {
            cmsURL = cmsURL + "&type=Files";
          }

          tinyMCE.activeEditor.windowManager.open({
            file : cmsURL,
            title : 'Filemanager',
            width : x * 0.8,
            height : y * 0.8,
            resizable : "yes",
            close_previous : "no"
          });
        }
      };

      tinymce.init(editor_config);
    </script>
    <script type="text/javascript">
      $(document).ready(function () {
          $('.js-selectize').selectize({
            plugins: ['remove_button'],
            delimiter: ',',
            persist: false,
            create: function(input) {
                return {
                    value: input,
                    text: input
                }
            }
          });
          $('#lfm').filemanager('image');
      });
    </script>
@endsection
