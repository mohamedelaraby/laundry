
{{--  Delete modal form  --}}
    <!-- Button trigger modal -->
<div class="modal" id="modal-delete">
		<div class="modal-dialog" role="document">
			<div class="modal-content modal-content-demo">
				<div class="modal-header">
					<h6 class="modal-title">{{ trans('admin.adduser') }}</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
				</div>
        {{--  Start Delete form --}}
        {!! Form::open() !!}
        <div class="modal-body">
            {!! Form::hidden('_method','DELETE') !!}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info mx-2" data-dismiss="modal">{{trans('admin.close')}}</button>
          {!! Form::submit(trans('admin.yes'), ['class'=>'btn btn-danger']) !!}
        </div>
        {{--  End Delete form --}}
</div>

