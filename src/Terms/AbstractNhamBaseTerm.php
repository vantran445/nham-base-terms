<?php namespace VanTran\NhamBaseTerms\Terms;

use Closure;
use Exception;
use VanTran\NhamBaseTerms\Contracts\ElementInterface;
use VanTran\NhamBaseTerms\Contracts\NhamBaseTermInterface;
use VanTran\NhamBaseTerms\Contracts\TendencyInterface;
use VanTran\NhamBaseTerms\Element;
use VanTran\NhamBaseTerms\Tendency;

abstract class AbstractNhamBaseTerm extends AbstractTerm implements NhamBaseTermInterface
{
    /**
     * @var array Mảng ánh xạ các tham chiếu của đối tượng
     */
    protected $refs = [];

    public readonly ElementInterface $element;
    public readonly TendencyInterface $tendency;

    public function __construct(
        int $index,
        string $key,
        string $char,
        string|int $element,
        string|int $tendency,
        array $aliases = []
    )
    {
        $this->element = Element::term($element);
        $this->tendency = Tendency::term($tendency);

        parent::__construct($index, $key, $char, $aliases);
    }

    /**
     * {@inheritdoc}
     */
    public function getElement(): ElementInterface
    {
        return $this->element;
    }

    /**
     * {@inheritdoc}
     */
    public function getTendency(): TendencyInterface
    {
        return $this->tendency;
    }

    /**
     * {@inheritdoc}
     */
    public function hasRef(string $key): bool
    {
        return isset($this->refs[$key]);
    }

    /**
     * {@inheritdoc}
     */
    public function getRef(mixed $key): ?NhamBaseTermInterface
    {
        if ($key instanceof Closure) {
            $key = $key($this);
        }

        return ($this->hasRef($key)) ? $this->refs[$key] : null;
    }

    /**
     * {@inheritdoc}
     */
    public function addRef(mixed $key, NhamBaseTermInterface $term): void
    {
        if ($key instanceof Closure) {
            $key = $key($this);
        }

        if ($this->hasRef($key)) {
            throw new Exception("The reference already exsits.");
        }

        $this->refs[$key] = $term;
    }
}
