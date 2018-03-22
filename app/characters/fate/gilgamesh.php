<?php
/**
 * Created by PhpStorm.
 * User: valentin
 * Date: 07/02/18
 * Time: 14:38
 */

namespace App\characters\fate;


class gilgamesh extends fate_char
{

    public function __construct(){
        parent::__construct();
        $this->hp = 130;
        $this->max_hp = 130;
        $this->name = "Gilgamesh";
        $this->portrait = "../../../images/brawl/gilgamesh_portrait.png";
        $this->portrait_mini = "../../../images/brawl/mini_gilgamesh_portrait.png";
        $this->np_portrait_1_path = "../../../images/brawl/gilgamesh_np_1_portrait.png";
        $this->np_portrait_2_path = "../../../images/brawl/gilgamesh_np_2_portrait.png";
        $this->attackList = array('Sword throw', 'Chains of heaven');
        $this->np_name = "Enuma Elish";
    }

    public function attack($num_attack, $foe){
        switch ($num_attack){
            case 1:
                $this->swordThrow($foe);
                break;
            case 2:
                $this->chains_of_heaven($foe);
                break;
            default:
                $this->swordThrow($foe);
                break;
        }
    }

    public function execNp($player, $foe){
        $this->Enuma_Elish($foe);
    }

    public function Enuma_Elish($foe){
        $foe->setHp($foe->getHp()-$this->calculate_damage(60, $foe));
        $this->noble_phantasm_gauge = 0;

    }

    public function swordThrow($foe){
        $rand = rand(1, 10);
            if ($rand===10){
                $foe->setHp($foe->getHp()-$this->calculate_damage(40, $foe));
            }else{
                $foe->setHp($foe->getHp()-$this->calculate_damage(15, $foe));
            }
    }

    public function chains_of_heaven($foe){
        $rand = rand(1, 5);
        if ($rand === 5) {
            $foe->setHp($foe->getHp() - $this->calculate_damage(10, $foe));
            $foe->setStunnedTurns($foe->getStunnedTurns()+1);
        } else {
            $foe->setHp($foe->getHp() - $this->calculate_damage(10, $foe));
        }
    }

}