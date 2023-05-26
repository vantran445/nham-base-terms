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
     * Xác định lớp cơ sở cho đối tượng mục tiêu, chẳng hạn địa chi, thiên can, âm dương...
     * 
     * @return string 
     */
    abstract protected function getTermClass(): string;

    /**
     * @var TermInterface[]
     */
    private $terms = [];

    /**
     * Khởi tạo một đối tượng
     * 
     * @param string|int $key 
     * @return null|TermInterface 
     * @throws ReflectionException 
     */
    protected function makeTerm(string|int $key): ?TermInterface
    {
        $ref = new ReflectionClass($this->getTermClass());
        $attributes = $ref->getAttributes();

        foreach ($attributes as $attribute) {
            $atts = $attribute->newInstance();

            if (
                $key === $atts->order ||
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
        return isset($this->terms[$key]);
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
        if (!$this->isTermInitialized($key)) {
            $this->terms[$key] = $term;
        }
        
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
            foreach ($this->terms as $term) {
                if (
                    $key === $term->getOrder() ||
                    $key === $term->getKey() ||
                    $term->hasAlias($key)
                ) {
                    if (is_string($key)) {
                        $term->setAlias($key);
                    }

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

        return $this->terms[$key];
    }
}