<?php namespace VanTran\NhamBaseTerms;

use Exception;
use Throwable;
use VanTran\NhamBaseTerms\Contracts\TendencyInterface;
use VanTran\NhamBaseTerms\Factories\TendencyTermFactory;

/**
 * @method static Terms\TendencyTerm duong()
 * @method static Terms\TendencyTerm am()
 * 
 * @author Văn Trần <caovan.info@gmail.com>
 * @package VanTran\NhamBaseTerms
 */
class Tendency
{
    private static $factory;

    protected static function factory(): TendencyTermFactory
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
     * Trả về đối tượng trong nhóm Âm - Dương
     * 
     * @param mixed $term 
     * @return TendencyInterface 
     * @throws Exception 
     */
    public static function term(mixed $term): TendencyInterface
    {
        return self::factory()->term($term);
    }
}