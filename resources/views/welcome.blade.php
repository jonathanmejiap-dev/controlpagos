@extends('plantilla')
@section('titulo', 'CONTROL DE PAGOS -IESTP SDM')

@section('contenido')
    <div class="container">
        <div class="py-2 text-center">

            {{-- <div class="title m-b-md font-weight-bold">
                CONTROL DE PAGOS
            </div> --}}
            <h1>CONTROL DE PAGOS</h1>
            <p class="lead">En este apartado podras precisar, los pagos realizados por trámites en el <b
                    class="font-weight-bold">IESTP Señor de la divina misericordia</b>.</p>
        </div>

        <div class="row">
            <div class="col-md-8 order-md-1 py-4">
                <div class="card">
                    <div class="card-header text-white bg-primary ">
                        <h4 class="font-weight-bold pt-2">Pago del trámite</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pago.store') }}" method="POST" enctype="multipart/form-data"
                            class="needs-validation">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="font-weight-bold text-primary">Datos del usuario</h4>
                                </div>
                                <div class="col-md-4  mb-3">
                                    <label for="username" class="font-weight-bold">DNI</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-address-card"></i></span>
                                        </div>
                                        <input type="text" class="form-control @error('dni') is-invalid @enderror" name="dni" id="dni" value="70515941"
                                            placeholder="78485965" required="required">
                                            @error('dni')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-md-8 mb-3">
                                    <label for="nombres" class="font-weight-bold">Nombres y apellidos</label>
                                    <input type="text" class="form-control @error('nombres') is-invalid @enderror" name="nombres" id="nombres"
                                        placeholder="Marco Rojas Noriega" value="Jonathan Mejía" required>
                                    <small class="text-muted">Nombres y apellidos completos.</small>
                                    @error('nombres')
                                    <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>

                            <div class="row">

                                <div class="col-md-4 mb-3">
                                    <label for="telefono" class="font-weight-bold">Teléfono</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                        </div>
                                        <input type="text" class="form-control @error('telefono') is-invalid @enderror" value="923252536" name="telefono"
                                            id="telefono" placeholder="923121314" required>
                                            @error('telefono')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-md-8 mb-3">
                                    <label for="email" class="font-weight-bold">Email <span
                                            class="text-muted">(Opcional)</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <input type="email" class="form-control " value="micorreo@gmail.com" name="email"
                                            id="email" placeholder="tu@correo.com">
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <hr>
                                    <h4 class="font-weight-bold text-success">Datos del pago</h4>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-12 mb-3">
                                    <label for="tramite" class="font-weight-bold">Trámite a realizar (Concepto)</label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-crosshairs"></i></span>
                                        </div>
                                        <select class="form-control @error('tramite') is-invalid @enderror" name="tramite" id="tramite">
                                            <option value="">Seleccionar</option>
                                            @foreach ($tupas as $tupa)
                                                <option value="{{ $tupa->id }}">{{ $tupa->nombre }} | <b>S/. {{ $tupa->monto }}</b></option>
                                            @endforeach
                                        </select>
                                        @error('tramite')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                        @enderror
                                        
                                        {{-- <input type="hidden" name="valor_monto" class="valor_monto" value="{{ $tupa->monto }}"> --}}
                                    </div>
                                    <small class="text-muted">Seleccionar el trámite que usted realizará.</small>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-6 mb-3">
                                    <label for="operacion" class="font-weight-bold">N° operación <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                                        </div>
                                        <input type="text" class="form-control @error('operacion') is-invalid @enderror" value="08562020" name="operacion"
                                            id="operacion" placeholder="2584582">
                                            @error('operacion')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="monto" class="font-weight-bold">Monto <span
                                            class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text font-weight-bold">S/.</span>
                                        </div>
                                        <input type="text" class="form-control @error('monto') is-invalid @enderror" value="200.00" name="monto" id="monto"
                                            placeholder="200.00">
                                            @error('monto')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                    </div>
                                </div>


                            </div>

                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="archivo" class="font-weight-bold">Adjuntar captura del voucher <span
                                            class="text-danger">*</span></label>
                                    <div class="custom-file">
                                        <input type="file" name="archivo" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Seleccionar archivo</label>
                                    </div>
                                </div>
                            </div>

                            <hr class="mb-4">

                            <h4 class="mb-3">Confirmar</h4>

                            <div class="d-block my-3 mb-4">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="check_ok" name="check_ok"
                                        checked>
                                    <label class="custom-control-label" for="check_ok">Confirma que todos los datos
                                        registrados, son reales, en caso contrario, atenerse a las restriccioes de las
                                        politicas de privacidad del sitio.</label>
                                    <small class="text-muted">En caso de no ser validos los datos, se bloqueara el envio de
                                        pagos del usuario registrado.</small>
                                </div>
                            </div>

                            <button class="btn btn-primary btn-lg btn-block" type="submit">Enviar pago realizado</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center pt-4 mb-3">
                    <span class="text-muted font-weight-bold">Datos del banco</span>
                    <span class="badge badge-danger badge-pill small" style="font-size:12px">Importante!!</span>
                </h4>
                <ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0 font-weight-bold"><i class="fas fa-university "></i> Banco de la nación</h6>
                            <small class="text-muted">Transacciones Banco | Agentes</small>
                        </div>
                        <span class="text-muted">S/.</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed bg-light">
                        <div>
                            <h6 class="my-0 font-weight-bold">Nombre: IESTP Señor de la Divina Misericordia</h6>
                            <small class="text-muted">Revisar nombre al hacer la transacción</small>
                        </div>
                        {{-- <span class="text-muted">$5</span> --}}
                    </li>
                    <li class="list-group-item d-flex justify-content-between lh-condensed bg-success text-white">
                        <div>
                            <h6 class="my-0 font-weight-bold"># Cuenta Ahorros: 0729585482</h6>
                            <small class="text-light font-weight-bold">En soles</small>
                        </div>
                        {{-- <span class="text-muted">$8</span> --}}
                    </li>

                    <li class="list-group-item d-flex justify-content-between">
                        <span>------------</span>
                        <strong>-----------</strong>
                    </li>
                </ul>

                {{-- <form class="card p-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Promo code">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">Redeem</button>
                        </div>
                    </div>
                </form> --}}

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="https://isdm.edu.pe/transparencia" target="_blank" class="link"><i class="fas fa-eye"></i> <b>(TUPA)</b> Texto Unico de
                                    Procedimientos Administrativos </a>
                                <br>
                                <small class="text-muted">El pago se hace de acuerdo al TRÁMITE establecido en el
                                    TUPA</small>
                            </div>
                        </div>
                    </div>

                </div>
            </div>





        </div>


    </div>
    
@endsection

@push('scripts')
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

        // $("#tramite").change(function() {
        //     var valor_monto = $(".valor_monto").val()
        //     alert("Handler for .change() called."+valor_monto);
        // });
    </script>


    <script type="text/javascript">
        function actualizar() {
            location.reload(true);
        }
        //Función para actualizar cada 5 segundos(5000 milisegundos)
        //setInterval("actualizar()", 5000);
    </script>

    @if (Session::has('error'))
        <script type="text/javascript">
            function actualizar() {
                location.reload(true);
            }
            //Función para actualizar cada 5 segundos(5000 milisegundos)
            //setInterval("actualizar()",5000);
            Swal.fire({
                title: 'Registros no encontrados?',
                text: "Lo sentimos, no se encontraron registros de trámites en nuestra institución.",
                icon: 'warning',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Cancelar'
            })
        </script>
    @endif

    @if (Session::has('estado') == 'registro_ok')
        <script type="text/javascript">
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Pago registrado correctamente.',
                showConfirmButton: true,
                timer: 2500
            })
        </script>
    @endif
@endpush
