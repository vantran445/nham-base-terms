<?php namespace VanTran\NhamBaseTerms\Factories;

use VanTran\NhamBaseTerms\Contracts\PrimeStarTermInterface;
use VanTran\NhamBaseTerms\Terms\PrimeStarTerm;

class PrimeStarTermFactory extends AbstractTermFactory
{
    public const TERM_CLASS = PrimeStarTerm::class;

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
    public function term(mixed $term): PrimeStarTermInterface
    {
        return parent::term($term);
    }
    
}