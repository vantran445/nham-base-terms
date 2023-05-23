<?php namespace VanTran\NhamBaseTerms;

use Throwable;
use VanTran\NhamBaseTerms\Contracts\ElementInterface;
use VanTran\NhamBaseTerms\Factories\ElementTermFactory;

/**
 * @method static Terms\ElementTerm wood()
 * @method static Terms\ElementTerm fire()
 * @method static Terms\ElementTerm earth()
 * @method static Terms\ElementTerm metal()
 * @method static Terms\ElementTerm water()
 * 
 * @method static Terms\ElementTerm kim()
 * @method static Terms\ElementTerm moc()
 * @method static Terms\ElementTerm thuy()
 * @method static Terms\ElementTerm hoa()
 * @method static Terms\ElementTerm tho()
 * 
 * @author Văn Trần <caovan.info@gmail.com>
 * @package VanTran\NhamBaseTerms
 */
class Element
{
    private static $factory;

    protected static function getFactory(): ElementTermFactory
    {
        if (!self::$factory) {
            self::$factory = new ElementTermFactory();
        }

        return self::$factory;
    }

    public static function __callStatic($name, $arguments): ElementInterface
    {
        return self::term($name);
    }

    /**
     * 
     * @param int|string|(callable(): int|string) $attr 
     * @return ElementInterface 
     * @throws Throwable 
     */
    public static function term(int|string|callable $attr): ElementInterface
    {
        $key = is_callable($attr)
            ? $attr()
            : $attr;

        try {
            $term = self::getFactory()->getTerm($key);
        } catch (\Throwable $th) {
            throw $th;
        }

        return $term;
    }
}