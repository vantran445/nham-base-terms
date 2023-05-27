<?php namespace VanTran\NhamBaseTerms\Terms;

use VanTran\NhamBaseTerms\Attributes\BaseNhamTermAttribute;
use VanTran\NhamBaseTerms\Contracts\BranchTermInterface;

#[BaseNhamTermAttribute(0, 'ty', 'a', 'thuy', 'duong')]
#[BaseNhamTermAttribute(1, 'suu', 'b', 'tho', 'am')]
#[BaseNhamTermAttribute(2, 'dan', 'c', 'moc', 'duong')]
#[BaseNhamTermAttribute(3, 'mao', 'd', 'moc', 'am')]
#[BaseNhamTermAttribute(4, 'thin', 'e', 'tho', 'duong')]
#[BaseNhamTermAttribute(5, 'ti', 'f', 'hoa', 'am')]
#[BaseNhamTermAttribute(6, 'ngo', 'g', 'hoa', 'duong')]
#[BaseNhamTermAttribute(7, 'mui', 'h', 'tho', 'am')]
#[BaseNhamTermAttribute(8, 'than', 'i', 'kim', 'duong')]
#[BaseNhamTermAttribute(9, 'dau', 'j', 'kim', 'am')]
#[BaseNhamTermAttribute(10, 'tuat', 'k', 'tho', 'duong')]
#[BaseNhamTermAttribute(11, 'hoi', 'l', 'thuy', 'am')]
class BranchTerm extends AbstractNhamBaseTerm implements BranchTermInterface
{
    /**
     * {@inheritdoc}
     */
    public function getType(): int|string 
    { 
        return 'branch';
    }

}