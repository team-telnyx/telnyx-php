<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\PhoneNumbers\ConversationalComponents;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Whatsapp\PhoneNumbers\ConversationalComponents\ConversationalComponentPatchAllParams\Command;

/**
 * Update phone number conversational components.
 *
 * @see Telnyx\Services\Whatsapp\PhoneNumbers\ConversationalComponentsService::patchAll()
 *
 * @phpstan-import-type CommandShape from \Telnyx\Whatsapp\PhoneNumbers\ConversationalComponents\ConversationalComponentPatchAllParams\Command
 *
 * @phpstan-type ConversationalComponentPatchAllParamsShape = array{
 *   commands?: list<Command|CommandShape>|null, iceBreakers?: list<string>|null
 * }
 */
final class ConversationalComponentPatchAllParams implements BaseModel
{
    /** @use SdkModel<ConversationalComponentPatchAllParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * List of commands.
     *
     * @var list<Command>|null $commands
     */
    #[Optional(list: Command::class)]
    public ?array $commands;

    /**
     * List of ice breakers.
     *
     * @var list<string>|null $iceBreakers
     */
    #[Optional('ice_breakers', list: 'string')]
    public ?array $iceBreakers;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Command|CommandShape>|null $commands
     * @param list<string>|null $iceBreakers
     */
    public static function with(
        ?array $commands = null,
        ?array $iceBreakers = null
    ): self {
        $self = new self;

        null !== $commands && $self['commands'] = $commands;
        null !== $iceBreakers && $self['iceBreakers'] = $iceBreakers;

        return $self;
    }

    /**
     * List of commands.
     *
     * @param list<Command|CommandShape> $commands
     */
    public function withCommands(array $commands): self
    {
        $self = clone $this;
        $self['commands'] = $commands;

        return $self;
    }

    /**
     * List of ice breakers.
     *
     * @param list<string> $iceBreakers
     */
    public function withIceBreakers(array $iceBreakers): self
    {
        $self = clone $this;
        $self['iceBreakers'] = $iceBreakers;

        return $self;
    }
}
