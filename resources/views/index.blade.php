<x-layout>
    <div class="container py-md-5 container--narrow">
    @unless ($citas->isEmpty())
                <div class="text-center">
                    <h2><strong>Lista de Citas</strong></h2>
                    <p class="lead text-muted">Aquí encontrarás todas tus citas de entrevistas programadas. </p>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Nivel de estudios</th>
                                    <th>Fecha de la cita</th>
                                    <th>Hora de la cita</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($citas->sortBy('fechayhora_cita')->sortBy('fechayhora_cita') as $cita)
                                <tr>
                                    <td>{{ $cita->nombre }} {{ $cita->apellido_paterno }} {{ $cita->apellido_materno }}</td>
                                    <td>{{ $cita->nivel_estudios }}</td>
                                    <td>{{ $cita->fechayhora_cita->format('d/m/Y')}}</td>
                                    <td>{{ $cita->fechayhora_cita->format('H:i')}}</td>
                                    <td>
                                        <a href="/cita/{{ $cita->id }}">Ver más</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                <div class="mt-4">
                    {{$citas->links()}}
                </div>
        @else

        <div class="text-center">
            <h2>Tu <strong>lista</strong> de citas esta vacía.</h2>
            <p class="lead text-muted">Tu feed mostrara las citas de entrevistas que tengas registradas. Si quieres crear una nueva cita, solo tienes que seleccionar el boton "Registrar cita" para generarla.</p>
            </div> 
        @endunless
    </div>
</x-layout>