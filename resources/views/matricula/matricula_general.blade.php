@extends('plantilla')
@section('content')
@include('errors/errors')
<style>
    table {
        width: auto;
        background: #e5e5e5;
        box-shadow: 14px 14px 35px #999;
        border-radius: 1rem 1rem 1.2rem 1.2rem;
        border-top-style: solid;
        /* border-collapse: separate; */
        /* border-spacing: .4rem; */
    }
    td {
        font-size: 1.5rem;
        font-weight: bold;
        vertical-align: top;
        border-spacing: 0;
    }
    .texto_anno {
        font-size: 1.2rem;
    }
</style>
<div class="container-fluid">
    <div class="container">
        <h4 class="text-center  font-weight-bold pb-2">
            {{$titulo}}
        </h4>
        <div class="table table-responsive  text-center">
            <div class="form-row justify-content-center">
                <table class="table-light table-hover table-striped mb-5">
                    <thead class="text-white bg-primary">
                        <tr class="font-weight-bold texto_anno ">
                            <th>AÑO/SEXO</th>
                            <th>FEMENINO</th>
                            <th>MASCULINO</th>
                            <th>TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($x=1; $x < 6 ; $x++) @php if ($x==1) { $anno="1ER AÑO" ; } if ($x==2) { $anno="2DO AÑO" ;
                            } if ($x==3) { $anno="3ER AÑO" ; } if ($x==4) { $anno="4TO AÑO" ; } if ($x==5) {
                            $anno="5TO AÑO" ; } @endphp <tr>
                            <td class="texto_anno">{{$anno}}</td>
                            <td style="color: red">{{$total[$x][1]}}</td>
                            <td style="color:blue">{{$total[$x][2]}}</td>
                            <td>{{$totalsexo[$x]}}</td>
                            </tr>
                            @endfor
                    </tbody>
                    <tfoot class="text-white bg-primary">
                        <tr >
                            <td>TOTAL:</td>
                            <td style=" color: red">{{$totalf}}</td>
                            <td style="color:blue">{{$totalm}}</td>
                            <td>{{$totaltotal}}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
{!! Html::script('js/jquery-3.3.1.js') !!}
@endsection
