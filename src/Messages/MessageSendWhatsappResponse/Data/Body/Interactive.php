<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageSendWhatsappResponse\Data\Body;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Interactive\Action;
use Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Interactive\Body;
use Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Interactive\Footer;
use Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Interactive\Header;
use Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Interactive\Type;

/**
 * @phpstan-import-type ActionShape from \Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Interactive\Action
 * @phpstan-import-type BodyShape from \Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Interactive\Body
 * @phpstan-import-type FooterShape from \Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Interactive\Footer
 * @phpstan-import-type HeaderShape from \Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Interactive\Header
 *
 * @phpstan-type InteractiveShape = array{
 *   action?: null|Action|ActionShape,
 *   body?: null|Body|BodyShape,
 *   footer?: null|Footer|FooterShape,
 *   header?: null|Header|HeaderShape,
 *   type?: null|\Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Interactive\Type|value-of<\Telnyx\Messages\MessageSendWhatsappResponse\Data\Body\Interactive\Type>,
 * }
 */
final class Interactive implements BaseModel
{
    /** @use SdkModel<InteractiveShape> */
    use SdkModel;

    #[Optional]
    public ?Action $action;

    #[Optional]
    public ?Body $body;

    #[Optional]
    public ?Footer $footer;

    #[Optional]
    public ?Header $header;

    /**
     * @var value-of<Type>|null $type
     */
    #[Optional(
        enum: Type::class,
    )]
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
     * @param FooterShape $footer
     * @param HeaderShape $header
     * @param Type|value-of<Type> $type
     */
    public static function with(
        Action|array|null $action = null,
        Body|array|null $body = null,
        Footer|array|null $footer = null,
        Header|array|null $header = null,
        Type|string|null $type = null,
    ): self {
        $self = new self;

        null !== $action && $self['action'] = $action;
        null !== $body && $self['body'] = $body;
        null !== $footer && $self['footer'] = $footer;
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
     * @param FooterShape $footer
     */
    public function withFooter(Footer|array $footer): self
    {
        $self = clone $this;
        $self['footer'] = $footer;

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
    public function withType(
        Type|string $type,
    ): self {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }
}
