<?php namespace VanTran\NhamBaseTerms\Terms;

use VanTran\NhamBaseTerms\Attributes\ElementAttribute;
use VanTran\NhamBaseTerms\Contracts\ElementInterface;

/**
 * Ngũ hành - Các thuộc tính mặc định được sắp xếp theo cảm hứng của 4 mùa trong năm, bắt đầu với mùa Xuân thuộc Mộc.
 * 
 * @author Văn Trần <caovan.info@gmail.com>
 * @package VanTran\NhamBaseTerms\Terms
 */
#[ElementAttribute(0, 'moc', 'a')]
#[ElementAttribute(1, 'hoa', 'b')]
#[ElementAttribute(2, 'tho', 'c')]
#[ElementAttribute(3, 'kim', 'd')]
#[ElementAttribute(4, 'thuy', 'e')]
final class ElementTerm extends AbstractTerm implements ElementInterface
{

}