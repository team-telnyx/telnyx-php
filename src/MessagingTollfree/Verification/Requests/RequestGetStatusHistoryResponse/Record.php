<?php

declare(strict_types=1);

namespace Telnyx\MessagingTollfree\Verification\Requests\RequestGetStatusHistoryResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\MessagingTollfree\Verification\Requests\TfVerificationStatus;

/**
 * A single entry in the verification request status history.
 *
 * @phpstan-type RecordShape = array{
 *   updatedAt: \DateTimeInterface,
 *   verificationStatus: TfVerificationStatus|value-of<TfVerificationStatus>,
 *   reason?: string|null,
 * }
 */
final class Record implements BaseModel
{
    /** @use SdkModel<RecordShape> */
    use SdkModel;

    /**
     * The timestamp at which this status change occurred.
     */
    #[Required]
    public \DateTimeInterface $updatedAt;

    /**
     * Tollfree verification status.
     *
     * @var value-of<TfVerificationStatus> $verificationStatus
     */
    #[Required(enum: TfVerificationStatus::class)]
    public string $verificationStatus;

    /**
     * An explanation of why this request has its current status.
     */
    #[Optional(nullable: true)]
    public ?string $reason;

    /**
     * `new Record()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Record::with(updatedAt: ..., verificationStatus: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Record)->withUpdatedAt(...)->withVerificationStatus(...)
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
     * @param TfVerificationStatus|value-of<TfVerificationStatus> $verificationStatus
     */
    public static function with(
        \DateTimeInterface $updatedAt,
        TfVerificationStatus|string $verificationStatus,
        ?string $reason = null,
    ): self {
        $self = new self;

        $self['updatedAt'] = $updatedAt;
        $self['verificationStatus'] = $verificationStatus;

        null !== $reason && $self['reason'] = $reason;

        return $self;
    }

    /**
     * The timestamp at which this status change occurred.
     */
    public function withUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * Tollfree verification status.
     *
     * @param TfVerificationStatus|value-of<TfVerificationStatus> $verificationStatus
     */
    public function withVerificationStatus(
        TfVerificationStatus|string $verificationStatus
    ): self {
        $self = clone $this;
        $self['verificationStatus'] = $verificationStatus;

        return $self;
    }

    /**
     * An explanation of why this request has its current status.
     */
    public function withReason(?string $reason): self
    {
        $self = clone $this;
        $self['reason'] = $reason;

        return $self;
    }
}
