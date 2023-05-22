<?php namespace VanTran\NhamBaseTerms\Attributes;

use Attribute;

#[Attribute(Attribute::IS_REPEATABLE|Attribute::TARGET_CLASS)]
readonly class TermAttribute
{
    /**
     * Các thuộc tính của đối tượng Nhâm cơ bản
     * 
     * @param int $index    Số đại diện cho đối tượng (duy nhất trong nhóm)
     * @param string $key   Chuỗi đại diện cho đối tượng (duy nhất trong nhóm)
     * @param int $element  Thuộc tính ngũ hành của đối tượng: 0 thủy, 1 hỏa, 2 kim, 3 mộc, 4 thổ
     * @param int $yinyang  Tính chất âm (0), dương (1) của đối tượng
     * @return void 
     */
    public function __construct(
        public int $index,
        public string $key,
        public int $element,
        public int $yinyang,
        public array $alias = []
    )
    {
        
    }
}