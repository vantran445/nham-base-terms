<?php namespace VanTran\NhamBaseTerms;

use Exception;
use ReflectionClass;
use VanTran\NhamBaseTerms\Terms\BranchTerm;

class BranchFactory
{
    private $terms = [];

    private function getNewInstance(mixed $att): BranchTerm
    {
        $ref = new ReflectionClass(BranchTerm::class);
        $attributes = $ref->getAttributes();

        foreach ($attributes as $attribute) {
            $atts = $attribute->newInstance();

            if (
                $att === $atts->order ||
                $att === $atts->key ||
                in_array($att, $atts->alias)
            ) {
                $atts = $attribute->newInstance();
                $term = new BranchTerm(
                    $atts->order,
                    $atts->key,
                    $atts->element,
                    $atts->yinyang,
                    $atts->alias
                );

                break;
            }
        }

        if (!isset($term)) {
            throw new Exception("Error. Can not find desired Branch term.");
        }

        return $term;
    }

    private function getTerm(string|int $att): BranchTerm
    {
        if (is_integer($att)) {
            if ($att < 0 || $att > 11) {
                throw new Exception("Invalid Branch term index.");
            }

            if (!isset($this->terms[$att])) {
                $this->terms[$att] = $this->getNewInstance($att);
            }

            $term = $this->terms[$att];
        }
        else {
            foreach ($this->terms as $term) {
                if (
                    $term->getKey() == $att ||
                    in_array($att, $term->getAlias())
                ) {
                    return $term;
                }
            }

            try {
                $term = $this->getNewInstance($att);
                $this->terms[$term->getOrder()] = $term;
            } catch (\Throwable $th) {
                throw $th;
            }
        }

        return $term;
    }

    public function term(string|int $term)
    {
        return $this->getTerm($term);
    }
}