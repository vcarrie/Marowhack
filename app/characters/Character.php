<?php
/**
 * Created by PhpStorm.
 * User: valentin
 * Date: 02/02/18
 * Time: 12:22
 */

namespace App\characters;


class Character
{
    protected $hp;
    protected $max_hp;
    protected $evade;
    protected $name;
    protected $portrait;
    protected $portrait_mini;
    protected $attackList;
    protected $fate_char = false;
    protected $stunned_turns;
    protected $shield;
    protected $shield_turns;

    /**
     * @return mixed
     */
    public function getShieldTurns()
    {
        return $this->shield_turns;
    }

    /**
     * @param mixed $shield_turns
     */
    public function setShieldTurns($shield_turns)
    {
        $this->shield_turns = $shield_turns;
    }


    protected function calculate_damage($original, $foe){
        $value = $original - $foe->getShield();
        if($value<0){
            $value = 0;
        }

        if ($foe->getEvade()){
            $value = 0;
        }
        return $value;
    }

    /**
     * @return mixed
     */
    public function getHp()
    {
        return $this->hp;
    }

    /**
     * @param mixed $hp
     */
    public function setHp($hp)
    {
        $this->hp = $hp;
    }

    /**
     * @return mixed
     */
    public function getEvade()
    {
        return $this->evade;
    }

    /**
     * @param mixed $evade
     */
    public function setEvade($evade)
    {
        $this->evade = $evade;
    }


    public function __construct(){
        $this->stunned_turns = 0;
        $this->shield = 0;
        $this->evade = false;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getPortrait()
    {
        return $this->portrait;
    }

    /**
     * @param mixed $portrait
     */
    public function setPortrait($portrait)
    {
        $this->portrait = $portrait;
    }

    /**
     * @return mixed
     */
    public function getAttackList()
    {
        return $this->attackList;
    }

    /**
     * @param mixed $attackList
     */
    public function setAttackList($attackList)
    {
        $this->attackList = $attackList;
    }

    /**
     * @return mixed
     */
    public function getMaxHp()
    {
        return $this->max_hp;
    }

    /**
     * @param mixed $max_hp
     */
    public function setMaxHp($max_hp)
    {
        $this->max_hp = $max_hp;
    }

    /**
     * @return mixed
     */
    public function getPortraitMini()
    {
        return $this->portrait_mini;
    }

    /**
     * @param mixed $portrait_mini
     */
    public function setPortraitMini($portrait_mini)
    {
        $this->portrait_mini = $portrait_mini;
    }

    /**
     * @return mixed
     */
    public function getFateChar()
    {
        return $this->fate_char;
    }

    /**
     * @param mixed $fate_char
     */
    public function setFateChar($fate_char)
    {
        $this->fate_char = $fate_char;
    }

    /**
     * @return int
     */
    public function getStunnedTurns(): int
    {
        return $this->stunned_turns;
    }

    /**
     * @param int $stunned_turns
     */
    public function setStunnedTurns(int $stunned_turns)
    {
        $this->stunned_turns = $stunned_turns;
    }



    /**
     * @return int
     */
    public function getShield(): int
    {
        return $this->shield;
    }

    /**
     * @param int $shield
     */
    public function setShield(int $shield)
    {
        $this->shield = $shield;
    }

}