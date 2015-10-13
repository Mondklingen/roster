<?php

namespace cms\system\rooster;

/**
 * Class RoosterCollection
 *
 * Basic Implementation of a Collection with Iterator Interface
 *
 * @package cms\system\rooster
 */
class RoosterCollection extends RoosterObject implements \Iterator
{
    /**
     * List of Rooster Member
     *
     * @var RoosterMember[]
     */
    protected $member;
    /**
     * current Position
     *
     * @var integer
     */
    protected $position;

    /**
     * Constructor of Guild Rank
     */
    public function __construct(array $member)
    {
        $this->position = 0;
        $this->member = $member;
        parent::__construct(array());
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the current element
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     */
    public function current()
    {
        return $this->member[$this->position];
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Move forward to next element
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     */
    public function next()
    {
        $this->position++;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the key of the current element
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     */
    public function key()
    {
        if (!isset($this->member[$this->position])) {
           return null;
        }
        return $this->position;
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Checks if current position is valid
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     */
    public function valid()
    {
        return isset($this->member[$this->position]);
    }

    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Rewind the Iterator to the first element
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     */
    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * Get All Member
     *
     * @return RoosterMember[]
     */
    public function getMember()
    {
        return $this;
    }

    /**
     * Adds a Member
     *
     * @param RoosterMember $member
     *
     * @return $this
     */
    public function addMember(RoosterMember $member)
    {
        $this->member[] = $member;
        return $this;
    }
}