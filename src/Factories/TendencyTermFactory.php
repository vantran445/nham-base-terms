<?php namespace VanTran\NhamBaseTerms\Factories;

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
     * Trả về đối tượng trong nhóm Âm hoặc Dương
     * 
     * @param mixed $term 
     * @return TendencyInterface 
     */
    public function term(mixed $term): TendencyInterface
    {
        return parent::term($term);
    }
}