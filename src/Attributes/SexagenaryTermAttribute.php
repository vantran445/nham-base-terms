<?php namespace VanTran\NhamBaseTerms\Attributes;

use Attribute;

#[Attribute(Attribute::IS_REPEATABLE|Attribute::TARGET_ALL)]
readonly class SexagenaryTermAttribute
{
    public function __construct(
        public int $order,
        public string $key,
        public string|int $element,
        public string|int $tendency,
        public array $alias = []
    )
    {
        
    }
}