<?php namespace VanTran\NhamBaseTerms\Traits;

trait HasReferencesTrait
{
    /**
     * Mảng chứa các tham chiếu
     * 
     * @var array
     */
    private $refs = [];

    /**
     * {@inheritdoc}
     */
    public function hasRef(string $key): bool
    {
        return isset($this->refs[$key]);
    }

    /**
     * {@inheritdoc}
     */
    public function getRefs(): array
    {
        return $this->refs;
    }

    /**
     * {@inheritdoc}
     */
    public function getRef(string $key): mixed
    {
        if (!$this->hasRef($key)) {
            return null;
        }

        return $this->refs[$key];
    }
}