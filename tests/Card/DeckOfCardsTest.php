<?php

namespace App\Card;

use PHPUnit\Framework\TestCase;

/**
 * Test cases for class Dice.
 */
class DeckOfCardTest extends TestCase
{
    public function testCreateDeckWithoutInputCards(): void
    {
        $deck = new DeckOfCards();
        $this->assertInstanceOf("\App\Card\DeckOfCards", $deck);

        $res = $deck->getNumberCards(5);
        $this->assertIsArray($res);
        $this->assertCount(5, $res);
    }

    public function testCreateDeckWithInputCards(): void
    {
        $deck = new DeckOfCards([["value" => 5, "suit" => "spades"]]);

        $res = $deck->getNumberCards(5);
        $this->assertIsArray($res);
        $this->assertCount(5, $res);
    }

    public function testGetDeckCards(): void
    {
        $deck = new DeckOfCards();
        $res = $deck->getCards();

        $this->assertIsArray($res);
        $this->assertCount(52, $res);
    }

    public function testShuffleDeck(): void
    {
        $deck = new DeckOfCards();
        $res = $deck->getCards();

        $deck->shuffleDeck();
        $resShuffled = $deck->getCards();

        $this->assertNotEquals($res, $resShuffled);
    }

    public function testRemoveCardAndReturnDeck(): void
    {
        $deck = new DeckOfCards();
        $card = new CardGraphic("spades", 5);

        $res = $deck->removeCardAndReturnDeck($card);
        $this->assertCount(51, $res);
    }

    public function testGetRandomCardFail(): void
    {
        $deck = new DeckOfCards();
        $res = $deck->getRandomCard();
        $this->assertNotEmpty($res);
    }
}
