<script type="text/javascript">
@extends('editor.editor')
@section('ajax')
$.ajax({
type: 'PUT',
dataType: 'json',
url : "/home/posts/{{ $article->id }}",
data: { title: postTitle['post-title']['value'], body: postContent['post-body']['value'], publish: publish, published_at: published_at, is_published: is_published },
beforeSend: function(){
      $('.publish-text').text('Saving');

},
success: function(data) {
    errorDiv.hide();
if(view == true) {
  var origin = window.location.origin;
  window.location.replace(origin +'/blog/' + data.id + '?{{ $queryString }}');
}
$('.publish-text').text('Saved');

},
error: function(data) {
 errorDiv.empty().show();
        var errors = data.responseJSON;
        var list = [];
           for (var error in errors.message) {
            list.push('<li>' + errors.message[error] + '</li>');
           }
        errorDiv.append(list);
},
complete: function(){
  setTimeout(function(){
    $('.publish-text').text('Draft');
  }, 1000)
  
}
});
@endsection
</script>
