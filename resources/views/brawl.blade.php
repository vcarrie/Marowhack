@extends('template.master')


@section('title', 'Holy Grail Brawl')





@section('main')
    <div class="row-fluid">
        <div class="col-md-2"></div>


        <div class="col-md-8">

            <div class="row-fluid">

                <div class="col-md-5" id="player1">
                    <div id="player_1_name" class="name_brawl">{{ $players[0]->getName() }}</div><br>
                    <div class="col-md-8">
                        HP: <br>
                        <progress class="progress_brawl" id="player_1_hp" value="{{ $players[0]->getHp() }}" max="{{ $players[0]->getMaxHp() }}"></progress><br>
                        @if($players[0]->getFateChar())
                            NP: <br>

                            <progress class="progress_brawl" id="player_1_npg" value="{{ $players[0]->getNoblePhantasmGauge() }}" max="100"></progress><br>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <div class="portrait_brawl"><img id="portrait_player1" src="{{ $players[0]->getPortrait() }}" alt=""></div>
                    </div>


                    <div class="row-fluid" id="actionsP1">

                        <div class="col-md-8">
                            @for($i=0;$i<count($players[0]->getAttackList());$i++)
                                <button class="btn btn-primary" style="width: 50%;" onclick="attack(1, {{ $i+1 }})">{{ $players[0]->getAttackList()[$i] }}</button>
                                <br><br>
                            @endfor
                        </div>


                        <div class="col-md-4">
                            @if($players[0]->getFateChar())

                                @if($players[0]->getNoblePhantasmGauge()<100)
                                    <button id="player1_np" class="btn btn-primary" style="width: 100%;" onclick="animate_np(1)" disabled="true">{{ $players[0]->getNpName() }}</button>
                                @else
                                    <button id="player1_np" class="btn btn-primary" style="width: 100%;" onclick="animate_np(1)">{{ $players[0]->getNpName() }}</button>
                                @endif
                            @endif
                        </div>

                    </div>


                    <div class="row-fluid" id="state_player1" style="display: none">
                        <img src="../../images/brawl/stunned_small.png" alt="" style="text-align: right;padding-top: 5%;padding-left: 10%;">
                    </div>


                </div>

                <div class="col-md-2"></div>

                <div class="col-md-5" id="player2">
                    <div id="player_2_name" class="name_brawl">{{ $players[1]->getName() }}</div><br>
                    <div class="col-md-8">
                        HP: <br>
                        <progress class="progress_brawl" id="player_2_hp" value="{{ $players[1]->getHp() }}" max="{{ $players[1]->getMaxHp() }}"></progress><br>

                        @if($players[1]->getFateChar())
                            NP: <br>
                            <progress class="progress_brawl" id="player_2_npg" value="{{ $players[1]->getNoblePhantasmGauge() }}" max="100"></progress><br>
                        @endif
                    </div>
                    <div class="col-md-4">
                        <div class="portrait_brawl"><img id="portrait_player2" src="{{ $players[1]->getPortrait() }}" alt=""></div>

                    </div>

                    <div class="row-fluid" id="actionsP2">

                        <div class="col-md-8">
                            @for($i=0;$i<count($players[1]->getAttackList());$i++)
                                <button class="btn btn-primary" style="width: 50%;" onclick="attack(2, {{ $i+1 }})">{{ $players[1]->getAttackList()[$i] }}</button>
                                <br><br>
                            @endfor
                        </div>

                        <div class="col-md-4">
                            @if($players[1]->getFateChar())
                                @if($players[1]->getNoblePhantasmGauge()<100)
                                    <button id="player2_np" class="btn btn-primary" style="width: 100%;" onclick="animate_np(2)" disabled="true">{{ $players[1]->getNpName() }}</button>
                                @else
                                    <button id="player2_np" class="btn btn-primary" style="width: 100%;" onclick="animate_np(2)">{{ $players[1]->getNpName() }}</button>
                                @endif
                            @endif
                        </div>
                    </div>

                    <div class="row-fluid" id="state_player2" style="display: none">
                            <img src="../../images/brawl/stunned_small.png" alt="" style="text-align: right;padding-top: 5%;padding-left: 10%;">
                    </div>
                </div>

                <div class="col-md-5" id="victory" style="display: none">
                    <div id="player_2_name" class="name_brawl">Victory</div><br>
                    <div class="row-fluid" style="text-align: center">

                        <form action="/replay">
                            <button id="start_game" class="btn btn-primary" style="padding: 5% 10% 5% 10%;font-size: 18px;font-weight: bold;background-color: #646464;border-color: #646464" type="submit">
                                Play again
                            </button>
                        </form>
                    </div>

                </div>


            </div>


        </div>


        <div class="col-md-2"></div>

    </div>

@endsection