@foreach($arrayTipus_Treballs as $tipus_treball)
    <div style="margin:auto">
        <table class="table" style="text-align:center">
            <tr>
                <th colspan="2" style="text-align:center">{{$tipus_treball->nom}}</th>
            </tr>
            @foreach($arrayTreballs as $treball)
                @if($treball['id_tipus_treball']== $tipus_treball['id'])
                    @if($treball['id_rol'] <= 2 && Auth::user()->id_rol <= 2)
                        @if($treball['urgencia']== 3)
                            <tr style="background-color:#fba550">
                        @elseif($treball['urgencia']== 2)
                            <tr style="background-color:#ffec75">
                        @else
                            <tr>
                        @endif
                            <td><a class="btn" href="{{ url('/treballs/show/'.$treball->id) }}">{{ $treball->resum}}</a></td>
                            <td>
                            @if(Auth::user()->id_rol == 1 || Auth::user()->id_rol == 2)
                                <form action="" method="POST" style="display:inline; float:right; margin-right:5px;">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger" style="display:inline">
                                        X
                                    </button>
                                </form>
                            @endif
                            </td>
                        </tr>
                    @elseif($treball['id_rol'] == 3)
                        @if($treball['urgencia']== 3)
                            <tr style="background-color:#fba550">
                        @elseif($treball['urgencia']== 2)
                            <tr style="background-color:#ffec75">
                        @else
                            <tr>
                        @endif
                            <td><a class="btn" href="{{ url('/treballs/show/'.$treball->id) }}">{{ $treball->resum}}</a></td>
                            <td>
                            @if(Auth::user()->id_rol == 1 || Auth::user()->id_rol == 2)
                                <form action="" method="POST" style="display:inline; float:right; margin-right:5px;">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button type="submit" class="btn btn-danger" style="display:inline">
                                        X
                                    </button>
                                </form>
                            @endif
                            </td>
                        </tr>
                    @endif
                @endif
            @endforeach
        </table>
    </div>
@endforeach