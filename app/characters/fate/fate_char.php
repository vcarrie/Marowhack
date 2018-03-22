<?php

namespace App\characters\fate;


use App\characters\Character;
/**
 * Created by PhpStorm.
 * User: valentin
 * Date: 02/02/18
 * Time: 12:41
 */

class fate_char extends Character
{

    protected $np_name;
    protected $noble_phantasm_gauge;
    protected $np_portrait_1_path;
    protected $np_portrait_2_path;


    /**
     * @return mixed
     */
    public function getNoblePhantasmGauge()
    {
        return $this->noble_phantasm_gauge;
    }

    /**
     * @param mixed $noble_phantasm_gauge
     */
    public function setNoblePhantasmGauge($noble_phantasm_gauge)
    {
        $this->noble_phantasm_gauge = $noble_phantasm_gauge;
    }

    public function __construct(){
        parent::__construct();
        $this->noble_phantasm_gauge = 0;
        $this->fate_char = true;
    }

    /**
     * @return mixed
     */
    public function getNpName()
    {
        return $this->np_name;
    }

    /**
     * @param mixed $np_name
     */
    public function setNpName($np_name)
    {
        $this->np_name = $np_name;
    }

    /**
     * @return mixed
     */
    public function getNpPortrait1Path()
    {
        return $this->np_portrait_1_path;
    }

    /**
     * @param mixed $np_portrait_1_path
     */
    public function setNpPortrait1Path($np_portrait_1_path)
    {
        $this->np_portrait_1_path = $np_portrait_1_path;
    }

    /**
     * @return mixed
     */
    public function getNpPortrait2Path()
    {
        return $this->np_portrait_2_path;
    }

    /**
     * @param mixed $np_portrait_2_path
     */
    public function setNpPortrait2Path($np_portrait_2_path)
    {
        $this->np_portrait_2_path = $np_portrait_2_path;
    }

}