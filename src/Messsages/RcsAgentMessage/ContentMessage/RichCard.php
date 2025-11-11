<?php

declare(strict_types=1);

namespace Telnyx\Messsages\RcsAgentMessage\ContentMessage;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messsages\RcsAgentMessage\ContentMessage\RichCard\CarouselCard;
use Telnyx\Messsages\RcsAgentMessage\ContentMessage\RichCard\StandaloneCard;

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
     */
    public static function with(
        ?CarouselCard $carousel_card = null,
        ?StandaloneCard $standalone_card = null
    ): self {
        $obj = new self;

        null !== $carousel_card && $obj->carousel_card = $carousel_card;
        null !== $standalone_card && $obj->standalone_card = $standalone_card;

        return $obj;
    }

    /**
     * Carousel of cards.
     */
    public function withCarouselCard(CarouselCard $carouselCard): self
    {
        $obj = clone $this;
        $obj->carousel_card = $carouselCard;

        return $obj;
    }

    /**
     * Standalone card.
     */
    public function withStandaloneCard(StandaloneCard $standaloneCard): self
    {
        $obj = clone $this;
        $obj->standalone_card = $standaloneCard;

        return $obj;
    }
}
