<?php namespace VanTran\NhamBaseTerms\Contracts;

interface HasReferences
{
    /**
     * Trả về mảng tất cả các tham chiếu của đối tượng
     * 
     * @return array 
     */
    public function getRefs(): array;

    /**
     * Trả về đối tượng được tham chiếu thông qua khóa lưu trữ
     * 
     * @param string $key 
     * @return mixed 
     */
    public function getRef(string $key): mixed;

    /**
     * Kiểm tra có đối tượng được tham chiếu hay không thông qua khóa lưu trữ
     * 
     * @param string $key 
     * @return bool 
     */
    public function hasRef(string $key): bool;
}