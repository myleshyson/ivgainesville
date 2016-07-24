<script type="text/javascript">
@extends('editor.editor')
  @section('ajax')
    $.ajax({
          type: 'POST',
          dataType: 'json',
          url : "{{ URL::action('BlogController@store') }}",
          data: { title: postTitle['post-title']['value'], body: postContent['post-body']['value'], publish: publish, published_at: published_at, is_published: is_published },
          success: function(data) {
              errorDiv.hide();
                var origin = window.location.origin;
                 window.location.replace(origin +'/home/posts/' + data.id + '/edit');
	  },
    error: function(data) {

        errorDiv.empty().show();
        var errors = data.responseJSON;
        var list = [];
           for (var error in errors) {
            list.push('<li>' + errors[error] + '</li>');
           }
        errorDiv.append(list);

    }
      });
  @endsection
</script>
