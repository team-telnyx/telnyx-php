<?php

declare(strict_types=1);

namespace Telnyx\Messsages\RcsAgentMessage\ContentMessage;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messsages\RcsAgentMessage\ContentMessage\RichCard\CarouselCard;
use Telnyx\Messsages\RcsAgentMessage\ContentMessage\RichCard\StandaloneCard;

/**
 * @phpstan-type rich_card = array{
 *   carouselCard?: CarouselCard, standaloneCard?: StandaloneCard
 * }
 */
final class RichCard implements BaseModel
{
    /** @use SdkModel<rich_card> */
    use SdkModel;

    /**
     * Carousel of cards.
     */
    #[Api('carousel_card', optional: true)]
    public ?CarouselCard $carouselCard;

    /**
     * Standalone card.
     */
    #[Api('standalone_card', optional: true)]
    public ?StandaloneCard $standaloneCard;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?CarouselCard $carouselCard = null,
        ?StandaloneCard $standaloneCard = null
    ): self {
        $obj = new self;

        null !== $carouselCard && $obj->carouselCard = $carouselCard;
        null !== $standaloneCard && $obj->standaloneCard = $standaloneCard;

        return $obj;
    }

    /**
     * Carousel of cards.
     */
    public function withCarouselCard(CarouselCard $carouselCard): self
    {
        $obj = clone $this;
        $obj->carouselCard = $carouselCard;

        return $obj;
    }

    /**
     * Standalone card.
     */
    public function withStandaloneCard(StandaloneCard $standaloneCard): self
    {
        $obj = clone $this;
        $obj->standaloneCard = $standaloneCard;

        return $obj;
    }
}
