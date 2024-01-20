<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />

@extends('layouts.panel')

@section('content')

    <div class="card shadow">
            <div class="card-header border-0">
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Usuarios</h3>
                </div>
                <div class="col text-right">
                  <a href="{{ url('/usuarios/create') }}" class="btn btn-sm btn-primary">Nuevo Usuario</a>
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
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($templates as $plantilla)
                        <tbody>
                            <tr>
                                <td scope="row">{{ $plantilla->id }}</td>
                                <td scope="row">{{ $plantilla->name }}</td>
                                <td scope="row">{{ $plantilla->description }}</td>
                                <td>
                                    <a href="javascript:void(0)" id="show-user" data-url="{{ route('templates.show', $plantilla->id) }}" class="btn btn-sm btn-primary">Show</a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </tbody>
              </table>
               <!-- Modal -->
                <div class="modal fade" id="userShowModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p><strong>ID:</strong> <span id="user-id"></span></p>
                        <p><strong>Name:</strong> <span id="user-name"></span></p>
                        <p><strong>Description:</strong> <span id="user-description"></span></p>
                        <p><strong>Plantilla:</strong> <textarea id="user-plantilla" name="plantilla" class="form-control"  rows="10" cols="50" required></textarea></p>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
           
                <div class="card-body">
                    {{ $templates->links() }}
                </div>
    </div>
    
@endsection
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>


<script>
    $(document).ready(function(){
        $('body').on('click', '#show-user', function() {
            var templateURL = $(this).data('url');
            $.get(templateURL, function (data) {
                $('#userShowModal').modal('show');
                    $('#user-id').text(data.id);
                    $('#user-name').text(data.name);
                    $('#user-description').text(data.description);
                    $('#user-plantilla').text(data.plantilla);
            })
        })
    });

    /*$("#select").on("change",function(){
        $.ajax({
        url: "/plantillasInfo/{id}",
        type: 'GET',
        success: function (result) {
            $("#address").val(result.address);
            $("#email").html(result.email);   
        }
        })

    });*/
   /* $(document).ready(function(){
        $.ajax({
            url: '/plantillasInfo/all',
            type: 'POST',
            data:{
                id: 1,
                _token:$('input[name="_token"]').val()
            }
        }).done(function(res){
            var arreglo = JSON.parse(res);
            console.log(arreglo)

            for(var x = 0;x <arreglo.length;x++){
                var todo = '<tr><td>'+arreglo[x].id+'</td>';
                    todo+='<td>'+arreglo[x].name+'</td>';
                    todo+='<td>'+arreglo[x].description+'</td>';
                    todo+='<td>'+arreglo[x].plantilla+'</td>';
                    todo+='<td></td></tr>';
                    $('tbody').append(todo);
            };
                
        });
    })*/
    


</script>

    