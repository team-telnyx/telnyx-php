<?php

declare(strict_types=1);

namespace Telnyx\Messaging\Rcs\RcInviteTestNumberResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messaging\Rcs\RcInviteTestNumberResponse\Data\RecordType;

/**
 * @phpstan-type DataShape = array{
 *   agent_id?: string|null,
 *   phone_number?: string|null,
 *   record_type?: value-of<RecordType>|null,
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
    #[Api(optional: true)]
    public ?string $agent_id;

    /**
     * Phone number that was invited for testing.
     */
    #[Api(optional: true)]
    public ?string $phone_number;

    /**
     * Identifies the type of the resource.
     *
     * @var value-of<RecordType>|null $record_type
     */
    #[Api(enum: RecordType::class, optional: true)]
    public ?string $record_type;

    /**
     * Status of the test number invitation.
     */
    #[Api(optional: true)]
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
     * @param RecordType|value-of<RecordType> $record_type
     */
    public static function with(
        ?string $agent_id = null,
        ?string $phone_number = null,
        RecordType|string|null $record_type = null,
        ?string $status = null,
    ): self {
        $obj = new self;

        null !== $agent_id && $obj->agent_id = $agent_id;
        null !== $phone_number && $obj->phone_number = $phone_number;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $status && $obj->status = $status;

        return $obj;
    }

    /**
     * RCS agent ID.
     */
    public function withAgentID(string $agentID): self
    {
        $obj = clone $this;
        $obj->agent_id = $agentID;

        return $obj;
    }

    /**
     * Phone number that was invited for testing.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phone_number = $phoneNumber;

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

    /**
     * Status of the test number invitation.
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }
}
