<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Uploads;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\Uploads\Upload\AvailableUsage;
use Telnyx\ExternalConnections\Uploads\Upload\Status;

/**
 * @phpstan-type upload_alias = array{
 *   availableUsages?: list<value-of<AvailableUsage>>,
 *   errorCode?: string,
 *   errorMessage?: string,
 *   locationID?: string,
 *   status?: value-of<Status>,
 *   tenantID?: string,
 *   ticketID?: string,
 *   tnUploadEntries?: list<TnUploadEntry>,
 * }
 */
final class Upload implements BaseModel
{
    /** @use SdkModel<upload_alias> */
    use SdkModel;

    /** @var list<value-of<AvailableUsage>>|null $availableUsages */
    #[Api('available_usages', list: AvailableUsage::class, optional: true)]
    public ?array $availableUsages;

    /**
     * A code returned by Microsoft Teams if there is an error with the upload process.
     */
    #[Api('error_code', optional: true)]
    public ?string $errorCode;

    /**
     * A message set if there is an error with the upload process.
     */
    #[Api('error_message', optional: true)]
    public ?string $errorMessage;

    #[Api('location_id', optional: true)]
    public ?string $locationID;

    /**
     * Represents the status of the upload on Microsoft Teams.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    #[Api('tenant_id', optional: true)]
    public ?string $tenantID;

    /**
     * Uniquely identifies the resource.
     */
    #[Api('ticket_id', optional: true)]
    public ?string $ticketID;

    /** @var list<TnUploadEntry>|null $tnUploadEntries */
    #[Api('tn_upload_entries', list: TnUploadEntry::class, optional: true)]
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
     * @param list<TnUploadEntry> $tnUploadEntries
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

        null !== $availableUsages && $obj->availableUsages = array_map(fn ($v) => $v instanceof AvailableUsage ? $v->value : $v, $availableUsages);
        null !== $errorCode && $obj->errorCode = $errorCode;
        null !== $errorMessage && $obj->errorMessage = $errorMessage;
        null !== $locationID && $obj->locationID = $locationID;
        null !== $status && $obj->status = $status instanceof Status ? $status->value : $status;
        null !== $tenantID && $obj->tenantID = $tenantID;
        null !== $ticketID && $obj->ticketID = $ticketID;
        null !== $tnUploadEntries && $obj->tnUploadEntries = $tnUploadEntries;

        return $obj;
    }

    /**
     * @param list<AvailableUsage|value-of<AvailableUsage>> $availableUsages
     */
    public function withAvailableUsages(array $availableUsages): self
    {
        $obj = clone $this;
        $obj->availableUsages = array_map(fn ($v) => $v instanceof AvailableUsage ? $v->value : $v, $availableUsages);

        return $obj;
    }

    /**
     * A code returned by Microsoft Teams if there is an error with the upload process.
     */
    public function withErrorCode(string $errorCode): self
    {
        $obj = clone $this;
        $obj->errorCode = $errorCode;

        return $obj;
    }

    /**
     * A message set if there is an error with the upload process.
     */
    public function withErrorMessage(string $errorMessage): self
    {
        $obj = clone $this;
        $obj->errorMessage = $errorMessage;

        return $obj;
    }

    public function withLocationID(string $locationID): self
    {
        $obj = clone $this;
        $obj->locationID = $locationID;

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
        $obj->status = $status instanceof Status ? $status->value : $status;

        return $obj;
    }

    public function withTenantID(string $tenantID): self
    {
        $obj = clone $this;
        $obj->tenantID = $tenantID;

        return $obj;
    }

    /**
     * Uniquely identifies the resource.
     */
    public function withTicketID(string $ticketID): self
    {
        $obj = clone $this;
        $obj->ticketID = $ticketID;

        return $obj;
    }

    /**
     * @param list<TnUploadEntry> $tnUploadEntries
     */
    public function withTnUploadEntries(array $tnUploadEntries): self
    {
        $obj = clone $this;
        $obj->tnUploadEntries = $tnUploadEntries;

        return $obj;
    }
}
