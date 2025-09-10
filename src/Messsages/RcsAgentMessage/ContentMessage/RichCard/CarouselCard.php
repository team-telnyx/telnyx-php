<?php

declare(strict_types=1);

namespace Telnyx\Messsages\RcsAgentMessage\ContentMessage\RichCard;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messsages\RcsAgentMessage\ContentMessage\RichCard\CarouselCard\CardWidth;
use Telnyx\Messsages\RcsCardContent;

/**
 * Carousel of cards.
 *
 * @phpstan-type carousel_card = array{
 *   cardContents: list<RcsCardContent>, cardWidth: value-of<CardWidth>
 * }
 */
final class CarouselCard implements BaseModel
{
    /** @use SdkModel<carousel_card> */
    use SdkModel;

    /**
     * The list of contents for each card in the carousel. A carousel can have a minimum of 2 cards and a maximum 10 cards.
     *
     * @var list<RcsCardContent> $cardContents
     */
    #[Api('card_contents', list: RcsCardContent::class)]
    public array $cardContents;

    /**
     * The width of the cards in the carousel.
     *
     * @var value-of<CardWidth> $cardWidth
     */
    #[Api('card_width', enum: CardWidth::class)]
    public string $cardWidth;

    /**
     * `new CarouselCard()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CarouselCard::with(cardContents: ..., cardWidth: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CarouselCard)->withCardContents(...)->withCardWidth(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<RcsCardContent> $cardContents
     * @param CardWidth|value-of<CardWidth> $cardWidth
     */
    public static function with(
        array $cardContents,
        CardWidth|string $cardWidth
    ): self {
        $obj = new self;

        $obj->cardContents = $cardContents;
        $obj->cardWidth = $cardWidth instanceof CardWidth ? $cardWidth->value : $cardWidth;

        return $obj;
    }

    /**
     * The list of contents for each card in the carousel. A carousel can have a minimum of 2 cards and a maximum 10 cards.
     *
     * @param list<RcsCardContent> $cardContents
     */
    public function withCardContents(array $cardContents): self
    {
        $obj = clone $this;
        $obj->cardContents = $cardContents;

        return $obj;
    }

    /**
     * The width of the cards in the carousel.
     *
     * @param CardWidth|value-of<CardWidth> $cardWidth
     */
    public function withCardWidth(CardWidth|string $cardWidth): self
    {
        $obj = clone $this;
        $obj->cardWidth = $cardWidth instanceof CardWidth ? $cardWidth->value : $cardWidth;

        return $obj;
    }
}
