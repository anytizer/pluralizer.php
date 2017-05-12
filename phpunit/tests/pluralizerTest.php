<?php
namespace tests;

use common\pluralizer;
use PHPUnit\Framework\TestCase;

class pluralizerTest extends TestCase
{
    private $pluralizer;

    public function setup()
    {
        $this->pluralizer = new pluralizer();
    }
	
	public function test01()
    {
        $this->assertEquals("kisses", $this->pluralizer ->pluralize("kiss", 2));
        $this->assertEquals("mice", $this->pluralizer ->pluralize("mouse", 2));
    }

    public function test02()
    {
        $this->assertEquals("geese", $this->pluralizer ->pluralize("goose"));
    }

    public function test03()
    {
        $this->assertEquals("feet", $this->pluralizer ->pluralize("foot"));
    }

    public function test04()
    {
        $this->assertEquals("potatoes", $this->pluralizer ->pluralize("potato"));
    }

    public function test05()
    {
        $this->assertEquals("fruits", $this->pluralizer ->pluralize("fruit"));
    }

    public function test06()
    {
        $this->assertEquals("frequencies", $this->pluralizer ->pluralize("frequency"));
    }

    public function test07()
    {
        $this->assertEquals("copies", $this->pluralizer ->pluralize("copy"));
    }

    public function test08()
    {
        $this->assertEquals("cookies", $this->pluralizer ->pluralize("cookie"));
    }

    public function test09()
    {
        $this->assertEquals("statuses", $this->pluralizer ->pluralize("status"));
    }

    public function test10()
    {
        $this->assertEquals("companies", $this->pluralizer ->pluralize("company"));
	}
}