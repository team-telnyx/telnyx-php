<?php

declare(strict_types=1);

namespace Telnyx\Enterprises\VerifyEmail\EnterpriseEmailVerificationStatusWrapped;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Omitted;
use Telnyx\Enterprises\VerifyEmail\EnterpriseEmailVerificationStatusWrapped\Data\RecordType;
use Telnyx\Enterprises\VerifyEmail\EnterpriseEmailVerificationStatusWrapped\Data\Status;

/**
 * Verification state for an enterprise account's contact email.
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
     * Whether the enterprise account's contact email has been confirmed.
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
     * `sent` after a code is emailed; `verified` after a successful confirm.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * When the code just sent stops being accepted. Present on a send response; null on a confirm response.
     */
    #[Optional('expires_at', nullable: true)]
    public ?\DateTimeInterface $expiresAt;

    /**
     * How many more codes may be requested for this enterprise account today. Present on a send response; null on a confirm response.
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
        \DateTimeInterface|Omitted|null $expiresAt = Omitted::VALUE,
        int|Omitted|null $sendsRemainingToday = Omitted::VALUE,
    ): self {
        $self = new self;

        $self['emailVerified'] = $emailVerified;
        $self['recordType'] = $recordType;
        $self['status'] = $status;

        Omitted::VALUE !== $expiresAt && $self['expiresAt'] = $expiresAt;
        Omitted::VALUE !== $sendsRemainingToday && $self['sendsRemainingToday'] = $sendsRemainingToday;

        return $self;
    }

    /**
     * Whether the enterprise account's contact email has been confirmed.
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
     * `sent` after a code is emailed; `verified` after a successful confirm.
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
     * When the code just sent stops being accepted. Present on a send response; null on a confirm response.
     */
    public function withExpiresAt(?\DateTimeInterface $expiresAt): self
    {
        $self = clone $this;
        $self['expiresAt'] = $expiresAt;

        return $self;
    }

    /**
     * How many more codes may be requested for this enterprise account today. Present on a send response; null on a confirm response.
     */
    public function withSendsRemainingToday(?int $sendsRemainingToday): self
    {
        $self = clone $this;
        $self['sendsRemainingToday'] = $sendsRemainingToday;

        return $self;
    }
}
