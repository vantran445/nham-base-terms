<?php namespace VanTran\NhamBaseTerms\Terms;

use VanTran\NhamBaseTerms\Attributes\BaseNhamTermAttribute;
use VanTran\NhamBaseTerms\Contracts\PrimeStarTermInterface;

#[BaseNhamTermAttribute(0, 'hau', 'a', 'thuy', 'duong')]
#[BaseNhamTermAttribute(1, 'quy', 'b', 'tho', 'am')]
#[BaseNhamTermAttribute(2, 'long', 'c', 'moc', 'duong')]
#[BaseNhamTermAttribute(3, 'hop', 'd', 'moc', 'am')]
#[BaseNhamTermAttribute(4, 'cau', 'e', 'tho', 'duong')]
#[BaseNhamTermAttribute(5, 'xa', 'f', 'hoa', 'am')]
#[BaseNhamTermAttribute(6, 'tuoc', 'g', 'hoa', 'duong')]
#[BaseNhamTermAttribute(7, 'thuong', 'h', 'tho', 'am')]
#[BaseNhamTermAttribute(8, 'ho', 'i', 'kim', 'duong')]
#[BaseNhamTermAttribute(9, 'am', 'j', 'kim', 'am')]
#[BaseNhamTermAttribute(10, 'khong', 'k', 'tho', 'duong')]
#[BaseNhamTermAttribute(11, 'vu', 'l', 'thuy', 'am')]
class PrimeStarTerm extends AbstractNhamBaseTerm implements PrimeStarTermInterface
{
    /**
     * {@inheritdoc}
     */
    public function getType(): int|string 
    { 
        return 'prime_star';
    }
}