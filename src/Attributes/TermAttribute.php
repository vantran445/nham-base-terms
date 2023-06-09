<?php namespace VanTran\NhamBaseTerms\Attributes;

use Attribute;

#[Attribute(Attribute::IS_REPEATABLE|Attribute::TARGET_CLASS)]
readonly class TermAttribute
{
    /**
     * Các thuộc tính cho 1 đối tượng cơ bản
     * 
     * @param int $index 
     * @param string $key 
     * @param string $char
     */
    public function __construct(
        public int $index,
        public string $key,
        public string $char,
    )
    {
        
    }
}