<?php namespace VanTran\NhamBaseTerms\Terms;

use VanTran\NhamBaseTerms\Attributes\ElementAttribute;
use VanTran\NhamBaseTerms\Contracts\ElementInterface;
use VanTran\NhamBaseTerms\Traits\HasAliasTrait;
use VanTran\NhamBaseTerms\Traits\HasIndexTrait;
use VanTran\NhamBaseTerms\Traits\HasKeyTrait;

/**
 * Ngũ hành
 * 
 * @author Văn Trần <caovan.info@gmail.com>
 * @package VanTran\NhamBaseTerms\Terms
 */
#[ElementAttribute(1, 'a', ['moc', 'wood'])]
#[ElementAttribute(2, 'b', ['hoa', 'fire'])]
#[ElementAttribute(3, 'c', ['tho', 'earth'])]
#[ElementAttribute(4, 'd', ['kim', ',metal'])]
#[ElementAttribute(5, 'e', ['thuy', 'water'])]
final class ElementTerm implements ElementInterface
{
    use HasIndexTrait;
    use HasKeyTrait;
    use HasAliasTrait;

    public function __construct(
        public readonly int $index,
        public readonly string $key,
        protected array $alias = []
    )
    {
        
    }
}