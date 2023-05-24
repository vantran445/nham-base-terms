<?php namespace VanTran\NhamBaseTerms;

use Exception;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use ReflectionException;
use VanTran\NhamBaseTerms\Factories\StemTermFactory;
use VanTran\NhamBaseTerms\Terms\AbstractSexagenaryTerm;
use VanTran\NhamBaseTerms\Terms\StemTerm;

class StemTermFactoryTest extends TestCase
{
    /**
     * 
     * @var StemTermFactory
     */
    private $factory;

    /**
     * {@inheritdoc}
     */
    public function setup(): void
    {
        $this->factory = new StemTermFactory();
    }

    /**
     * @covers StemTerm
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testGetInstanceByOrder(): void
    {
        $term = $this->factory->getTerm(1);

        $this->assertInstanceOf(StemTerm::class, $term);
        $this->assertEquals('a', $term->getKey());
        $this->assertTrue($term->getElement() === Element::wood());
        $this->assertTrue($term->getTendency() === Tendency::posive());
    }

    /**
     * @covers StemTerm
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
        $this->assertTrue($term->hasAlias('mau'));
    }

    /**
     * @covers StemTerm
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testGetInstanceByAlias(): void
    {
        $term = $this->factory->getTerm('canh');
        
        $this->assertEquals('g', $term->getKey());
    }

    /**
     * @covers StemTerm
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testSingletonInstance(): void
    {
        $term = $this->factory->getTerm('nham');
        $refTerm = $this->factory->getTerm(9);

        $this->assertTrue($term === $refTerm);
    }

    /**
     * @covers StemTerm
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testRef(): void
    {
        $term = $this->factory->getTerm('binh');
        
        $this->assertNull($term->getRef('harmony'));

        $love = $term->getRef(function(AbstractSexagenaryTerm $t) {
            if (!$t->hasRef('harmony')) {
                $t->setRef('harmony', $this->factory->getTerm('tan'));
            }

            return 'harmony';
        });

        $this->assertTrue($love === $this->factory->getTerm(8));
    }
}
