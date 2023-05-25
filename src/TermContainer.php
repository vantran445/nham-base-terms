<?php namespace VanTran\NhamBaseTerms;

use Closure;
use ReflectionException;
use Exception;
use VanTran\NhamBaseTerms\Terms\AbstractSexagenaryTerm;
use VanTran\NhamBaseTerms\Terms\BranchTerm;
use VanTran\NhamBaseTerms\Terms\StarTerm;
use VanTran\NhamBaseTerms\Terms\StemTerm;

/**
 * Thiết lập 1 vùng chứa giúp làm việc xoay quanh một nhóm đối tượng. Các đối tượng chỉ được ánh xạ bên trong vùng chứa
 * của nó mà không ảnh hưởng đến các vùng chứa khác. Một ví dụ thực tiễn là khi cần so sánh 2 quẻ với nhau, thì cần có
 * 2 vùng chứa độc lập bởi các dữ liệu tham chiếu của mỗi đối tượng là khác nhau.
 * 
 * @property Branch $branch Vùng chứa khởi tạo Địa chi
 * @property Stem $stem     Vùng chứa tạo Thiên Can
 * @property Star $star     Vùng chứa khởi tạo Thiên tướng
 * 
 * @author Văn Trần <caovan.info@gmail.com>
 * @package VanTran\NhamBaseTerms
 */
class TermContainer
{
    /**
     * @var Branch
     */
    private $branch;

    /**
     * @var Stem
     */
    private $stem;

    /**
     * @var Star
     */
    private $star;

    public function __construct()
    {
        $this->branch = new Branch();
        $this->stem = new Stem();
        $this->star = new Star();
    }

    public function __get($name)
    {
        if ($name === 'branch' || $name === 'stem' || $name === 'star') {
            return $this->{$name};
        }

        return null;
    }
    
    /**
     * Trả về đối tượng trong nhóm Địa chi
     * 
     * @param string|int $key 
     * @return BranchTerm 
     * @throws ReflectionException 
     * @throws Exception 
     */
    public function branch(string|int $key): BranchTerm
    {
        return $this->branch->term($key);
    }

    /**
     * Trả về đối tượng trong nhóm Thiên can
     * 
     * @param string|int $key 
     * @return StemTerm 
     * @throws ReflectionException 
     * @throws Exception 
     */
    public function stem(string|int $key): StemTerm
    {
        return $this->stem->term($key);
    }

    /**
     * Trả về đối tượng trong nhóm Thiên tướng
     * 
     * @param string|int $key 
     * @return StarTerm 
     * @throws ReflectionException 
     * @throws Exception 
     */
    public function star(string|int $key): StarTerm
    {
        return $this->star->term($key);
    }

    /**
     * Trả về 1 đối tượng thông qua Closure
     * 
     * @param Closure $trigger 
     * @return AbstractSexagenaryTerm 
     */
    public function term(Closure $trigger): AbstractSexagenaryTerm
    {
        return $trigger($this);
    }
}