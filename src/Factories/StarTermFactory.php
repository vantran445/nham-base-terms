<?php namespace VanTran\NhamBaseTerms\Factories;

use ReflectionException;
use Exception;
use VanTran\NhamBaseTerms\Terms\StarTerm;

class StarTermFactory extends AbstractTermFactory
{
    public const TERM_CLASS = StarTerm::class;

    /**
     * {@inheritdoc}
     */
    protected function getTermClass(): string 
    { 
        return self::TERM_CLASS;
    }

    /**
     * Trả về thiên tướng
     * 
     * @param int|string $key 
     * @return StarTerm 
     * @throws ReflectionException 
     * @throws Exception 
     */
    public function getTerm(int|string $key): StarTerm
    {
        return parent::getTerm($key);
    }
    
}