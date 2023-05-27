<?php namespace VanTran\NhamBaseTerms\Attributes;

use Attribute;

#[Attribute(Attribute::IS_REPEATABLE|Attribute::TARGET_ALL)]
readonly class BaseNhamTermAttribute
{
    public function __construct(
        public int $index,
        public string $key,
        public string $char,
        public string|int $element,
        public string|int $tendency,
        public array $aliases = []
    )
    {
        
    }
}