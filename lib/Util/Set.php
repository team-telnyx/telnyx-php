<?php

namespace Telnyx\Util;

use ArrayIterator;
use IteratorAggregate;

class Set implements IteratorAggregate
{
    private $_elts;

    public function __construct($members = [])
    {
        $this->_elts = [];
        foreach ($members as $item) {
            $this->_elts[$item] = true;
        }
    }

    public function includes($elt): bool
    {
        return isset($this->_elts[$elt]);
    }

    public function add($elt): void
    {
        $this->_elts[$elt] = true;
    }

    public function discard($elt)
    {
        unset($this->_elts[$elt]);
    }

    public function toArray(): array
    {
        return \array_keys($this->_elts);
    }

    public function getIterator(): \Traversable
    {
        return new ArrayIterator($this->toArray());
    }
}
