<?php

declare(strict_types=1);

namespace Telnyx\Messaging10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileGetPhoneNumberStatusResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type RecordShape = array{
 *   phoneNumber: string, status: string, taskID: string
 * }
 */
final class Record implements BaseModel
{
    /** @use SdkModel<RecordShape> */
    use SdkModel;

    /**
     * The phone number that the status is being checked for.
     */
    #[Required]
    public string $phoneNumber;

    /**
     * The status of the associated phone number assignment.
     */
    #[Required]
    public string $status;

    /**
     * The ID of the task associated with the phone number.
     */
    #[Required('taskId')]
    public string $taskID;

    /**
     * `new Record()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Record::with(phoneNumber: ..., status: ..., taskID: ...)
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
        string $taskID
    ): self {
        $self = new self;

        $self['phoneNumber'] = $phoneNumber;
        $self['status'] = $status;
        $self['taskID'] = $taskID;

        return $self;
    }

    /**
     * The phone number that the status is being checked for.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * The status of the associated phone number assignment.
     */
    public function withStatus(string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * The ID of the task associated with the phone number.
     */
    public function withTaskID(string $taskID): self
    {
        $self = clone $this;
        $self['taskID'] = $taskID;

        return $self;
    }
}
