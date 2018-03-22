<?php
/**
 * Created by PhpStorm.
 * User: valentin
 * Date: 07/02/18
 * Time: 11:08
 */

namespace App\characters\witcher;


class ciri extends witcher_char
{
    public function __construct()
    {
        parent::__construct();
        $this->hp = 120;
        $this->max_hp = 120;
        $this->name = "Ciri";
        $this->portrait = "../../../images/brawl/ciri_portrait.png";
        $this->portrait_mini = "../../../images/brawl/mini_ciri_portrait.png";
        $this->attackList = array('Zirael', 'Space jump', 'Igni');
    }

    public function attack($num_attack, $foe)
    {
        switch ($num_attack) {
            case 1:
                $this->zirael($foe);
                break;
            case 2:
                $this->space_jump();
                break;
            case 3:
                $this->igni($foe);
                break;
            default:
                $this->zirael($foe);
                break;
        }
    }


    public function zirael($foe)
    {
        $rand = rand(1, 4);
        if ($rand === 4) {
            $foe->setHp($foe->getHp() - $this->calculate_damage(30, $foe));
        } else {
            $foe->setHp($foe->getHp() - $this->calculate_damage(20, $foe));
        }
    }

    public function space_jump()
    {
        $this->shield_turns = 1;
        $this->shield = 20;
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

}