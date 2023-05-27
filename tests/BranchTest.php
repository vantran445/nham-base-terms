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
    public function testMagicMethod(): void
    {
        $this->assertTrue($this->branches->term(11) === $this->branches->hoi());
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
        $this->assertTrue($this->branches->term(6) === $this->branches->ngo);
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
            $this->assertEquals($keys[$index], $terms->getChar());
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
            $this->assertEquals($keys[$index], $term->getChar());

            $index ++;
        });
    }

    /**
     * @covers Branch
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     * @throws ExpectationFailedException 
     */
    public function testGetTermByCustomAlias(): void
    {
        $key = 'month_branch';
        $term = $this->branches->term('ti');
        $term->addAlias($key);

        $this->assertTrue($term === $this->branches->term($key));
    }
}