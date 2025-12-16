<?php

declare(strict_types=1);

namespace Telnyx\Messaging\Rcs\RcInviteTestNumberResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messaging\Rcs\RcInviteTestNumberResponse\Data\RecordType;

/**
 * @phpstan-type DataShape = array{
 *   agentID?: string|null,
 *   phoneNumber?: string|null,
 *   recordType?: null|RecordType|value-of<RecordType>,
 *   status?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * RCS agent ID.
     */
    #[Optional('agent_id')]
    public ?string $agentID;

    /**
     * Phone number that was invited for testing.
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

    /**
     * Status of the test number invitation.
     */
    #[Optional]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public static function with(
        ?string $agentID = null,
        ?string $phoneNumber = null,
        RecordType|string|null $recordType = null,
        ?string $status = null,
    ): self {
        $self = new self;

        null !== $agentID && $self['agentID'] = $agentID;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $status && $self['status'] = $status;

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
     * Phone number that was invited for testing.
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

    /**
     * Status of the test number invitation.
     */
    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
