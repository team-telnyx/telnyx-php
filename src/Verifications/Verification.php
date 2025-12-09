<?php

declare(strict_types=1);

namespace Telnyx\Verifications;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Verifications\Verification\RecordType;
use Telnyx\Verifications\Verification\Status;
use Telnyx\Verifications\Verification\Type;

/**
 * @phpstan-type VerificationShape = array{
 *   id?: string|null,
 *   createdAt?: string|null,
 *   customCode?: string|null,
 *   phoneNumber?: string|null,
 *   recordType?: value-of<RecordType>|null,
 *   status?: value-of<Status>|null,
 *   timeoutSecs?: int|null,
 *   type?: value-of<Type>|null,
 *   updatedAt?: string|null,
 *   verifyProfileID?: string|null,
 * }
 */
final class Verification implements BaseModel
{
    /** @use SdkModel<VerificationShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional('created_at')]
    public ?string $createdAt;

    /**
     * Send a self-generated numeric code to the end-user.
     */
    #[Optional('custom_code', nullable: true)]
    public ?string $customCode;

    /**
     * +E164 formatted phone number.
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

    /**
     * The possible verification record types.
     *
     * @var value-of<RecordType>|null $recordType
     */
    #[Optional('record_type', enum: RecordType::class)]
    public ?string $recordType;

    /**
     * The possible statuses of the verification request.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /**
     * This is the number of seconds before the code of the request is expired. Once this request has expired, the code will no longer verify the user. Note: this will override the `default_verification_timeout_secs` on the Verify profile.
     */
    #[Optional('timeout_secs')]
    public ?int $timeoutSecs;

    /**
     * The possible types of verification.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    #[Optional('updated_at')]
    public ?string $updatedAt;

    /**
     * The identifier of the associated Verify profile.
     */
    #[Optional('verify_profile_id')]
    public ?string $verifyProfileID;

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
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?string $id = null,
        ?string $createdAt = null,
        ?string $customCode = null,
        ?string $phoneNumber = null,
        RecordType|string|null $recordType = null,
        Status|string|null $status = null,
        ?int $timeoutSecs = null,
        Type|string|null $type = null,
        ?string $updatedAt = null,
        ?string $verifyProfileID = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $customCode && $self['customCode'] = $customCode;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $recordType && $self['recordType'] = $recordType;
        null !== $status && $self['status'] = $status;
        null !== $timeoutSecs && $self['timeoutSecs'] = $timeoutSecs;
        null !== $type && $self['type'] = $type;
        null !== $updatedAt && $self['updatedAt'] = $updatedAt;
        null !== $verifyProfileID && $self['verifyProfileID'] = $verifyProfileID;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * Send a self-generated numeric code to the end-user.
     */
    public function withCustomCode(?string $customCode): self
    {
        $self = clone $this;
        $self['customCode'] = $customCode;

        return $self;
    }

    /**
     * +E164 formatted phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * The possible verification record types.
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
     * The possible statuses of the verification request.
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
     * This is the number of seconds before the code of the request is expired. Once this request has expired, the code will no longer verify the user. Note: this will override the `default_verification_timeout_secs` on the Verify profile.
     */
    public function withTimeoutSecs(int $timeoutSecs): self
    {
        $self = clone $this;
        $self['timeoutSecs'] = $timeoutSecs;

        return $self;
    }

    /**
     * The possible types of verification.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withUpdatedAt(string $updatedAt): self
    {
        $self = clone $this;
        $self['updatedAt'] = $updatedAt;

        return $self;
    }

    /**
     * The identifier of the associated Verify profile.
     */
    public function withVerifyProfileID(string $verifyProfileID): self
    {
        $self = clone $this;
        $self['verifyProfileID'] = $verifyProfileID;

        return $self;
    }
}
