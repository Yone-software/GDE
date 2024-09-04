<x-layout>
    <div class="container py-md-5">
      <div class="row align-items-center">
        <div class="col-lg-7 py-3 py-md-5">
          <h1 class="display-3">Gestor de Entrevistas</h1>
          <p class="lead text-muted">
            Crea tu cuenta y comienza a gestionar de forma eficiente el registro de entrevistas.
          </p>
        </div>
        <div class="col-lg-5 pl-lg-5 pb-3 py-lg-5">
          <form action="/register" method="POST" id="registration-form">
            @csrf
            <div class="form-group">
              <label for="username-register" class="text-muted mb-1"><small>Usuario</small></label>
              <input value="{{old('username')}}" name="username" id="username-register" class="form-control" type="text" placeholder="Escoge un nombre de usuario" autocomplete="off" />
              @error('username')
                  <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
              @enderror
            </div>

            <div class="form-group">
              <label for="password-register" class="text-muted mb-1"><small>Contraseña</small></label>
              <input name="password" id="password-register" class="form-control" type="password" placeholder="Crea una contraseña" />
              @error('password')
              <p class="m-0 small alert alert-danger shadow-sm">{{$message}}</p>
          @enderror
            </div>

            <div class="form-group">
              <label for="password-register-confirm" class="text-muted mb-1"><small>Confirmar contraseña</small></label>
              <input name="password_confirmation" id="password-register-confirm" class="form-control" type="password" placeholder="Confirma tu contraseña" />
            </div>

            <button type="submit" class="py-3 mt-4 btn btn-sm btn-success btn-block">Crear cuenta</button>
          </form>
        </div>
      </div>
    </div>
</x-layout>