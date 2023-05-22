<?php namespace VanTran\NhamBaseTerms\Traits;

trait HasKeyTrait
{
    /**
     * {@inheritdoc}
     */
    public function getKey(): string
    {
        return $this->key;
    }
}