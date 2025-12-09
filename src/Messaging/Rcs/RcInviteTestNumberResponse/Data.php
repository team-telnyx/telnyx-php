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
 *   recordType?: value-of<RecordType>|null,
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
        $obj = new self;

        null !== $agentID && $obj['agentID'] = $agentID;
        null !== $phoneNumber && $obj['phoneNumber'] = $phoneNumber;
        null !== $recordType && $obj['recordType'] = $recordType;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    /**
     * RCS agent ID.
     */
    public function withAgentID(string $agentID): self
    {
        $obj = clone $this;
        $obj['agentID'] = $agentID;

        return $obj;
    }

    /**
     * Phone number that was invited for testing.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phoneNumber'] = $phoneNumber;

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
        $obj['recordType'] = $recordType;

        return $obj;
    }

    /**
     * Status of the test number invitation.
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }
}
