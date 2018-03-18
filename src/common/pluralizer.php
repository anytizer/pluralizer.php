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
		$word_short = $word;
		$plural_marker = "s";
		
		$data = array();
		switch(true)
		{
			case preg_match("/(oo)$/", $word, $data):
				# Words ending in [ oo ]
				$plural_marker = "s";
				break;
			case preg_match("/o$/", $word, $data):
				# Words ending in [ o ]
				// mango => mangoes
				$plural_marker = "es";
				break;
			case preg_match("/(y)$/", $word, $data):
				# Words ending in [ y ]
				// ply => plies
				
				# Remove the last letter: [ y ]
				$word_short = substr($word, 0, strlen($word) - 1);
				$plural_marker = "ies";
				break;
			case preg_match("/(iss)$/", $word, $data):
				// kiss => kisses
				$word_short = substr($word, 0, strlen($word) - 3);
				$plural_marker = $data[1] . "es";
				break;
			case preg_match("/(as)$/", $word, $data):
				// gas => gases
				$word_short .= $word[2]; // repeat character
				$plural_marker = "es";
				break;
			case preg_match("/(ax)$/", $word, $data):
				// tax => taxes
				$plural_marker = "es";
				break;
			case preg_match("/(ch)$/", $word, $data):
				// lunch => lunches
				$plural_marker = "es";
				break;
			case preg_match("/(e)(z)$/", $word, $data):
				// fez => fezzes
				$word_short .= $word[2]; // repeat character
				$plural_marker = "es";
				break;
			case preg_match("/[^e](f)$/", $word, $data):
				// wolf => wolves
				$word_short = substr($word, 0, strlen($word) - 1);
				$plural_marker = "ves";
				break;
			case preg_match("/(fe)$/", $word, $data):
				// wife => wives
				// five => fives
				$word_short = substr($word, 0, strlen($word) - 2);
				$plural_marker = "ves";
				break;
			case preg_match("/(sh)$/", $word, $data):
				// brush => brushes
				// marsh => marshes
				$plural_marker = "es";
				break;
			case preg_match("/(ss)$/", $word, $data):
				// truss => trusses
				$plural_marker = "es";
				break;
			case preg_match("/(t?z)$/", $word, $data):
				// blitz => blitzes
				// baz => bazzes
				$plural_marker = "es";
				break;
			case preg_match("/oo([a-z])?$/", $word, $data):
				$word_short = substr($word, 0, strlen($word) - 3);
				$plural_marker = "ee" . $data[1];
				break;
			case preg_match("/(oose)$/", $word, $data):
				// goose => geese
				$word_short = substr($word, 0, strlen($word) - 4);
				$plural_marker = "eese";
				break;
			case preg_match("/(us)$/", $word, $data):
				// status => statuses
				$word_short = substr($word, 0, strlen($word) - 2);
				$plural_marker = $data[1]."es";
				break;
			case preg_match("/[lm](ouse)$/", $word, $data):
				// mouse => mice
				// house => houses
				$word_short = substr($word, 0, strlen($word) - 4);
				$plural_marker = "ice";
				break;
			default:
				// $word = $word.$plural_marker;
				break;
		}

		#$plural = $word . (($counter != 1) ? $plural_marker : "");
		$plural = $word_short.$plural_marker;
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