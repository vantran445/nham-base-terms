<?php namespace VanTran\NhamBaseTerms;

use VanTran\NhamBaseTerms\Factories\StemTermFactory;

/**
 * @property Terms\StemTerm giap
 * @property Terms\StemTerm at
 * @property Terms\StemTerm binh
 * @property Terms\StemTerm dinh
 * @property Terms\StemTerm mau
 * @property Terms\StemTerm ky
 * @property Terms\StemTerm canh
 * @property Terms\StemTerm tan
 * @property Terms\StemTerm nham
 * @property Terms\StemTerm quy
 * 
 * @method Terms\StemTerm giap()
 * @method Terms\StemTerm at()
 * @method Terms\StemTerm binh()
 * @method Terms\StemTerm dinh()
 * @method Terms\StemTerm mau()
 * @method Terms\StemTerm ky()
 * @method Terms\StemTerm canh()
 * @method Terms\StemTerm tan()
 * @method Terms\StemTerm nham()
 * @method Terms\StemTerm quy()
 * 
 * @author Văn Trần <caovan.info@gmail.com>
 * @package VanTran\NhamBaseTerms
 */
class Stem extends AbstractTermHandler
{
    /**
     * {@inheritdoc}
     */
    protected function getDefaultFactoryClass(): string 
    { 
        return StemTermFactory::class;
    }

    /**
     * {@inheritdoc}
     */
    protected function getTotalTerms(): int 
    { 
        return 10;
    }

}