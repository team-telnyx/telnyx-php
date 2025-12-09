<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Uploads;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\Uploads\TnUploadEntry\ErrorCode;
use Telnyx\ExternalConnections\Uploads\TnUploadEntry\InternalStatus;
use Telnyx\ExternalConnections\Uploads\TnUploadEntry\Status;

/**
 * @phpstan-type TnUploadEntryShape = array{
 *   civicAddressID?: string|null,
 *   errorCode?: value-of<ErrorCode>|null,
 *   errorMessage?: string|null,
 *   internalStatus?: value-of<InternalStatus>|null,
 *   locationID?: string|null,
 *   numberID?: string|null,
 *   phoneNumber?: string|null,
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
    #[Optional('civic_address_id')]
    public ?string $civicAddressID;

    /**
     * A code returned by Microsoft Teams if there is an error with the phone number entry upload.
     *
     * @var value-of<ErrorCode>|null $errorCode
     */
    #[Optional('error_code', enum: ErrorCode::class)]
    public ?string $errorCode;

    /**
     * A message returned by Microsoft Teams if there is an error with the upload process.
     */
    #[Optional('error_message')]
    public ?string $errorMessage;

    /**
     * Represents the status of the phone number entry upload on Telnyx.
     *
     * @var value-of<InternalStatus>|null $internalStatus
     */
    #[Optional('internal_status', enum: InternalStatus::class)]
    public ?string $internalStatus;

    /**
     * Identifies the location assigned to the phone number entry.
     */
    #[Optional('location_id')]
    public ?string $locationID;

    /**
     * Uniquely identifies the resource.
     */
    #[Optional('number_id')]
    public ?string $numberID;

    /**
     * Phone number in E164 format.
     */
    #[Optional('phone_number')]
    public ?string $phoneNumber;

    /**
     * Represents the status of the phone number entry upload on Microsoft Teams.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
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
     * @param ErrorCode|value-of<ErrorCode> $errorCode
     * @param InternalStatus|value-of<InternalStatus> $internalStatus
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $civicAddressID = null,
        ErrorCode|string|null $errorCode = null,
        ?string $errorMessage = null,
        InternalStatus|string|null $internalStatus = null,
        ?string $locationID = null,
        ?string $numberID = null,
        ?string $phoneNumber = null,
        Status|string|null $status = null,
    ): self {
        $obj = new self;

        null !== $civicAddressID && $obj['civicAddressID'] = $civicAddressID;
        null !== $errorCode && $obj['errorCode'] = $errorCode;
        null !== $errorMessage && $obj['errorMessage'] = $errorMessage;
        null !== $internalStatus && $obj['internalStatus'] = $internalStatus;
        null !== $locationID && $obj['locationID'] = $locationID;
        null !== $numberID && $obj['numberID'] = $numberID;
        null !== $phoneNumber && $obj['phoneNumber'] = $phoneNumber;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    /**
     * Identifies the civic address assigned to the phone number entry.
     */
    public function withCivicAddressID(string $civicAddressID): self
    {
        $obj = clone $this;
        $obj['civicAddressID'] = $civicAddressID;

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
        $obj['errorCode'] = $errorCode;

        return $obj;
    }

    /**
     * A message returned by Microsoft Teams if there is an error with the upload process.
     */
    public function withErrorMessage(string $errorMessage): self
    {
        $obj = clone $this;
        $obj['errorMessage'] = $errorMessage;

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
        $obj['internalStatus'] = $internalStatus;

        return $obj;
    }

    /**
     * Identifies the location assigned to the phone number entry.
     */
    public function withLocationID(string $locationID): self
    {
        $obj = clone $this;
        $obj['locationID'] = $locationID;

        return $obj;
    }

    /**
     * Uniquely identifies the resource.
     */
    public function withNumberID(string $numberID): self
    {
        $obj = clone $this;
        $obj['numberID'] = $numberID;

        return $obj;
    }

    /**
     * Phone number in E164 format.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phoneNumber'] = $phoneNumber;

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
