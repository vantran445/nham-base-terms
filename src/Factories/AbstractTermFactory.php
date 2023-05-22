<?php namespace VanTran\NhamBaseTerms\Factories;

use Exception;
use ReflectionClass;
use VanTran\NhamBaseTerms\Contracts\TermInterface;

abstract class AbstractTermFactory
{
    abstract protected function getTermClass(): string;

    /**
     * 
     * @var TermInterface[]
     */
    private $terms = [];

    private function makeTerm(string|int $key): null|TermInterface
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

    private function hasTerm(string|int $key): bool
    {
        return isset($this->terms[$key]);
    }

    public function setTerm(string|int $key, TermInterface $term): self
    {
        if (!isset($this->terms[$key])) {
            $this->terms[$key] = $term;
        }
        
        return $this;
    }

    public function getTerm(int|string $key): TermInterface
    {
        if (!$this->hasTerm($key)) {
            foreach ($this->terms as $term) {
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

        return $this->terms[$key];
    }
}