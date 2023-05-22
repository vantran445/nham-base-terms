<?php namespace VanTran\NhamBaseTerms\Terms;

abstract class AbstractTerm
{
    private $associated = [];

    public function __construct(
        public readonly int $index,
        public readonly string $key,
        public readonly int $element,
        public readonly int $yinyang,
        protected array $alias = []
    )
    {
        
    }

    public function __get($name)
    {
        return $this->getAttribute($name);
    }

    public function __set(string $name, mixed $value)
    {
        $this->setAttribute($name, $value);
    }

    public function getIndex(): int
    {
        return $this->index;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function getElement(): int
    {
        return $this->element;
    }

    public function getYinYang(): int
    {
        return $this->yinyang;
    }

    public function getAlias(): array
    {
        return $this->alias;
    }

    public function setAlias(string $alias): self
    {
        array_push($this->alias, $alias);
        return $this;
    }

    public function getAttribute(string $key): mixed
    {
        if (!isset($this->associated[$key])) {
            return null;
        }

        return $this->associated[$key];
    }

    public function setAttribute(string $key, mixed $associate): self
    {
        $val = (is_callable($associate)) ? $associate() : $associate;
        $this->associated[$key] = $val;

        return $this;
    }
}