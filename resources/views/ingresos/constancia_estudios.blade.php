@extends('plantilla')

@section('content')
@include('errors/errors')

<style>
    input.formato,
    select.formato,
    textarea.formato {
        font-weight: bold;
        /*  box-shadow: 15px 15px 15px #999; */
        font-size: 1.2rem;
        border-left: none;
        border-right: none;
        border-top: none;

    }

    label {
        font-weight: bold;

        font-size: 0.8rem;
    }


    .card {
        box-shadow: 15px 15px 15px #999;
        border-radius: 0rem 0rem 1rem 1rem;

        border-left: none;
        border-right: none;
        border-top: none;
    }

    .form-control {
        border-left: none;
        border-right: none;
        border-top: none;
        border-bottom-width: .2rem
    }
</style>



<div class="container">
    <div class="row  justify-content-center  pb-4">
        <div class="col-md-9">
            <div class="card text-left ">
                <form>
                    <div class="card-header  text-white bg-primary ml-3 mr-4" style="box-shadow: 15px 15px 15px #999;">
                        <h3 class="card-title font-weight-bold">Constancia de Estudios</h3>
                    </div>


                    <div class="card-body ">

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                {!! Form::label('cedulaest', 'Cedula de Identidad:', ['for' => 'cedulaest'] ) !!}
                                {!! Form::text('cedulaest', null, ['class' => 'form-control formato', 'cedulaest' =>
                                'cedulaest'] )
                                !!}

                            </div>
                        </div>


                        {{-- ---------------------------- --}}


                        <div class="form-row">


                            <div class="form-group col-md-5">
                                {!! Form::label('apellidosest', 'Apellidos:', ['for' => 'apellidosest', ] ) !!}
                                {!! Form::text('apellidosest', null, ['class' => 'form-control formato', 'id' =>
                                'apellidosest','onKeyUp' =>
                                'this.value = this.value.toUpperCase()', 'placeholder' => '', 'value' =>
                                '' ]
                                )
                                !!}
                            </div>

                            <div class="form-group col-md-5">

                                {!! Form::label('nombresest', 'Nombres:', ['for' => 'nombresest'] ) !!}
                                {!! Form::text('nombresest', null, ['class' => 'form-control formato', 'id' =>
                                'nombresest','onKeyUp' =>
                                'this.value = this.value.toUpperCase()', 'placeholder' => '', 'value' => ''
                                ] )
                                !!}
                            </div>


                            <div class="form-group col-md-2">

                                {!! Form::label('sexoest', 'Sexo:', ['for' => 'sexoest'] ) !!}
                                {!! Form::text('sexoest', null, ['class' => 'form-control formato', 'id' =>
                                'sexoest','onKeyUp' =>
                                'this.value = this.value.toUpperCase()', 'placeholder' => '', 'value' => '' ] ) !!}

                            </div>

                        </div>

                        {{-- ************************* --}}

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                {!! Form::label('anoest', 'Año de Estudio:', ['for' => 'anoest', ] ) !!}
                                {!! Form::text('anoest', null, ['class' => 'form-control formato', 'id' =>
                                'anoest','onKeyUp' =>
                                'this.value = this.value.toUpperCase()', 'placeholder' => '', 'value' =>
                                '' ]
                                )
                                !!}
                            </div>

                            <div class="form-group col-md-2">

                                {!! Form::label('seccion', 'Sección:', ['for' => 'seccion'] ) !!}
                                {!! Form::text('seccion', null, ['class' => 'form-control formato', 'id' =>
                                'seccion','onKeyUp' =>
                                'this.value = this.value.toUpperCase()', 'placeholder' => '', 'value' => ''
                                ] )
                                !!}
                            </div>



                        </div>
                        {{-- ************************* --}}

                    </div>
                    <div class="card-footer ">

                        <div class="form-row  ">
                            <div class="form-group col-md-5">
                                <button id="ce" class="btn btn-primary  form-control font-weight-bold"
                                    style="font-size: 1.2rem">Costancia</button>
                            </div>


                            <div class="form-group col-md-4">
                                <button id="autenticacion" class="btn btn-success  form-control font-weight-bold"
                                    style="font-size: 1.2rem">Autenticación</button>
                            </div>

                            <div class="form-group col-md-3">
                                <button type="reset" class="btn btn-light  form-control font-weight-bold"
                                    style="font-size: 1.2rem">Limpiar</button>
                            </div>


                        </div>
                </form>


            </div>


        </div>
    </div>

</div>
</div>
</div>


{!! Html::script('js/jquery-3.3.1.js') !!}



{!! Html::script('js/operaciones/constancia_estudios.js') !!}




@endsection