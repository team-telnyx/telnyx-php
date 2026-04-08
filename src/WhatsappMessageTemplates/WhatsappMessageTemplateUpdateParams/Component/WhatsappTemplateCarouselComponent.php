<?php

declare(strict_types=1);

namespace Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateUpdateParams\Component;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateUpdateParams\Component\WhatsappTemplateCarouselComponent\Card;
use Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateUpdateParams\Component\WhatsappTemplateCarouselComponent\Type;

/**
 * Carousel component for multi-card templates. Each card can contain its own header, body, and buttons.
 *
 * @phpstan-import-type CardShape from \Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateUpdateParams\Component\WhatsappTemplateCarouselComponent\Card
 *
 * @phpstan-type WhatsappTemplateCarouselComponentShape = array{
 *   cards: list<Card|CardShape>, type: Type|value-of<Type>
 * }
 */
final class WhatsappTemplateCarouselComponent implements BaseModel
{
    /** @use SdkModel<WhatsappTemplateCarouselComponentShape> */
    use SdkModel;

    /**
     * Array of card objects, each with its own components.
     *
     * @var list<Card> $cards
     */
    #[Required(list: Card::class)]
    public array $cards;

    /** @var value-of<Type> $type */
    #[Required(enum: Type::class)]
    public string $type;

    /**
     * `new WhatsappTemplateCarouselComponent()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * WhatsappTemplateCarouselComponent::with(cards: ..., type: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new WhatsappTemplateCarouselComponent)->withCards(...)->withType(...)
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
     * @param Type|value-of<Type> $type
     */
    public static function with(array $cards, Type|string $type): self
    {
        $self = new self;

        $self['cards'] = $cards;
        $self['type'] = $type;

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
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
