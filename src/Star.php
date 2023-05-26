<?php namespace VanTran\NhamBaseTerms;

use ReflectionException;
use Exception;
use VanTran\NhamBaseTerms\Factories\StarTermFactory;
use VanTran\NhamBaseTerms\Terms\StarTerm;
use VanTran\NhamBaseTerms\Traits\TermLoopableTrait;

/**
 * @property Terms\StarTerm quy
 * @property Terms\StarTerm xa
 * @property Terms\StarTerm tuoc
 * @property Terms\StarTerm hop
 * @property Terms\StarTerm cau
 * @property Terms\StarTerm long
 * @property Terms\StarTerm khong
 * @property Terms\StarTerm ho
 * @property Terms\StarTerm thuong
 * @property Terms\StarTerm vu
 * @property Terms\StarTerm am
 * @property Terms\StarTerm hau
 * 
 * @method Terms\StarTerm quy()
 * @method Terms\StarTerm xa()
 * @method Terms\StarTerm tuoc()
 * @method Terms\StarTerm hop()
 * @method Terms\StarTerm cau()
 * @method Terms\StarTerm long()
 * @method Terms\StarTerm khong()
 * @method Terms\StarTerm ho()
 * @method Terms\StarTerm thuong()
 * @method Terms\StarTerm vu()
 * @method Terms\StarTerm am()
 * @method Terms\StarTerm hau()
 * 
 * @author Văn Trần <caovan.info@gmail.com>
 * @package VanTran\NhamBaseTerms
 */
class Star extends AbstractTermHandler
{

    /**
     * {@inheritdoc}
     */
    protected function getDefaultFactoryClass(): string 
    { 
        return StarTermFactory::class;
    }

    /**
     * {@inheritdoc}
     */
    protected function getTotalTerms(): int 
    { 
        return 12;
    }
    
}