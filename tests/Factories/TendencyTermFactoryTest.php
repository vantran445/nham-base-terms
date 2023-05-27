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
        $term = $this->factory()->term(0);

        $this->assertEquals('a', $term->getChar());
        $this->assertEquals('am', $term->getKey());
    }

    /**
     * @covers TendencyTermFactory
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testGetInstanceByChar(): void
    {
        $term = $this->factory()->term('b');


        $this->assertEquals(1, $term->getIndex());
        $this->assertEquals('duong', $term->getKey());
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
        $term = $this->factory()->term('am');

        $this->assertEquals(0, $term->getIndex());
        $this->assertEquals('a', $term->getChar());
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
        $term1 = $this->factory()->term('duong');
        $term2 = $this->factory()->term(1);

        $this->assertTrue($term1 === $term2);
    }
}