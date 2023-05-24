<?php namespace VanTran\NhamBaseTerms\Terms;

use VanTran\NhamBaseTerms\Contracts\ElementInterface;
use VanTran\NhamBaseTerms\Contracts\SexagenaryTermInterface;
use VanTran\NhamBaseTerms\Contracts\TendencyInterface;
use VanTran\NhamBaseTerms\Contracts\TermInterface;
use VanTran\NhamBaseTerms\Element;
use VanTran\NhamBaseTerms\Tendency;

abstract class AbstractSexagenaryTerm extends AbstractTerm implements SexagenaryTermInterface
{
    protected $refs = [];

    public function __construct(
        public readonly int $order,
        public readonly string $key,
        public readonly string|int $element,
        public readonly string|int $tendency,
        public array $alias = []
    )
    {
        
    }

    /**
     * {@inheritdoc}
     */
    public function getElement(): ElementInterface
    {
        return Element::term($this->element);
    }

    /**
     * {@inheritdoc}
     */
    public function getTendency(): TendencyInterface
    {
        return Tendency::term($this->tendency);
    }

    public function hasRef(string|callable $key): bool
    {
        if (is_callable($key)) {
            $key = $key();
        }

        return isset($this->refs[$key]);
    }

    public function getRef(string|callable $key): SexagenaryTermInterface
    {
        if (is_callable($key)) {
            $key = $key();
        }

        return ($this->hasRef($key))
            ? $this->refs[$key]
            : null;
    }

    public function setRef(string $key, TermInterface|callable $ref): self
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
