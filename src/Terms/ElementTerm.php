<?php namespace VanTran\NhamBaseTerms\Terms;

use VanTran\NhamBaseTerms\Attributes\ElementAttribute;
use VanTran\NhamBaseTerms\Contracts\ElementInterface;

/**
 * Ngũ hành
 * 
 * @author Văn Trần <caovan.info@gmail.com>
 * @package VanTran\NhamBaseTerms\Terms
 */
#[ElementAttribute(1, 'a', ['moc', 'wood'])]
#[ElementAttribute(2, 'b', ['hoa', 'fire'])]
#[ElementAttribute(3, 'c', ['tho', 'earth'])]
#[ElementAttribute(4, 'd', ['kim', 'metal'])]
#[ElementAttribute(5, 'e', ['thuy', 'water'])]
final class ElementTerm extends AbstractTerm implements ElementInterface
{

}