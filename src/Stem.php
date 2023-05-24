<?php namespace VanTran\NhamBaseTerms;

use ReflectionException;
use Exception;
use VanTran\NhamBaseTerms\Factories\StemTermFactory;
use VanTran\NhamBaseTerms\Terms\StemTerm;

/**
 * @property Terms\StemTerm giap
 * @property Terms\StemTerm at
 * @property Terms\StemTerm binh
 * @property Terms\StemTerm dinh
 * @property Terms\StemTerm mau
 * @property Terms\StemTerm ky
 * @property Terms\StemTerm canh
 * @property Terms\StemTerm tan
 * @property Terms\StemTerm nham
 * @property Terms\StemTerm quy
 * 
 * @method Terms\StemTerm giap()
 * @method Terms\StemTerm at()
 * @method Terms\StemTerm binh()
 * @method Terms\StemTerm dinh()
 * @method Terms\StemTerm mau()
 * @method Terms\StemTerm ky()
 * @method Terms\StemTerm canh()
 * @method Terms\StemTerm tan()
 * @method Terms\StemTerm nham()
 * @method Terms\StemTerm quy()
 * 
 * @author Văn Trần <caovan.info@gmail.com>
 * @package VanTran\NhamBaseTerms
 */
class Stem
{
    /**
     * @var StemTermFactory Lớp khởi tạo các đối tượng trong nhóm thiên can
     */
    private $factory;

    public function __construct()
    {
        $this->factory = new StemTermFactory();
    }

    public function __call($name, $arguments): ?StemTerm
    {
        try {
            $term = $this->term($name);
        } catch (\Throwable $th) {
            return null;
        }

        return $term;
    }

    public function __get($name)
    {
        try {
            $term = $this->$name();
        } catch (\Throwable $th) {
            return null;
        }

        return $term;
    }

    /**
     * Trả về 1 đối tượng trong nhóm 12 địa chi
     * 
     * @param string|int $key 
     * @return StemTerm 
     * @throws ReflectionException 
     * @throws Exception 
     */
    public function term(string|int $key): StemTerm
    {
        return $this->factory->getTerm($key);
    }
}