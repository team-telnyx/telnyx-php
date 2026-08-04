<?php

declare(strict_types=1);

namespace Telnyx\Whatsapp\PhoneNumbers\ConversationalComponents\ConversationalComponentListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Whatsapp\PhoneNumbers\ConversationalComponents\ConversationalComponentListResponse\Data\Command;

/**
 * @phpstan-import-type CommandShape from \Telnyx\Whatsapp\PhoneNumbers\ConversationalComponents\ConversationalComponentListResponse\Data\Command
 *
 * @phpstan-type DataShape = array{
 *   commands?: list<Command|CommandShape>|null,
 *   iceBreakers?: list<string>|null,
 *   phoneNumber?: string|null,
 *   recordType?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

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

    /**
     * Phone number in E164 format.
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

    #[Optional('record_type')]
    public ?string $recordType;

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
        ?array $iceBreakers = null,
        ?string $phoneNumber = null,
        ?string $recordType = null,
    ): self {
        $self = new self;

        null !== $commands && $self['commands'] = $commands;
        null !== $iceBreakers && $self['iceBreakers'] = $iceBreakers;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $recordType && $self['recordType'] = $recordType;

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

    /**
     * Phone number in E164 format.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }
}
