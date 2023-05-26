<?php namespace VanTran\NhamBaseTerms\Traits;

trait HasAliasTrait
{
    /**
     * {@inheritdoc}
     */
    public function getAliases(): array
    {
        return $this->alias;
    }

    /**
     * Thêm 1 hoặc nhiều bí danh cho đối tượng
     * 
     * @param string|array $alias Nếu có nhiều bí danh là chuỗi, phân tách bằng dấu phẩy (,)
     * @return HasAliasTrait 
     */
    public function setAlias(string|array $alias): self
    {
        if (is_string($alias)) {
            $alias = explode(',', $alias);
        }

        foreach ($alias as $a) {
            if (!$this->hasAlias($a)) {
                array_push($this->alias, $a);
            }
        }

        return $this;
    }

    /**
     * Kiểm tra 1 đối tượng có bí danh mong muốn không
     * 
     * @param string $alias 
     * @return bool 
     */
    public function hasAlias(string $alias): bool
    {
        return in_array($alias, $this->getAliases());
    }
}