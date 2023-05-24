<?php namespace VanTran\NhamBaseTerms\Factories;

use ReflectionException;
use Exception;
use VanTran\NhamBaseTerms\Contracts\TendencyInterface;
use VanTran\NhamBaseTerms\Terms\TendencyTerm;

/**
 * Lớp sản xuất 1 đối tượng trong nhóm Âm - Dương
 * 
 * @author Văn Trần <caovan.info@gmail.com>
 * @package VanTran\NhamBaseTerms\Factories
 */
class TendencyTermFactory extends AbstractTermFactory
{
    public const TERM_CLASS = TendencyTerm::class;

    /**
     * {@inheritdoc}
     */
    protected function getTermClass(): string 
    { 
        return self::TERM_CLASS;
    }

    /**
     * Trả về đối tượng Âm hoặc Dương
     * 
     * @param int|string $key 
     * @return TendencyInterface 
     * @throws ReflectionException 
     * @throws Exception 
     */
    public function getTerm(int|string $key): TendencyInterface
    {
        return parent::getTerm($key);
    }
}