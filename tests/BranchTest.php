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

    /**
     * @covers Branch
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testGetAll(): void
    {
        $terms = $this->branches->all();
        $keys = range('a', 'l');

        foreach ($terms as $index => $terms) {
            $this->assertEquals($keys[$index], $terms->getKey());
        }
    }

    /**
     * @covers Branch
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     */
    public function testLoopThrough(): void
    {
        $keys = range('a', 'l');
        $index = 0;

        $this->branches->each(function (BranchTerm $term) use (&$index, $keys) {
            $term->setAlias('term_' . $index + 1);
            $this->assertEquals($keys[$index], $term->getKey());

            $index ++;
        });

        $term = $this->branches->term('term_2');
        $this->assertTrue($term->hasAlias('suu'));
    }

    /**
     * @covers Branch
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     */
    public function testMapping(): void
    {
        $alias = 'daybranch';

        $this->branches->map(function (Branch $b) use ($alias) {
            $b->term('tuat')->setAlias($alias);
        });

        $term = $this->branches->term($alias);
        $this->assertEquals('k', $term->getKey());
    }
}