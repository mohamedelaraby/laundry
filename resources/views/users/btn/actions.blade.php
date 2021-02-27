{{--  <a href="route(['admins.users.update',$id])" class="btn btn-info" id="edit_btn"><i class="fa fa-edit"></i> </a>  --}}
<a  href="" class="modal-effect btn btn-info"
    id="edit_btn" data-effect="effect-scale" data-toggle="modal">
    <i class="fa fa-edit"></i>
</a>

{{-- <a href="#" class="btn btn-danger"><i class="fa fa-trash"></i> </a> --}}

<!-- Button trigger modal -->

        {{--  Start Delete form --}}
        {!! Form::open(['route'=>['admins.users.destroy',$id],'method'=>'POST']) !!}
        <div class="modal-body">
            {!! Form::hidden('_method','DELETE') !!}
        <h4>{{trans('admin.delete_this',['name'=>$name])}}</h4>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-info mx-2" data-dismiss="modal">{{trans('admin.close')}}</button>
          {!! Form::submit(trans('admin.yes'), ['class'=>'btn btn-danger']) !!}
        </div>
        {{--  End Delete form --}}


      </div>
    

