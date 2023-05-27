<?php namespace VanTran\NhamBaseTerms\Terms;

use VanTran\NhamBaseTerms\Attributes\BaseNhamTermAttribute;
use VanTran\NhamBaseTerms\Contracts\StemTermInterface;

#[BaseNhamTermAttribute(0, 'giap', 'a', 'moc', 'duong')]
#[BaseNhamTermAttribute(1, 'at', 'b', 'moc', 'am')]
#[BaseNhamTermAttribute(2, 'binh', 'c', 'hoa', 'duong')]
#[BaseNhamTermAttribute(3, 'dinh', 'd', 'hoa', 'am')]
#[BaseNhamTermAttribute(4, 'mau', 'e', 'tho', 'duong')]
#[BaseNhamTermAttribute(5, 'ky', 'f', 'tho', 'am')]
#[BaseNhamTermAttribute(6, 'canh', 'g', 'kim', 'duong')]
#[BaseNhamTermAttribute(7, 'tan' ,'h', 'kim', 'am')]
#[BaseNhamTermAttribute(8, 'nham' ,'i', 'thuy', 'duong')]
#[BaseNhamTermAttribute(9, 'quy', 'j', 'thuy', 'am')]
class StemTerm extends AbstractNhamBaseTerm implements StemTermInterface
{
    /**
     * {@inheritdoc}
     */
    public function getType(): int|string 
    { 
        return 'stem';
    }
}