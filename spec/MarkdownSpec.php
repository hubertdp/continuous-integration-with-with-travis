<?php

namespace spec;

use Markdown;
use Markdown\Reader;
use Markdown\Writer;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MarkdownSpec extends ObjectBehavior
{
    function let(Writer $writer)
    {
        $this->beConstructedWith($writer);
    }

    function it_converts_plain_text_to_html_paragraphs()
    {
        $this->toHtml('Hi, there!')->shouldReturn('<p>Hi, there!</p>');
    }

    function it_converts_text_from_an_external_source(Reader $reader)
    {
        // using a stub =  define what reader will return
        $reader->getMarkdown()->willReturn('Hi, there!');

        $this->toHtmlFromReader($reader)->shouldReturn('<p>Hi, there!</p>');
    }

    function it_outputs_converted_text($writer)
    {
        // using a mock = specifying what should happen
        //$writer->writeText('<p>Hi, there!</p>')->shouldBeCalled();

        $this->outputHtml('Hi, there!', $writer);

        // using a spy = checking afterwards that something has happened
        $writer->writeText('<p>Hi, there!</p>')->shouldHaveBeenCalled();
    }
}
