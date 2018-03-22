<?php
/**
 * Created by PhpStorm.
 * User: valentin
 * Date: 02/02/18
 * Time: 12:42
 */

namespace App\characters\fate;



class archer extends fate_char
{



    public function __construct(){
        parent::__construct();
        $this->hp = 100;
        $this->max_hp = 100;
        $this->name = "Archer";
        $this->portrait = "../../../images/brawl/archer_portrait.png";
        $this->portrait_mini = "../../../images/brawl/mini_archer_portrait.png";
        $this->np_portrait_1_path = "../../../images/brawl/archer_np_1_portrait.png";
        $this->np_portrait_2_path = "../../../images/brawl/archer_np_2_portrait.png";
        $this->attackList = array('Slash', 'Caladbolg');
        $this->np_name = "UBW";
    }

    public function attack($num_attack, $foe){
        switch ($num_attack){
            case 1:
                $this->slash($foe);
                break;
            case 2:
                $this->caladbolg($foe);
                break;
            default:
                $this->slash($foe);
                break;
        }
    }

    public function execNp($player, $foe){
        $this->Unlimited_Blade_Works($foe);
    }

    public function Unlimited_Blade_Works($foe){
        $foe->setHp($foe->getHp()-40);
        $this->noble_phantasm_gauge = 0;
        $this->shield_turns = 1;
        $this->shield = 10;
    }

    public function slash($foe){
        $rand = rand(1, 5);
        if ($rand===5){
            $foe->setHp($foe->getHp()-$this->calculate_damage(40, $foe));
        }else{
            $foe->setHp($foe->getHp()-$this->calculate_damage(10, $foe));
        }
    }

    public function caladbolg($foe){
        $foe->setHp($foe->getHp()-$this->calculate_damage(20, $foe));
    }

    public function evade_start_turn(){
        $rand = rand(1, 3);
        if ($rand===3){
            $this->evade = true;
        }else{
            $this->evade = false;
        }
    }

}