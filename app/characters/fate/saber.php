<?php
/**
 * Created by PhpStorm.
 * User: valentin
 * Date: 03/02/18
 * Time: 17:29
 */

namespace App\characters\fate;


class saber extends fate_char
{


    public function __construct(){
        parent::__construct();
        $this->hp = 150;
        $this->max_hp = 150;
        $this->name = "Saber";
        $this->portrait = "../../../images/brawl/saber_portrait.png";
        $this->portrait_mini = "../../../images/brawl/mini_saber_portrait.png";
        $this->np_portrait_1_path = "../../../images/brawl/saber_np_1_portrait.png";
        $this->np_portrait_2_path = "../../../images/brawl/saber_np_2_portrait.png";
        $this->attackList = array('Strike', 'Heavy blow');
        $this->np_name = "Excalibur";
    }

    public function attack($num_attack, $foe){
        switch ($num_attack){
            case 1:
                $this->strike($foe);
                break;
            case 2:
                $this->heavy_blow($foe);
                break;
            default:
                $this->strike($foe);
                break;
        }
    }

    public function execNp($player, $foe){
        $this->Excalibur($foe);
    }

    public function Excalibur($foe){
        $foe->setHp($foe->getHp()-$this->calculate_damage(60, $foe));
        $this->noble_phantasm_gauge = 20;
    }

    public function strike($foe){
        $rand2 = rand(1,5);
        $rand = rand(1, 8);
        if ($rand2===5){
            if ($rand===8){
                $foe->setHp($foe->getHp()-$this->calculate_damage(25+20, $foe));
            }else{
                $foe->setHp($foe->getHp()-$this->calculate_damage(5+20, $foe));
            }
        }else{
            if ($rand===8){
                $foe->setHp($foe->getHp()-$this->calculate_damage(25, $foe));
            }else{
                $foe->setHp($foe->getHp()-$this->calculate_damage(5, $foe));
            }
        }

    }

    public function heavy_blow($foe){
        $alea = rand(1, 5);
        if ($alea===5) {
            $foe->setHp($foe->getHp() - $this->calculate_damage(20+20, $foe));
        }else{
            $foe->setHp($foe->getHp() - $this->calculate_damage(20, $foe));

        }
    }

}