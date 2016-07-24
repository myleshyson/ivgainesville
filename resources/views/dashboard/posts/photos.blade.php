@extends('layouts.home')

@section('content')
<div class="row page-header">
  <div class="col-xs-6">
    <h1>{{ strip_tags($article->title) }}</h1>
  </div>
</div>
<div class="row">
	<div class="col-md-12 text-center photo-list">
@foreach($article->photos as $photo)
    <div class="post-image col-xs-4 text-center">
      <form  method="POST" action="/home/posts/photos/{{ $photo->id }}">
          {!! csrf_field() !!}
          {!! method_field('DELETE') !!}
          <button type="submit" class="thumbnail-delete">&times;</button>
          </form>
          <div class="post-thumbnail text-center thumbnail" style="background-image: url('/{{ $photo->path }}')"></div>
    </div>
 @endforeach
 </div>
	</div>
  <div class="row">
  <div class="col-md-6 col-md-offset-3">
    <form class="dropzone" method="POST" id="addPhotosForm">
      {{ csrf_field() }}
    </form>
  </div>
</div>
@stop
@section('footer')
<script type="text/javascript">
Dropzone.autoDiscover = false;
var md = new Dropzone('#addPhotosForm', {
url: "/home/posts/{{ $article->id }}/photos",
        maxFilesize: "5",
        addRemoveLinks: true
        });

    //     // Set up any event handlers
    //     md.on("complete", function (file) {
    //     if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
    //         window.location.reload(true);
    //     }

    //     md.removeFile(file);
    // });

</script>
@stop