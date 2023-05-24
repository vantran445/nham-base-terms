<?php namespace VanTran\NhamBaseTerms\Terms;

use Exception;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use ReflectionException;
use VanTran\NhamBaseTerms\Branch;

class BranchTest extends TestCase
{
    /**
     * @var Branch
     */
    private $branches;

    public function setup(): void
    {
        $this->branches = new Branch();
    }

    /**
     * @covers Branch
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testSingleton(): void
    {
        $term1 = $this->branches->term('dan');
        $term2 = $this->branches->term(3);

        $this->assertTrue($term1 === $term2);
    }

    /**
     * @covers Branch
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testMagicMethod(): void
    {
        $this->assertTrue($this->branches->term(12) === $this->branches->pig());
    }

    /**
     * @covers Branch
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testMagicProp(): void
    {
        $this->assertTrue($this->branches->term(7) === $this->branches->horse);
    }
}