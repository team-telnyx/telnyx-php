<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\PhoneNumbers\ConversationalComponents\ConversationalComponentPatchAllParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CommandShape = array{
 *   command?: string|null, description?: string|null
 * }
 */
final class Command implements BaseModel
{
    /** @use SdkModel<CommandShape> */
    use SdkModel;

    #[Optional]
    public ?string $command;

    #[Optional]
    public ?string $description;

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
        ?string $command = null,
        ?string $description = null
    ): self {
        $self = new self;

        null !== $command && $self['command'] = $command;
        null !== $description && $self['description'] = $description;

        return $self;
    }

    public function withCommand(string $command): self
    {
        $self = clone $this;
        $self['command'] = $command;

        return $self;
    }

    public function withDescription(string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }
}
