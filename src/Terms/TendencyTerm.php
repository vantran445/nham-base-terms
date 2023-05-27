<?php namespace VanTran\NhamBaseTerms\Terms;

use VanTran\NhamBaseTerms\Attributes\TendencyAttribute;
use VanTran\NhamBaseTerms\Contracts\TendencyInterface;

/**
 * Âm - Dương
 * 
 * @author Văn Trần <caovan.info@gmail.com>
 * @package VanTran\NhamBaseTerms\Terms
 */
#[TendencyAttribute(0, 'am', 'a')]
#[TendencyAttribute(1, 'duong', 'b')]
final class TendencyTerm extends AbstractTerm implements TendencyInterface {}
