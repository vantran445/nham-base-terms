<?php namespace VanTran\NhamBaseTerms\Tests\Factories;

use Exception;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use ReflectionException;
use VanTran\NhamBaseTerms\Factories\ElementTermFactory;

class ElementTermFactoryTest extends TestCase
{   
    /**
     * @var ElementTermFactory
     */
    private $factory;

    /**
     * {@inheritdoc}
     */
    public function setup(): void
    {
        $this->factory = new ElementTermFactory();
    }

    /**
     * Trả về lớp khởi tạo đối tượng trong nhóm Ngũ hành
     * 
     * @return ElementTermFactory 
     */
    protected function factory(): ElementTermFactory
    {
        return $this->factory;
    }

    /**
     * @covers ElementTermFactory
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
        $this->assertTrue(in_array('moc', $term->getAlias()));
    }

    /**
     * @covers ElementTermFactory
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testGetInstanceByKey(): void
    {
        $term = $this->factory()->getTerm('b');


        $this->assertEquals(2, $term->getOrder());
        $this->assertTrue(in_array('fire', $term->getAlias()));
    }

    /**
     * @covers ElementTermFactory
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testGetInstanceByAlias(): void
    {
        $term = $this->factory()->getTerm('tho');

        $this->assertEquals(3, $term->getOrder());
        $this->assertEquals('c', $term->getKey());
    }

    /**
     * @covers ElementTermFactory
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testReference(): void
    {
        $term1 = $this->factory()->getTerm('kim');
        $term2 = $this->factory()->getTerm(4);

        $this->assertTrue($term1 === $term2);
    }
}