<x-layout doctitle="Cita">
  @can('update', $cita)
  <div class="container py-md-5 container--narrow">
      <div class="d-flex justify-content-between">
        <h2>Cita de {{$cita->nombre}} {{$cita->apellido_paterno}}</h2>
        <span class="pt-2">
          <a href="/cita/{{$cita->id}}/edit" class="text-primary mr-2" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fas fa-edit"></i></a>
          <form class="delete-post-form d-inline" action="/cita/{{$cita->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button class="delete-post-button text-danger" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fas fa-trash"></i></button>
          </form>
        </span>     
      </div>
      <p class="text-muted small mb-4">
        Cita creada el {{$cita->created_at->format('j/n/Y')}}
      </p>
      <p><small><strong><a href="/" class="text-decoration-none">&laquo; Volver</a></strong></small></p>
      <div class="body-content">
        
        <div class="row">
          <div class="col-md-4">
              <p><span class="text-muted">Nombre:</span> <br>{{ $cita->nombre }}</p>
          </div>
          <div class="col-md-4">
              <p><span class="text-muted">Apellido Paterno:</span> <br>{{ $cita->apellido_paterno }}</p>
          </div>
          <div class="col-md-4">
              <p><span class="text-muted">Apellido Materno:</span> <br>{{ $cita->apellido_materno }}</p>
          </div>
      </div>
      
      <div class="row">
          <div class="col-md-6">
              <p><span class="text-muted">Teléfono:</span> <br>{{ $cita->telefono }}</p>
          </div>
          <div class="col-md-6">
              <p><span class="text-muted">Correo Electrónico:</span> <br>{{ $cita->email }}</p>
          </div>
      </div>
      
      <div class="row">
          <div class="col-md-6">
              <p><span class="text-muted">Nivel de Estudios:</span> <br>{{ $cita->nivel_estudios }}</p>
          </div>
          <div class="col-md-6">                
                <p><span class="text-muted">Curriculum Vitae:</span> <br><a href="{{ asset('/storage/cvs/' . $cita->cv_id) }}" target="_blank" download class="text-primary">Descargar</a></p>
          </div>
      </div>

      <div class="row">
        <div class="col-md-6">
            <p><span class="text-muted">Fecha de la cita:</span> <br>{{ $cita->fechayhora_cita->format('d/m/Y')}}</p>
        </div>
        <div class="col-md-6">
            <p><span class="text-muted">Hora de la cita:</span> <br>{{ $cita->fechayhora_cita->format('H:i')}}</p>
        </div>
    </div>

      </div>
    </div>
    @endcan
</x-layout>

