@extends('layouts.sidebar')
@section('contenido')
    <link rel="stylesheet" href={{ asset('transaccion/transaccion.css') }}>
    <div class="title2">
        <h1>Listado de Inmuebles</h1>
    </div>

    <button type="button" class="btn btn-secondary btn-nuevo" data-toggle="modal" data-target="#exampleModal"
        data-whatever="@mdo">Nuevo Inmueble</button>
    <div class="table">
        <table class="table table-dark table-striped" id="tablita">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Propietario</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Ubicacion</th>
                    <th scope="col">Asesor_ID</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($inmuebles as $i => $item)
                    <tr>
                        <th scope="row">1</th>
                        <td><img src="https://img.freepik.com/vector-gratis/hermosa-casa_24877-50819.jpg" alt="casa"
                                width="100%" height="100%"></td>
                        <td>{{ $item->propietario }}</td>
                        <td>{{ $item->precio }}</td>
                        <td>{{ $item->ubicacion }}</td>
                        <td>{{ $item->asesor_id }}</td>
                        <td>
                            <form action="#" method="POST">
                                <a class="btn btn-link" type="button" href="/transacciones?x={{ $i + 1 }}">
                                    <ion-icon name="enter-outline"></ion-icon>
                                </a>
                                <a type="submit" class="btn btn-link" id="btnEliminar">
                                    <ion-icon name="trash-outline"></ion-icon>
                                </a>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- MODAL NUEVO INMUEBLE --}}

    <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nuevo Inmueble!</h1>
                </div>
                <form class="container" method="POST" action="{{ route('regInmueble') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Propietario:</label>
                            <input name="propietario" type="text" class="form-control" id="recipient-name" required>
                        </div>
                        <div class="form-group">
                            <label for="titulo" class="col-form-label">Ubicacion:</label>
                            <select name="ubicacion" class="form-control" id="tipo">
                                <option value="opcion1">Selecciona una opción</option>
                                <option value="Este">Este</option>
                                <option value="Oeste">Oeste</option>
                                <option value="Norte">Norte</option>
                                <option value="Sur">Sur</option>
                                <option value="Centro">Centro</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tamaño" class="col-form-label">Precio ($us):</label>
                                    <input name="precio" type="text" class="form-control" id="tamaño" maxlength="10"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="titulo" class="col-form-label">Asesor:</label>
                            <select name="asesor" class="form-control" id="razon">
                                <option value="0">Selecciona una opción</option>
                                <option value="1">Carmen</option>
                                <option value="2">Pedro</option>
                                <option value="3">Joaquin</option>
                                <option value="4">Jesus</option>
                                <option value="5">Maria</option>
                                <option value="6">Luisa</option>
                                <option value="7">Gustavo</option>
                                <option value="8">Kevin</option>
                                <option value="9">Jose</option>
                                <option value="10">Julian</option>
                                <option value="11">Natalia</option>
                                <option value="12">Mariana</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-success">
                            Guardar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        var btnModificar = document.getElementsByClassName("btn-modificar");

        for (var i = 0; i < btnModificar.length; i++) {
            btnModificar[i].addEventListener('click', function() {
                var modalNumber = this.getAttribute('data-modal');
                var direccionInput = document.querySelector('#modal' + modalNumber + ' input[name="direccion"]');
                direccionInput.removeAttribute('readonly');
            });
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const zoomImages = document.querySelectorAll('.zoom-image');
            const zoomOverlay = document.querySelector('.zoom-overlay');
            const zoomImage = zoomOverlay.querySelector('img');

            zoomImages.forEach(function(image) {
                image.addEventListener('click', function() {
                    const imageURL = this.getAttribute('src');
                    zoomImage.setAttribute('src', imageURL);
                    zoomOverlay.style.display = 'flex';
                });
            });

            zoomOverlay.addEventListener('click', function(event) {
                if (event.target === this) {
                    zoomOverlay.style.display = 'none';
                }
            });
        });
    </script>
@endsection
