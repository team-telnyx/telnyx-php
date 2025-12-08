<?php

declare(strict_types=1);

namespace Telnyx\Messaging\Rcs;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messaging\Rcs\RcsCapabilities\RecordType;

/**
 * @phpstan-type RcsCapabilitiesShape = array{
 *   agent_id?: string|null,
 *   agent_name?: string|null,
 *   features?: list<string>|null,
 *   phone_number?: string|null,
 *   record_type?: value-of<RecordType>|null,
 * }
 */
final class RcsCapabilities implements BaseModel
{
    /** @use SdkModel<RcsCapabilitiesShape> */
    use SdkModel;

    /**
     * RCS agent ID.
     */
    #[Optional]
    public ?string $agent_id;

    /**
     * RCS agent name.
     */
    #[Optional]
    public ?string $agent_name;

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
    #[Optional]
    public ?string $phone_number;

    /**
     * Identifies the type of the resource.
     *
     * @var value-of<RecordType>|null $record_type
     */
    #[Optional(enum: RecordType::class)]
    public ?string $record_type;

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
     * @param RecordType|value-of<RecordType> $record_type
     */
    public static function with(
        ?string $agent_id = null,
        ?string $agent_name = null,
        ?array $features = null,
        ?string $phone_number = null,
        RecordType|string|null $record_type = null,
    ): self {
        $obj = new self;

        null !== $agent_id && $obj['agent_id'] = $agent_id;
        null !== $agent_name && $obj['agent_name'] = $agent_name;
        null !== $features && $obj['features'] = $features;
        null !== $phone_number && $obj['phone_number'] = $phone_number;
        null !== $record_type && $obj['record_type'] = $record_type;

        return $obj;
    }

    /**
     * RCS agent ID.
     */
    public function withAgentID(string $agentID): self
    {
        $obj = clone $this;
        $obj['agent_id'] = $agentID;

        return $obj;
    }

    /**
     * RCS agent name.
     */
    public function withAgentName(string $agentName): self
    {
        $obj = clone $this;
        $obj['agent_name'] = $agentName;

        return $obj;
    }

    /**
     * List of RCS capabilities.
     *
     * @param list<string> $features
     */
    public function withFeatures(array $features): self
    {
        $obj = clone $this;
        $obj['features'] = $features;

        return $obj;
    }

    /**
     * Phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }

    /**
     * Identifies the type of the resource.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }
}
