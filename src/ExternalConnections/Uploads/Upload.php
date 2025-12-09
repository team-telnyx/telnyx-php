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
        $obj = new self;

        null !== $availableUsages && $obj['availableUsages'] = $availableUsages;
        null !== $errorCode && $obj['errorCode'] = $errorCode;
        null !== $errorMessage && $obj['errorMessage'] = $errorMessage;
        null !== $locationID && $obj['locationID'] = $locationID;
        null !== $status && $obj['status'] = $status;
        null !== $tenantID && $obj['tenantID'] = $tenantID;
        null !== $ticketID && $obj['ticketID'] = $ticketID;
        null !== $tnUploadEntries && $obj['tnUploadEntries'] = $tnUploadEntries;

        return $obj;
    }

    /**
     * @param list<AvailableUsage|value-of<AvailableUsage>> $availableUsages
     */
    public function withAvailableUsages(array $availableUsages): self
    {
        $obj = clone $this;
        $obj['availableUsages'] = $availableUsages;

        return $obj;
    }

    /**
     * A code returned by Microsoft Teams if there is an error with the upload process.
     */
    public function withErrorCode(string $errorCode): self
    {
        $obj = clone $this;
        $obj['errorCode'] = $errorCode;

        return $obj;
    }

    /**
     * A message set if there is an error with the upload process.
     */
    public function withErrorMessage(string $errorMessage): self
    {
        $obj = clone $this;
        $obj['errorMessage'] = $errorMessage;

        return $obj;
    }

    public function withLocationID(string $locationID): self
    {
        $obj = clone $this;
        $obj['locationID'] = $locationID;

        return $obj;
    }

    /**
     * Represents the status of the upload on Microsoft Teams.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }

    public function withTenantID(string $tenantID): self
    {
        $obj = clone $this;
        $obj['tenantID'] = $tenantID;

        return $obj;
    }

    /**
     * Uniquely identifies the resource.
     */
    public function withTicketID(string $ticketID): self
    {
        $obj = clone $this;
        $obj['ticketID'] = $ticketID;

        return $obj;
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
        $obj = clone $this;
        $obj['tnUploadEntries'] = $tnUploadEntries;

        return $obj;
    }
}
