<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Releases\ReleaseListResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\Releases\ReleaseListResponse\Data\Status;
use Telnyx\ExternalConnections\Releases\ReleaseListResponse\Data\TelephoneNumber;

/**
 * @phpstan-type DataShape = array{
 *   createdAt?: string|null,
 *   errorMessage?: string|null,
 *   status?: value-of<Status>|null,
 *   telephoneNumbers?: list<TelephoneNumber>|null,
 *   tenantID?: string|null,
 *   ticketID?: string|null,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Optional('created_at')]
    public ?string $createdAt;

    /**
     * A message set if there is an error with the upload process.
     */
    #[Optional('error_message')]
    public ?string $errorMessage;

    /**
     * Represents the status of the release on Microsoft Teams.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
    public ?string $status;

    /** @var list<TelephoneNumber>|null $telephoneNumbers */
    #[Optional('telephone_numbers', list: TelephoneNumber::class)]
    public ?array $telephoneNumbers;

    #[Optional('tenant_id')]
    public ?string $tenantID;

    /**
     * Uniquely identifies the resource.
     */
    #[Optional('ticket_id')]
    public ?string $ticketID;

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
     *   numberID?: string|null, phoneNumber?: string|null
     * }> $telephoneNumbers
     */
    public static function with(
        ?string $createdAt = null,
        ?string $errorMessage = null,
        Status|string|null $status = null,
        ?array $telephoneNumbers = null,
        ?string $tenantID = null,
        ?string $ticketID = null,
    ): self {
        $obj = new self;

        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $errorMessage && $obj['errorMessage'] = $errorMessage;
        null !== $status && $obj['status'] = $status;
        null !== $telephoneNumbers && $obj['telephoneNumbers'] = $telephoneNumbers;
        null !== $tenantID && $obj['tenantID'] = $tenantID;
        null !== $ticketID && $obj['ticketID'] = $ticketID;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

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
     *   numberID?: string|null, phoneNumber?: string|null
     * }> $telephoneNumbers
     */
    public function withTelephoneNumbers(array $telephoneNumbers): self
    {
        $obj = clone $this;
        $obj['telephoneNumbers'] = $telephoneNumbers;

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
}
