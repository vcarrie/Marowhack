@extends('template.master')


@section('title', 'Holy Grail Brawl')





@section('main')
    <div class="row-fluid">
        <div class="col-md-2"></div>


        <div class="col-md-4">
            <table width="100%">
                <th style="text-align: center;font-size: 18px;padding: 4%" colspan="4">Player 1</th>
                @for($i=0;$i<count($characters)+(count($characters)%4);$i++)
                    @if($i%4==0)
                        <tr>
                            @endif

                            @if(isset($characters[$i]))
                                <td width="25%" class="td_choice_brawl">
                                    <img class="img_choice_player1" onclick="select_player1(this, {{ $i }}, 1)"
                                         src="{{ $characters[$i]->getPortraitMini() }}" alt=""><br>
                                    {{ $characters[$i]->getName() }}
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

        <div class="col-md-4">
            <table width="100%">
                <th style="text-align: center;font-size: 18px;padding: 4%" colspan="4">Player 2</th>
                @for($i=0;$i<count($characters)+(count($characters)%4);$i++)
                    @if($i%4==0)
                        <tr>
                            @endif

                            @if(isset($characters[$i]))
                                <td width="25%" class="td_choice_brawl">
                                    <img class="img_choice_player2" onclick="select_player2(this, {{ $i }}, 2)"
                                         src="{{ $characters[$i]->getPortraitMini() }}" alt=""><br>
                                    {{ $characters[$i]->getName() }}
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


        <div class="col-md-2"></div>


        <div class="row-fluid">
            <div class="col-md-5"></div>
            <div class="col-md-2" style="text-align: center;margin-top: 15%">


                <form action="/brawl">
                    <button disabled="true" id="start_game" class="btn btn-primary"
                            style="padding: 5% 10% 5% 10%;font-size: 18px;font-weight: bold;background-color: #646464;border-color: #646464"
                            type="submit">
                        Start
                    </button>
                </form>

            </div>
            <div class="col-md-5"></div>

        </div>

    </div>

@endsection