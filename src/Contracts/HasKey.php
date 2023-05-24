<?php namespace VanTran\NhamBaseTerms\Contracts;

interface HasKey
{
    /**
     * Trả về khóa định danh cho đối tượng. Khóa nên là duy nhất trong 1 nhóm đối tượng cùng loại.
     * 
     * @return int 
     */
    public function getKey(): string;
}