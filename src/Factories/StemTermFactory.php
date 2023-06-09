<?php namespace VanTran\NhamBaseTerms\Factories;

use VanTran\NhamBaseTerms\Contracts\StemTermInterface;
use VanTran\NhamBaseTerms\Terms\StemTerm;

class StemTermFactory extends AbstractTermFactory
{
    public const TERM_CLASS = StemTerm::class;

    /**
     * {@inheritdoc}
     */
    protected function getTermClass(): string 
    { 
        return self::TERM_CLASS;
    }

    /**
     * {@inheritdoc}
     */
    public function term(mixed $term): StemTermInterface
    {
        return parent::term($term);
    }
    
}