<?php namespace VanTran\NhamBaseTerms\Traits;

use Closure;

trait TermLoopableTrait
{
    /**
     * Lặp thông qua mỗi đối tượng trong nhóm 
     * 
     * @param Closure $fn
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     */
    public function each(Closure $fn): void
    {
        foreach ($this->all() as $index => $term) {
            $r = $fn($term, $index);

            if ($r === false) {
                break;
            }
        }
    }
}