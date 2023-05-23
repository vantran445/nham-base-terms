<?php namespace VanTran\NhamBaseTerms\Factories;

/**
 * Lớp trừu tượng sản xuất 1 đối tượng dưới cấu trúc singleton
 * 
 * @author Văn Trần <caovan.info@gmail.com>
 * @package VanTran\NhamBaseTerms\Factories
 */
abstract class AbstractSingletonTermFactory extends AbstractTermFactory
{
    protected function isSingleton(): bool
    {
        return self::SINGLETON;
    }
}