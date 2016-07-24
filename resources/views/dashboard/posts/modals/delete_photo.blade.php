<!-- Modal For Deleting Article -->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Delete Article</h4>
      </div>
      <div class="modal-body">
        <h1>Are you sure about this?</h1>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
        {!! Form::open(['url' => '/home/posts/'.$article->id, 'method' => 'POST', 'class' => 'modal-delete' ]) !!}
        {!! csrf_field() !!}
        {!! method_field('DELETE') !!}
        <button class="btn-danger btn" type="submit">Delete</button>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>