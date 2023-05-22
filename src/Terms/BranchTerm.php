<?php namespace VanTran\NhamBaseTerms\Terms;

use VanTran\NhamBaseTerms\Attributes\TermAttribute;

#[TermAttribute(0, 'a', 0, 1, ['ty'])]
#[TermAttribute(1, 'b', 4, 0, ['suu'])]
#[TermAttribute(2, 'c', 3, 1, ['dan'])]
#[TermAttribute(3, 'd', 3, 0, ['mao'])]
#[TermAttribute(4, 'e', 4, 1, ['thin'])]
#[TermAttribute(5, 'f', 1, 0, ['ti'])]
#[TermAttribute(6, 'g', 1, 1, ['ngo'])]
#[TermAttribute(7, 'h', 4, 0, ['mui'])]
#[TermAttribute(8, 'i', 2, 1, ['than'])]
#[TermAttribute(9, 'j', 2, 0, ['dau'])]
#[TermAttribute(10, 'k', 4, 1, ['tuat'])]
#[TermAttribute(11, 'l', 0, 0, ['hoi'])]
class BranchTerm extends AbstractTerm
{

}