<?php

namespace App\Card;

/**
 * Represents a graphic card for
 * virtual card games
 */
class CardGraphic extends Card
{
    /** @var mixed[] */
    private $cardGraphic;

    /**
     * @param string $suit    The suit of a card
     * @param int $value    The value of a card
     */
    public function __construct($suit, $value)
    {
        parent::__construct($suit, $value);
        $this->cardGraphic = $this->setCardGraphic($suit, $value);
    }

    /**
     * Returns a string for the suit
     *
     * @param string $suit
     * @return string
     */
    public function getCardGraphicSuit(string $suit): string
    {
        $suitString = "";

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

        return $suitString;
    }

    /**
     * Returns a string for the value
     *
     * @param int $value
     * @return string
     */
    public function getCardGraphicValueString(int $value): string
    {
        $valueString = "";

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
                // Ints as string
                $valueString = (string)$value;
                break;
        }

        return $valueString;
    }

    /**
     * Returns a string for the color
     *
     * @param string $suit
     * @return string
     */
    public function getCardGraphicColorString(string $suit): string
    {
        $colorString = "";

        switch($suit) {
            case "hearts":
                $colorString = "red";
                break;
            case "diamonds":
                $colorString = "red";
                break;
            case "clubs":
                $colorString = "black";
                break;
            case "spades":
                $colorString = "black";
                break;
        }

        return $colorString;
    }

    /**
     * Makes a graphic representation of the card
     *
     * @param string $suit    The suit of a card
     * @param int $value    The value of a card
     *
     * @return mixed[]
     */
    public function setCardGraphic($suit, $value): array
    {
        return array(
          "suitString" => $this->getCardGraphicSuit($suit),
          "valueString" => $this->getCardGraphicValueString($value),
          "colorString" => $this->getCardGraphicColorString($suit),
          "suit" => $suit,
          "value" => $value
        );
    }

    /**
     * Returns the graphic card array
     *
     * @return mixed[]
     */
    public function getCardGraphic(): array
    {
        return $this->cardGraphic;
    }
}
