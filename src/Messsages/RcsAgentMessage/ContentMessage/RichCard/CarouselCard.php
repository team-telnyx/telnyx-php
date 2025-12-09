<?php

declare(strict_types=1);

namespace Telnyx\Messsages\RcsAgentMessage\ContentMessage\RichCard;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messsages\RcsAgentMessage\ContentMessage\RichCard\CarouselCard\CardWidth;
use Telnyx\Messsages\RcsCardContent;
use Telnyx\Messsages\RcsCardContent\Media;
use Telnyx\Messsages\RcsSuggestion;

/**
 * Carousel of cards.
 *
 * @phpstan-type CarouselCardShape = array{
 *   cardContents: list<RcsCardContent>, cardWidth: value-of<CardWidth>
 * }
 */
final class CarouselCard implements BaseModel
{
    /** @use SdkModel<CarouselCardShape> */
    use SdkModel;

    /**
     * The list of contents for each card in the carousel. A carousel can have a minimum of 2 cards and a maximum 10 cards.
     *
     * @var list<RcsCardContent> $cardContents
     */
    #[Required('card_contents', list: RcsCardContent::class)]
    public array $cardContents;

    /**
     * The width of the cards in the carousel.
     *
     * @var value-of<CardWidth> $cardWidth
     */
    #[Required('card_width', enum: CardWidth::class)]
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
     * @param list<RcsCardContent|array{
     *   description?: string|null,
     *   media?: Media|null,
     *   suggestions?: list<RcsSuggestion>|null,
     *   title?: string|null,
     * }> $cardContents
     * @param CardWidth|value-of<CardWidth> $cardWidth
     */
    public static function with(
        array $cardContents,
        CardWidth|string $cardWidth
    ): self {
        $self = new self;

        $self['cardContents'] = $cardContents;
        $self['cardWidth'] = $cardWidth;

        return $self;
    }

    /**
     * The list of contents for each card in the carousel. A carousel can have a minimum of 2 cards and a maximum 10 cards.
     *
     * @param list<RcsCardContent|array{
     *   description?: string|null,
     *   media?: Media|null,
     *   suggestions?: list<RcsSuggestion>|null,
     *   title?: string|null,
     * }> $cardContents
     */
    public function withCardContents(array $cardContents): self
    {
        $self = clone $this;
        $self['cardContents'] = $cardContents;

        return $self;
    }

    /**
     * The width of the cards in the carousel.
     *
     * @param CardWidth|value-of<CardWidth> $cardWidth
     */
    public function withCardWidth(CardWidth|string $cardWidth): self
    {
        $self = clone $this;
        $self['cardWidth'] = $cardWidth;

        return $self;
    }
}
