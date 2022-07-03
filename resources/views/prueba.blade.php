@extends('layouts.admin')
@section('title','Gestión de productos')
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
            Basic Tables
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page">Basic</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="products_listing" class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nombre</th>
                                    <th>Stock</th>
                                    <th>Precio de venta</th>
                                    <th>Estado</th>
                                    <th>Categoría</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- <tr>
                                    <th scope="row">1</th>
                                    <td>Prueba</td>
                                    <td>Prueba</td>
                                    <td>Prueba</td>
                                    <td>Prueba</td>

                                    <td>Prueba</td>
                                    <td style="width: 20%;">

                                        

                                        <a class="btn btn-outline-info" href="#" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a>
                                         --}}
                                        {{-- <button class="btn btn-outline-danger delete-confirm"
                                        type="button" onclick="confirmDelete('delete-item_{{$product->id}}')" title="Eliminar">
                                            <i class="far fa-trash-alt"></i>
                                        </button> --}}

                                    {{-- </td> --}}
                                {{-- </tr> --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
{!! Html::script('melody/js/data-table.js') !!}

@endsection