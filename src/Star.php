<?php namespace VanTran\NhamBaseTerms;

use ReflectionException;
use Exception;
use VanTran\NhamBaseTerms\Factories\StarTermFactory;
use VanTran\NhamBaseTerms\Terms\StarTerm;
use VanTran\NhamBaseTerms\Traits\TermLoopableTrait;

/**
 * @property Terms\StarTerm quy
 * @property Terms\StarTerm xa
 * @property Terms\StarTerm tuoc
 * @property Terms\StarTerm hop
 * @property Terms\StarTerm cau
 * @property Terms\StarTerm long
 * @property Terms\StarTerm khong
 * @property Terms\StarTerm ho
 * @property Terms\StarTerm thuong
 * @property Terms\StarTerm vu
 * @property Terms\StarTerm am
 * @property Terms\StarTerm hau
 * 
 * @method Terms\StarTerm quy()
 * @method Terms\StarTerm xa()
 * @method Terms\StarTerm tuoc()
 * @method Terms\StarTerm hop()
 * @method Terms\StarTerm cau()
 * @method Terms\StarTerm long()
 * @method Terms\StarTerm khong()
 * @method Terms\StarTerm ho()
 * @method Terms\StarTerm thuong()
 * @method Terms\StarTerm vu()
 * @method Terms\StarTerm am()
 * @method Terms\StarTerm hau()
 * 
 * @author Văn Trần <caovan.info@gmail.com>
 * @package VanTran\NhamBaseTerms
 */
class Star
{
    use TermLoopableTrait;
    
    /**
     * @var StarTermFactory Lớp khởi tạo các đối tượng trong nhóm thiên can
     */
    private $factory;

    public function __construct()
    {
        $this->factory = new StarTermFactory();
    }

    public function __call($name, $arguments): ?StarTerm
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
     * @return StarTerm 
     * @throws ReflectionException 
     * @throws Exception 
     */
    public function term(string|int $key): StarTerm
    {
        return $this->factory->getTerm($key);
    }

    /**
     * Trả về toàn bộ 12 thiên tướng
     * 
     * @return array 
     * @throws ReflectionException 
     * @throws Exception 
     */
    public function all(): array
    {
        $terms = [];

        for ($i = 1; $i <= 12; $i ++) {
            array_push($terms, $this->term($i));
        }

        return $terms;
    }
}