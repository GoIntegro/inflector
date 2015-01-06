<?php
/**
 * @copyright 2014 Integ S.A.
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 * @author Javier Lorenzana <javier.lorenzana@gointegro.com>
 */

namespace GoIntegro\Inflector;

class InflectorTest extends \PHPUnit_Framework_TestCase
{
    public function testHyphenatingString()
    {
        /* Given... (Fixture) */
        $camelCased = "ThisIsACamel";
        /* When... (Action) */
        $hyphenated = Inflector::hyphenate($camelCased);
        /* Then... (Assertions) */
        $this->assertEquals('this-is-a-camel', $hyphenated);
    }

    public function testHyphenatingStringWithConsecutiveCapitals()
    {
        /* Given... (Fixture) */
        $camelCased = "ThisIsHTML";
        /* When... (Action) */
        $hyphenated = Inflector::hyphenate($camelCased, TRUE);
        /* Then... (Assertions) */
        $this->assertEquals('this-is-html', $hyphenated);
    }
}
