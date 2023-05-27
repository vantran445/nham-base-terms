<?php namespace VanTran\NhamBaseTerms\Contracts;

interface PrimeStarTermInterface extends NhamBaseTermInterface
{
    /**
     * Trả về số hoặc chuỗi giúp phân loại đối tượng
     * 
     * @return int|string 
     */
    public function getType(): int|string;
}