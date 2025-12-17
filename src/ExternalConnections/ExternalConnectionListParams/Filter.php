<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\ExternalConnectionListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\ExternalConnectionListParams\Filter\ConnectionName;
use Telnyx\ExternalConnections\ExternalConnectionListParams\Filter\ExternalSipConnection;
use Telnyx\ExternalConnections\ExternalConnectionListParams\Filter\PhoneNumber;

/**
 * Filter parameter for external connections (deepObject style). Supports filtering by connection_name, external_sip_connection, id, created_at, and phone_number.
 *
 * @phpstan-import-type ConnectionNameShape from \Telnyx\ExternalConnections\ExternalConnectionListParams\Filter\ConnectionName
 * @phpstan-import-type PhoneNumberShape from \Telnyx\ExternalConnections\ExternalConnectionListParams\Filter\PhoneNumber
 *
 * @phpstan-type FilterShape = array{
 *   id?: string|null,
 *   connectionName?: null|ConnectionName|ConnectionNameShape,
 *   createdAt?: string|null,
 *   externalSipConnection?: null|ExternalSipConnection|value-of<ExternalSipConnection>,
 *   phoneNumber?: null|PhoneNumber|PhoneNumberShape,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * If present, connections with <code>id</code> matching the given value will be returned.
     */
    #[Optional]
    public ?string $id;

    #[Optional('connection_name')]
    public ?ConnectionName $connectionName;

    /**
     * If present, connections with <code>created_at</code> date matching the given YYYY-MM-DD date will be returned.
     */
    #[Optional('created_at')]
    public ?string $createdAt;

    /**
     * If present, connections with <code>external_sip_connection</code> matching the given value will be returned.
     *
     * @var value-of<ExternalSipConnection>|null $externalSipConnection
     */
    #[Optional('external_sip_connection', enum: ExternalSipConnection::class)]
    public ?string $externalSipConnection;

    /**
     * Phone number filter for connections. Note: Despite the 'contains' name, this requires a full E164 match per the original specification.
     */
    #[Optional('phone_number')]
    public ?PhoneNumber $phoneNumber;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ConnectionName|ConnectionNameShape|null $connectionName
     * @param ExternalSipConnection|value-of<ExternalSipConnection>|null $externalSipConnection
     * @param PhoneNumber|PhoneNumberShape|null $phoneNumber
     */
    public static function with(
        ?string $id = null,
        ConnectionName|array|null $connectionName = null,
        ?string $createdAt = null,
        ExternalSipConnection|string|null $externalSipConnection = null,
        PhoneNumber|array|null $phoneNumber = null,
    ): self {
        $self = new self;

        null !== $id && $self['id'] = $id;
        null !== $connectionName && $self['connectionName'] = $connectionName;
        null !== $createdAt && $self['createdAt'] = $createdAt;
        null !== $externalSipConnection && $self['externalSipConnection'] = $externalSipConnection;
        null !== $phoneNumber && $self['phoneNumber'] = $phoneNumber;

        return $self;
    }

    /**
     * If present, connections with <code>id</code> matching the given value will be returned.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * @param ConnectionName|ConnectionNameShape $connectionName
     */
    public function withConnectionName(
        ConnectionName|array $connectionName
    ): self {
        $self = clone $this;
        $self['connectionName'] = $connectionName;

        return $self;
    }

    /**
     * If present, connections with <code>created_at</code> date matching the given YYYY-MM-DD date will be returned.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    /**
     * If present, connections with <code>external_sip_connection</code> matching the given value will be returned.
     *
     * @param ExternalSipConnection|value-of<ExternalSipConnection> $externalSipConnection
     */
    public function withExternalSipConnection(
        ExternalSipConnection|string $externalSipConnection
    ): self {
        $self = clone $this;
        $self['externalSipConnection'] = $externalSipConnection;

        return $self;
    }

    /**
     * Phone number filter for connections. Note: Despite the 'contains' name, this requires a full E164 match per the original specification.
     *
     * @param PhoneNumber|PhoneNumberShape $phoneNumber
     */
    public function withPhoneNumber(PhoneNumber|array $phoneNumber): self
    {
        $self = clone $this;
        $self['phoneNumber'] = $phoneNumber;

        return $self;
    }
}
