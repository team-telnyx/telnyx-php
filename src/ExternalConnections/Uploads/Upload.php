<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Uploads;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\ExternalConnections\Uploads\Upload\AvailableUsage;
use Telnyx\ExternalConnections\Uploads\Upload\Status;

/**
 * @phpstan-type UploadShape = array{
 *   available_usages?: list<value-of<AvailableUsage>>|null,
 *   error_code?: string|null,
 *   error_message?: string|null,
 *   location_id?: string|null,
 *   status?: value-of<Status>|null,
 *   tenant_id?: string|null,
 *   ticket_id?: string|null,
 *   tn_upload_entries?: list<TnUploadEntry>|null,
 * }
 */
final class Upload implements BaseModel, ResponseConverter
{
    /** @use SdkModel<UploadShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<value-of<AvailableUsage>>|null $available_usages */
    #[Api(list: AvailableUsage::class, optional: true)]
    public ?array $available_usages;

    /**
     * A code returned by Microsoft Teams if there is an error with the upload process.
     */
    #[Api(optional: true)]
    public ?string $error_code;

    /**
     * A message set if there is an error with the upload process.
     */
    #[Api(optional: true)]
    public ?string $error_message;

    #[Api(optional: true)]
    public ?string $location_id;

    /**
     * Represents the status of the upload on Microsoft Teams.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    #[Api(optional: true)]
    public ?string $tenant_id;

    /**
     * Uniquely identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $ticket_id;

    /** @var list<TnUploadEntry>|null $tn_upload_entries */
    #[Api(list: TnUploadEntry::class, optional: true)]
    public ?array $tn_upload_entries;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<AvailableUsage|value-of<AvailableUsage>> $available_usages
     * @param Status|value-of<Status> $status
     * @param list<TnUploadEntry> $tn_upload_entries
     */
    public static function with(
        ?array $available_usages = null,
        ?string $error_code = null,
        ?string $error_message = null,
        ?string $location_id = null,
        Status|string|null $status = null,
        ?string $tenant_id = null,
        ?string $ticket_id = null,
        ?array $tn_upload_entries = null,
    ): self {
        $obj = new self;

        null !== $available_usages && $obj['available_usages'] = $available_usages;
        null !== $error_code && $obj->error_code = $error_code;
        null !== $error_message && $obj->error_message = $error_message;
        null !== $location_id && $obj->location_id = $location_id;
        null !== $status && $obj['status'] = $status;
        null !== $tenant_id && $obj->tenant_id = $tenant_id;
        null !== $ticket_id && $obj->ticket_id = $ticket_id;
        null !== $tn_upload_entries && $obj->tn_upload_entries = $tn_upload_entries;

        return $obj;
    }

    /**
     * @param list<AvailableUsage|value-of<AvailableUsage>> $availableUsages
     */
    public function withAvailableUsages(array $availableUsages): self
    {
        $obj = clone $this;
        $obj['available_usages'] = $availableUsages;

        return $obj;
    }

    /**
     * A code returned by Microsoft Teams if there is an error with the upload process.
     */
    public function withErrorCode(string $errorCode): self
    {
        $obj = clone $this;
        $obj->error_code = $errorCode;

        return $obj;
    }

    /**
     * A message set if there is an error with the upload process.
     */
    public function withErrorMessage(string $errorMessage): self
    {
        $obj = clone $this;
        $obj->error_message = $errorMessage;

        return $obj;
    }

    public function withLocationID(string $locationID): self
    {
        $obj = clone $this;
        $obj->location_id = $locationID;

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
        $obj->tenant_id = $tenantID;

        return $obj;
    }

    /**
     * Uniquely identifies the resource.
     */
    public function withTicketID(string $ticketID): self
    {
        $obj = clone $this;
        $obj->ticket_id = $ticketID;

        return $obj;
    }

    /**
     * @param list<TnUploadEntry> $tnUploadEntries
     */
    public function withTnUploadEntries(array $tnUploadEntries): self
    {
        $obj = clone $this;
        $obj->tn_upload_entries = $tnUploadEntries;

        return $obj;
    }
}
