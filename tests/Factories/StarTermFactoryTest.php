<?php namespace VanTran\NhamBaseTerms;

use Exception;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use ReflectionException;
use VanTran\NhamBaseTerms\Factories\StarTermFactory;
use VanTran\NhamBaseTerms\Terms\AbstractSexagenaryTerm;
use VanTran\NhamBaseTerms\Terms\StarTerm;

class StarTermFactoryTest extends TestCase
{
    /**
     * 
     * @var StarTermFactory
     */
    private $factory;

    /**
     * {@inheritdoc}
     */
    public function setup(): void
    {
        $this->factory = new StarTermFactory();
    }

    /**
     * @covers StarTerm
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testGetInstanceByOrder(): void
    {
        $term = $this->factory->getTerm(1);

        $this->assertInstanceOf(StarTerm::class, $term);
        $this->assertEquals('a', $term->getKey());
        $this->assertTrue($term->getElement() === Element::earth());
        $this->assertTrue($term->getTendency() === Tendency::negative());
    }

    /**
     * @covers StarTerm
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testGetInstanceByKey(): void
    {
        $term = $this->factory->getTerm('e');

        $this->assertEquals(5, $term->getOrder());
        $this->assertTrue($term->hasAlias('cau_tran'));
    }

    /**
     * @covers StarTerm
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testGetInstanceByAlias(): void
    {
        $term = $this->factory->getTerm('long');
        
        $this->assertEquals('f', $term->getKey());
    }

    /**
     * @covers StarTerm
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testSingletonInstance(): void
    {
        $term = $this->factory->getTerm('ho');
        $refTerm = $this->factory->getTerm(8);

        $this->assertTrue($term === $refTerm);
    }

    /**
     * @covers StarTerm
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testRef(): void
    {
        $term = $this->factory->getTerm('thien_khong');
        
        $this->assertNull($term->getRef('harmony'));

        $love = $term->getRef(function(AbstractSexagenaryTerm $t) {
            if (!$t->hasRef('harmony')) {
                $t->setRef('harmony', $this->factory->getTerm('thien_hop'));
            }

            return 'harmony';
        });

        $this->assertTrue($love === $this->factory->getTerm(4));
    }
}
