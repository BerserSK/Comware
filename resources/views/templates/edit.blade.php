@extends('layouts.panel')

@section('content')

    <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Editar Plantillas</h3>
            </div>
            <div class="col text-right">
              <a href="{{ url('/plantillas') }}" class="btn btn-sm btn-success">
                <i class="fas fa-chevron-left"></i>
                Regresar</a>
            </div>
          </div>
        </div>
        <div class="card-body">
            @if ($errors->any())
                @foreach($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                    <i class="fas fa-exclamation-triangle"></i>
                    <strong>Por favor!</strong> {{ $error }}
                </div>
                @endforeach
            @endif

            <form action="{{ url('/plantillas/'.$template->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Nombre de la plantilla</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $template->name) }}" required>
                </div>

                <div class="form-group">
                    <label for="description">Descripcion</label>
                    <input type="text" name="description" class="form-control" value="{{ old('description', $template->description) }}" required>
                </div>

                <div class="form-group">
                    <label for="plantilla">Plantilla de Cierre</label>
                    <textarea name="plantilla" class="form-control" id="" rows="10" cols="50" required>{{ old('plantilla', $template->plantilla) }}</textarea>
                </div>

                <button type="submit" class="btn btn-sm btn-primary">Guardar Plantilla</button>
            </form>
        </div>
      </div>
    </div>

    
@endsection