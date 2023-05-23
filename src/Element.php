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

    /**
     * Trả về đối tượng trong nhóm ngũ hành thông qua magic call, ví dụ,muốn lấy hành Kim chỉ cần gọi Element::metal().
     * Các phương thức được hỗ trợ gợi ý gõ dưới dạng tiếng Anh, nhưng cũng có thể được gọi ra thông qua tiếng Việt, 
     * chẳng hạn hành hỏa Element:fire() tương đương với Element::hoa()
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

    /**
     * Trả về đối tượng mục tiêu trong nhóm Ngũ hành
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