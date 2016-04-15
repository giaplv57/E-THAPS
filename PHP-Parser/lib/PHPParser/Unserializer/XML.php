<?php

class PHPParser_Unserializer_XML implements PHPParser_Unserializer
{
    protected $reader;

    public function __construct() {
        $this->reader = new XMLReader;
    }

    public function unserialize($string) {
        $this->reader->XML($string);

        $this->reader->read();
        if ('AST' !== $this->reader->name) {
            throw new DomainException('AST root element not found');
        }

        return $this->read($this->reader->depth);
    }

    protected function read($depthLimit, $throw = true, &$nodeFound = null) {
        $nodeFound = true;
        while ($this->reader->read() && $depthLimit < $this->reader->depth) {
            if (XMLReader::ELEMENT !== $this->reader->nodeType) {
                continue;
            }

            if ('node' === $this->reader->prefix) {
                return $this->readNode();
            } elseif ('scalar' === $this->reader->prefix) {
                return $this->readScalar();
            } else {
                throw new DomainException(sprintf('Unexpected node of type "%s"', $this->reader->name));
            }
        }

        $nodeFound = false;
        if ($throw) {
            throw new DomainException('Expected node or scalar');
        }
    }

    protected function readNode()
    {
        $className = 'PHPParser_Node_' . $this->reader->localName;

        // create the node without calling it's constructor
        $node = unserialize(
            sprintf('O:%d:"%s":0:{}', strlen($className), $className)
        );

        $line = $this->reader->getAttribute('line');
        $node->setLine(null !== $line ? $line : -1);

        $docComment = $this->reader->getAttribute('docComment');
        $node->setDocComment($docComment);

        $depthLimit = $this->reader->depth;
        while ($this->reader->read() && $depthLimit < $this->reader->depth) {
            if (XMLReader::ELEMENT !== $this->reader->nodeType) {
                continue;
            }

            if ('subNode' !== $this->reader->prefix) {
                throw new DomainException(
                    sprintf('Expected sub node, got node of type "%s"', $this->reader->name)
                );
            }

            $subNodeName = $this->reader->localName;
            $subNodeContent = $this->read($this->reader->depth);

            $node->$subNodeName = $subNodeContent;
        }

        return $node;
    }

    protected function readScalar() {
        switch ($name = $this->reader->localName) {
            case 'array':
                $depth = $this->reader->depth;
                $array = array();
                while (true) {
                    $node = $this->read($depth, false, $nodeFound);
                    if (!$nodeFound) {
                        break;
                    }
                    $array[] = $node;
                }
                return $array;
            case 'string':
                return $this->reader->readString();
            case 'int':
                $text = $this->reader->readString();
                if (false === $int = filter_var($text, FILTER_VALIDATE_INT)) {
                    throw new DomainException(sprintf('"%s" is not a valid integer', $text));
                }
                return $int;
            case 'float':
                $text = $this->reader->readString();
                if (false === $float = filter_var($text, FILTER_VALIDATE_FLOAT)) {
                    throw new DomainException(sprintf('"%s" is not a valid float', $text));
                }
                return $float;
            case 'true':
            case 'false':
            case 'null':
                if (!$this->reader->isEmptyElement) {
                    throw new DomainException(sprintf('"%s" scalar must be empty', $name));
                }
                return constant($name);
            default:
                throw new DomainException(sprintf('Unknown scalar type "%s"', $name));
        }
    }
}
