<?php
/**
 * Segments iterator
 * You need PHP 7.1 at least
 * You need Zip Extension or PclZip library
 * Encoding : ISO-8859-1
 * Last commit by $Author: neveldo $
 * Date - $Date: 2009-06-17 11:11:57 +0200 (mer., 17 juin 2009) $
 * SVN Revision - $Rev: 42 $
 * Id : $Id: SegmentIterator.php 42 2009-06-17 09:11:57Z neveldo $
 *
 * @copyright  GPL License 2008 - Julien Pauli - Cyril PIERRE de GEYER - Anaska (http://www.anaska.com)
 * @license    http://www.gnu.org/copyleft/gpl.html  GPL License
 * @version 1.3
 */
class SegmentIterator implements RecursiveIterator
{
    private $ref;
    private $key;
    private $keys;
    /**
     * @param Segment[] $ref
     */
    public function __construct(array $ref)
    {
        $this->ref = $ref;
        $this->key = 0;
        $this->keys = array_keys($this->ref);
    }
    public function hasChildren(): bool
    {
        return $this->valid();
    }
    public function current(): Segment
    {
        return $this->ref[$this->keys[$this->key]];
    }
    public function getChildren(): RecursiveIterator
    {
        // Use the public iterator because the segment's children are protected.
        /** @var SegmentIterator $iterator */
        $iterator = $this->current()->getIterator()->getInnerIterator();
        return $iterator;
    }
    public function key(): int
    {
        return $this->key;
    }
    public function valid(): bool
    {
        return array_key_exists($this->key, $this->keys);
    }
    public function rewind(): void
    {
        $this->key = 0;
    }
    public function next(): void
    {
        $this->key ++;
    }
}

?>