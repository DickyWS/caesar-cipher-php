<?php

namespace KKiernan;

class Cracker
{
    /**
     * Determines the frequency (as a percentage) that the given character 
     * appears in the given string.
     *
     * @param string $character
     * @param string $string
     *
     * @return double
     */
    public function characterFrequency($character, $string)
    {
        $string = $this->cleanString($string);

        $stringLength = strlen($string);

        $occurences = substr_count($string, $character);

        return round($occurences / $stringLength, 3);
    }

    /**
     * Gets one of each character used in a string.
     *
     * @param string $string
     *
     * @return array
     */
    public function characters($string)
    {
        return array_values(array_unique(str_split(strtolower($this->cleanString($string)))));
    }

    /**
     * Determines the frequency analysis for a string.
     *
     * @param string $string
     *
     * @return array
     */
    public function frequencyAnalysis($string)
    {
        $characters = $this->characters($string);

        $frequencies = [];

        foreach ($characters as $character) {
            $frequencies[$character] = $this->characterFrequency($character, $string);
        }

        ksort($frequencies);

        return $frequencies;
    }

    /**
     * Remove all characters from the given string that are not A-z.
     *
     * @param string $string
     *
     * @return string
     */
    protected function cleanString($string)
    {
        return preg_replace('/[^A-z]*/', '', $string);
    }
}