<?php

declare(strict_types=1);

namespace Telnyx\Messaging10dlc\PhoneNumberAssignmentByProfile;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Messaging10dlc\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileGetStatusResponse\Status;

/**
 * @phpstan-type PhoneNumberAssignmentByProfileGetStatusResponseShape = array{
 *   status: Status|value-of<Status>,
 *   taskID: string,
 *   createdAt?: \DateTimeInterface|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class PhoneNumberAssignmentByProfileGetStatusResponse implements BaseModel
{
    /** @use SdkModel<PhoneNumberAssignmentByProfileGetStatusResponseShape> */
    use SdkModel;

    /**
     * An enumeration.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    #[Required('taskId')]
    public string $taskID;

    #[Optional]
    public ?\DateTimeInterface $createdAt;

    #[Optional]
    public ?\DateTimeInterface $updatedAt;

    /**
     * `new PhoneNumberAssignmentByProfileGetStatusResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumberAssignmentByProfileGetStatusResponse::with(status: ..., taskID: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PhoneNumberAssignmentByProfileGetStatusResponse)
     *   ->withStatus(...)
     *   ->withTaskID(...)
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
     *
     * @param Status|value-of<Status> $status
     */
    public static function with(
        Status|string $status,
        string $taskID,
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $self = new self;

        $self['status'] = $status;
        $self['taskID'] = $taskID;

        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * An enumeration.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withTaskID(string $taskID): self
    {
        $self = clone $this;
        $self['taskID'] = $taskID;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }
}
