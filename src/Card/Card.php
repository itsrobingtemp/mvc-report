<?php

namespace App\Card;

class Card
{
  private $suit;
  private $value;

  public function __construct($suit, $value) {
    $this->suit = $suit;
    $this->value = $value;
  }

  public function getValue() {
    return $this->value;
  }

  public function getSuit() {
      return $this->suit;
  }
}

class CardGraphic extends Card
{
  private $graphicArr;

  public function __construct($suit, $value) {
    parent::__construct($suit, $value);
    $this->graphicArr = $this->setGraphic($suit, $value);
  }

  public function setGraphic($value, $suit) {
    $suitString = "";
    $valueString = "";
    $color = "";

    switch ($suit) {
      case "hearts":
        $suitString = "♥";
        break;
      case "diamonds":
        $suitString = "♦";
        break;
      case "clubs":
        $suitString = "♣";
        break;
      case "spades":
        $suitString = "♠";
        break;
    }

    switch ($value) {
      case 1:
        $valueString = "A";
        break;
      case 11:
        $valueString = "J";
        break;
      case 12:
        $valueString = "Q";
        break;
      case 13:
        $valueString = "K";
        break;
      default:
        $valueString = (string)$value;
        break;
    }

    switch($suit) {
      case "hearts":
        $color = "red";
        break;
      case "diamonds":
        $color = "red";
        break;
      case "clubs":
        $color = "black";
        break;
      case "spades":
        $color = "black";
        break;
    }

    return array($valueString, $suitString, $color);
  }

  public function getGraphic() {
    return $this->graphicArr; 
  }
}

class DeckOfCards
{
  private $cards;
  private $drawnCards;

  public function __construct($drawnCards = []) {
    $this->cards = array();
    $this->drawnCards = $drawnCards;
    $this->createDeck();
  }

  public function createDeck() {
    $this->cards = array();
    $suits = array("spades", "hearts", "clubs", "diamonds");
    $values = array("Ace", "2", "3", "4", "5", "6", "7", "8", "9", "10", "Jack", "Queen", "King");

    foreach ($suits as $suit) {
      foreach ($values as $value) {
        if (empty($this->drawnCards)) {
          $card = new CardGraphic($value, $suit);
          $this->cards[] = $card->getGraphic();
        } else {

          // If card has been drawn
          foreach ($this->drawnCards as $card) {
            if ($card[0] !== $value && $card[1] !== $suit) {
              $card = new CardGraphic($value, $suit);
              $this->cards[] = $card->getGraphic();
            }
          }

        }
      }
    }
  }

  public function getCards() {
    return $this->cards;
  }

  public function shuffleDeck() {
    $this->createDeck();
    shuffle($this->cards);
  }

  public function getRandomCard() {
    $i = rand(0, count($this->cards) - 1);
    $randomCard = $this->cards[$i];

    return $randomCard;
  }

  public function removeCardAndReturnDeck($cardToBeRemoved) {
    foreach ($this->cards as $index => $card) {
      if ($card->getSuit() === $cardToBeRemoved->getSuit() && $card->getValue() === $cardToBeRemoved->getValue()) {
        unset($cards[$index]);
        break;
      }
    }

    return $this->cards;
  }
}

