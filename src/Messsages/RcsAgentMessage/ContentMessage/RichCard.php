<?php

declare(strict_types=1);

namespace Telnyx\Messsages\RcsAgentMessage\ContentMessage;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messsages\RcsAgentMessage\ContentMessage\RichCard\CarouselCard;
use Telnyx\Messsages\RcsAgentMessage\ContentMessage\RichCard\CarouselCard\CardWidth;
use Telnyx\Messsages\RcsAgentMessage\ContentMessage\RichCard\StandaloneCard;
use Telnyx\Messsages\RcsAgentMessage\ContentMessage\RichCard\StandaloneCard\CardOrientation;
use Telnyx\Messsages\RcsAgentMessage\ContentMessage\RichCard\StandaloneCard\ThumbnailImageAlignment;
use Telnyx\Messsages\RcsCardContent;

/**
 * @phpstan-type RichCardShape = array{
 *   carousel_card?: CarouselCard|null, standalone_card?: StandaloneCard|null
 * }
 */
final class RichCard implements BaseModel
{
    /** @use SdkModel<RichCardShape> */
    use SdkModel;

    /**
     * Carousel of cards.
     */
    #[Api(optional: true)]
    public ?CarouselCard $carousel_card;

    /**
     * Standalone card.
     */
    #[Api(optional: true)]
    public ?StandaloneCard $standalone_card;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CarouselCard|array{
     *   card_contents: list<RcsCardContent>, card_width: value-of<CardWidth>
     * } $carousel_card
     * @param StandaloneCard|array{
     *   card_content: RcsCardContent,
     *   card_orientation: value-of<CardOrientation>,
     *   thumbnail_image_alignment: value-of<ThumbnailImageAlignment>,
     * } $standalone_card
     */
    public static function with(
        CarouselCard|array|null $carousel_card = null,
        StandaloneCard|array|null $standalone_card = null,
    ): self {
        $obj = new self;

        null !== $carousel_card && $obj['carousel_card'] = $carousel_card;
        null !== $standalone_card && $obj['standalone_card'] = $standalone_card;

        return $obj;
    }

    /**
     * Carousel of cards.
     *
     * @param CarouselCard|array{
     *   card_contents: list<RcsCardContent>, card_width: value-of<CardWidth>
     * } $carouselCard
     */
    public function withCarouselCard(CarouselCard|array $carouselCard): self
    {
        $obj = clone $this;
        $obj['carousel_card'] = $carouselCard;

        return $obj;
    }

    /**
     * Standalone card.
     *
     * @param StandaloneCard|array{
     *   card_content: RcsCardContent,
     *   card_orientation: value-of<CardOrientation>,
     *   thumbnail_image_alignment: value-of<ThumbnailImageAlignment>,
     * } $standaloneCard
     */
    public function withStandaloneCard(
        StandaloneCard|array $standaloneCard
    ): self {
        $obj = clone $this;
        $obj['standalone_card'] = $standaloneCard;

        return $obj;
    }
}
