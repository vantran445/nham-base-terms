<?php namespace VanTran\NhamBaseTerms\Contracts;

/**
 * Giao diện triển khai cho 1 đối tượng có 1 hoặc nhiều bí danh. Chẳng hạn, Chi Tý nếu là Chi ngày có thể có bí danh là
 * 'day_branch', nếu là tên tháng có thể có bí danh là 'month', hoặc cả 2 trường hợp.
 * 
 * @author Văn Trần <caovan.info@gmail.com>
 * @package VanTran\NhamBaseTerms\Contracts
 */
interface HasAlias
{
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
     * Thêm 1 hoặc nhiều bí danh cho đối tượng
     * 
     * @param string|array $alias Nếu có nhiều bí danh là chuỗi, phân tách bằng dấu phẩy (,)
     * @return self 
     */
    public function setAlias(string|array $alias): self;
}