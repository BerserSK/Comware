@extends('layouts.panel')

@section('content')

    <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Admins</h3>
                </div>
                <div class="col text-right">
                  <a href="{{ url('/admins/create') }}" class="btn btn-sm btn-primary">Nuevo Administrador</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              @if(session('notification'))
              <div class="alert alert-success" role="alert">
                  {{ session('notification') }}
              </div>
              @endif
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Cedula</th>
                    <th scope="col">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($admins as $admin)
                  <tr>
                    <th scope="row">
                      {{ $admin->name }}
                    </th>
                    <td>
                      {{ $admin->email }}
                    </td>
                    <td>
                        {{ $admin->cedula }}
                      </td>
                    <td>
                      <form action="{{ url('/admins/'.$admin->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ url('/admins/'.$admin->id.'/edit')}}" class="btn btn-sm btn-primary">Editar</a>
                        <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <div class="card-body">
              {{ $admins->links() }}
            </div>
    </div>

@endsection
