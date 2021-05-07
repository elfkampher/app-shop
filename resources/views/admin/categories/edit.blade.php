@extends('layouts.app')

@section('title', 'Bienvenido a App Shop')

@section('body-class', 'product-page')

@section('content')
<div class="header header-filter" style="background-image: url('https://images.unsplash.com/photo-1423655156442-ccc11daa4e99?crop=entropy&dpr=2&fit=crop&fm=jpg&h=750&ixjsv=2.1.0&ixlib=rb-0.3.5&q=50&w=1450');">    
</div>

<div class="main main-raised">
    <div class="container">

        <div class="section">
            <h2 class="title text-center">Editar Categoria</h2>

            @if($errors->any())
            <div class="section">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>                    
                </div>
            </div>
            @endif

            <form method="POST" action="{{ url('admin/categories/'.$category->id.'/edit')}}" enctype="multipart/form-data">
                @csrf


                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group label-floating">
                            <label class="control-label">Nombre de la cateogoría</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $category->name) }}">
                        </div>
                    </div>
                    <div class="col-sm-6">                        
                        <label class="control-label">Imagen de la categoria</label>
                        <input type="file" name="image">                        
                    </div>
                    @if($category->image)
                    <p class="help-block">Subir sólo si desea reemplazar la <a href="{{ asset('/images/categories/'.$category->image) }}" target="_blank">imagen actual</a> </p>    
                    @endif
                </div>

                <textarea class="form-control" placeholder="Descripción de la categoria" rows="5" name="description">{{ old('description', $category->description) }}</textarea>

                <button class="btn btn-primary">Guardar Cambios</button>
                <a href="{{ url('/admin/categories') }}" class="btn btn-default">Cancelar</a>
            </form>

        </div>

    </div>

</div>

@include('includes.footer')
@endsection
