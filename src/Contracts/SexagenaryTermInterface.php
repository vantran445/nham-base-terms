<?php namespace VanTran\NhamBaseTerms\Contracts;

interface SexagenaryTermInterface extends TermInterface
{
    /**
     * Trả về hành trong ngũ hành của đối tượng
     * 
     * @return ElementInterface 
     */
    public function getElement(): ElementInterface;

    /**
     * Trả về tính chất Âm dương của đối tượng
     * 
     * @return TendencyInterface 
     */
    public function getTendency(): TendencyInterface;

    /**
     * Trả về tham chiếu mục tiêu của đối tượng
     * 
     * @param string|callable $key 
     * @return null|SexagenaryTermInterface 
     */
    public function getRef(string|callable $key): ?SexagenaryTermInterface;
}