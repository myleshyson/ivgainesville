<!-- Modal For Adding a Photo -->
<div class="modal fade" id="photo-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add Photo</h4>
      </div>
      <div class="modal-body">
      <div class="row">
    @foreach($article->photos as $photo)
        <div class="col-xs-1 text-center photo-list">
          <form id="mydropzone">
          {!! csrf_field() !!}
          {!! method_field('DELETE') !!}
          <button type="submit" class="thumbnail-delete">&times;</button>
          </form>
          <img  class="post-thumbnail">
        @endforeach
        </div>
        </div>
        <div class="row">
        <div class="col-lg-12">
        <form class="dropzone"  method="POST" id="addPhotosForm">
          {{ csrf_field() }}
        </form>
      </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
