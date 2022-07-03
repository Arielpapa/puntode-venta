@extends('layouts.admin')
@section('title','Editar usuario')
@section('styles')
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Editar usuario
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('users.index')}}">Usuarios</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar usuario</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Editar usuario</h4>
                    </div>
                    {!! Form::model($user,['route'=>['users.update',$user], 'method'=>'PUT']) !!}
                    
                    
                    <div class="form-group">
                    <label for="name">Nombre</label>
                   {{-- {{ Form::text('name', null, array('class' => 'form-control')) }} --}}
                   {!! Form::text('name', null, array('class' => 'form-control')) !!}
                  </div> 
                  <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    {{-- {{  Form::text('email', null, array('class' => 'form-control'))  }} --}}
                    {!! Form::text('email', null, array('class' => 'form-control')) !!}
                  </div>
                  
                  <div class="form-group">
                      <label for="password">Contraseña</label>
                      {{-- {{  Form::text('password', null, array('class' => 'form-control'))  }} --}}
                      {!! Form::password('password', array('class' => 'form-control')) !!}
                  </div>
                  <div class="form-group">
                    <label for="confirm-password">Confirmar Contraseña</label>
                    {{-- {{  Form::text('confirm-password', null, array('class' => 'form-control'))  }} --}}
                    {!! Form::password('confirm-password', array('class' => 'form-control')) !!}
                </div>
                <div class="form-group">
                    <label for="">Roles</label>
                    {!!Form::select('roles[]', $roles,$userRole, array('class' => 'form-control')) !!}
                   
                </div> 

                <button type="submit" class="btn btn-primary">Guardar</button>
                

                 <a href="{{route('users.index')}}" class="btn btn-light">
                    Cancelar
                 </a>
                     {!! Form::close() !!}
                </div>
                {{--  <div class="card-footer text-muted">
                    {{$users->render()}}
                </div>  --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
@endsection
