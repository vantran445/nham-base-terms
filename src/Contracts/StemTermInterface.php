<?php namespace VanTran\NhamBaseTerms\Contracts;

interface StemTermInterface extends NhamBaseTermInterface
{
    /**
     * Trả về số hoặc chuỗi giúp phân loại đối tượng
     * 
     * @return int|string 
     */
    public function getType(): int|string;
}