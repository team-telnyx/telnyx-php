<?php

declare(strict_types=1);

namespace Telnyx\Messsages\RcsAgentMessage\ContentMessage;

use Telnyx\Core\Attributes\Optional;
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
 *   carouselCard?: CarouselCard|null, standaloneCard?: StandaloneCard|null
 * }
 */
final class RichCard implements BaseModel
{
    /** @use SdkModel<RichCardShape> */
    use SdkModel;

    /**
     * Carousel of cards.
     */
    #[Optional('carousel_card')]
    public ?CarouselCard $carouselCard;

    /**
     * Standalone card.
     */
    #[Optional('standalone_card')]
    public ?StandaloneCard $standaloneCard;

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
     *   cardContents: list<RcsCardContent>, cardWidth: value-of<CardWidth>
     * } $carouselCard
     * @param StandaloneCard|array{
     *   cardContent: RcsCardContent,
     *   cardOrientation: value-of<CardOrientation>,
     *   thumbnailImageAlignment: value-of<ThumbnailImageAlignment>,
     * } $standaloneCard
     */
    public static function with(
        CarouselCard|array|null $carouselCard = null,
        StandaloneCard|array|null $standaloneCard = null,
    ): self {
        $self = new self;

        null !== $carouselCard && $self['carouselCard'] = $carouselCard;
        null !== $standaloneCard && $self['standaloneCard'] = $standaloneCard;

        return $self;
    }

    /**
     * Carousel of cards.
     *
     * @param CarouselCard|array{
     *   cardContents: list<RcsCardContent>, cardWidth: value-of<CardWidth>
     * } $carouselCard
     */
    public function withCarouselCard(CarouselCard|array $carouselCard): self
    {
        $self = clone $this;
        $self['carouselCard'] = $carouselCard;

        return $self;
    }

    /**
     * Standalone card.
     *
     * @param StandaloneCard|array{
     *   cardContent: RcsCardContent,
     *   cardOrientation: value-of<CardOrientation>,
     *   thumbnailImageAlignment: value-of<ThumbnailImageAlignment>,
     * } $standaloneCard
     */
    public function withStandaloneCard(
        StandaloneCard|array $standaloneCard
    ): self {
        $self = clone $this;
        $self['standaloneCard'] = $standaloneCard;

        return $self;
    }
}
