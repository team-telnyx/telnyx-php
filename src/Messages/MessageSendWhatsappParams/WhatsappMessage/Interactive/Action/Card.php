<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Interactive\Action;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Interactive\Action\Card\Action;
use Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Interactive\Action\Card\Body;
use Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Interactive\Action\Card\Header;
use Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Interactive\Action\Card\Type;

/**
 * @phpstan-import-type ActionShape from \Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Interactive\Action\Card\Action
 * @phpstan-import-type BodyShape from \Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Interactive\Action\Card\Body
 * @phpstan-import-type HeaderShape from \Telnyx\Messages\MessageSendWhatsappParams\WhatsappMessage\Interactive\Action\Card\Header
 *
 * @phpstan-type CardShape = array{
 *   action?: null|Action|ActionShape,
 *   body?: null|Body|BodyShape,
 *   cardIndex?: int|null,
 *   header?: null|Header|HeaderShape,
 *   type?: null|Type|value-of<Type>,
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
     * @param ActionShape $action
     * @param BodyShape $body
     * @param HeaderShape $header
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
     * @param ActionShape $action
     */
    public function withAction(Action|array $action): self
    {
        $self = clone $this;
        $self['action'] = $action;

        return $self;
    }

    /**
     * @param BodyShape $body
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
     * @param HeaderShape $header
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
