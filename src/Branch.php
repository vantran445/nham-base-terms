<?php namespace VanTran\NhamBaseTerms;

use ReflectionException;
use Exception;
use VanTran\NhamBaseTerms\Factories\BranchTermFactory;
use VanTran\NhamBaseTerms\Terms\BranchTerm;

/**
 * @property Terms\BranchTerm ty
 * @property Terms\BranchTerm suu
 * @property Terms\BranchTerm dan
 * @property Terms\BranchTerm mao
 * @property Terms\BranchTerm thin
 * @property Terms\BranchTerm ti
 * @property Terms\BranchTerm ngo
 * @property Terms\BranchTerm mui
 * @property Terms\BranchTerm than
 * @property Terms\BranchTerm dau
 * @property Terms\BranchTerm tuat
 * @property Terms\BranchTerm hoi
 * 
 * @method Terms\BranchTerm ty()
 * @method Terms\BranchTerm suu()
 * @method Terms\BranchTerm dan()
 * @method Terms\BranchTerm mao()
 * @method Terms\BranchTerm thin()
 * @method Terms\BranchTerm ti()
 * @method Terms\BranchTerm ngo()
 * @method Terms\BranchTerm mui()
 * @method Terms\BranchTerm than()
 * @method Terms\BranchTerm dau()
 * @method Terms\BranchTerm tuat()
 * @method Terms\BranchTerm hoi()
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