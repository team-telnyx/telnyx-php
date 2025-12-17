<?php

declare(strict_types=1);

namespace Telnyx\Messages\RcsAgentMessage\ContentMessage;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\RcsAgentMessage\ContentMessage\RichCard\CarouselCard;
use Telnyx\Messages\RcsAgentMessage\ContentMessage\RichCard\StandaloneCard;

/**
 * @phpstan-import-type CarouselCardShape from \Telnyx\Messages\RcsAgentMessage\ContentMessage\RichCard\CarouselCard
 * @phpstan-import-type StandaloneCardShape from \Telnyx\Messages\RcsAgentMessage\ContentMessage\RichCard\StandaloneCard
 *
 * @phpstan-type RichCardShape = array{
 *   carouselCard?: null|CarouselCard|CarouselCardShape,
 *   standaloneCard?: null|StandaloneCard|StandaloneCardShape,
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
     * @param CarouselCard|CarouselCardShape|null $carouselCard
     * @param StandaloneCard|StandaloneCardShape|null $standaloneCard
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
     * @param CarouselCard|CarouselCardShape $carouselCard
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
     * @param StandaloneCard|StandaloneCardShape $standaloneCard
     */
    public function withStandaloneCard(
        StandaloneCard|array $standaloneCard
    ): self {
        $self = clone $this;
        $self['standaloneCard'] = $standaloneCard;

        return $self;
    }
}
