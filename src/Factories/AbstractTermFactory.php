<?php namespace VanTran\NhamBaseTerms\Factories;

use Closure;
use Exception;
use ReflectionClass;
use ReflectionException;
use VanTran\NhamBaseTerms\Contracts\TermCollection;
use VanTran\NhamBaseTerms\Contracts\TermInterface;

/**
 * Lớp trừu tượng sản xuất 1 đối tượng cơ bản
 * 
 * @author Văn Trần <caovan.info@gmail.com>
 * @package VanTran\NhamBaseTerms\Factories
 */
abstract class AbstractTermFactory implements TermCollection
{
    /**
     * Xác định lớp cơ sở cho đối tượng mục tiêu, chẳng hạn địa chi, thiên can, âm dương...
     * 
     * @return string 
     */
    abstract protected function getTermClass(): string;

    /**
     * @var TermInterface[]
     */
    private $terms = [];

    /**
     * @var TermInterface[] Mảng ánh xạ đối tượng
     */
    private $maps = [];

    public function __construct()
    {
        $this->init();
    }

    public function __call($name, $arguments)
    {
        return $this->term($name);
    }

    public function __get($name)
    {
        return $this->term($name);
    }

    /**
     * Khởi tạo toàn bộ các đối tượng trong 1 nhóm
     * 
     * @return void 
     * @throws ReflectionException 
     * @throws Exception 
     */
    private function init(): void
    {
        $ref = new ReflectionClass($this->getTermClass());
        $attributes = $ref->getAttributes();

        foreach ($attributes as $attribute) {
            $att = $attribute->newInstance();
            $term = $ref->newInstanceArgs((array)$att);

            if (!$term instanceof TermInterface) {
                throw new Exception("Error. Can not resolve term group.");
            }

            array_push($this->terms, $term);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function term(mixed $term): TermInterface
    {
        $key = ($term instanceof Closure) ? $term($this) : $term;
        $target = null;

        if (is_string($key)) {
            if (isset($this->maps[$key])) {
                $target = $this->maps[$key];
            }else {
                foreach ($this->terms as $t) {
                    if (
                        $t->getChar() === $key ||
                        $t->getKey() === $key ||
                        $t->hasAlias($key)
                    ) {
                        $target = $t;
                        break;
                    }
                }
            }
        } else {
            if (isset($this->terms[$key])) {
                $target = $this->terms[$key];
            }
        }

        if (null === $target) {
            throw new Exception("Error. Can not resolve target term.");
        }

        return $target;
    }

    /**
     * Trả về toàn bộ đối tượng trong nhóm
     * 
     * @return array 
     */
    public function all(): array
    {
        return $this->terms;
    }

    /**
     * {@inheritdoc}
     */
    public function isMapped(string $key): bool
    {
        return isset($this->maps[$key]);
    }

    /**
     * {@inheritdoc}
     */
    public function map(string $key, int|string $term, bool $setTermAlias = true): void
    {
        if ($this->isMapped($key)) {
            throw new Exception('Error. The alias was mapped.');
        }

        $term = $this->term($term);
        $this->maps[$key] = $term;

        if ($setTermAlias) {
            $term->addAlias($key);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function each(Closure $action): void
    {
        foreach ($this->all() as $index => $term) {
            $r = $action($term, $index);

            if ($r === false) {
                break;
            }
        }
    }
}