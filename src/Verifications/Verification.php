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
 *   created_at?: string|null,
 *   custom_code?: string|null,
 *   phone_number?: string|null,
 *   record_type?: value-of<RecordType>|null,
 *   status?: value-of<Status>|null,
 *   timeout_secs?: int|null,
 *   type?: value-of<Type>|null,
 *   updated_at?: string|null,
 *   verify_profile_id?: string|null,
 * }
 */
final class Verification implements BaseModel
{
    /** @use SdkModel<VerificationShape> */
    use SdkModel;

    #[Optional]
    public ?string $id;

    #[Optional]
    public ?string $created_at;

    /**
     * Send a self-generated numeric code to the end-user.
     */
    #[Optional(nullable: true)]
    public ?string $custom_code;

    /**
     * +E164 formatted phone number.
     */
    #[Optional]
    public ?string $phone_number;

    /**
     * The possible verification record types.
     *
     * @var value-of<RecordType>|null $record_type
     */
    #[Optional(enum: RecordType::class)]
    public ?string $record_type;

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
    #[Optional]
    public ?int $timeout_secs;

    /**
     * The possible types of verification.
     *
     * @var value-of<Type>|null $type
     */
    #[Optional(enum: Type::class)]
    public ?string $type;

    #[Optional]
    public ?string $updated_at;

    /**
     * The identifier of the associated Verify profile.
     */
    #[Optional]
    public ?string $verify_profile_id;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param RecordType|value-of<RecordType> $record_type
     * @param Status|value-of<Status> $status
     * @param Type|value-of<Type> $type
     */
    public static function with(
        ?string $id = null,
        ?string $created_at = null,
        ?string $custom_code = null,
        ?string $phone_number = null,
        RecordType|string|null $record_type = null,
        Status|string|null $status = null,
        ?int $timeout_secs = null,
        Type|string|null $type = null,
        ?string $updated_at = null,
        ?string $verify_profile_id = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $custom_code && $obj['custom_code'] = $custom_code;
        null !== $phone_number && $obj['phone_number'] = $phone_number;
        null !== $record_type && $obj['record_type'] = $record_type;
        null !== $status && $obj['status'] = $status;
        null !== $timeout_secs && $obj['timeout_secs'] = $timeout_secs;
        null !== $type && $obj['type'] = $type;
        null !== $updated_at && $obj['updated_at'] = $updated_at;
        null !== $verify_profile_id && $obj['verify_profile_id'] = $verify_profile_id;

        return $obj;
    }

    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * Send a self-generated numeric code to the end-user.
     */
    public function withCustomCode(?string $customCode): self
    {
        $obj = clone $this;
        $obj['custom_code'] = $customCode;

        return $obj;
    }

    /**
     * +E164 formatted phone number.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }

    /**
     * The possible verification record types.
     *
     * @param RecordType|value-of<RecordType> $recordType
     */
    public function withRecordType(RecordType|string $recordType): self
    {
        $obj = clone $this;
        $obj['record_type'] = $recordType;

        return $obj;
    }

    /**
     * The possible statuses of the verification request.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    /**
     * This is the number of seconds before the code of the request is expired. Once this request has expired, the code will no longer verify the user. Note: this will override the `default_verification_timeout_secs` on the Verify profile.
     */
    public function withTimeoutSecs(int $timeoutSecs): self
    {
        $obj = clone $this;
        $obj['timeout_secs'] = $timeoutSecs;

        return $obj;
    }

    /**
     * The possible types of verification.
     *
     * @param Type|value-of<Type> $type
     */
    public function withType(Type|string $type): self
    {
        $obj = clone $this;
        $obj['type'] = $type;

        return $obj;
    }

    public function withUpdatedAt(string $updatedAt): self
    {
        $obj = clone $this;
        $obj['updated_at'] = $updatedAt;

        return $obj;
    }

    /**
     * The identifier of the associated Verify profile.
     */
    public function withVerifyProfileID(string $verifyProfileID): self
    {
        $obj = clone $this;
        $obj['verify_profile_id'] = $verifyProfileID;

        return $obj;
    }
}
