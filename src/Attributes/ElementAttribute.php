<?php namespace VanTran\NhamBaseTerms\Attributes;

use Attribute;

#[Attribute(Attribute::IS_REPEATABLE|Attribute::TARGET_CLASS)]
readonly class ElementAttribute
{
    public function __construct(
        public int $index,
        public string $key,
        public array $alias = []
    ) {}
}