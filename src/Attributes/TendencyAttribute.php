<?php namespace VanTran\NhamBaseTerms\Attributes;

use Attribute;

#[Attribute(Attribute::IS_REPEATABLE|Attribute::TARGET_CLASS)]
readonly class TendencyAttribute extends TermAttribute
{
    
}