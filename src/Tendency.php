<?php namespace VanTran\NhamBaseTerms;

use Throwable;
use VanTran\NhamBaseTerms\Contracts\TendencyInterface;
use VanTran\NhamBaseTerms\Factories\TendencyTermFactory;

/**
 * @method static Terms\TendencyTerm posive()
 * @method static Terms\TendencyTerm negative()
 * 
 * @author Văn Trần <caovan.info@gmail.com>
 * @package VanTran\NhamBaseTerms
 */
class Tendency
{
    private static $factory;

    protected static function getFactory(): TendencyTermFactory
    {
        if (!self::$factory) {
            self::$factory = new TendencyTermFactory();
        }

        return self::$factory;
    }

    /**
     * @param mixed $name 
     * @param mixed $arguments 
     * @return TendencyInterface 
     * @throws Throwable 
     */
    public static function __callStatic($name, $arguments): TendencyInterface
    {
        return self::term($name);
    }

    /**
     * @param mixed $name 
     * @param mixed $arguments 
     * @return TendencyInterface 
     * @throws Throwable 
     */
    public function __call($name, $arguments): TendencyInterface
    {
        return $this->term($name);
    }

    /**
     * Trả về đối tượng mục tiêu trong nhóm Ngũ hành
     * 
     * @param int|string|(callable(): int|string) $attr 
     * @return TendencyInterface 
     * @throws Throwable 
     */
    public static function term(int|string|callable $attr): TendencyInterface
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