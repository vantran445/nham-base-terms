<?php namespace VanTran\NhamBaseTerms\Terms;

use VanTran\NhamBaseTerms\Contracts\TermInterface;
use VanTran\NhamBaseTerms\Traits\HasAliasTrait;
use VanTran\NhamBaseTerms\Traits\HasOrderTrait;
use VanTran\NhamBaseTerms\Traits\HasKeyTrait;

abstract class AbstractTerm implements TermInterface
{
    use HasOrderTrait;
    use HasKeyTrait;
    use HasAliasTrait;

    public function __construct(
        public readonly int $order,
        public readonly string $key,
        protected array $alias = []
    )
    {
        
    }
}