@extends('adminlte::page')
<!-- Dynamic Table Full -->
<div class="block">
        <div class="block-content">
            <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/tables_datatables.js -->
                <div>
                    <table border="1">
                        <thead style="color:crimson">
                        <TR>
                            <TD>ID</TD>
                            <td>Folio</td>
                            <td>Marca</td>
                            <td>Modelo</td>
                            <td>fecha Solicitud</td>
                            <td>Empresa</td>
                            <td>Sucursal</td>
                            <td>Usuario Final</td>
                            <td>Departamento / Área</td>
                            <td>Cantidad</td>
                        </TR>
                        </thead>
                        @foreach ($soli as $solicitud)
                        <tbody>
                        <TD>{{$solicitud->id}}</TD>
                            <td>{{$solicitud->FOLIO_REQUISICIÓN}}</td>
                            <td>{{$solicitud->MARCA}}</td>
                            <td>{{$solicitud->MODELO}}</td>
                            @if($solicitud->created_at != 'Null')
                                <td>{{$solicitud->created_at}}</td>
                                @else
                                <td>sin fecha</td>
                            @endif
                            <td>{{$solicitud->EMPRESA}}</td>
                            <td>{{$solicitud->SUCURSAL}}</td>
                            <td>{{$solicitud->USUARIO_FINAL}}</td>
                            <td>{{$solicitud->DEPARTAMENTO_AREA}}</td>
                            <td>{{$solicitud->CANTIDAD}}</td>
                        </tbody>
                        @endforeach
                    </table>
                </div>
        </div>
        <!-- END Dynamic Table Full -->