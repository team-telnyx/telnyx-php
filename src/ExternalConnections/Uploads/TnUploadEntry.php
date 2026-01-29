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
 *   errorCode?: null|ErrorCode|value-of<ErrorCode>,
 *   errorMessage?: string|null,
 *   internalStatus?: null|InternalStatus|value-of<InternalStatus>,
 *   locationID?: string|null,
 *   numberID?: string|null,
 *   phoneNumber?: string|null,
 *   status?: null|Status|value-of<Status>,
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
     * @param ErrorCode|value-of<ErrorCode>|null $errorCode
     * @param InternalStatus|value-of<InternalStatus>|null $internalStatus
     * @param Status|value-of<Status>|null $status
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
        $self = new self;

        null !== $civicAddressID && $self['civicAddressID'] = $civicAddressID;
        null !== $errorCode && $self['errorCode'] = $errorCode;
        null !== $errorMessage && $self['errorMessage'] = $errorMessage;
        null !== $internalStatus && $self['internalStatus'] = $internalStatus;
        null !== $locationID && $self['locationID'] = $locationID;
        null !== $numberID && $self['numberID'] = $numberID;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    /**
     * Identifies the civic address assigned to the phone number entry.
     */
    public function withCivicAddressID(string $civicAddressID): self
    {
        $self = clone $this;
        $self['civicAddressID'] = $civicAddressID;

        return $self;
    }

    /**
     * A code returned by Microsoft Teams if there is an error with the phone number entry upload.
     *
     * @param ErrorCode|value-of<ErrorCode> $errorCode
     */
    public function withErrorCode(ErrorCode|string $errorCode): self
    {
        $self = clone $this;
        $self['errorCode'] = $errorCode;

        return $self;
    }

    /**
     * A message returned by Microsoft Teams if there is an error with the upload process.
     */
    public function withErrorMessage(string $errorMessage): self
    {
        $self = clone $this;
        $self['errorMessage'] = $errorMessage;

        return $self;
    }

    /**
     * Represents the status of the phone number entry upload on Telnyx.
     *
     * @param InternalStatus|value-of<InternalStatus> $internalStatus
     */
    public function withInternalStatus(
        InternalStatus|string $internalStatus
    ): self {
        $self = clone $this;
        $self['internalStatus'] = $internalStatus;

        return $self;
    }

    /**
     * Identifies the location assigned to the phone number entry.
     */
    public function withLocationID(string $locationID): self
    {
        $self = clone $this;
        $self['locationID'] = $locationID;

        return $self;
    }

    /**
     * Uniquely identifies the resource.
     */
    public function withNumberID(string $numberID): self
    {
        $self = clone $this;
        $self['numberID'] = $numberID;

        return $self;
    }

    /**
     * Phone number in E164 format.
     */
    public function withPhoneNumber(string $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * Represents the status of the phone number entry upload on Microsoft Teams.
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
