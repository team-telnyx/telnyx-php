<?php

declare(strict_types=1);

namespace Telnyx\ExternalConnections\ExternalConnectionListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\ExternalConnections\ExternalConnectionListParams\Filter\ConnectionName;
use Telnyx\ExternalConnections\ExternalConnectionListParams\Filter\ExternalSipConnection;
use Telnyx\ExternalConnections\ExternalConnectionListParams\Filter\PhoneNumber;

/**
 * Filter parameter for external connections (deepObject style). Supports filtering by connection_name, external_sip_connection, id, created_at, and phone_number.
 *
 * @phpstan-type FilterShape = array{
 *   id?: string|null,
 *   connection_name?: ConnectionName|null,
 *   created_at?: string|null,
 *   external_sip_connection?: value-of<ExternalSipConnection>|null,
 *   phone_number?: PhoneNumber|null,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * If present, connections with <code>id</code> matching the given value will be returned.
     */
    #[Api(optional: true)]
    public ?string $id;

    #[Api(optional: true)]
    public ?ConnectionName $connection_name;

    /**
     * If present, connections with <code>created_at</code> date matching the given YYYY-MM-DD date will be returned.
     */
    #[Api(optional: true)]
    public ?string $created_at;

    /**
     * If present, connections with <code>external_sip_connection</code> matching the given value will be returned.
     *
     * @var value-of<ExternalSipConnection>|null $external_sip_connection
     */
    #[Api(enum: ExternalSipConnection::class, optional: true)]
    public ?string $external_sip_connection;

    /**
     * Phone number filter for connections. Note: Despite the 'contains' name, this requires a full E164 match per the original specification.
     */
    #[Api(optional: true)]
    public ?PhoneNumber $phone_number;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ExternalSipConnection|value-of<ExternalSipConnection> $external_sip_connection
     */
    public static function with(
        ?string $id = null,
        ?ConnectionName $connection_name = null,
        ?string $created_at = null,
        ExternalSipConnection|string|null $external_sip_connection = null,
        ?PhoneNumber $phone_number = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $connection_name && $obj->connection_name = $connection_name;
        null !== $created_at && $obj->created_at = $created_at;
        null !== $external_sip_connection && $obj['external_sip_connection'] = $external_sip_connection;
        null !== $phone_number && $obj->phone_number = $phone_number;

        return $obj;
    }

    /**
     * If present, connections with <code>id</code> matching the given value will be returned.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj->id = $id;

        return $obj;
    }

    public function withConnectionName(ConnectionName $connectionName): self
    {
        $obj = clone $this;
        $obj->connection_name = $connectionName;

        return $obj;
    }

    /**
     * If present, connections with <code>created_at</code> date matching the given YYYY-MM-DD date will be returned.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->created_at = $createdAt;

        return $obj;
    }

    /**
     * If present, connections with <code>external_sip_connection</code> matching the given value will be returned.
     *
     * @param ExternalSipConnection|value-of<ExternalSipConnection> $externalSipConnection
     */
    public function withExternalSipConnection(
        ExternalSipConnection|string $externalSipConnection
    ): self {
        $obj = clone $this;
        $obj['external_sip_connection'] = $externalSipConnection;

        return $obj;
    }

    /**
     * Phone number filter for connections. Note: Despite the 'contains' name, this requires a full E164 match per the original specification.
     */
    public function withPhoneNumber(PhoneNumber $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phone_number = $phoneNumber;

        return $obj;
    }
}
