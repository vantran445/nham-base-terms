<?php namespace VanTran\NhamBaseTerms\Tests;

use Exception as GlobalException;
use PHPUnit\Framework\Exception;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\UnknownClassOrInterfaceException;
use ReflectionException;
use VanTran\NhamBaseTerms\TermContainer;
use VanTran\NhamBaseTerms\Terms\BranchTerm;
use VanTran\NhamBaseTerms\Terms\StarTerm;
use VanTran\NhamBaseTerms\Terms\StemTerm;

class TermContainerTest extends TestCase
{
    /**
     * @var TermContainer
     */
    private $repo;

    public function setup(): void
    {
        $this->repo = new TermContainer();
    }

    /**
     * @covers TermContainer
     * 
     * @return void 
     * @throws Exception 
     * @throws ExpectationFailedException 
     * @throws UnknownClassOrInterfaceException 
     */
    public function testGetBranch(): void
    {
        $this->assertInstanceOf(BranchTerm::class, $this->repo->branch->dan());
    }

    /**
     * @covers TermContainer
     * 
     * @return void 
     * @throws Exception 
     * @throws ExpectationFailedException 
     * @throws UnknownClassOrInterfaceException 
     */
    public function testGetStem(): void
    {
        $this->assertInstanceOf(StemTerm::class, $this->repo->stem('giap'));
    }

    /**
     * @covers TermContainer
     * 
     * @return void 
     * @throws Exception 
     * @throws ExpectationFailedException 
     * @throws UnknownClassOrInterfaceException 
     */
    public function testGetStar(): void
    {
        $this->assertInstanceOf(StarTerm::class, $this->repo->star('thanh_long'));
    }

    /**
     * @covers TermContainer
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws GlobalException 
     * @throws ExpectationFailedException 
     */
    public function testGetByClosure(): void
    {
        $this->repo->term(function(TermContainer $repo) {
            $term = $repo->stem('canh');

            if (!$term->hasAlias('day_stem')) {
                $term->setAlias('day_stem');
            }

            return $term;
        });

        $this->assertEquals('g', $this->repo->stem('day_stem')->getKey());
    }
}