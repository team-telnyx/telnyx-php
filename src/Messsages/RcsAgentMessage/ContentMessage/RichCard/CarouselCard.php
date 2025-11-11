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
 * @phpstan-type CarouselCardShape = array{
 *   card_contents: list<RcsCardContent>, card_width: value-of<CardWidth>
 * }
 */
final class CarouselCard implements BaseModel
{
    /** @use SdkModel<CarouselCardShape> */
    use SdkModel;

    /**
     * The list of contents for each card in the carousel. A carousel can have a minimum of 2 cards and a maximum 10 cards.
     *
     * @var list<RcsCardContent> $card_contents
     */
    #[Api(list: RcsCardContent::class)]
    public array $card_contents;

    /**
     * The width of the cards in the carousel.
     *
     * @var value-of<CardWidth> $card_width
     */
    #[Api(enum: CardWidth::class)]
    public string $card_width;

    /**
     * `new CarouselCard()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CarouselCard::with(card_contents: ..., card_width: ...)
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
     * @param list<RcsCardContent> $card_contents
     * @param CardWidth|value-of<CardWidth> $card_width
     */
    public static function with(
        array $card_contents,
        CardWidth|string $card_width
    ): self {
        $obj = new self;

        $obj->card_contents = $card_contents;
        $obj['card_width'] = $card_width;

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
        $obj->card_contents = $cardContents;

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
        $obj['card_width'] = $cardWidth;

        return $obj;
    }
}
