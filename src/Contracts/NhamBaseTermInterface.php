<?php namespace VanTran\NhamBaseTerms\Contracts;

interface NhamBaseTermInterface extends TermInterface
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
     * kiểm tra 1 tham chiếu có tồn tại thông qua khóa
     * 
     * @param string $key 
     * @return bool 
     */
    public function hasRef(string $key): bool;

    /**
     * Trả về tham chiếu mục tiêu của đối tượng
     * 
     * @param mixed $key 
     * @return null|SexagenaryTermInterface 
     */
    public function getRef(mixed $key): ?NhamBaseTermInterface;

    /**
     * Thêm tham chiếu đến 1 đối tượng
     * 
     * @param mixed $key 
     * @param SexagenaryTermInterface $term 
     * @return void 
     */
    public function addRef(mixed $key, NhamBaseTermInterface $term): void;
}