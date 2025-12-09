<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Uploads;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\Uploads\TnUploadEntry\ErrorCode;
use Telnyx\ExternalConnections\Uploads\TnUploadEntry\InternalStatus;
use Telnyx\ExternalConnections\Uploads\Upload\AvailableUsage;
use Telnyx\ExternalConnections\Uploads\Upload\Status;

/**
 * @phpstan-type UploadShape = array{
 *   availableUsages?: list<value-of<AvailableUsage>>|null,
 *   errorCode?: string|null,
 *   errorMessage?: string|null,
 *   locationID?: string|null,
 *   status?: value-of<Status>|null,
 *   tenantID?: string|null,
 *   ticketID?: string|null,
 *   tnUploadEntries?: list<TnUploadEntry>|null,
 * }
 */
final class Upload implements BaseModel
{
    /** @use SdkModel<UploadShape> */
    use SdkModel;

    /** @var list<value-of<AvailableUsage>>|null $availableUsages */
    #[Optional('available_usages', list: AvailableUsage::class)]
    public ?array $availableUsages;

    /**
     * A code returned by Microsoft Teams if there is an error with the upload process.
     */
    #[Optional('error_code')]
    public ?string $errorCode;

    /**
     * A message set if there is an error with the upload process.
     */
    #[Optional('error_message')]
    public ?string $errorMessage;

    #[Optional('location_id')]
    public ?string $locationID;

    /**
     * Represents the status of the upload on Microsoft Teams.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    #[Optional('tenant_id')]
    public ?string $tenantID;

    /**
     * Uniquely identifies the resource.
     */
    #[Optional('ticket_id')]
    public ?string $ticketID;

    /** @var list<TnUploadEntry>|null $tnUploadEntries */
    #[Optional('tn_upload_entries', list: TnUploadEntry::class)]
    public ?array $tnUploadEntries;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<AvailableUsage|value-of<AvailableUsage>> $availableUsages
     * @param Status|value-of<Status> $status
     * @param list<TnUploadEntry|array{
     *   civicAddressID?: string|null,
     *   errorCode?: value-of<ErrorCode>|null,
     *   errorMessage?: string|null,
     *   internalStatus?: value-of<InternalStatus>|null,
     *   locationID?: string|null,
     *   numberID?: string|null,
     *   phoneNumber?: string|null,
     *   status?: value-of<TnUploadEntry\Status>|null,
     * }> $tnUploadEntries
     */
    public static function with(
        ?array $availableUsages = null,
        ?string $errorCode = null,
        ?string $errorMessage = null,
        ?string $locationID = null,
        Status|string|null $status = null,
        ?string $tenantID = null,
        ?string $ticketID = null,
        ?array $tnUploadEntries = null,
    ): self {
        $self = new self;

        null !== $availableUsages && $self['availableUsages'] = $availableUsages;
        null !== $errorCode && $self['errorCode'] = $errorCode;
        null !== $errorMessage && $self['errorMessage'] = $errorMessage;
        null !== $locationID && $self['locationID'] = $locationID;
        null !== $status && $self['status'] = $status;
        null !== $tenantID && $self['tenantID'] = $tenantID;
        null !== $ticketID && $self['ticketID'] = $ticketID;
        null !== $tnUploadEntries && $self['tnUploadEntries'] = $tnUploadEntries;

        return $self;
    }

    /**
     * @param list<AvailableUsage|value-of<AvailableUsage>> $availableUsages
     */
    public function withAvailableUsages(array $availableUsages): self
    {
        $self = clone $this;
        $self['availableUsages'] = $availableUsages;

        return $self;
    }

    /**
     * A code returned by Microsoft Teams if there is an error with the upload process.
     */
    public function withErrorCode(string $errorCode): self
    {
        $self = clone $this;
        $self['errorCode'] = $errorCode;

        return $self;
    }

    /**
     * A message set if there is an error with the upload process.
     */
    public function withErrorMessage(string $errorMessage): self
    {
        $self = clone $this;
        $self['errorMessage'] = $errorMessage;

        return $self;
    }

    public function withLocationID(string $locationID): self
    {
        $self = clone $this;
        $self['locationID'] = $locationID;

        return $self;
    }

    /**
     * Represents the status of the upload on Microsoft Teams.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    public function withTenantID(string $tenantID): self
    {
        $self = clone $this;
        $self['tenantID'] = $tenantID;

        return $self;
    }

    /**
     * Uniquely identifies the resource.
     */
    public function withTicketID(string $ticketID): self
    {
        $self = clone $this;
        $self['ticketID'] = $ticketID;

        return $self;
    }

    /**
     * @param list<TnUploadEntry|array{
     *   civicAddressID?: string|null,
     *   errorCode?: value-of<ErrorCode>|null,
     *   errorMessage?: string|null,
     *   internalStatus?: value-of<InternalStatus>|null,
     *   locationID?: string|null,
     *   numberID?: string|null,
     *   phoneNumber?: string|null,
     *   status?: value-of<TnUploadEntry\Status>|null,
     * }> $tnUploadEntries
     */
    public function withTnUploadEntries(array $tnUploadEntries): self
    {
        $self = clone $this;
        $self['tnUploadEntries'] = $tnUploadEntries;

        return $self;
    }
}
