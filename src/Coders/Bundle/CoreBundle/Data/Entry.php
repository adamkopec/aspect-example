<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 05.02.14
 * Time: 23:24
 */

namespace Coders\Bundle\CoreBundle\Data;


class Entry {
    protected $valueA;
    protected $valueB;

    public function __construct(array $values = array()) {
        foreach($values as $key => $value) {
            $methodName = 'set' . ucfirst($key);
            $this->$methodName($value);
        }
    }


    /**
     * @param mixed $valueA
     */
    public function setValueA($valueA)
    {
        $this->valueA = $valueA;
    }

    /**
     * @return mixed
     */
    public function getValueA()
    {
        return $this->valueA;
    }

    /**
     * @param mixed $valueB
     */
    public function setValueB($valueB)
    {
        $this->valueB = $valueB;
    }

    /**
     * @return mixed
     */
    public function getValueB()
    {
        return $this->valueB;
    }

}