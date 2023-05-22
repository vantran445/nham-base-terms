<?php namespace VanTran\NhamBaseTerms\Tests;

use Exception;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use Throwable;
use VanTran\NhamBaseTerms\BranchFactory;
use VanTran\NhamBaseTerms\Terms\BranchTerm;

class BranchTest extends TestCase
{
    /**
     * @covers Branch
     * 
     * @return void 
     * @throws Exception 
     * @throws Throwable 
     * @throws ExpectationFailedException 
     */
    public function testGetTerm(): void
    {
        $branch = new BranchFactory();

        $b = $branch->term('b');
        $b2 = $branch->term(1);

        $this->assertTrue($b === $b2);
    }

    /**
     * @covers Branch
     * 
     * @return void 
     * @throws Exception 
     * @throws Throwable 
     * @throws ExpectationFailedException 
     */
    public function testGetAllTerms(): void
    {
        $keys = range('a', 'l');
        $branchs = new BranchFactory();

        foreach ($keys as $index => $keys) {
            $term = $branchs->term($keys);
            $term2 = $branchs->term($index);

            $this->assertTrue($term === $term2);
            $this->assertEquals($index, $term->index);
        }
    }

    /**
     * @covers Branch
     * 
     * @return void 
     * @throws Exception 
     * @throws Throwable 
     * @throws ExpectationFailedException 
     */
    public function testGetTermFromAlias(): void
    {
        $branch = new BranchFactory();
        $term = $branch->term('mao');

        $this->assertEquals(3, $term->element);
    }

    /**
     * @covers Branch
     * 
     * @return void 
     * @throws Exception 
     * @throws Throwable 
     * @throws ExpectationFailedException 
     */
    public function testSetAlias(): void
    {
        $branch = new BranchFactory();
        $term = $branch->term('than');
        $term->setAlias('day_branch');

        $term2 = $branch->term('day_branch');
        $this->assertTrue($term === $term2);
    }

    /**
     * @covers Branch
     * 
     * @return void 
     * @throws Exception 
     * @throws Throwable 
     * @throws ExpectationFailedException 
     */
    public function testAssociate(): void
    {
        $branch = new BranchFactory();
        $hoi = $branch->term('hoi');
        $dan = $branch->term('c');

        $this->assertNull($hoi->getAttribute('love'));

        $hoi->setAttribute('love', $branch->term('dan'));
        
        $this->assertInstanceOf(BranchTerm::class, $hoi->getAttribute('love'));
        $this->assertTrue($hoi->getAttribute('love') === $dan);
        $this->assertTrue($dan === $hoi->love);
    }
}