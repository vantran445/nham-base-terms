<?php namespace VanTran\NhamBaseTerms\Traits;

trait HasOrderTrait
{
    /**
     * {@inheritdoc}
     */
    public function getOrder(): int
    {
        return $this->order;
    }
}