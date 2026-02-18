<?php

/**
 * @Author: Przemysław Kaczmarczyk<przemas.kaczmarczyk@gmail.com>
 * @Date: 18.02.2026
 *
 * Class SortedLinkedListElement
 * linked list that could be string or int
 */
class SortedLinkedListElement
{
    public int|string $value;

    public ?SortedLinkedListElement $previousElement = null;
    public ?SortedLinkedListElement $nextElement = null;

    private function __construct(int|string $value)
    {
        $this->value = $value;
    }

    public static function createLinkedListElement(int|string $value): SortedLinkedListElement
    {
        return new SortedLinkedListElement($value);
    }

    public function getValueAsString(): string
    {
        return (string)$this->value;
    }
}