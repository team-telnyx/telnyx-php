<?php

declare(strict_types=1);

namespace Telnyx\Dir\VerifyEmail\EmailVerificationStatusWrapped;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Dir\VerifyEmail\EmailVerificationStatusWrapped\Data\RecordType;
use Telnyx\Dir\VerifyEmail\EmailVerificationStatusWrapped\Data\Status;

/**
 * Verification state for a DIR's authorizer email.
 *
 * @phpstan-type DataShape = array{
 *   emailVerified: bool,
 *   recordType: RecordType|value-of<RecordType>,
 *   status: Status|value-of<Status>,
 *   expiresAt?: \DateTimeInterface|null,
 *   sendsRemainingToday?: int|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Whether the DIR's authorizer email has been confirmed.
     */
    #[Required('email_verified')]
    public bool $emailVerified;

    /**
     * Always `email_verification`.
     *
     * @var value-of<RecordType> $recordType
     */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    /**
     * `sent` after a code is emailed; `verified` after a successful confirm; `unverified` when no verification is in progress.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * When the outstanding code stops being accepted. Null when no verification is in progress.
     */
    #[Optional('expires_at', nullable: true)]
    public ?\DateTimeInterface $expiresAt;

    /**
     * How many more codes may be requested for this DIR today. Null when the daily cap does not apply.
     */
    #[Optional('sends_remaining_today', nullable: true)]
    public ?int $sendsRemainingToday;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(emailVerified: ..., recordType: ..., status: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)->withEmailVerified(...)->withRecordType(...)->withStatus(...)
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
     * @param RecordType|value-of<RecordType> $recordType
     * @param Status|value-of<Status> $status
     */
    public static function with(
        bool $emailVerified,
        RecordType|string $recordType,
        Status|string $status,
        ?\DateTimeInterface $expiresAt = null,
        ?int $sendsRemainingToday = null,
    ): self {
        $self = new self;

        $self['emailVerified'] = $emailVerified;
        $self['recordType'] = $recordType;
        $self['status'] = $status;

        null !== $expiresAt && $self['expiresAt'] = $expiresAt;
        null !== $sendsRemainingToday && $self['sendsRemainingToday'] = $sendsRemainingToday;

        return $self;
    }

    /**
     * Whether the DIR's authorizer email has been confirmed.
     */
    public function withEmailVerified(bool $emailVerified): self
    {
        $self = clone $this;
        $self['emailVerified'] = $emailVerified;

        return $self;
    }

    /**
     * Always `email_verification`.
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
     * `sent` after a code is emailed; `verified` after a successful confirm; `unverified` when no verification is in progress.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * When the outstanding code stops being accepted. Null when no verification is in progress.
     */
    public function withExpiresAt(?\DateTimeInterface $expiresAt): self
    {
        $self = clone $this;
        $self['expiresAt'] = $expiresAt;

        return $self;
    }

    /**
     * How many more codes may be requested for this DIR today. Null when the daily cap does not apply.
     */
    public function withSendsRemainingToday(?int $sendsRemainingToday): self
    {
        $self = clone $this;
        $self['sendsRemainingToday'] = $sendsRemainingToday;

        return $self;
    }
}
