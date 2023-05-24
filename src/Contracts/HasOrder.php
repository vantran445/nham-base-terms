<?php namespace VanTran\NhamBaseTerms\Contracts;

interface HasOrder
{
    /**
     * Trả về số đại diện cho đối tượng
     * 
     * @return int 
     */
    public function getOrder(): int;
}