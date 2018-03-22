@extends('template.master')


@section('title', 'Home')

@section('main')
    <div class="row-fluid">
        <div class="col-md-4"></div>


        <div class="col-md-4">
            <table width="100%">
                <th style="text-align: center;font-size: 18px;padding: 4%" colspan="4">Links</th>
                @for($i=0;$i<count($array_real)+(count($array_real)%4);$i++)
                    @if($i%4==0)
                        <tr>
                            @endif

                            @if(isset($array_real[$i]))
                                <td width="25%" class="td_choice_brawl">
                                    <a href="{{ $array_real[$i][1] }}">
                                        <img class="img_choice_player1" src="{{ $array_real[$i][2] }}" alt="">
                                    </a>
                                    <br>
                                    {{ $array_real[$i][0] }}
                                </td>
                            @else
                                <td width="25%" class="td_choice_brawl">

                                </td>

                            @endif

                            @if($i%4==3)
                        </tr>
                    @endif
                @endfor


            </table>

        </div>


        <div class="col-md-4"></div>


    </div>


@endsection