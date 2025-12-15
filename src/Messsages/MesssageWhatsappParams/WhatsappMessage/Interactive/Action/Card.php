<?php

declare(strict_types=1);

namespace Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Interactive\Action;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Interactive\Action\Card\Action;
use Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Interactive\Action\Card\Body;
use Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Interactive\Action\Card\Header;
use Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Interactive\Action\Card\Header\Image;
use Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Interactive\Action\Card\Header\Video;
use Telnyx\Messsages\MesssageWhatsappParams\WhatsappMessage\Interactive\Action\Card\Type;

/**
 * @phpstan-type CardShape = array{
 *   action?: Action|null,
 *   body?: Body|null,
 *   cardIndex?: int|null,
 *   header?: Header|null,
 *   type?: value-of<Type>|null,
 * }
 */
final class Card implements BaseModel
{
    /** @use SdkModel<CardShape> */
    use SdkModel;

    #[Optional]
    public ?Action $action;

    #[Optional]
    public ?Body $body;

    /**
     * unique index for each card (0-9).
     */
    #[Optional('card_index')]
    public ?int $cardIndex;

    #[Optional]
    public ?Header $header;

    /** @var value-of<Type>|null $type */
    #[Optional(enum: Type::class)]
    public ?string $type;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Action|array{
     *   catalogID?: string|null, productRetailerID?: string|null
     * } $action
     * @param Body|array{text?: string|null} $body
     * @param Header|array{
     *   image?: Image|null,
     *   type?: value-of<Header\Type>|null,
     *   video?: Video|null,
     * } $header
     * @param Type|value-of<Type> $type
     */
    public static function with(
        Action|array|null $action = null,
        Body|array|null $body = null,
        ?int $cardIndex = null,
        Header|array|null $header = null,
        Type|string|null $type = null,
    ): self {
        $self = new self;

        null !== $action && $self['action'] = $action;
        null !== $body && $self['body'] = $body;
        null !== $cardIndex && $self['cardIndex'] = $cardIndex;
        null !== $header && $self['header'] = $header;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * @param Action|array{
     *   catalogID?: string|null, productRetailerID?: string|null
     * } $action
     */
    public function withAction(Action|array $action): self
    {
        $self = clone $this;
        $self['action'] = $action;

        return $self;
    }

    /**
     * @param Body|array{text?: string|null} $body
     */
    public function withBody(Body|array $body): self
    {
        $self = clone $this;
        $self['body'] = $body;

        return $self;
    }

    /**
     * unique index for each card (0-9).
     */
    public function withCardIndex(int $cardIndex): self
    {
        $self = clone $this;
        $self['cardIndex'] = $cardIndex;

        return $self;
    }

    /**
     * @param Header|array{
     *   image?: Image|null,
     *   type?: value-of<Header\Type>|null,
     *   video?: Video|null,
     * } $header
     */
    public function withHeader(Header|array $header): self
    {
        $self = clone $this;
        $self['header'] = $header;

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
