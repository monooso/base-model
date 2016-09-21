<?php namespace Monooso\BaseModel;

abstract class Model
{
    /**
     * Constructor.
     *
     * @param Array $props An optional associative array of property values.
     */
    public function __construct(array $props = [])
    {
        foreach ($props as $prop => $value) {
            $this->__set($prop, $value);
        }
    }

    /**
     * Returns the specified property.
     *
     * @param string $prop
     *
     * @throws UnknownPropertyException
     */
    public function __get($prop)
    {
        $method = 'get' . ucfirst($prop);

        if (method_exists($this, $method)) {
            return $this->$method();
        }

        if (property_exists($this, $prop)) {
            return $this->$prop;
        }

        $this->raiseUnknownPropertyException($prop);
    }

    /**
     * Sets the specified property to the given value.
     *
     * @param string $prop
     * @param mixed  $value
     *
     * @throws UnknownPropertyException
     */
    public function __set($prop, $value)
    {
        $method = 'set' . ucfirst($prop);

        if (method_exists($this, $method)) {
            $this->$method($value);
            return;
        }

        if (property_exists($this, $prop)) {
            $this->$prop = $value;
            return;
        }

        $this->raiseUnknownPropertyException($prop);
    }

    /**
     * Raises an "UnknownPropertyException" for the given property.
     *
     * @param string $prop
     *
     * @throws UnknownPropertyException
     */
    protected function raiseUnknownPropertyException($prop)
    {
        $message = 'Unknown property "' . $prop . '"';
        throw new UnknownPropertyException($message);
    }
}
