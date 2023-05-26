<?php namespace VanTran\NhamBaseTerms;

use Closure;
use Exception;
use VanTran\NhamBaseTerms\Factories\AbstractTermFactory;
use VanTran\NhamBaseTerms\Terms\AbstractSexagenaryTerm;

abstract class AbstractTermHandler
{
    /**
     * Trả về tên lớp Factory sản xuất nhóm đối tượng
     * 
     * @return string 
     */
    abstract protected function getDefaultFactoryClass(): string;

    /**
     * Trả về tổng số đối tượng trong nhóm, với Địa chi và thiên tướng là 12, trong khi với Thiên can là 10
     * 
     * @return int 
     */
    abstract protected function getTotalTerms(): int;

    public function __construct(private ?AbstractTermFactory $factory = null)
    {
        if (!$this->factory) {
            try {
                $class = $this->getDefaultFactoryClass();
                $factory = new $class();
                
                if (!$factory instanceof AbstractTermFactory) {
                    throw new Exception("Invalid factory.");
                }

            } catch (\Throwable $th) {
                throw $th;
            }

            $this->factory = $factory;
        }
    }

    public function __call($name, $arguments)
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
     * Trả về 1 đối tượng trong nhóm
     * 
     * @param string|int|Closure $key 
     * @return BranchTerm 
     * @throws ReflectionException 
     * @throws Exception 
     */
    public function term(mixed $key): AbstractSexagenaryTerm
    {
        if ($key instanceof Closure) {
            $key = $key($this);
        }

        return $this->factory->getTerm($key);
    }

    /**
     * Trả về mảng toàn bộ đối tượng trong nhóm
     * 
     * @return array 
     * @throws ReflectionException 
     * @throws Exception 
     */
    public function all(): array
    {
        $terms = [];

        for ($i = 1; $i <= $this->getTotalTerms(); $i ++) {
            array_push($terms, $this->term($i));
        }

        return $terms;
    }

    /**
     * Lặp thông qua mỗi đối tượng trong nhóm 
     * 
     * @param Closure $fn
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     */
    public function each(Closure $fn): void
    {
        foreach ($this->all() as $index => $term) {
            $r = $fn($term, $index);

            if ($r === false) {
                break;
            }
        }
    }

    /**
     * Thực hiện ánh xạ dữ liệu hoặc công việc bất kỳ thông qua 1 hàm ẩn danh
     * 
     * @param Closure $action
     * @return AbstractTermHandler 
     */
    public function map(Closure $action): self
    {
        $action($this);
        return $this;
    }

    /**
     * Kiểm tra 1 đối tượng đã được khởi tạo hoặc ánh xạ hay chưa
     * 
     * @param int|string $key 
     * @return bool 
     */
    public function hasTerm(int|string $key): bool
    {
        return $this->factory->hasTerm($key);
    }
}
