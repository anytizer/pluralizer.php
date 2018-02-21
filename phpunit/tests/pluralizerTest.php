<?php
namespace tests;

use common\pluralizer;
use PHPUnit\Framework\TestCase;

class pluralizerTest extends TestCase
{
    private $pluralizer;

	/**
	 * Setup pluralizer
	 *
	 * @see https://www.grammarly.com/blog/plural-nouns/
	 */
    public function setup()
    {
        $this->pluralizer = new pluralizer();
    }
	
	public function testUnclassified()
    {
        $this->assertEquals("kisses", $this->pluralizer ->pluralize("kiss"));
        $this->assertEquals("mice", $this->pluralizer ->pluralize("mouse"));
        $this->assertEquals("cats", $this->pluralizer ->pluralize("cat"));
        $this->assertEquals("houses", $this->pluralizer ->pluralize("house"));

        # If the singular noun ends in ‑s, -ss, -sh, -ch, -x, or -z, add ‑es to the end to make it plural.
        $this->assertEquals("trusses", $this->pluralizer ->pluralize("truss"));
        $this->assertEquals("buses", $this->pluralizer ->pluralize("bus"));
        $this->assertEquals("marshes", $this->pluralizer ->pluralize("marsh"));
        $this->assertEquals("lunches", $this->pluralizer ->pluralize("lunch"));
        $this->assertEquals("taxes", $this->pluralizer ->pluralize("tax"));
        $this->assertEquals("blitzes", $this->pluralizer ->pluralize("blitz"));

        # In some cases, singular nouns ending in -s or -z, require that you double the -s or -z prior to adding the -es for pluralization.
		$this->assertEquals("fezzes", $this->pluralizer ->pluralize("fez"));
		$this->assertEquals("gasses", $this->pluralizer ->pluralize("gas"));

		# If the noun ends with ‑f or ‑fe, the f is often changed to ‑ve before adding the -s to form the plural version.
		# roof – roofs
		# belief – beliefs
		# chef – chefs
		# chief – chiefs
		$this->assertEquals("wives", $this->pluralizer ->pluralize("wife"));
		$this->assertEquals("wolves", $this->pluralizer ->pluralize("wolf"));

		# If a singular noun ends in ‑y and the letter before the -y is a consonant, change the ending to ‑ies to make the noun plural.
		#city – cities
		#puppy – puppies

		#If the singular noun ends in -y and the letter before the -y is a vowel, simply add an -s to make it plural.
		#ray – rays
		#boy – boys

		# If the singular noun ends in -o, add -es to make it plural.
		#
		# potato – potatoes
		# tomato – tomatoes
		#
		# Exceptions:
		# photo – photos
		# piano – pianos
		# halo – halos
		#
		# With the unique word volcano, you can apply the standard pluralization for words that end in -o or not. It’s your choice! Both of the following are correct:
		#
		# volcanoes
		# volcanos
		#
		# 8 If the singular noun ends in -us, the plural ending is frequently -i.
		# cactus – cacti
		# focus – foci
		#
		# 9 If the singular noun ends in -is, the plural ending is -es.
		# analysis – analyses
		# ellipsis – ellipses
		#
		# 10 If the singular noun ends in -on, the plural ending is -a.
		# phenomenon – phenomena
		# criterion – criteria
		#
		# 11 Some nouns don’t change at all when they’re pluralized.
		# sheep – sheep
		# series – series
		# species – species
		# deer –deer
		#
		# You need to see these nouns in context to identify them as singular or plural. Consider the following sentence:
		#
		# Mark caught one fish, but I caught three fish.
		# Plural Noun Rules for Irregular Nouns
		# Irregular nouns follow no specific rules, so it’s best to memorize these or look up the proper pluralization in the dictionary.
		#
		# child – children
		# goose – geese
		# man – men
		# woman – women
		# tooth – teeth
		# foot – feet
		# mouse – mice
		# person – people
    }

    public function testGeese()
    {
        $this->assertEquals("geese", $this->pluralizer ->pluralize("goose"));
    }

    public function testFeet()
    {
        $this->assertEquals("feet", $this->pluralizer ->pluralize("foot"));
    }

    public function testPotatoes()
    {
        $this->assertEquals("potatoes", $this->pluralizer ->pluralize("potato"));
    }

    public function testFruits()
    {
        $this->assertEquals("fruits", $this->pluralizer ->pluralize("fruit"));
    }

    public function testFrequencies()
    {
        $this->assertEquals("frequencies", $this->pluralizer ->pluralize("frequency"));
    }

    public function testCopies()
    {
        $this->assertEquals("copies", $this->pluralizer ->pluralize("copy"));
    }

    public function testCookies()
    {
        $this->assertEquals("cookies", $this->pluralizer ->pluralize("cookie"));
    }

    public function testStatuses()
    {
        $this->assertEquals("statuses", $this->pluralizer ->pluralize("status"));
    }

    public function testCompanies()
    {
        $this->assertEquals("companies", $this->pluralizer ->pluralize("company"));
	}

	public function testChildren()
	{
		$this->markTestIncomplete();
		$this->assertEquals("children", $this->pluralizer ->pluralize("child"));
	}

	public function testSheep()
	{
		$this->markTestIncomplete();
		$this->assertEquals("sheep", $this->pluralizer ->pluralize("sheep"));
	}

	public function testTeeth()
	{
		$this->markTestIncomplete();
		$this->assertEquals("teeth", $this->pluralizer ->pluralize("tooth"));
	}

	public function testWomen()
	{
		$this->markTestIncomplete();
		$this->assertEquals("women", $this->pluralizer ->pluralize("woman"));
	}
}