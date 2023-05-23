<?php namespace VanTran\NhamBaseTerms\Tests\Factories;

use Exception;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use ReflectionException;
use VanTran\NhamBaseTerms\Factories\TendencyTermFactory;

class TendencyTermFactoryTest extends TestCase
{   
    /**
     * @var TendencyTermFactory
     */
    private $factory;

    /**
     * {@inheritdoc}
     */
    public function setup(): void
    {
        $this->factory = new TendencyTermFactory();
    }

    /**
     * Trả về lớp khởi tạo đối tượng trong nhóm Ngũ hành
     * 
     * @return TendencyTermFactory 
     */
    protected function factory(): TendencyTermFactory
    {
        return $this->factory;
    }

    /**
     * @covers TendencyTermFactory
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testGetInstanceByIndex(): void
    {
        $term = $this->factory()->getTerm(1);

        $this->assertEquals('a', $term->getKey());
        $this->assertTrue(in_array('duong', $term->getAlias()));
        $this->assertTrue(in_array('posive', $term->getAlias()));
        $this->assertTrue(in_array('yang', $term->getAlias()));
    }

    /**
     * @covers TendencyTermFactory
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testGetInstanceByKey(): void
    {
        $term = $this->factory()->getTerm('b');


        $this->assertEquals(2, $term->getIndex());
        $this->assertTrue(in_array('am', $term->getAlias()));
        $this->assertTrue(in_array('negative', $term->getAlias()));
        $this->assertTrue(in_array('yin', $term->getAlias()));
    }

    /**
     * @covers TendencyTermFactory
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testGetInstanceByAlias(): void
    {
        $term = $this->factory()->getTerm('am');

        $this->assertEquals(2, $term->getIndex());
        $this->assertEquals('b', $term->getKey());
    }

    /**
     * @covers TendencyTermFactory
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testReference(): void
    {
        $term1 = $this->factory()->getTerm('duong');
        $term2 = $this->factory()->getTerm(1);

        $this->assertTrue($term1 === $term2);
    }
}