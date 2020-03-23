<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="row">

            <h3 class="form-section">Listado Campaña MKT</h3>
            <p>
                <a href="{{ url('/campaniamkt_actualizar') }}">
                    <button class="btn btn-default " type="button"><i class="fa fa-cloud-download"></i> Actualizar TXT
                    </button>
                </a>
            </p>
            <table class="table table-hover table-bordered table-condensed">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Descripción</th>
                    <th>URL</th>
                    <th>Habiltiado</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($campaniasmkt as $camp)
                    @if($camp->camk_eliminado == 0)
                        <tr>
                            <td>{{$camp->camk_codigo}}</td>
                            <td>{{$camp->camk_descripcion}}</td>
                            <td>
                                @if($camp->camk_foto != null)
                                    <a href='{{$camp->camk_url}}' target='_blank'>{{$camp->camk_url}}</a>
                                @else

                                @endif
                            </td>
                            {{--<td>{{date('d/m/Y',strtotime($camp->cam_fecfin))}}</td>--}}
                            <td align="center">
                                @if($camp->camk_estado == 1)
                                    <span class="label label-success label-mini">Habilitado</span>
                                @else
                                    <span class="label label-danger label-mini">Deshabilitado</span>
                                @endif
                            </td>
                            <td align="center">
                                <a href="{{route('campaniamkt.edit',$camp->camk_codigo)}}"
                                   class="btn btn-xs btn-warning"><span
                                            class="fa fa-pencil" aria-hidden="true"></span></a>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-lg-2"></div>
</div>
