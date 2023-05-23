<?php namespace VanTran\NhamBaseTerms\Factories;

use Exception;
use ReflectionClass;
use ReflectionException;
use VanTran\NhamBaseTerms\Contracts\TermInterface;

/**
 * Lớp trừu tượng sản xuất 1 đối tượng cơ bản
 * 
 * @author Văn Trần <caovan.info@gmail.com>
 * @package VanTran\NhamBaseTerms\Factories
 */
abstract class AbstractTermFactory
{
    /**
     * Xác định vùng chứa đối tượng theo cấu trúc Singleton
     */
    protected const SINGLETON = true;

    /**
     * Xác định lớp cơ sở cho đối tượng mục tiêu, chẳng hạn địa chi, thiên can, âm dương...
     * 
     * @return string 
     */
    abstract protected function getTermClass(): string;

    abstract protected function isSingleton(): bool;

    /**
     * @var TermInterface[]
     */
    private $terms = [];

    /**
     * @var TermInterface[]
     */
    private static $singletons = [];

    /**
     * Khởi tạo một đối tượng
     * 
     * @param string|int $key 
     * @return null|TermInterface 
     * @throws ReflectionException 
     */
    protected function makeTerm(string|int $key): null|TermInterface
    {
        $ref = new ReflectionClass($this->getTermClass());
        $attributes = $ref->getAttributes();

        foreach ($attributes as $attribute) {
            $atts = $attribute->newInstance();

            if (
                $key === $atts->index ||
                $key === $atts->key ||
                in_array($key, $atts->alias)
            ) {
                $atts = $attribute->newInstance();
                $term = $ref->newInstanceArgs((array)$atts);

                break;
            }
        }

        return (isset($term)) ? $term : null;
    }

    /**
     * Kiểm tra 1 đối tượng đã được khởi tạo và đệm hay chưa
     * 
     * @param string|int $key 
     * @return bool 
     */
    protected function isTermInitialized(string|int $key): bool
    {
        return ($this->isSingleton())
            ? isset(self::$singletons[$key])
            : isset($this->terms[$key]);
    }

    /**
     * Lưu 1 đối tượng đã được khởi tạo
     * 
     * @param string|int $key 
     * @param TermInterface $term 
     * @return AbstractTermFactory 
     */
    protected function setTerm(string|int $key, TermInterface $term): self
    {
        (!$this->isTermInitialized($key))
            ? self::$singletons[$key] = $term
            : $this->terms[$key] = $term;
        
        return $this;
    }

    /**
     * Trả về đối tượng mục tiêu
     * 
     * @param int|string $key 
     * @return TermInterface 
     * @throws ReflectionException 
     * @throws Exception 
     */
    public function getTerm(int|string $key): TermInterface
    {
        if (!$this->isTermInitialized($key)) {
            $terms = ($this->isSingleton())
                ? self::$singletons
                : $this->terms;

            foreach ($terms as $term) {
                if (
                    $key === $term->getIndex() ||
                    $key === $term->getKey() ||
                    in_array($key, $term->getAlias())
                ) {
                    $this->setTerm($key, $term);
                    return $term;
                }
            }

            $term = $this->makeTerm($key);

            if ($term instanceof TermInterface) {
                $this->setTerm($key, $term);
            }
            else {
                throw new Exception("Error. Can not resolve target term.");
            }

            return $term;
        }

        return ($this->isSingleton())
            ? self::$singletons[$key]
            : $this->terms[$key];
    }
}