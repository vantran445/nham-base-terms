<?php namespace VanTran\NhamBaseTerms\Contracts;

interface TermInterface
{
    /**
     * Trả về số chỉ mục của đối tượng trong nhóm, thường được sử dụng trong các vòng lặp.
     * 
     * @return int 
     */
    public function getIndex(): int;

    /**
     * Trả về chuỗi đại diện cho đối tượng
     * 
     * @return string 
     */
    public function getKey(): string;

    /**
     * Trả về ký tự đại diện cho đối tượng
     * 
     * @return string 
     */
    public function getChar(): string;

    /**
     * Trả về mảng chứa danh sách các bí danh của đối tượng
     * 
     * @return array 
     */
    public function getAliases(): array;

    /**
     * Kiểm tra 1 đối tượng có bí danh mong muốn không
     * 
     * @param string $alias 
     * @return bool 
     */
    public function hasAlias(string $alias): bool;

    /**
     * Thêm 1 bí danh mới cho đối tượng
     * 
     * @param string $alias
     * @return void 
     */
    public function addAlias(string $alias): void;
}