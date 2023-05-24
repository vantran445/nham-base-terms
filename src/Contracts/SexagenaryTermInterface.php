<?php namespace VanTran\NhamBaseTerms\Contracts;

interface SexagenaryTermInterface extends TermInterface
{
    public function getElement(): ElementInterface;
    public function getTendency(): TendencyInterface;
    public function getRef(string|callable $key): SexagenaryTermInterface;
}