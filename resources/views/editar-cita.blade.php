<x-layout doctitle="Editar Cita">
    <div class="container py-md-5 container--narrow">
        <h2 class="mb-4">Formulario de Solicitud de Entrevista</h2>
        <form action="/cita/{{$cita->id}}" method="POST">
            <p><small><strong><a href="/cita/{{$cita->id}}" class="text-decoration-none">&laquo; Volver</a></strong></small></p>
            @csrf
            @method('PUT')
          <div class="row mb-3">
            <div class="col-md-4">
                <label for="nombre" class="form-label">Nombre<span class="text-muted small"> (Obligatorio)</span></label>
                <input value="{{old('nombre', $cita->nombre)}}" name="nombre" required type="text" class="form-control" id="nombre" autocomplete="off" placeholder="Nombre">
                @error('nombre')
                    <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="apellidoPaterno" class="form-label">Apellido Paterno<span class="text-muted small"> (Obligatorio)</span></label>
                <input value="{{old('apellido_paterno', $cita->apellido_paterno)}}" name="apellido_paterno" required type="text" class="form-control" id="apellidoPaterno" autocomplete="off" placeholder="Apellido Paterno">
                @error('apellido_paterno')
                    <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="apellidoMaterno" class="form-label">Apellido Materno</label>
                <input  value="{{old('apellido_materno', $cita->apellido_materno)}}" name="apellido_materno" type="text" class="form-control" id="apellidoMaterno" autocomplete="off" placeholder="Apellido Materno">
                @error('apellido_materno')
                    <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="telefono" class="form-label">Teléfono</label>
                <input value="{{old('telefono', $cita->telefono)}}" name="telefono" type="tel" class="form-control" id="telefono" autocomplete="off" placeholder="Número teléfonico">
                @error('telefono')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
            @enderror
            </div>
            <div class="col-md-6">
                <label for="correoElectronico" class="form-label">Correo Electrónico</label>
                <input value="{{old('email', $cita->email)}}" name="email" type="email" class="form-control" id="correoElectronico" autocomplete="off" placeholder="Correo electrónico">
                @error('email')
                <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
            @enderror
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
            <label for="nivelEstudios" class="form-label">Nivel de Estudios<span class="text-muted small"> (Obligatorio)</span></label>
            <select name="nivel_estudios" required class="form-select" id="nivelEstudios">
                <option selected disabled>Selecciona una opción</option>
                <option value="Licenciatura">Licenciatura</option>
                <option value="Técnico">Técnico</option>
                <option value="Maestría">Maestría</option>
                <option value="Doctorado">Doctorado</option>
            </select>
        @error('nivel_estudios')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
        @enderror
        </div>

            <div class="col-md-6">
            <label for="cv" class="form-label">Cargar Curriculum Vitae<span class="text-muted small"> (Obligatorio)</span></label>
            <input name="cv" type="file" class="form-control" id="cv">
            @error('cv')
            <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
        @enderror
        </div>
      </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="fechaHoraCita" class="form-label">Fecha y Hora de la Cita<span class="text-muted small"> (Obligatorio)</span></label>
                <input 
                    name="fechayhora_cita" 
                    required 
                    type="datetime-local" 
                    class="form-control" 
                    id="fechaHoraCita"
                    value="{{old('fechayhora_cita', $cita->fechayhora_cita)}}"
                >
                @error('fechayhora_cita')
                    <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
                @enderror
            </div>
        </div>
          
          <button class="btn btn-primary">Guardar Cambios</button>
        </form>
      </div>
</x-layout>