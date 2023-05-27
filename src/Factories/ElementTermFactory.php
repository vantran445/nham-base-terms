<?php namespace VanTran\NhamBaseTerms\Factories;

use Exception;
use VanTran\NhamBaseTerms\Contracts\ElementInterface;
use VanTran\NhamBaseTerms\Terms\ElementTerm;

/**
 * Lớp sản xuất 1 đối tượng trong nhóm ngũ hành theo cấu trúc Singleton.
 * 
 * @author Văn Trần <caovan.info@gmail.com>
 * @package VanTran\NhamBaseTerms\Factories
 */
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

    /**
     * Trả về 1 đối tượng trong nhóm Ngũ hành
     * 
     * @param mixed $term 
     * @return ElementInterface 
     * @throws Exception 
     */
    public function term(mixed $term): ElementInterface
    {
        return parent::term($term);
    }
}