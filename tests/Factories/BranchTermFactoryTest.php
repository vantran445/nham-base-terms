<?php namespace VanTran\NhamBaseTerms;

use PHPUnit\Framework\TestCase;
use VanTran\NhamBaseTerms\Factories\BranchTermFactory;
use VanTran\NhamBaseTerms\Terms\BranchTerm;

class BranchTermFactoryTest extends TestCase
{
    /**
     * 
     * @var BranchTermFactory
     */
    private $factory;

    /**
     * {@inheritdoc}
     */
    public function setup(): void
    {
        $this->factory = new BranchTermFactory();
    }

    public function testGetInstanceByOrder(): void
    {
        $term = $this->factory->getTerm(1);

        $this->assertEquals('a', $term->getKey());
        $this->assertTrue($term->getElement() === Element::water());
        $this->assertTrue($term->getTendency() === Tendency::posive());
    }
}
