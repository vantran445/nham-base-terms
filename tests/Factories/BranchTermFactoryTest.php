<?php namespace VanTran\NhamBaseTerms;

use Exception;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use ReflectionException;
use VanTran\NhamBaseTerms\Factories\BranchTermFactory;
use VanTran\NhamBaseTerms\Terms\AbstractSexagenaryTerm;
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

    /**
     * @covers BranchTerm
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testGetInstanceByOrder(): void
    {
        $term = $this->factory->getTerm(1);

        $this->assertInstanceOf(BranchTerm::class, $term);
        $this->assertEquals('a', $term->getKey());
        $this->assertTrue($term->getElement() === Element::water());
        $this->assertTrue($term->getTendency() === Tendency::posive());
    }

    /**
     * @covers BranchTerm
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testGetInstanceByKey(): void
    {
        $term = $this->factory->getTerm('b');

        $this->assertEquals(2, $term->getOrder());
        $this->assertTrue($term->hasAlias('suu'));
    }

    /**
     * @covers BranchTerm
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testGetInstanceByAlias(): void
    {
        $term = $this->factory->getTerm('hoi');
        
        $this->assertEquals('l', $term->getKey());
    }

    /**
     * @covers BranchTerm
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testSingletonInstance(): void
    {
        $term = $this->factory->getTerm('mao');
        $refTerm = $this->factory->getTerm(4);

        $this->assertTrue($term === $refTerm);
    }

    /**
     * @covers BranchTerm
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testRef(): void
    {
        $term = $this->factory->getTerm('mui');
        
        $this->assertNull($term->getRef('love'));

        $love = $term->getRef(function(AbstractSexagenaryTerm $t) {
            if (!$t->hasRef('love')) {
                $t->setRef('love', $this->factory->getTerm('ngo'));
            }

            return 'love';
        });

        $this->assertTrue($love === $this->factory->getTerm(7));
    }
}
