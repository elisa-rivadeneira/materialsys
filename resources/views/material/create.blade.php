@extends('adminlte::page')


@section('title', 'Firmas')

@section('css')
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        .select2-selection {
            height: calc(2.25rem + 2px) !important;
        }



        .valida{
            margin-top:-14px ;
            color: red;
            font-size: 11px;
        }

        @media screen and (max-width: 768px) {
            h1{
                font-size:18px;
                font-weight: bold;
            }
        }
    </style>
@stop



@section('content_header')
    <h1>Crear Material</h1>
@stop

@section("content")
    <div class="row">

    </div>
    <form action="/materials" method="post" enctype="multipart/form-data"  class="grabado">
        @csrf
        <div class="row">
            <div class="col-10">
                <h1 class="text-center"> CREACION DE MATERIAL</h1>

                <div class="card">
                    <div class="card-head">
                        <h5 class="text-center">DATOS DEL MATERIAL</h5>

                    </div>
                    <div class="row card-body">
                        <div class="form-group col-xs-12 col-md-12">
                            <label for="">Relationship</label>
                            <input type="text" class="form-control" name="relationship" value="{{ old('relationship') }}">

                            @error('relationship')
                            <br>
                            <div class="valida">*{{ $message }}</div>
                            <br>
                            @enderror
                        </div>

                        <div class="form-group col-xs-12 col-md-12">
                            <label for="">Description</label>
                            <input type="text" class="form-control" name="description" value="{{ old('description') }}">

                            @error('description')
                            <br>
                            <div class="valida">*{{ $message }}</div>
                            <br>
                            @enderror
                        </div>

                        <div class="form-group col-xs-12 col-md-12">
                            <label for="">OTY FM</label>
                            <input type="text" class="form-control" name="oty_fm" value="{{ old('oty_fm') }}">

                            @error('oty_fm')
                            <br>
                            <div class="valida">*{{ $message }}</div>
                            <br>
                            @enderror
                        </div>

                        <div class="form-group col-xs-12 col-md-12">
                            <label for="">E BOM</label>
                            <input type="text" class="form-control" name="e_bom" value="{{ old('e_bom') }}">

                            @error('e_bom')
                            <br>
                            <div class="valida">*{{ $message }}</div>
                            <br>
                            @enderror
                        </div>

                        <div class="form-group col-xs-12 col-md-12">
                            <label for="">FMR</label>
                            <input type="text" class="form-control" name="fmr" value="{{ old('fmr') }}">

                            @error('fmr')
                            <br>
                            <div class="valida">*{{ $message }}</div>
                            <br>
                            @enderror
                        </div>

                        <div class="form-group col-xs-12 col-md-12">
                            <label for="">PT</label>
                            <input type="text" class="form-control" name="pt" value="{{ old('pt') }}">

                            @error('pt')
                            <br>
                            <div class="valida">*{{ $message }}</div>
                            <br>
                            @enderror
                        </div>

                        <div class="form-group col-xs-12 col-md-12">
                            <label for="">UBICACION</label>
                            <select id="ubicacion" name="ubicacion" class="form-control" value="{{ old('ubicacion') }}" >
                                <option value="">UBICACION</option>
                                <option value="EN CAMPO"  {{ old('ubicacion') == "EN CAMPO" ? "selected" : "" }}>EN CAMPO</option>
                                <option value="COMPRAR" {{ old('ubicacion') == "COMPRAR" ? "selected" : "" }}>COMPRAR</option>
                                <option value="X UBICAR" {{ old('ubicacion') == "X UBICAR" ? "selected" : "" }}>X UBICAR</option>
                            </select>


                            @error('ubicacion')
                            <br>
                            <div class="valida">*{{ $message }}</div>
                            <br>
                            @enderror
                        </div>

                        <div class="form-group col-xs-12 col-md-12">
                            <label for="">DESTINO</label>
                            <select id="destino" name="destino" class="form-control" value="{{ old('destino') }}" >
                                <option value="">DESTINO</option>
                                <option value="DREN PLUVIAL"  {{ old('ubicacion') == "DREN PLUVIAL" ? "selected" : "" }}>DREN PLUVIAL</option>
                                <option value="CANALETA PLUVIAL" {{ old('ubicacion') == "CANALETA PLUVIAL" ? "selected" : "" }}>CANALETA PLUVIAL</option>
                                <option value="VISERAS DE PUERTAS" {{ old('ubicacion') == "VISERAS DE PUERTAS" ? "selected" : "" }}>VISERAS DE PUERTAS</option>
                                <option value="REMANTE INTERIOR Y EXTERIOR y UNION TECHO  " {{ old('ubicacion') == "REMANTE INTERIOR Y EXTERIOR y UNION TECHO" ? "selected" : "" }}>REMANTE INTERIOR Y EXTERIOR y UNION TECHO</option>

                            </select>
                            @error('destino')
                            <br>
                            <div class="valida">*{{ $message }}</div>
                            <br>
                            @enderror
                        </div>






                    </div>
                </div>



            </div>






        </div>

        </div>





        <div class="" >



        </div>






        <div class="col-6" style="margin-right: 20%;margin-left: 20%;margin-bottom: 5%;">
            <button type="submit" class="btn btn-success btn-block">Guardar</button>
        </div>

        </div>


    </form>

    <div class="showimages">


    </div>


    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div>{{$error}}</div>
        @endforeach
    @endif

@endsection


@section("js")

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('select').select2();
        });


    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#imagenes').DataTable({
                responsive: true,
                "lengthMenu":[[5,10,20,50,-1], [5,10,20,50,"All"]]
            });

            $('#medicion').DataTable({
                responsive: true,
                "lengthMenu":[[5,10,20,50,-1], [5,10,20,50,"All"]]
            });
        } );
    </script>



    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        $('.grabadjjo').submit(function(e){
            e.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    /* Swal.fire(
                         'Deleted!',
                         'Your file has been deleted.',
                         'success'
                     )*/

                    this.submit();
                }
            })
        });

    </script>

@endsection
