<?php namespace VanTran\NhamBaseTerms\Factories;

use VanTran\NhamBaseTerms\Contracts\TermInterface;
use VanTran\NhamBaseTerms\Terms\ElementTerm;

class ElementTermFactory extends AbstractTermFactory
{
    public const TERM_CLASS = ElementTerm::class;

    /**
     * {@inheritdoc}
     */
    protected function getTermClass(): string 
    { 
        return self::TERM_CLASS;
    }

    public function getTerm(int|string $key): ElementTerm
    {
        return parent::getTerm($key);
    }
}