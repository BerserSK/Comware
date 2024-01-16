@extends('layouts.panel')

@section('content')

    <style>
        details{
            background: #f2f2f2;
            margin: 8px; 
            border-radius: 6px; 
            padding: 16px; 
            transition: all .3s ease;
            cursor: pointer;
            border: 1px solid #ccc;
        }

        details[open] {
            background: #c0c0c0;
        }
        summary{
            list-style: none
        }

        summary::before{
            content: '+';
            padding-right: 1rem;
        }

        details[open] summary::before{
            content: '-';
        }
    </style>

    <div class="card shadow">
        <div class="card-header border-0">
          <div class="row align-items-center">
            <div class="col">
              <h3 class="mb-0">Plantillas</h3>
            </div>
            <div class="col text-right">
              <a href="{{ url('/plantillas/create') }}" class="btn btn-sm btn-primary">Nueva Plantilla</a>
            </div>
          </div>
        </div>
        <div class="card-body">
            @if (session('notification'))
                <div class="alert alert-success" role="alert">
                    {{ session('notification') }}
                </div>
            @endif
        </div>

        <div class="hola">
            @foreach ($templates as $plantilla)
                <details name="plantillas">
                    <summary>{{ $plantilla->name }}</summary>
                    <textarea name="" id="" cols="90" rows="10">{{ $plantilla->plantilla }}</textarea>
                </details>
            @endforeach  

        </div>  
        
      </div>
    </div>
@endsection
