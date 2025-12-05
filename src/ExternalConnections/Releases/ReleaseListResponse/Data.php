<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Releases\ReleaseListResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\Releases\ReleaseListResponse\Data\Status;
use Telnyx\ExternalConnections\Releases\ReleaseListResponse\Data\TelephoneNumber;

/**
 * @phpstan-type DataShape = array{
 *   created_at?: string|null,
 *   error_message?: string|null,
 *   status?: value-of<Status>|null,
 *   telephone_numbers?: list<TelephoneNumber>|null,
 *   tenant_id?: string|null,
 *   ticket_id?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api(optional: true)]
    public ?string $created_at;

    /**
     * A message set if there is an error with the upload process.
     */
    #[Api(optional: true)]
    public ?string $error_message;

    /**
     * Represents the status of the release on Microsoft Teams.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /** @var list<TelephoneNumber>|null $telephone_numbers */
    #[Api(list: TelephoneNumber::class, optional: true)]
    public ?array $telephone_numbers;

    #[Api(optional: true)]
    public ?string $tenant_id;

    /**
     * Uniquely identifies the resource.
     */
    #[Api(optional: true)]
    public ?string $ticket_id;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status> $status
     * @param list<TelephoneNumber|array{
     *   number_id?: string|null, phone_number?: string|null
     * }> $telephone_numbers
     */
    public static function with(
        ?string $created_at = null,
        ?string $error_message = null,
        Status|string|null $status = null,
        ?array $telephone_numbers = null,
        ?string $tenant_id = null,
        ?string $ticket_id = null,
    ): self {
        $obj = new self;

        null !== $created_at && $obj['created_at'] = $created_at;
        null !== $error_message && $obj['error_message'] = $error_message;
        null !== $status && $obj['status'] = $status;
        null !== $telephone_numbers && $obj['telephone_numbers'] = $telephone_numbers;
        null !== $tenant_id && $obj['tenant_id'] = $tenant_id;
        null !== $ticket_id && $obj['ticket_id'] = $ticket_id;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['created_at'] = $createdAt;

        return $obj;
    }

    /**
     * A message set if there is an error with the upload process.
     */
    public function withErrorMessage(string $errorMessage): self
    {
        $obj = clone $this;
        $obj['error_message'] = $errorMessage;

        return $obj;
    }

    /**
     * Represents the status of the release on Microsoft Teams.
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
     * @param list<TelephoneNumber|array{
     *   number_id?: string|null, phone_number?: string|null
     * }> $telephoneNumbers
     */
    public function withTelephoneNumbers(array $telephoneNumbers): self
    {
        $obj = clone $this;
        $obj['telephone_numbers'] = $telephoneNumbers;

        return $obj;
    }

    public function withTenantID(string $tenantID): self
    {
        $obj = clone $this;
        $obj['tenant_id'] = $tenantID;

        return $obj;
    }

    /**
     * Uniquely identifies the resource.
     */
    public function withTicketID(string $ticketID): self
    {
        $obj = clone $this;
        $obj['ticket_id'] = $ticketID;

        return $obj;
    }
}
