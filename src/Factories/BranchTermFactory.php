<?php namespace VanTran\NhamBaseTerms\Factories;

use VanTran\NhamBaseTerms\Contracts\SexagenaryTermInterface;
use VanTran\NhamBaseTerms\Terms\BranchTerm;

class BranchTermFactory extends AbstractTermFactory
{
    public const TERM_CLASS = BranchTerm::class;

    protected function getTermClass(): string 
    { 
        return self::TERM_CLASS;
    }

    /**
     * {@inheritdoc}
     */
    public function getTerm(int|string $key): SexagenaryTermInterface
    {
        return parent::getTerm($key);
    }
    
}