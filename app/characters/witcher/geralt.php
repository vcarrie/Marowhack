<?php
/**
 * Created by PhpStorm.
 * User: valentin
 * Date: 05/02/18
 * Time: 16:48
 */

namespace App\characters\witcher;

class geralt extends witcher_char
{


    public function __construct()
    {
        parent::__construct();
        $this->hp = 150;
        $this->max_hp = 150;
        $this->name = "Geralt";
        $this->portrait = "../../../images/brawl/geralt_portrait.png";
        $this->portrait_mini = "../../../images/brawl/mini_geralt_portrait.png";
        $this->attackList = array('Strike', 'Aard', 'Igni', 'Quen');
    }

    public function attack($num_attack, $foe)
    {
        switch ($num_attack) {
            case 1:
                $this->strike($foe);
                break;
            case 2:
                $this->aard($foe);
                break;
            case 3:
                $this->igni($foe);
                break;
            case 4:
                $this->quen();
                break;
            default:
                $this->strike($foe);
                break;
        }
    }


    public function strike($foe)
    {
        $rand = rand(1, 8);
        if ($rand === 8) {
            $foe->setHp($foe->getHp() - $this->calculate_damage(50, $foe));
        } else {
            $foe->setHp($foe->getHp() - $this->calculate_damage(10, $foe));
        }
    }

    public function aard($foe)
    {
        $rand = rand(1, 3);
        if ($rand === 3) {
            $foe->setHp($foe->getHp() - $this->calculate_damage(5, $foe));
            $foe->setStunnedTurns($foe->getStunnedTurns()+2);
        } else {
            $foe->setHp($foe->getHp() - $this->calculate_damage(5, $foe));
        }
    }

    public function igni($foe)
    {
        $rand = rand(1, 3);
        if ($rand === 3) {
            $foe->setHp($foe->getHp() - $this->calculate_damage(25, $foe));
        }else{
            $this->hp = $this->hp - 10;
        }
    }

    public function quen()
    {
        $this->shield_turns = 2;
        $this->shield = 10;
    }
}