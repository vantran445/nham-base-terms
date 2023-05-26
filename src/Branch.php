<?php namespace VanTran\NhamBaseTerms;

use VanTran\NhamBaseTerms\Factories\BranchTermFactory;

/**
 * @property Terms\BranchTerm ty
 * @property Terms\BranchTerm suu
 * @property Terms\BranchTerm dan
 * @property Terms\BranchTerm mao
 * @property Terms\BranchTerm thin
 * @property Terms\BranchTerm ti
 * @property Terms\BranchTerm ngo
 * @property Terms\BranchTerm mui
 * @property Terms\BranchTerm than
 * @property Terms\BranchTerm dau
 * @property Terms\BranchTerm tuat
 * @property Terms\BranchTerm hoi
 * 
 * @method Terms\BranchTerm ty()
 * @method Terms\BranchTerm suu()
 * @method Terms\BranchTerm dan()
 * @method Terms\BranchTerm mao()
 * @method Terms\BranchTerm thin()
 * @method Terms\BranchTerm ti()
 * @method Terms\BranchTerm ngo()
 * @method Terms\BranchTerm mui()
 * @method Terms\BranchTerm than()
 * @method Terms\BranchTerm dau()
 * @method Terms\BranchTerm tuat()
 * @method Terms\BranchTerm hoi()
 * 
 * @author Văn Trần <caovan.info@gmail.com>
 * @package VanTran\NhamBaseTerms
 */
class Branch extends AbstractTermHandler
{
    /**
     * {@inheritdoc}
     */
    protected function getDefaultFactoryClass(): string 
    { 
        return BranchTermFactory::class;
    }

    /**
     * {@inheritdoc}
     */
    protected function getTotalTerms(): int 
    { 
        return 12;
    }
}