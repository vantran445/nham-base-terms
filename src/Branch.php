<?php namespace VanTran\NhamBaseTerms;

use ReflectionException;
use Exception;
use VanTran\NhamBaseTerms\Factories\BranchTermFactory;
use VanTran\NhamBaseTerms\Terms\BranchTerm;

/**
 * @property Terms\BranchTerm rat
 * @property Terms\BranchTerm buffalo
 * @property Terms\BranchTerm tiger
 * @property Terms\BranchTerm cat
 * @property Terms\BranchTerm dragon
 * @property Terms\BranchTerm snake
 * @property Terms\BranchTerm horse
 * @property Terms\BranchTerm goat
 * @property Terms\BranchTerm monkey
 * @property Terms\BranchTerm rooster
 * @property Terms\BranchTerm dog
 * @property Terms\BranchTerm pig
 * 
 * @method Terms\BranchTerm rat()
 * @method Terms\BranchTerm buffalo()
 * @method Terms\BranchTerm tiger()
 * @method Terms\BranchTerm cat()
 * @method Terms\BranchTerm dragon()
 * @method Terms\BranchTerm snake()
 * @method Terms\BranchTerm horse()
 * @method Terms\BranchTerm goat()
 * @method Terms\BranchTerm monkey()
 * @method Terms\BranchTerm rooster()
 * @method Terms\BranchTerm dog()
 * @method Terms\BranchTerm pig()
 * 
 * @author Văn Trần <caovan.info@gmail.com>
 * @package VanTran\NhamBaseTerms
 */
class Branch
{
    /**
     * @var BranchTermFactory Lớp khởi tạo các đối tượng trong nhóm địa chi
     */
    private $factory;

    public function __construct()
    {
        $this->factory = new BranchTermFactory();
    }

    public function __call($name, $arguments): ?BranchTerm
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
     * @return BranchTerm 
     * @throws ReflectionException 
     * @throws Exception 
     */
    public function term(string|int $key): BranchTerm
    {
        return $this->factory->getTerm($key);
    }
}