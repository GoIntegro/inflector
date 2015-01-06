<?php
/**
 * @copyright 2014 Integ S.A.
 * @license http://opensource.org/licenses/MIT The MIT License (MIT)
 * @author Javier Lorenzana <javier.lorenzana@gointegro.com>
 */

namespace GoIntegro\Inflector;

// Utils.
use Doctrine\Common\Util\Inflector as DoctrineInflector;

class Inflector
{
    /**
     * @param string $word
     * @param boolean $firstToUpper
     * @return string
     */
    public static function camelize($word, $firstToUpper = FALSE)
    {
        $word = str_replace(
            ' ', '', ucwords(str_replace('-', ' ', $word))
        );

        if (!$firstToUpper) {
            $word = lcfirst($word);
        }

        return $word;
    }

    /**
     * @param string $word
     * @return string
     */
    public static function hyphenate($word)
    {
        $word = preg_replace('/([^^])([A-Z])/', '\\1-\\2', $word);

        return strtolower($word);
    }

    /**
     * @see DoctrineInflector::pluralize
     */
    public static function pluralize($word)
    {
        return DoctrineInflector::pluralize($word);
    }

    /**
     * @param string $word
     * @return string
     */
    public static function typify($word)
    {
        $word = self::shortenClassName($word);

        return self::pluralize(self::hyphenate($word));
    }

    /**
     * @param string $name
     * @return string
     */
    private static function shortenClassName($name)
    {
        $position = strrpos($name, '\\');

        if (FALSE === $position) {
            $position = 0;
        } else {
            ++$position;
        }

        return substr($name, $position);
    }
}
