<?php namespace Monooso\BaseModel;

use InvalidArgumentException;

class TestSubject extends Model
{
    protected $automatic;
    protected $prefix;
    protected $validated;

    public function getValidated()
    {
        return $this->prefix . '-' . $this->validated;
    }

    public function setValidated($val)
    {
        if (!is_string($val)) {
            throw new InvalidArgumentException('Value must be a string');
        }

        $this->validated = $val;
    }
}
