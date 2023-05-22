<?php namespace VanTran\NhamBaseTerms\Traits;

trait HasIndexTrait
{
    /**
     * {@inheritdoc}
     */
    public function getIndex(): int
    {
        return $this->index;
    }
}