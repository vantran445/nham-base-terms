<?php namespace VanTran\NhamBaseTerms\Contracts;

use Closure;

interface TermCollection
{
    /**
     * Trả về mảng chứa toàn bộ đối tượng trong nhóm
     * 
     * @return array 
     */
    public function all(): array;

    /**
     * Lặp thông qua mỗi đối tượng trong nhóm
     * 
     * @param Closure $action 
     * @return void 
     */
    public function each(Closure $action): void;

    /**
     * Ánh xạ đối tượng với 1 khóa tùy chỉnh
     * 
     * @param string $key 
     * @param int|string $term 
     * @param bool $setTermAlias 
     * @return void 
     */
    public function map(string $key, int|string $term, bool $setTermAlias = true): void;

    /**
     * Kiểm tra một khóa ánh xạ đã được xác lập hay chưa
     * 
     * @param string $key 
     * @return bool 
     */
    public function isMapped(string $key): bool;

    /**
     * Trả về đối tượng mục tiêu
     * 
     * @param mixed $term 
     * @return TermInterface 
     */
    public function term(mixed $term): TermInterface;
}