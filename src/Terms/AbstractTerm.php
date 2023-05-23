<?php namespace VanTran\NhamBaseTerms\Terms;

use VanTran\NhamBaseTerms\Contracts\TermInterface;
use VanTran\NhamBaseTerms\Traits\HasAliasTrait;
use VanTran\NhamBaseTerms\Traits\HasIndexTrait;
use VanTran\NhamBaseTerms\Traits\HasKeyTrait;

abstract class AbstractTerm implements TermInterface
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