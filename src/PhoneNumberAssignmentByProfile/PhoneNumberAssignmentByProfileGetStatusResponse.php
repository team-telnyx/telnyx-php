<?php

declare(strict_types=1);

namespace Telnyx\PhoneNumberAssignmentByProfile;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\PhoneNumberAssignmentByProfile\PhoneNumberAssignmentByProfileGetStatusResponse\Status;

/**
 * @phpstan-type PhoneNumberAssignmentByProfileGetStatusResponseShape = array{
 *   status: value-of<Status>,
 *   taskId: string,
 *   createdAt?: \DateTimeInterface|null,
 *   updatedAt?: \DateTimeInterface|null,
 * }
 */
final class PhoneNumberAssignmentByProfileGetStatusResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<PhoneNumberAssignmentByProfileGetStatusResponseShape> */
    use SdkModel;

    use SdkResponse;

    /**
     * An enumeration.
     *
     * @var value-of<Status> $status
     */
    #[Api(enum: Status::class)]
    public string $status;

    #[Api]
    public string $taskId;

    #[Api(optional: true)]
    public ?\DateTimeInterface $createdAt;

    #[Api(optional: true)]
    public ?\DateTimeInterface $updatedAt;

    /**
     * `new PhoneNumberAssignmentByProfileGetStatusResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PhoneNumberAssignmentByProfileGetStatusResponse::with(status: ..., taskId: ...)
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
        string $taskId,
        ?\DateTimeInterface $createdAt = null,
        ?\DateTimeInterface $updatedAt = null,
    ): self {
        $obj = new self;

        $obj['status'] = $status;
        $obj['taskId'] = $taskId;

        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $updatedAt && $obj['updatedAt'] = $updatedAt;

        return $obj;
    }

    /**
     * An enumeration.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    public function withTaskID(string $taskID): self
    {
        $obj = clone $this;
        $obj['taskId'] = $taskID;

        return $obj;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

        return $obj;
    }

    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $obj = clone $this;
        $obj['updatedAt'] = $updatedAt;

        return $obj;
    }
}
