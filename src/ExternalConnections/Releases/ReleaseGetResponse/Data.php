<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Releases\ReleaseGetResponse;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\Releases\ReleaseGetResponse\Data\Status;
use Telnyx\ExternalConnections\Releases\ReleaseGetResponse\Data\TelephoneNumber;

/**
 * @phpstan-type data_alias = array{
 *   createdAt?: string,
 *   errorMessage?: string,
 *   status?: value-of<Status>,
 *   telephoneNumbers?: list<TelephoneNumber>,
 *   tenantID?: string,
 *   ticketID?: string,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<data_alias> */
    use SdkModel;

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    #[Api('created_at', optional: true)]
    public ?string $createdAt;

    /**
     * A message set if there is an error with the upload process.
     */
    #[Api('error_message', optional: true)]
    public ?string $errorMessage;

    /**
     * Represents the status of the release on Microsoft Teams.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    /** @var list<TelephoneNumber>|null $telephoneNumbers */
    #[Api('telephone_numbers', list: TelephoneNumber::class, optional: true)]
    public ?array $telephoneNumbers;

    #[Api('tenant_id', optional: true)]
    public ?string $tenantID;

    /**
     * Uniquely identifies the resource.
     */
    #[Api('ticket_id', optional: true)]
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
     * @param list<TelephoneNumber> $telephoneNumbers
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

        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $errorMessage && $obj->errorMessage = $errorMessage;
        null !== $status && $obj->status = $status instanceof Status ? $status->value : $status;
        null !== $telephoneNumbers && $obj->telephoneNumbers = $telephoneNumbers;
        null !== $tenantID && $obj->tenantID = $tenantID;
        null !== $ticketID && $obj->ticketID = $ticketID;

        return $obj;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

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

    /**
     * Represents the status of the release on Microsoft Teams.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj->status = $status instanceof Status ? $status->value : $status;

        return $obj;
    }

    /**
     * @param list<TelephoneNumber> $telephoneNumbers
     */
    public function withTelephoneNumbers(array $telephoneNumbers): self
    {
        $obj = clone $this;
        $obj->telephoneNumbers = $telephoneNumbers;

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
}
