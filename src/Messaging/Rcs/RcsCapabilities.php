<?php

declare(strict_types=1);

namespace Telnyx\Messaging\Rcs;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messaging\Rcs\RcsCapabilities\RecordType;

/**
 * @phpstan-type rcs_capabilities = array{
 *   agentID?: string,
 *   agentName?: string,
 *   features?: list<string>,
 *   phoneNumber?: string,
 *   recordType?: value-of<RecordType>,
 * }
 */
final class RcsCapabilities implements BaseModel
{
    /** @use SdkModel<rcs_capabilities> */
    use SdkModel;

    /**
     * RCS agent ID.
     */
    #[Api('agent_id', optional: true)]
    public ?string $agentID;

    /**
     * RCS agent name.
     */
    #[Api('agent_name', optional: true)]
    public ?string $agentName;

    /**
     * List of RCS capabilities.
     *
     * @var list<string>|null $features
     */
    #[Api(list: 'string', optional: true)]
    public ?array $features;

    /**
     * Phone number.
     */
    #[Api('phone_number', optional: true)]
    public ?string $phoneNumber;

    /**
     * Identifies the type of the resource.
     *
     * @var value-of<RecordType>|null $recordType
     */
    #[Api('record_type', enum: RecordType::class, optional: true)]
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
        $obj = new self;

        null !== $agentID && $obj->agentID = $agentID;
        null !== $agentName && $obj->agentName = $agentName;
        null !== $features && $obj->features = $features;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;
        null !== $recordType && $obj->recordType = $recordType instanceof RecordType ? $recordType->value : $recordType;

        return $obj;
    }

    /**
     * RCS agent ID.
     */
    public function withAgentID(string $agentID): self
    {
        $obj = clone $this;
        $obj->agentID = $agentID;

        return $obj;
    }

    /**
     * RCS agent name.
     */
    public function withAgentName(string $agentName): self
    {
        $obj = clone $this;
        $obj->agentName = $agentName;

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
        $obj->features = $features;

        return $obj;
    }

    /**
     * Phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

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
        $obj->recordType = $recordType instanceof RecordType ? $recordType->value : $recordType;

        return $obj;
    }
}
