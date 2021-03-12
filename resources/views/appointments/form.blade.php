
	<div class="modal-header">
		<h6 class="modal-title">{{ trans('admin.edit') }}</h6>
	</div>

  {{ csrf_field() }}
                    {{-- due_at --}}
                    <div class="form-group">
                    <div class="form-group {{$errors->has('due_at') ? 'has-error' : ''}}">
                      {!! Form::label('due_at', trans('admin.due_at')) !!}
                      {!! Form::datetime('due_at',$appointment->due_at,
                                   [ 'class' =>'form-control',
                                    // 'required' =>true,
                                    'placeholder' =>trans('admin.due_at'),
                                    'auto-focus'=>'true',
                                    'id'=>'due_at', ])
                      !!}
                      <span class="text-danger">{{$errors->has('due_at') ? $errors->first('due_at') : ''}}</span>
                    </div>

                    

                    {{-- status --}}
                    <div class="form-group">
                      {!! Form::label('status', trans('admin.status')) !!}
                      {!!  Form::select('status',$status
                       , $appointment->status,  
                      [ 'class' =>'form-control',

                      'placeholder' =>trans('admin.status'),
                      'auto-focus'=>'true',
                      'id'=>'status', ]); !!}
                  
                    </div>
                    
                    {{-- service --}}
                    <div class="form-group">
                      {!! Form::label('service_id', trans('admin.service')) !!}
                      
                      {!!  Form::select('service_id',$services
                       , $serviceId,  
                      [ 'class' =>'form-control',
                      'placeholder' =>trans('admin.service'),
                      'auto-focus'=>'true',
                       ]) !!}
                                        
                    </div>

                  
                    
                    {{-- car --}}
                    <div class="form-group">
                      {!! Form::label('car_id', trans('admin.car')) !!}
                      {!!  Form::select('car_id',$cars
                       , $selectedCarId,  
                      [ 'class' =>'form-control',
                      'placeholder' =>trans('admin.car'),
                      'auto-focus'=>'true',
                       ]) !!}

                    {{-- user --}}
                    <div class="form-group">
                      {!! Form::label('user_id', trans('admin.user')) !!}
                      {!!  Form::select('user_id',$users
                       , $selectedUserId,  
                      [ 'class' =>'form-control',
                      'placeholder' =>trans('admin.user'),
                      'auto-focus'=>'true',
                       ]) !!}
                  
                    </div>
                    {{-- notes --}}
                    <div class="form-group">
                      {!! Form::label('notes', trans('admin.user_notes')) !!}
                      {!! Form::textarea('notes',$appointment->notes,
                                   [ 'class' =>'form-control',

                                    'placeholder' =>trans('admin.user_notes'),
                                    'auto-focus'=>'true',
                                    'id'=>'notes', ])
                      !!}
                    </div>
                </div>
			</div>
		</div>
	</div>



