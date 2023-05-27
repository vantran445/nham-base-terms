<?php namespace VanTran\NhamBaseTerms\Factories;

use VanTran\NhamBaseTerms\Contracts\BranchTermInterface;
use VanTran\NhamBaseTerms\Terms\BranchTerm;

class BranchTermFactory extends AbstractTermFactory
{
    public const TERM_CLASS = BranchTerm::class;

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
    public function term(mixed $term): BranchTermInterface
    {
        return parent::term($term);
    } 
}