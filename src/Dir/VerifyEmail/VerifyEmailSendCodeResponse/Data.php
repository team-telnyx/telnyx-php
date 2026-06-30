<?php

declare(strict_types=1);

namespace Telnyx\Dir\VerifyEmail\VerifyEmailSendCodeResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Dir\VerifyEmail\VerifyEmailSendCodeResponse\Data\RecordType;
use Telnyx\Dir\VerifyEmail\VerifyEmailSendCodeResponse\Data\Status;

/**
 * Verification state for a DIR's authorizer email.
 *
 * @phpstan-type DataShape = array{
 *   emailVerified: bool,
 *   recordType: RecordType|value-of<RecordType>,
 *   status: Status|value-of<Status>,
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
        Status|string $status
    ): self {
        $self = new self;

        $self['emailVerified'] = $emailVerified;
        $self['recordType'] = $recordType;
        $self['status'] = $status;

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
}
