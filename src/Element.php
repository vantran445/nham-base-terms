<?php namespace VanTran\NhamBaseTerms;

use Throwable;
use VanTran\NhamBaseTerms\Contracts\ElementInterface;
use VanTran\NhamBaseTerms\Factories\ElementTermFactory;

/**
 * @method static Terms\ElementTerm moc()
 * @method static Terms\ElementTerm hoa()
 * @method static Terms\ElementTerm tho()
 * @method static Terms\ElementTerm kim()
 * @method static Terms\ElementTerm thuy()
 * 
 * @author Văn Trần <caovan.info@gmail.com>
 * @package VanTran\NhamBaseTerms
 */
class Element
{
    private static $factory;

    protected static function factory(): ElementTermFactory
    {
        if (!self::$factory) {
            self::$factory = new ElementTermFactory();
        }

        return self::$factory;
    }

    /**
     * Trả về đối tượng trong nhóm ngũ hành thông qua magic call, ví dụ,muốn lấy hành Kim chỉ cần gọi Element::kim()
     * 
     * @param string $name 
     * @param mixed $arguments 
     * @return ElementInterface 
     * @throws Throwable 
     */
    public static function __callStatic($name, $arguments): ElementInterface
    {
        return self::term($name);
    }

    public function __call($name, $arguments): ElementInterface
    {
        return $this->term($name);
    }

    /**
     * Trả về đối tượng mục tiêu trong nhóm Ngũ hành
     * 
     * @param mixed $term 
     * @return ElementInterface 
     * @throws Throwable 
     */
    public static function term(mixed $term): ElementInterface
    {
        return self::factory()->term($term);
    }
}