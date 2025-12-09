<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\Releases\ReleaseGetResponse;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\Releases\ReleaseGetResponse\Data\Status;
use Telnyx\ExternalConnections\Releases\ReleaseGetResponse\Data\TelephoneNumber;

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
        $self = new self;

        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $errorMessage && $self['errorMessage'] = $errorMessage;
        null !== $status && $self['status'] = $status;
        null !== $telephoneNumbers && $self['telephoneNumbers'] = $telephoneNumbers;
        null !== $tenantID && $self['tenantID'] = $tenantID;
        null !== $ticketID && $self['ticketID'] = $ticketID;

        return $self;
    }

    /**
     * ISO 8601 formatted date indicating when the resource was created.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

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

    /**
     * Represents the status of the release on Microsoft Teams.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * @param list<TelephoneNumber|array{
     *   numberID?: string|null, phoneNumber?: string|null
     * }> $telephoneNumbers
     */
    public function withTelephoneNumbers(array $telephoneNumbers): self
    {
        $self = clone $this;
        $self['telephoneNumbers'] = $telephoneNumbers;

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
}
