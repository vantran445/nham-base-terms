<?php namespace VanTran\NhamBaseTerms\Terms;

use VanTran\NhamBaseTerms\Contracts\ElementInterface;
use VanTran\NhamBaseTerms\Contracts\SexagenaryTermInterface;
use VanTran\NhamBaseTerms\Contracts\TendencyInterface;
use VanTran\NhamBaseTerms\Element;
use VanTran\NhamBaseTerms\Tendency;

abstract class AbstractSexagenaryTerm extends AbstractTerm implements SexagenaryTermInterface
{
    /**
     * Mảng ánh xạ các tham chiếu của đối tượng
     * 
     * @var array
     */
    protected $refs = [];

    public readonly ElementInterface $element;
    public readonly TendencyInterface $tendency;

    public function __construct(
        public readonly int $order,
        public readonly string $key,
        string|int $element,
        string|int $tendency,
        public array $alias = []
    )
    {
        $this->element = Element::term($element);
        $this->tendency = Tendency::term($tendency);
    }

    /**
     * {@inheritdoc}
     */
    public function getElement(): ElementInterface
    {
        return $this->element;
    }

    /**
     * {@inheritdoc}
     */
    public function getTendency(): TendencyInterface
    {
        return $this->tendency;
    }

    /**
     * Kiểm tra 1 đối tượng có tham chiếu đến 1 đối tượng mục tiêu
     * 
     * @param string|(callable(AbstractSexagenaryTerm $term): string) $key 
     * @return bool 
     */
    public function hasRef(string|callable $key): bool
    {
        if (is_callable($key)) {
            $key = $key($this);
        }

        return isset($this->refs[$key]);
    }

    /**
     * Trả về đối tượng được tham chiếu
     * 
     * @param string|(callable(AbstractSexagenaryTerm $term): string) $key 
     * @return SexagenaryTermInterface 
     */
    public function getRef(string|callable $key): ?SexagenaryTermInterface
    {
        if (is_callable($key)) {
            $key = $key($this);
        }

        return ($this->hasRef($key))
            ? $this->refs[$key]
            : null;
    }

    /**
     * Ánh xạ tham chiếu đến 1 đối tượng
     * 
     * @param string $key 
     * @param AbstractSexagenaryTerm|callable $ref 
     * @return AbstractSexagenaryTerm 
     */
    public function setRef(string $key, AbstractSexagenaryTerm|callable $ref): self
    {
        if (is_callable($ref)) {
            $ref = $ref();
        }

        if (!$this->hasRef($key)) {
            $this->refs[$key] = $ref;
        }

        return $this;
    }
}
