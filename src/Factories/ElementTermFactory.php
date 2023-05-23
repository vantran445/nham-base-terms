<?php namespace VanTran\NhamBaseTerms\Factories;

use VanTran\NhamBaseTerms\Terms\ElementTerm;

/**
 * Lớp sản xuất 1 đối tượng trong nhóm ngũ hành theo cấu trúc Singleton.
 * 
 * @author Văn Trần <caovan.info@gmail.com>
 * @package VanTran\NhamBaseTerms\Factories
 */
class ElementTermFactory extends AbstractSingletonTermFactory
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