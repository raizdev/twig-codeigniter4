<?php

namespace Daycry\Twig;

class UrlHelperTest extends TestCase
{
    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();

        helper('url');
    }

    public function test_base_url()
    {
        $acutual = base_url('images/icons/simle.jpg');
        $expected = 'http://localhost/images/icons/simle.jpg';
        $this->assertEquals($expected, $acutual);

        $acutual = base_url('"><s>abc</s><a name="test');
//        $expected = 'http://localhost/"><s>abc</s><a name="test'; // CI3
        $expected = 'http://localhost/%22%3E%3Cs%3Eabc%3C/s%3E%3Ca%20name=%22test';
        $this->assertEquals($expected, $acutual);
    }

    public function test_site_url()
    {
        $actual = site_url('welcome');
        $expected = 'http://localhost/index.php/welcome';
        $this->assertEquals($expected, $actual);

        $actual = site_url('"><s>abc</s><a name="test');
//        $expected = 'http://localhost/index.php/"><s>abc</s><a name="test'; // CI3
        $expected = 'http://localhost/index.php/%22%3E%3Cs%3Eabc%3C/s%3E%3Ca%20name=%22test';
        $this->assertEquals($expected, $actual);
    }

    public function test_anchor()
    {
        $actual = anchor(
            'news/local/123',
            'My News',
            ['title' => 'The best news!']
        );
//        $expected = '<a href="http://localhost/index.php/news/local/123" title="The best news!">My News</a>'; // CI3
        $expected = '<a href="http://localhost/index.php/news/local/123" title="The&#x20;best&#x20;news&#x21;">My News</a>';
        $this->assertEquals($expected, $actual);

        $actual = anchor(
            'news/local/123',
            '<s>abc</s>',
            ['<s>name</s>' => '<s>val</s>']
        );
//        $expected = '<a href="http://localhost/index.php/news/local/123" <s>name</s>="<s>val</s>"><s>abc</s></a>'; // CI3
        $expected = '<a href="http://localhost/index.php/news/local/123" <s>name</s>="&lt;s&gt;val&lt;&#x2F;s&gt;"><s>abc</s></a>';
        $this->assertEquals($expected, $actual);
    }

//    public function test_current_url()
//    {
//    }
//
//    public function test_uri_string()
//    {
//    }
//
//    public function test_index_page()
//    {
//    }
//
//    public function test_anchor_popup()
//    {
//    }
//
//    public function test_mailto()
//    {
//    }
//
//    public function test_safe_mailto()
//    {
//    }
//
//    public function test_auto_link()
//    {
//    }
//
//    public function test_prep_url()
//    {
//    }
//
//    public function test_url_title()
//    {
//    }
//
//    public function test_redirect()
//    {
//    }
}
