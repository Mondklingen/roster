<?php

namespace cms\system\rooster;


/**
 * Class RoosterObject
 *
 * Basic Implementation of an Array Object Object with
 * Method Adapter
 *
 * @package cms\system\rooster
 */
class RoosterObject implements \ArrayAccess
{
    /**
     * @var Inflector
     */
    protected $inflector;
    /**
     * @var array
     */
    protected $data;

    /**
     * Creates a Member
     *
     * A Single Wow Member
     *
     * @param array $data
     *
     * @link http://dev.battle.net
     */
    function __construct(array $data)
    {
        $this->data = $data;
        $inflector = new Inflector();
        $this->inflector = $inflector;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Whether a offset exists
     * @link http://php.net/manual/en/arrayaccess.offsetexists.php
     * @param mixed $offset <p>
     * An offset to check for.
     * </p>
     * @return boolean true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     */
    public function offsetExists($offset)
    {
        $offsetSet = isset($this->data[$offset]);

        $methodExists = method_exists(
            $this,
            $this->getMethodNameForOffset($offset)
        );

        return $offsetSet || $methodExists;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Offset to retrieve
     * @link http://php.net/manual/en/arrayaccess.offsetget.php
     * @param mixed $offset <p>
     * The offset to retrieve.
     * </p>
     * @return mixed Can return all value types.
     */
    public function offsetGet($offset)
    {
        $offsetSet = isset($this->data[$offset]);
        if ($offsetSet) {
            return $this->data[$offset];
        }

        $methodName = lcfirst($offset);
        $methodExists = method_exists(
            $this,
            $methodName
        );
        if ($methodExists) {
            return $this->$methodName();
        }

        $methodName = $this->getMethodNameForOffset($offset);
        $methodExists = method_exists(
            $this,
            $methodName
        );
        if ($methodExists) {
            return $this->$methodName();
        }
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Offset to set
     * @link http://php.net/manual/en/arrayaccess.offsetset.php
     * @param mixed $offset <p>
     * The offset to assign the value to.
     * </p>
     * @param mixed $value <p>
     * The value to set.
     * </p>
     * @return RoosterMember
     * @throws \Exception
     */
    public function offsetSet($offset, $value)
    {
        $offsetSet = isset($this->data[$offset]);
        if ($offsetSet) {
            $this->data[$offset] = $value;
            return $this;
        }
        $methodName = $this->setMethodNameForOffset($offset);
        $methodExists = method_exists(
            $this,
            $methodName
        );
        if ($methodExists) {
            $this->$methodName($value);
            return $this;
        }

        throw new \Exception("Method or Offset '$offset' not Found.");
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Offset to unset
     * @link http://php.net/manual/en/arrayaccess.offsetunset.php
     * @param mixed $offset <p>
     * The offset to unset.
     * </p>
     * @return RoosterMember
     * @throws \Exception
     */
    public function offsetUnset($offset)
    {
        $offsetSet = isset($this->data[$offset]);
        if ($offsetSet) {
            unset($this->data[$offset]);
            return $this;
        }
        $methodName = $this->getMethodNameForOffset($offset);
        $methodExists = method_exists(
            $this,
            $methodName
        );
        if ($methodExists) {
            $this->$methodName(null);
            return $this;
        }
        throw new \Exception("Method or Offset '$offset' not Found.");
    }

    /**
     * Convertes Offset to Method Name
     *
     * @param $offset
     * @return string
     */
    protected function getMethodNameForOffset($offset)
    {
        return 'get' . ucfirst($this->inflector->camelize($offset));
    }

    /**
     * Convertes Offset to Method Name
     *
     * @param $offset
     * @return string
     */
    protected function setMethodNameForOffset($offset)
    {
        return 'set' . ucfirst($this->inflector->camelize($offset));
    }
}