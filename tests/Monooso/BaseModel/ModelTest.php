<?php namespace Monooso\BaseModel;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class ModelTest extends TestCase
{
    protected $properties;
    protected $subject;

    public function setUp()
    {
        $this->properties = [
            'automatic' => 'automatic',
            'prefix'    => 'testprefix',
            'validated' => 'validated',
        ];

        $this->subject = new TestSubject($this->properties);
    }

    public function testGetAutomatic()
    {
        $this->assertEquals(
            $this->subject->automatic,
            $this->properties['automatic']
        );
    }

    public function testSetAutomatic()
    {
        $this->subject->automatic = 'revised';
        $this->assertEquals($this->subject->automatic, 'revised');
    }

    public function testGetValidated()
    {
        $this->assertEquals(
            $this->subject->validated,
            $this->properties['prefix'] . '-' . $this->properties['validated']
        );
    }

    public function testSetValidatedWithString()
    {
        $this->subject->validated = 'revised';

        $this->assertEquals(
            $this->subject->validated,
            $this->properties['prefix'] . '-revised'
        );
    }

    public function testSetValidatedWithNonString()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->subject->validated = [];
    }
}
