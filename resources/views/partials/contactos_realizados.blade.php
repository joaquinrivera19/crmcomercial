<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <div class="titulo_show">Contactos Realizados</div>

            <div class="panel-body">
                <table class="table table-hover table-bordered table-condensed">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Fecha</th>
                        <th>Modo Contacto</th>
                        <th>Tipo Contacto</th>
                        <th>Estado</th>
                        <th>Usuario</th>
                        <th>Modali Contacto</th>
                        <th>Detalle Contacto</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($contactos as $key=>$contacto)
                        <tr>
                            <th>{{$key+1}}</th>
                            <td><span class="label label-default">{{$contacto->coc_fecha}}</span></td>
                            <td>{{$contacto->modoContac->mod_nombre}}</td>
                            <td>{{$contacto->tipoContac->tco_nombre}}</td>
                            <td><span class="label label-info">{{$contacto->estado->epr_nombre}}</span></td>
                            <td>{{$contacto->coc_usuario}}</td>
                            <td>{{$contacto->modContacto->mco_nombre}}</td>
                            <td>{{$contacto->coc_detallecont}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
</div>
