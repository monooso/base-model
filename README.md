# Base Model [![Build Status](https://travis-ci.org/monooso/base-model.svg?branch=master)](https://travis-ci.org/monooso/base-model)
The world's simplest base model, with support for custom getters and setters.

## Installation ##
Install Base Model using [Composer][composer], as follows:

[composer]: https://getcomposer.org

```
$ composer require monooso/base-model
```

## Usage ##
In the following example model, the `simple` property will be set and retrieved directly, and the `fancy` property will be set and retrieved using the custom getter and setter methods.

```php
<?php namespace MyProject

use InvalidArgumentException;
use Monooso\BaseModel\Model;

class Example extends Model
{
    protected $fancy;
    protected $simple;

    /**
     * Prepends a string to the 'fancy' property, before returning it.
     *
     * @return string
     */
    public function getFancy()
    {
        return 'fancy-' . $this->fancy;
    }

    /**
     * Validates that the 'fancy' property is a string.
     *
     * @param mixed $val
     *
     * @throws InvalidArgumentException
     */
    public function setFancy($val)
    {
        if (!is_string($val)) {
            throw new InvalidArgumentException('Value must be a string');
        }

        $this->fancy = $val;
    }
}
```
