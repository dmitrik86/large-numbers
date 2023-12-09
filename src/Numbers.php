<?php
namespace LargeNumbers;

class Numbers
{
    /**
     * Get the greatest common divisor.
     *
     * @param int $x
     * @param int $y
     *
     * @return int
     */
    public function gcd(int $x, int $y): int
    {
        while ($y !== 0) {
            $tmp = abs($x);
            $x = abs($y);
            $y = $tmp % $x;
        }
        return $x;
    }

    /**
     * Add numbers that represented as strings.
     *
     * @param string $x
     * @param string $y
     *
     * @return string
     */
    public function addNumbersAsStrings(string $x, string $y): string
    {
        $minuses = 0;
        $xNegative = false;
        if (substr($x, 0, 1) === '-') {
            ++$minuses;
            $x = substr($x, 1);
            $xNegative = true;
        }
        if (substr($y, 0, 1) === '-') {
            ++$minuses;
            $y = substr($y, 1);
        }
        if ($minuses === 1) {
            return $xNegative
                ? $this->subtractNumbersAsStrings($y, $x)
                : $this->subtractNumbersAsStrings($x, $y);
        }
        $xLength = strlen($x);
        $yLength = strlen($y);
        if ($xLength < $yLength) {
            return $this->addNumbersAsStrings($y, $x);
        }
        $i = $xLength - 1;
        $j = $yLength - 1;
        $previousDigit = 0;
        $result = [];
        while ($i >= 0) {
            $xDigit = (int)$x[$i];
            $yDigit = (int)($j >= 0 ? $y[$j] : 0);
            $result[] = ($previousDigit + $xDigit + $yDigit) % 10;
            $previousDigit = floor(($previousDigit + $xDigit + $yDigit) / 10);
            --$i;
            --$j;
        }
        while ($previousDigit) {
            $result[] = $previousDigit % 10;
            $previousDigit = floor($previousDigit / 10);
        }
        return ($minuses === 2 ? '-' : '')
               . implode('', array_reverse($result));
    }

    /**
     * Calculate subtraction of two numbers that represented as string.
     *
     * @param string $x
     * @param string $y
     *
     * @return string
     */
    public function subtractNumbersAsStrings(string $x, string $y): string
    {
        $xNegative = false;
        $minuses = 0;
        if (substr($x, 0, 1) === '-') {
            ++$minuses;
            $x = substr($x, 1);
            $xNegative = true;
        }
        if (substr($y, 0, 1) === '-') {
            ++$minuses;
            $y = substr($y, 1);
        }
        if ($minuses === 1) {
            return ($xNegative ? '-' : '')
                   . $this->addNumbersAsStrings($x, $y);
        }
        $xLength = strlen($x);
        $yLength = strlen($y);
        $current = (int)$x[$xLength - 1];
        $i = $xLength - 2;
        $j = $yLength - 1;
        $result = [];
        while ($i >= 0 && $j >= 0) {
            $current += $x[$i] * 10 - $y[$j];
            $result[] = $current % 10;
            $current = floor($current / 10);
            $i -= 1;
            $j -= 1;
        }
        $result[] = $current - ($j >= 0 ? $y[$j] : 0);
        if ($result[count($result) - 1] < 0 || $j > 0) {
            return '-' . $this->subtractNumbersAsStrings($y, $x);
        }
        if ($i >= 0) {
            return ($minuses === 2 ? '-' : '')
                   . substr($x, 0, $i)
                   . implode('', array_reverse($result));
        }
        return ($minuses === 2 ? '-' : '')
               . ltrim(implode('', array_reverse($result)), '0');
    }

    /**
     * Divide a large divisor that is represented as string.
     *
     * @param string $x
     * @param int    $y
     *
     * @return string
     */
    public function divideNumberAsString(string $x, int $y): string
    {
        $minuses = 0;
        if (substr($x, 0, 1) === '-') {
            ++$minuses;
            $x = substr($x, 1);
        }
        if ($y < 0) {
            ++$minuses;
            $y = abs($y);
        }
        $result = [];
        $reminder = 0;
        for ($i = 0; $i < strlen($x); ++$i) {
            $tmp = $x[$i] + $reminder * 10;
            $result[] = floor($tmp / $y);
            $reminder = $tmp % $y;
        }
        return ($minuses % 2 > 0 ? '-' : '')
               . ltrim(implode('', $result), '0')
               . ($reminder ? substr((string)($reminder / $y), 1) : '');
    }

    /**
     * Multiply digit as string and integer.
     *
     * @param string $x
     * @param int    $y
     *
     * @return string
     */
    public function multiplyNumberAsString(string $x, int $y): string
    {
        $minuses = 0;
        if (substr($x, 0, 1) === '-') {
            ++$minuses;
            $x = substr($x, 1);
        }
        if ($y < 0) {
            ++$minuses;
            $y = abs($y);
        }
        $length = strlen($x);
        $i = $length - 1;
        $result = '0';
        while ($i >= 0) {
            $number = ((int)$x[$i] * $y) . str_repeat('0', $length - $i - 1);
            $result = $this->addNumbersAsStrings($result, $number);
            --$i;
        }
        return ($minuses === 1 ? '-' : '') . $result;
    }
}