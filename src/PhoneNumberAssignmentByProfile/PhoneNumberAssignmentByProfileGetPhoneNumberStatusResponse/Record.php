<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type RecordShape = array{
 *   phoneNumber: string, status: string, taskId: string
 * }
 */
final class Record implements BaseModel
{
    /** @use SdkModel<RecordShape> */
    use SdkModel;

    /**
     * The phone number that the status is being checked for.
     */
    #[Api]
    public string $phoneNumber;

    /**
     * The status of the associated phone number assignment.
     */
    #[Api]
    public string $status;

    /**
     * The ID of the task associated with the phone number.
     */
    #[Api]
    public string $taskId;

    /**
     * `new Record()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Record::with(phoneNumber: ..., status: ..., taskId: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Record)->withPhoneNumber(...)->withStatus(...)->withTaskID(...)
     * ```
     */
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
        string $phoneNumber,
        string $status,
        string $taskId
    ): self {
        $obj = new self;

        $obj->phoneNumber = $phoneNumber;
        $obj->status = $status;
        $obj->taskId = $taskId;

        return $obj;
    }

    /**
     * The phone number that the status is being checked for.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }

    /**
     * The status of the associated phone number assignment.
     */
    public function withStatus(string $status): self
    {
        $obj = clone $this;
        $obj->status = $status;

        return $obj;
    }

    /**
     * The ID of the task associated with the phone number.
     */
    public function withTaskID(string $taskID): self
    {
        $obj = clone $this;
        $obj->taskId = $taskID;

        return $obj;
    }
}
