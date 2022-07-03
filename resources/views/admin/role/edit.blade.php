@extends('layouts.admin')
@section('title','Registrar cliente')
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
            Registro de Roles
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('roles.index')}}">Roles</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar Roles</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Edicion de roles</h4>
                    </div>
                    {{-- {!! Form::open(['route'=>'roles.update', $id, 'method'=>'Put']) !!}
                    {!! Form::model($provider,['route'=>['providers.update',$provider], 'method'=>'PUT']) !!} --}}
                    {!! Form::model($role, ['method' => 'PUT','route' => ['roles.update', $role->id]]) !!}
                   
                    {{-- @include('admin.role._form') --}}
                   
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label for="">Role</label>
                                {{-- <input type="text" class="form-control" name="role" id="role" aria-describedby="helpId" required> --}}
                                {!! Form::text('name', null, array('class'=>'form-control')) !!}
                            </div>
                        </div>  
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <div class="form-group">
                                <label for="">Permisos para este ROL:</label>
                                <br>
                                @foreach($permission as $value)
                                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                {{ $value->name }}</label>
                            <br/>
                            @endforeach
                            </div>
                        </div>  
                    </div>


                     <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                     
                     <a href="{{route('roles.index')}}" class="btn btn-light">
                        Cancelar
                     </a>
                     {!! Form::close() !!}
                </div>
                {{--  <div class="card-footer text-muted">
                    {{$clients->render()}}
                </div>  --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}
@endsection
