<?php

use Markdown\Reader;
use Markdown\Writer;

class Markdown
{
    public function __construct(Writer $writer)
    {
        // TODO: write logic here
    }

    public function toHtml($text)
    {
        return '<p>' . $text . '</p>';
    }

    public function toHtmlFromReader(Reader $reader)
    {
        return $this->toHtml($reader->getMarkdown());
    }

    public function outputHtml($text, Writer $writer)
    {
        $writer->writeText($this->toHtml($text));
    }
}
