<?php namespace VanTran\NhamBaseTerms\Contracts;

interface HasIndex
{
    /**
     * Trả về số đại diện cho đối tượng
     * 
     * @return int 
     */
    public function getIndex(): int;
}