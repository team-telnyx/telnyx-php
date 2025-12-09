<?php

declare(strict_types=1);

namespace Telnyx\Messaging\Rcs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messaging\Rcs\RcsCapabilities\RecordType;

/**
 * @phpstan-type RcsCapabilitiesShape = array{
 *   agentID?: string|null,
 *   agentName?: string|null,
 *   features?: list<string>|null,
 *   phoneNumber?: string|null,
 *   recordType?: value-of<RecordType>|null,
 * }
 */
final class RcsCapabilities implements BaseModel
{
    /** @use SdkModel<RcsCapabilitiesShape> */
    use SdkModel;

    /**
     * RCS agent ID.
     */
    #[Optional('agent_id')]
    public ?string $agentID;

    /**
     * RCS agent name.
     */
    #[Optional('agent_name')]
    public ?string $agentName;

    /**
     * List of RCS capabilities.
     *
     * @var list<string>|null $features
     */
    #[Optional(list: 'string')]
    public ?array $features;

    /**
     * Phone number.
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

    /**
     * Identifies the type of the resource.
     *
     * @var value-of<RecordType>|null $recordType
     */
    #[Optional('record_type', enum: RecordType::class)]
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
     * @param list<string> $features
     * @param RecordType|value-of<RecordType> $recordType
     */
    public static function with(
        ?string $agentID = null,
        ?string $agentName = null,
        ?array $features = null,
        ?string $phoneNumber = null,
        RecordType|string|null $recordType = null,
    ): self {
        $self = new self;

        null !== $agentID && $self['agentID'] = $agentID;
        null !== $agentName && $self['agentName'] = $agentName;
        null !== $features && $self['features'] = $features;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $recordType && $self['recordType'] = $recordType;

        return $self;
    }

    /**
     * RCS agent ID.
     */
    public function withAgentID(string $agentID): self
    {
        $self = clone $this;
        $self['agentID'] = $agentID;

        return $self;
    }

    /**
     * RCS agent name.
     */
    public function withAgentName(string $agentName): self
    {
        $self = clone $this;
        $self['agentName'] = $agentName;

        return $self;
    }

    /**
     * List of RCS capabilities.
     *
     * @param list<string> $features
     */
    public function withFeatures(array $features): self
    {
        $self = clone $this;
        $self['features'] = $features;

        return $self;
    }

    /**
     * Phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Identifies the type of the resource.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }
}
