<?php namespace VanTran\NhamBaseTerms;

use ReflectionException;
use Exception;
use VanTran\NhamBaseTerms\Factories\StemTermFactory;
use VanTran\NhamBaseTerms\Terms\StemTerm;

/**
 * @property Terms\StemTerm forest
 * @property Terms\StemTerm grass
 * @property Terms\StemTerm firepower
 * @property Terms\StemTerm sparks
 * @property Terms\StemTerm fertile
 * @property Terms\StemTerm barren
 * @property Terms\StemTerm hardmetal
 * @property Terms\StemTerm rawmetal
 * @property Terms\StemTerm ocean
 * @property Terms\StemTerm rainwater
 * 
 * @method Terms\StemTerm forest()
 * @method Terms\StemTerm grass()
 * @method Terms\StemTerm firepower()
 * @method Terms\StemTerm sparks()
 * @method Terms\StemTerm fertile()
 * @method Terms\StemTerm barren()
 * @method Terms\StemTerm hardmetal()
 * @method Terms\StemTerm rawmetal()
 * @method Terms\StemTerm ocean()
 * @method Terms\StemTerm rainwater()
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