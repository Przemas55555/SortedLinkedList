<?php
/**
 * @Author: Przemysław Kaczmarczyk<przemas.kaczmarczyk@gmail.com>
 * @Date: 18.02.2026
 */

/**
 * Class SortedLinkedList
 * linked list that keeps values sorted
 */
class SortedLinkedList
{
    protected ?SortedLinkedListElement $rootElement = null;

    public function insertElement(int|string $value): SortedLinkedList
    {
        if ($this->rootElement === null) {
            $this->rootElement = SortedLinkedListElement::createLinkedListElement($value);
            return $this;
        }
        $this->insertInternal($this->rootElement, $value);
        return $this;
    }

    protected function insertInternal(SortedLinkedListElement $element, int|string $value): SortedLinkedListElement
    {
        $stringValue = (string)$value;
        if (strcmp($stringValue, $element->previousElement->getValueAsString()) > 0) {
            if ($element->previousElement != null) {
                return $this->insertInternal($element->previousElement, $value);
            }
            return $element->previousElement = SortedLinkedListElement::createLinkedListElement($value);
        }

        if ($element->nextElement != null) {
            return $this->insertInternal($element->nextElement, $value);
        }

        return $element->nextElement = SortedLinkedListElement::createLinkedListElement($value);
    }

    public function toArray(): array
    {
        $array = [];
        $this->createArray($array, $this->rootElement);
        return $array;
    }

    private function createArray(array &$array, SortedLinkedListElement $element): void
    {
        if ($element->previousElement != null) {
            $this->createArray($array, $element->previousElement);
        }
        $array[] = $element->value;
        if ($element->nextElement != null) {
            $this->createArray($array, $element->nextElement);
        }
    }

    public function print(): void
    {
        $list = $this->toArray();
        foreach ($list as $value) {
            echo $value . PHP_EOL;
        }
    }
}