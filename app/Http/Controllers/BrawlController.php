<?php
/**
 * Created by PhpStorm.
 * User: valentin
 * Date: 02/02/18
 * Time: 13:09
 */

namespace App\Http\Controllers;


use App\characters\fate\archer;
use App\characters\fate\fate_char;
use App\characters\fate\gilgamesh;
use App\characters\fate\saber;
use App\characters\witcher\ciri;
use App\characters\witcher\geralt;
use App\characters\witcher\Triss;
use App\characters\witcher\witcher_char;
use Illuminate\Http\Request;

class BrawlController
{

    public function brawl(Request $request)
    {


        $player1 = session('player1');
        $player2 = session('player2');

        $players = array($player1, $player2);

        session(['player1' => $player1]);

        session(['player2' => $player2]);

        return view('brawl', compact('players', $players));
    }

    public function choice()
    {

        $characters = array();
        $characters[] = new archer();
        $characters[] = new saber();
        $characters[] = new gilgamesh();
        $characters[] = new geralt();
        $characters[] = new ciri();
        $characters[] = new Triss();


        return (view('choice', compact('characters', $characters)));
    }

    public function flush(Request $request)
    {

        $request->session()->flush();


        return redirect()->route('homepage');
    }

    public function createplayer($idp, $idchar)
    {

        switch ($idchar) {
            case 0:
                $player = new archer();
                break;
            case 1:
                $player = new saber();
                break;
            case 2:
                $player = new gilgamesh();
                break;
            case 3:
                $player = new geralt();
                break;
            case 4:
                $player = new ciri();
                break;
            case 5:
                $player = new Triss();
                break;
            default:
                $player = new archer();
                break;
        }

        session(['player' . $idp => $player]);
        $player = json_encode($player);
        return $player;
    }

    public function attack($idp, $ida)
    {


        $player = session('player' . $idp);
        $target = session('player' . (3 - $idp));
        $player->attack($ida, $target);

        session(['player' . $idp => $player]);

        session(['player' . (3 - $idp) => $target]);


        $player1 = session('player1');
        $player2 = session('player2');


        $player1_array = array();
        $player1_array['hp'] = $player1->getHp();

        $player2_array = array();
        $player2_array['hp'] = $player2->getHp();


        $players = array($player1_array, $player2_array);
        $players = json_encode($players);
        return $players;
    }

    public function noblephantasm($idp)
    {
        $player = session('player' . $idp);
        $foe = session('player' . (3 - $idp));

        $player->execNp($player, $foe);


        session(['player' . $idp => $player]);

        session(['player' . (3 - $idp) => $foe]);

        $player1 = session('player1');
        $player2 = session('player2');


        $player1_array = array();
        $player1_array['hp'] = $player1->getHp();
        if ($player1 instanceof fate_char) {
            $player1_array['npg'] = $player1->getNoblePhantasmGauge();
        } else {
            $player1_array['npg'] = 0;

        }


        $player2_array = array();
        $player2_array['hp'] = $player2->getHp();
        if ($player2 instanceof fate_char) {
            $player2_array['npg'] = $player2->getNoblePhantasmGauge();
        } else {
            $player2_array['npg'] = 0;

        }


        $players = array($player1_array, $player2_array);
        $players = json_encode($players);
        return $players;

    }

    public function return_info_player_np($idp)
    {
        $player = session('player' . $idp);

        $player_array = array();

        $player_array['np_model_1'] = $player->getNpPortrait1Path();
        $player_array['np_model_2'] = $player->getNpPortrait2Path();
        $player_array['portrait'] = $player->getPortrait();


        $players = json_encode($player_array);
        return $players;

    }

    public function newturn($idp)
    {

        $player = session('player' . $idp);
        $foe = session('player' . (3 - $idp));


        $stunned = false;
        if ($player->getStunnedTurns() !== 0) {
            $stunned = true;
            $player->setStunnedTurns($player->getStunnedTurns() - 1);
        }

        if ($player->getShieldTurns() > 0) {
            $player->setShieldTurns($player->getShieldTurns() - 1);
        } else {
            $player->setShield(0);
        }



        if ($player instanceof fate_char) {
            $player->setNoblePhantasmGauge($player->getNoblePhantasmGauge() + 20);
        }

        if ($player instanceof geralt) {
            $player->setHp($player->getHp() + 5);
        }

        if ($player instanceof Triss) {
            $player->setDamageBoost(0);
            $player->setEvade(false);

            $rand = rand(1, 4);
            switch ($rand) {
                case 1:
                    if ($player->getMaxHp() >= $player->getHp() + 20) {
                        $player->setHp($player->getHp() + 20);
                    } else {
                        $player->setHp($player->getMaxHp());
                    }
                    break;
                case 2:
                    $player->setShield(20);
                    $player->setShieldTurns(1);
                    break;
                case 3:
                    $player->setDamageBoost(15);
                    break;
                case 4;
                    $player->setEvade(true);
                    break;
                default:
                    break;
            }
        }

        if ($player instanceof ciri) {

            $rand = rand(1, 4);
            if ($rand === 4) {
                if ($player->getMaxHp() >= $player->getHp() + 20) {
                    $player->setHp($player->getHp() + 20);
                } else {
                    $player->setHp($player->getMaxHp());
                }
            }
        }

        if ($player instanceof archer) {
            $player->evade_start_turn();
        }


        session(['player' . $idp => $player]);

        session(['player' . (3 - $idp) => $foe]);

        $player1 = session('player1');
        $player2 = session('player2');


        $player1_array = array();
        $player1_array['hp'] = $player1->getHp();
        if ($player1 instanceof fate_char) {
            $player1_array['npg'] = $player1->getNoblePhantasmGauge();
        } else {
            $player1_array['npg'] = 0;

        }

        $player2_array = array();
        $player2_array['hp'] = $player2->getHp();
        if ($player2 instanceof fate_char) {
            $player2_array['npg'] = $player2->getNoblePhantasmGauge();
        } else {
            $player2_array['npg'] = 0;

        }


        if ($stunned) {
            $players = array($stunned);
        } else {
            $players = array($player1_array, $player2_array);
        }

        if ($player1->getHp() <= 0) {
            $players = array('player1');
        }

        if ($player2->getHp() <= 0) {
            $players = array('player2');
        }
        $players = json_encode($players);
        return $players;
    }


    public function replay(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('choice');
    }

    public function conclude($num_winner)
    {
        return redirect()->route('win', ['idp' => $num_winner]);
    }
}