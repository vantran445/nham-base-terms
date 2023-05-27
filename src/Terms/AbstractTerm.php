<?php namespace VanTran\NhamBaseTerms\Terms;

use Exception;
use VanTran\NhamBaseTerms\Contracts\TermInterface;

abstract class AbstractTerm implements TermInterface
{
    public function __construct(
        public readonly int $index,
        public readonly string $key,
        public readonly string $char,
        protected array $aliases = []
    )
    {
        
    }

    /**
     * {@inheritdoc}
     */
    public function getIndex(): int
    {
        return $this->index;
    }

    /**
     * {@inheritdoc}
     */
    public function getChar(): string
    {
        return $this->char;
    }

    /**
     * {@inheritdoc}
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * {@inheritdoc}
     */
    public function hasAlias(string $alias): bool
    {
        return in_array($alias, $this->getAliases());
    }

    /**
     * {@inheritdoc}
     */
    public function getAliases(): array
    {
        return $this->aliases;
    }

    /**
     * {@inheritdoc}
     */
    public function addAlias(string $alias): void
    {
        if ($this->hasAlias($alias)) {
            throw new Exception("The alias arealy exists.");
        }

        array_push($this->aliases, $alias);
    }
}