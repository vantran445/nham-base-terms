<?php namespace VanTran\NhamBaseTerms\Attributes;

use Attribute;

#[Attribute(Attribute::IS_REPEATABLE|Attribute::TARGET_CLASS)]
readonly class TermAttribute
{
    /**
     * Các thuộc tính cho 1 đối tượng cơ bản
     * 
     * @param int $order 
     * @param string $key 
     * @param array $alias 
     * @return void 
     */
    public function __construct(
        public int $order,
        public string $key,
        public array $alias = []
    )
    {
        
    }
}