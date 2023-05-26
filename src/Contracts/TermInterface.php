<?php namespace VanTran\NhamBaseTerms\Contracts;

interface TermInterface extends HasOrder, HasKey, HasAlias
{
    /**
     * Trả về số chỉ mục của đối tượng trong nhóm, thường được sử dụng trong các vòng lặp.
     * 
     * @return int 
     */
    public function getIndex(): int;
}