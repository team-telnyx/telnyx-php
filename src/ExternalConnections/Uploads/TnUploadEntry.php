<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Uploads;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\Uploads\TnUploadEntry\ErrorCode;
use Telnyx\ExternalConnections\Uploads\TnUploadEntry\InternalStatus;
use Telnyx\ExternalConnections\Uploads\TnUploadEntry\Status;

/**
 * @phpstan-type TnUploadEntryShape = array{
 *   civic_address_id?: string|null,
 *   error_code?: value-of<ErrorCode>|null,
 *   error_message?: string|null,
 *   internal_status?: value-of<InternalStatus>|null,
 *   location_id?: string|null,
 *   number_id?: string|null,
 *   phone_number?: string|null,
 *   status?: value-of<Status>|null,
 * }
 */
final class TnUploadEntry implements BaseModel
{
    /** @use SdkModel<TnUploadEntryShape> */
    use SdkModel;

    /**
     * Identifies the civic address assigned to the phone number entry.
     */
    #[Api(optional: true)]
    public ?string $civic_address_id;

    /**
     * A code returned by Microsoft Teams if there is an error with the phone number entry upload.
     *
     * @var value-of<ErrorCode>|null $error_code
     */
    #[Api(enum: ErrorCode::class, optional: true)]
    public ?string $error_code;

    /**
     * A message returned by Microsoft Teams if there is an error with the upload process.
     */
    #[Api(optional: true)]
    public ?string $error_message;

    /**
     * Represents the status of the phone number entry upload on Telnyx.
     *
     * @var value-of<InternalStatus>|null $internal_status
     */
    #[Api(enum: InternalStatus::class, optional: true)]
    public ?string $internal_status;

    /**
     * Identifies the location assigned to the phone number entry.
     */
    #[Api(optional: true)]
    public ?string $location_id;

    /**
     * Uniquely identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $number_id;

    /**
     * Phone number in E164 format.
     */
    #[Api(optional: true)]
    public ?string $phone_number;

    /**
     * Represents the status of the phone number entry upload on Microsoft Teams.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ErrorCode|value-of<ErrorCode> $error_code
     * @param InternalStatus|value-of<InternalStatus> $internal_status
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $civic_address_id = null,
        ErrorCode|string|null $error_code = null,
        ?string $error_message = null,
        InternalStatus|string|null $internal_status = null,
        ?string $location_id = null,
        ?string $number_id = null,
        ?string $phone_number = null,
        Status|string|null $status = null,
    ): self {
        $obj = new self;

        null !== $civic_address_id && $obj['civic_address_id'] = $civic_address_id;
        null !== $error_code && $obj['error_code'] = $error_code;
        null !== $error_message && $obj['error_message'] = $error_message;
        null !== $internal_status && $obj['internal_status'] = $internal_status;
        null !== $location_id && $obj['location_id'] = $location_id;
        null !== $number_id && $obj['number_id'] = $number_id;
        null !== $phone_number && $obj['phone_number'] = $phone_number;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    /**
     * Identifies the civic address assigned to the phone number entry.
     */
    public function withCivicAddressID(string $civicAddressID): self
    {
        $obj = clone $this;
        $obj['civic_address_id'] = $civicAddressID;

        return $obj;
    }

    /**
     * A code returned by Microsoft Teams if there is an error with the phone number entry upload.
     *
     * @param ErrorCode|value-of<ErrorCode> $errorCode
     */
    public function withErrorCode(ErrorCode|string $errorCode): self
    {
        $obj = clone $this;
        $obj['error_code'] = $errorCode;

        return $obj;
    }

    /**
     * A message returned by Microsoft Teams if there is an error with the upload process.
     */
    public function withErrorMessage(string $errorMessage): self
    {
        $obj = clone $this;
        $obj['error_message'] = $errorMessage;

        return $obj;
    }

    /**
     * Represents the status of the phone number entry upload on Telnyx.
     *
     * @param InternalStatus|value-of<InternalStatus> $internalStatus
     */
    public function withInternalStatus(
        InternalStatus|string $internalStatus
    ): self {
        $obj = clone $this;
        $obj['internal_status'] = $internalStatus;

        return $obj;
    }

    /**
     * Identifies the location assigned to the phone number entry.
     */
    public function withLocationID(string $locationID): self
    {
        $obj = clone $this;
        $obj['location_id'] = $locationID;

        return $obj;
    }

    /**
     * Uniquely identifies the resource.
     */
    public function withNumberID(string $numberID): self
    {
        $obj = clone $this;
        $obj['number_id'] = $numberID;

        return $obj;
    }

    /**
     * Phone number in E164 format.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phone_number'] = $phoneNumber;

        return $obj;
    }

    /**
     * Represents the status of the phone number entry upload on Microsoft Teams.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }
}
