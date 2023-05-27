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
        $term = $this->factory()->term(0);


        $this->assertEquals('a', $term->getChar());
        $this->assertEquals('moc', $term->getKey());
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
        $term = $this->factory()->term('hoa');

        $this->assertEquals(1, $term->getIndex());
        $this->assertEquals('b', $term->getChar());
    }

    /**
     * @covers ElementTermFactory
     * @return void 
     */
    public function testGetTermByChar(): void
    {
        $term = $this->factory()->term('c');

        $this->assertEquals(2, $term->getIndex());
        $this->assertEquals('tho', $term->getKey());
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
        $term1 = $this->factory()->term('d');
        $term2 = $this->factory()->term(3);

        $this->assertTrue($term1 === $term2);
    }
}