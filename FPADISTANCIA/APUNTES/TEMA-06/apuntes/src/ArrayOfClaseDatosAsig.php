<?php

namespace Clases;

class ArrayOfClaseDatosAsig
{

    /**
     * @var ClaseDatosAsig[] $ClaseDatosAsig
     */
    protected $ClaseDatosAsig = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return ClaseDatosAsig[]
     */
    public function getClaseDatosAsig()
    {
      return $this->ClaseDatosAsig;
    }

    /**
     * @param ClaseDatosAsig[] $ClaseDatosAsig
     * @return \Clases\ArrayOfClaseDatosAsig
     */
    public function setClaseDatosAsig(array $ClaseDatosAsig = null)
    {
      $this->ClaseDatosAsig = $ClaseDatosAsig;
      return $this;
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset An offset to check for
     * @return boolean true on success or false on failure
     */
    public function offsetExists($offset)
    {
      return isset($this->ClaseDatosAsig[$offset]);
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to retrieve
     * @return ClaseDatosAsig
     */
    public function offsetGet($offset)
    {
      return $this->ClaseDatosAsig[$offset];
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to assign the value to
     * @param ClaseDatosAsig $value The value to set
     * @return void
     */
    public function offsetSet($offset, $value)
    {
      if (!isset($offset)) {
        $this->ClaseDatosAsig[] = $value;
      } else {
        $this->ClaseDatosAsig[$offset] = $value;
      }
    }

    /**
     * ArrayAccess implementation
     *
     * @param mixed $offset The offset to unset
     * @return void
     */
    public function offsetUnset($offset)
    {
      unset($this->ClaseDatosAsig[$offset]);
    }

    /**
     * Iterator implementation
     *
     * @return ClaseDatosAsig Return the current element
     */
    public function current()
    {
      return current($this->ClaseDatosAsig);
    }

    /**
     * Iterator implementation
     * Move forward to next element
     *
     * @return void
     */
    public function next()
    {
      next($this->ClaseDatosAsig);
    }

    /**
     * Iterator implementation
     *
     * @return string|null Return the key of the current element or null
     */
    public function key()
    {
      return key($this->ClaseDatosAsig);
    }

    /**
     * Iterator implementation
     *
     * @return boolean Return the validity of the current position
     */
    public function valid()
    {
      return $this->key() !== null;
    }

    /**
     * Iterator implementation
     * Rewind the Iterator to the first element
     *
     * @return void
     */
    public function rewind()
    {
      reset($this->ClaseDatosAsig);
    }

    /**
     * Countable implementation
     *
     * @return ClaseDatosAsig Return count of elements
     */
    public function count()
    {
      return count($this->ClaseDatosAsig);
    }

}
