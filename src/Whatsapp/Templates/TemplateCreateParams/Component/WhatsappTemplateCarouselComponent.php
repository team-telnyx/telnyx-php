<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\Templates\TemplateCreateParams\Component;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Whatsapp\Templates\TemplateCreateParams\Component\WhatsappTemplateCarouselComponent\Card;

/**
 * Carousel component for multi-card templates. Each card can contain its own header, body, and buttons.
 *
 * @phpstan-import-type CardShape from \Telnyx\Whatsapp\Templates\TemplateCreateParams\Component\WhatsappTemplateCarouselComponent\Card
 *
 * @phpstan-type WhatsappTemplateCarouselComponentShape = array{
 *   cards: list<Card|CardShape>, type: 'CAROUSEL'
 * }
 */
final class WhatsappTemplateCarouselComponent implements BaseModel
{
    /** @use SdkModel<WhatsappTemplateCarouselComponentShape> */
    use SdkModel;

    /** @var 'CAROUSEL' $type */
    #[Required]
    public string $type = 'CAROUSEL';

    /**
     * Array of card objects, each with its own components.
     *
     * @var list<Card> $cards
     */
    #[Required(list: Card::class)]
    public array $cards;

    /**
     * `new WhatsappTemplateCarouselComponent()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WhatsappTemplateCarouselComponent::with(cards: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WhatsappTemplateCarouselComponent)->withCards(...)
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
     * @param list<Card|CardShape> $cards
     */
    public static function with(array $cards): self
    {
        $self = new self;

        $self['cards'] = $cards;

        return $self;
    }

    /**
     * Array of card objects, each with its own components.
     *
     * @param list<Card|CardShape> $cards
     */
    public function withCards(array $cards): self
    {
        $self = clone $this;
        $self['cards'] = $cards;

        return $self;
    }

    /**
     * @param 'CAROUSEL' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
