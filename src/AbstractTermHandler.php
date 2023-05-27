<?php namespace VanTran\NhamBaseTerms;

use Closure;
use Exception;
use ReflectionException;
use VanTran\NhamBaseTerms\Contracts\SexagenaryTermInterface;
use VanTran\NhamBaseTerms\Factories\AbstractTermFactory;

abstract class AbstractTermHandler
{
    /**
     * Trả về tên lớp Factory sản xuất nhóm đối tượng
     * 
     * @return string 
     */
    abstract protected function getDefaultFactoryClass(): string;

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
     * @return SexagenaryTermInterface 
     * @throws ReflectionException 
     * @throws Exception 
     */
    public function term(mixed $key): SexagenaryTermInterface
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
        return $this->factory->all();
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
     * Kiểm tra 1 bí danh có tồn tại
     * 
     * @param string $key 
     * @return bool 
     */
    public function hasAlias(string $key): bool
    {
        return $this->factory->hasAlias($key);
    }

    /**
     * Thêm 1 bí danh mới cho đối tượng
     * 
     * @param string $key 
     * @param int|string $term 
     * @return void 
     * @throws Exception 
     * @throws ReflectionException 
     */
    public function addAlias(string $key, int|string $term): void
    {
        $this->factory->setAlias($key, $term);
    }
}
