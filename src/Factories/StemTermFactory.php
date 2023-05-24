<?php namespace VanTran\NhamBaseTerms\Factories;

use VanTran\NhamBaseTerms\Terms\StemTerm;

class StemTermFactory extends AbstractTermFactory
{
    public const TERM_CLASS = StemTerm::class;

    protected function getTermClass(): string 
    { 
        return self::TERM_CLASS;
    }

    /**
     * {@inheritdoc}
     */
    public function getTerm(int|string $key): StemTerm
    {
        return parent::getTerm($key);
    }
    
}