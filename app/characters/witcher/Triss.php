<?php
/**
 * Created by PhpStorm.
 * User: valentin
 * Date: 07/02/18
 * Time: 13:59
 */

namespace App\characters\witcher;


class Triss extends witcher_char
{

    protected $damage_boost;

    public function __construct()
    {
        parent::__construct();
        $this->hp = 100;
        $this->max_hp = 100;
        $this->name = "Triss";
        $this->portrait = "../../../images/brawl/triss_portrait.png";
        $this->portrait_mini = "../../../images/brawl/mini_triss_portrait.png";
        $this->attackList = array('Fireball', 'Flash', 'Fire Barrage');
        $this->damage_boost = 0;
    }

    public function attack($num_attack, $foe)
    {
        switch ($num_attack) {
            case 1:
                $this->fireball($foe);
                break;
            case 2:
                $this->flash($foe);
                break;
            case 3:
                $this->fire_barrage($foe);
                break;
            default:
                $this->fireball($foe);
                break;
        }
    }


    public function fireball($foe)
    {
        $rand = rand(1, 8);
        if ($rand === 8) {
            $foe->setHp($foe->getHp() - $this->calculate_damage(50 + $this->damage_boost, $foe));
        } else {
            $foe->setHp($foe->getHp() - $this->calculate_damage(20 + $this->damage_boost, $foe));
        }
    }

    public function flash($foe)
    {
        $rand = rand(1, 2);
        if ($rand === 2) {
            $foe->setStunnedTurns($foe->getStunnedTurns()+2);
        }
    }

    public function fire_barrage($foe)
    {
        $rand = rand(1, 2);
        if ($rand === 2) {
            $foe->setHp($foe->getHp() - $this->calculate_damage(50 + $this->damage_boost, $foe));
        }else{
            $this->hp = $this->hp - 25;
        }
    }

    /**
     * @return mixed
     */
    public function getDamageBoost()
    {
        return $this->damage_boost;
    }

    /**
     * @param mixed $damage_boost
     */
    public function setDamageBoost($damage_boost)
    {
        $this->damage_boost = $damage_boost;
    }

}