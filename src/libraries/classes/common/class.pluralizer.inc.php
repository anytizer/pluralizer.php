<?php
namespace common;

/**
 * Pluralize a word, though not always gramatically correct.
 *
 * @see https://en.wikipedia.org/wiki/English_plurals
 * @see https://www.learnenglish.de/grammar/pluraltext.html
 * @see https://gist.github.com/tbrianjones/ba0460cc1d55f357e00b
 */
class pluralizer
{
	/**
	 * pluralizer constructor.
	 */
	public function __construct()
	{
	}

	/**
	 * Perform basic pluralizing rules.
	 * @see https://www.grammarly.com/blog/plural-nouns/
	 *
	 * @param string $word
	 * @return string
	 */
	private function make_plural(string $word): string
	{
		# What to append to the word to make it plural?
		$plural_marker = "s";
		$data = array();
		switch(true)
		{
			case preg_match("/o$/", $word, $data):
				# Words ending in [ o ]
				$plural_marker = "es";
				break;
			case preg_match("/y$/", $word, $data):
				# Words ending in [ y ]
				$plural_marker = "ies";

				# Remove the last letter: [ y ]
				$word = substr($word, 0, strlen($word) - 1);
				break;
			case preg_match("/(iss)$/", $word, $data):
				// kisses
				$plural_marker = $data[1] . "es";
				$word = substr($word, 0, strlen($word) - 3);
				break;
			case preg_match("/oo([a-z])?$/", $word, $data):
				$plural_marker = "ee" . $data[1];
				$word = substr($word, 0, strlen($word) - 3);
				break;
			case preg_match("/(oose)?$/", $word, $data):
				$plural_marker = "eese";
				$word = $plural_marker;
				break;
			case preg_match("/(us)$/", $word, $data):
				// statuses
				$plural_marker = $data[1]."es";
				$word = substr($word, 0, strlen($word) - 3);
				break;
			default:
				break;
		}

		#$plural = $word . (($counter != 1) ? $plural_marker : "");
		$plural = $word.$plural_marker;
		return $plural;

		# frequency => frequencies, copy => copies, company => companies
		# cookie => cookies

		# Words having [ oo ] in the second last letters.
		# foot => feet, goose => geese
	}

	/**
	 * Singular or Plural based on "count" value
	 *
	 * @param string $word
	 * @param int $count
	 * @return string
	 */
	public function plural(string $word, int $count): string
	{
		$word = ($count>=2)?$this->make_plural($word):$word;
		return $word;
	}

	/**
	 * Alias only, that always pluralizes
	 *
	 * @param string $word
	 * @return string
	 */
	public function pluralize(string $word): string
	{
		return $this->plural($word, 2);
	}
}