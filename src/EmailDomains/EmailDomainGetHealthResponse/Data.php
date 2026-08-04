<?php

declare(strict_types=1);

namespace Telnyx\EmailDomains\EmailDomainGetHealthResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\EmailDomains\EmailDomainGetHealthResponse\Data\RecordType;
use Telnyx\EmailDomains\EmailDomainGetHealthResponse\Data\Status;
use Telnyx\EmailDomains\EmailDomainVerification;

/**
 * @phpstan-import-type EmailDomainVerificationShape from \Telnyx\EmailDomains\EmailDomainVerification
 *
 * @phpstan-type DataShape = array{
 *   id: string,
 *   checkedAt: \DateTimeInterface,
 *   recordType: RecordType|value-of<RecordType>,
 *   status: Status|value-of<Status>,
 *   usableForInbound: bool,
 *   usableForSending: bool,
 *   verification: EmailDomainVerification|EmailDomainVerificationShape,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * Unique identifier for the email domain.
     */
    #[Required]
    public string $id;

    /**
     * Timestamp of the last health check.
     */
    #[Required('checked_at')]
    public \DateTimeInterface $checkedAt;

    /**
     * Record type discriminator.
     *
     * @var value-of<RecordType> $recordType
     */
    #[Required('record_type', enum: RecordType::class)]
    public string $recordType;

    /**
     * Current domain status.
     *
     * @var value-of<Status> $status
     */
    #[Required(enum: Status::class)]
    public string $status;

    /**
     * Whether the domain is usable for receiving inbound email.
     */
    #[Required('usable_for_inbound')]
    public bool $usableForInbound;

    /**
     * Whether the domain is usable for sending email.
     */
    #[Required('usable_for_sending')]
    public bool $usableForSending;

    #[Required]
    public EmailDomainVerification $verification;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   id: ...,
     *   checkedAt: ...,
     *   recordType: ...,
     *   status: ...,
     *   usableForInbound: ...,
     *   usableForSending: ...,
     *   verification: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withID(...)
     *   ->withCheckedAt(...)
     *   ->withRecordType(...)
     *   ->withStatus(...)
     *   ->withUsableForInbound(...)
     *   ->withUsableForSending(...)
     *   ->withVerification(...)
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
     * @param EmailDomainVerification|EmailDomainVerificationShape $verification
     */
    public static function with(
        string $id,
        \DateTimeInterface $checkedAt,
        RecordType|string $recordType,
        Status|string $status,
        bool $usableForInbound,
        bool $usableForSending,
        EmailDomainVerification|array $verification,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['checkedAt'] = $checkedAt;
        $self['recordType'] = $recordType;
        $self['status'] = $status;
        $self['usableForInbound'] = $usableForInbound;
        $self['usableForSending'] = $usableForSending;
        $self['verification'] = $verification;

        return $self;
    }

    /**
     * Unique identifier for the email domain.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Timestamp of the last health check.
     */
    public function withCheckedAt(\DateTimeInterface $checkedAt): self
    {
        $self = clone $this;
        $self['checkedAt'] = $checkedAt;

        return $self;
    }

    /**
     * Record type discriminator.
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
     * Current domain status.
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
     * Whether the domain is usable for receiving inbound email.
     */
    public function withUsableForInbound(bool $usableForInbound): self
    {
        $self = clone $this;
        $self['usableForInbound'] = $usableForInbound;

        return $self;
    }

    /**
     * Whether the domain is usable for sending email.
     */
    public function withUsableForSending(bool $usableForSending): self
    {
        $self = clone $this;
        $self['usableForSending'] = $usableForSending;

        return $self;
    }

    /**
     * @param EmailDomainVerification|EmailDomainVerificationShape $verification
     */
    public function withVerification(
        EmailDomainVerification|array $verification
    ): self {
        $self = clone $this;
        $self['verification'] = $verification;

        return $self;
    }
}
