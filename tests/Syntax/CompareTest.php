<?php

namespace Tests\Syntax;

use PHPUnit\Framework\TestCase;
use Thytanium\Locomotion\Syntax\Compare;
use Thytanium\Locomotion\Syntax\Literal;
use Thytanium\Locomotion\Syntax\Variable;

class CompareTest extends TestCase
{
    public function testItReturnsValidType(): void
    {
        $node = new Compare();
        $this->assertEquals(Compare::COMPARE_TYPE, $node->getType());
    }

    public function testBasicLiteral(): void
    {
        $node = new Compare(['operator' => 'EqualTo']);
        $node->attach(new Literal(['value' => 1]));
        $node->attach(new Literal(['value' => 1]));

        $this->assertInstanceOf(
            \Ruler\Operator\EqualTo::class,
            $node->transpile()
        );
    }

    public function testBasicVariable(): void
    {
        $node = new Compare(['operator' => 'LessThanOrEqualTo']);
        $node->attach(new Variable(['name' => 'numberOfGuests']));
        $node->attach(new Variable(['name' => 'maxCapacity']));

        $this->assertInstanceOf(
            \Ruler\Operator\LessThanOrEqualTo::class,
            $node->transpile()
        );
    }
}
