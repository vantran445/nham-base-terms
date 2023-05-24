<?php namespace VanTran\NhamBaseTerms\Terms;

use VanTran\NhamBaseTerms\Attributes\TendencyAttribute;
use VanTran\NhamBaseTerms\Contracts\TendencyInterface;

/**
 * Âm - Dương
 * 
 * @author Văn Trần <caovan.info@gmail.com>
 * @package VanTran\NhamBaseTerms\Terms
 */
#[TendencyAttribute(1, 'a', ['duong', 'yang', 'posive'])]
#[TendencyAttribute(2, 'b', ['am', 'yin', 'negative'])]
final class TendencyTerm extends AbstractTerm implements TendencyInterface {}
