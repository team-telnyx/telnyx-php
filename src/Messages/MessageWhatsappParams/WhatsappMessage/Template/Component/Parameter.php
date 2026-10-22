<?php

declare(strict_types=1);

namespace Telnyx\Messages\MessageWhatsappParams\WhatsappMessage\Template\Component;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messages\MessageWhatsappParams\WhatsappMessage\Template\Component\Parameter\Action;
use Telnyx\Messages\MessageWhatsappParams\WhatsappMessage\Template\Component\Parameter\Type;

/**
 * @phpstan-import-type ActionShape from \Telnyx\Messages\MessageWhatsappParams\WhatsappMessage\Template\Component\Parameter\Action
 *
 * @phpstan-type ParameterShape = array{
 *   action?: null|Action|ActionShape,
 *   text?: string|null,
 *   type?: null|\Telnyx\Messages\MessageWhatsappParams\WhatsappMessage\Template\Component\Parameter\Type|value-of<\Telnyx\Messages\MessageWhatsappParams\WhatsappMessage\Template\Component\Parameter\Type>,
 * }
 */
final class Parameter implements BaseModel
{
    /** @use SdkModel<ParameterShape> */
    use SdkModel;

    /**
     * Flow button parameters. Used with type action on a flow button component.
     */
    #[Optional]
    public ?Action $action;

    #[Optional]
    public ?string $text;

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
     * @param Action|ActionShape|null $action
     * @param Type|value-of<Type>|null $type
     */
    public static function with(
        Action|array|null $action = null,
        ?string $text = null,
        Type|string|null $type = null,
    ): self {
        $self = new self;

        null !== $action && $self['action'] = $action;
        null !== $text && $self['text'] = $text;
        null !== $type && $self['type'] = $type;

        return $self;
    }

    /**
     * Flow button parameters. Used with type action on a flow button component.
     *
     * @param Action|ActionShape $action
     */
    public function withAction(Action|array $action): self
    {
        $self = clone $this;
        $self['action'] = $action;

        return $self;
    }

    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

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
