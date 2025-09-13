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
 * @phpstan-type filter_alias = array{
 *   id?: string,
 *   connectionName?: ConnectionName,
 *   createdAt?: string,
 *   externalSipConnection?: value-of<ExternalSipConnection>,
 *   phoneNumber?: PhoneNumber,
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * If present, connections with <code>id</code> matching the given value will be returned.
     */
    #[Api(optional: true)]
    public ?string $id;

    #[Api('connection_name', optional: true)]
    public ?ConnectionName $connectionName;

    /**
     * If present, connections with <code>created_at</code> date matching the given YYYY-MM-DD date will be returned.
     */
    #[Api('created_at', optional: true)]
    public ?string $createdAt;

    /**
     * If present, connections with <code>external_sip_connection</code> matching the given value will be returned.
     *
     * @var value-of<ExternalSipConnection>|null $externalSipConnection
     */
    #[Api(
        'external_sip_connection',
        enum: ExternalSipConnection::class,
        optional: true,
    )]
    public ?string $externalSipConnection;

    /**
     * Phone number filter for connections. Note: Despite the 'contains' name, this requires a full E164 match per the original specification.
     */
    #[Api('phone_number', optional: true)]
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
     * @param ExternalSipConnection|value-of<ExternalSipConnection> $externalSipConnection
     */
    public static function with(
        ?string $id = null,
        ?ConnectionName $connectionName = null,
        ?string $createdAt = null,
        ExternalSipConnection|string|null $externalSipConnection = null,
        ?PhoneNumber $phoneNumber = null,
    ): self {
        $obj = new self;

        null !== $id && $obj->id = $id;
        null !== $connectionName && $obj->connectionName = $connectionName;
        null !== $createdAt && $obj->createdAt = $createdAt;
        null !== $externalSipConnection && $obj->externalSipConnection = $externalSipConnection instanceof ExternalSipConnection ? $externalSipConnection->value : $externalSipConnection;
        null !== $phoneNumber && $obj->phoneNumber = $phoneNumber;

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
        $obj->connectionName = $connectionName;

        return $obj;
    }

    /**
     * If present, connections with <code>created_at</code> date matching the given YYYY-MM-DD date will be returned.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj->createdAt = $createdAt;

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
        $obj->externalSipConnection = $externalSipConnection instanceof ExternalSipConnection ? $externalSipConnection->value : $externalSipConnection;

        return $obj;
    }

    /**
     * Phone number filter for connections. Note: Despite the 'contains' name, this requires a full E164 match per the original specification.
     */
    public function withPhoneNumber(PhoneNumber $phoneNumber): self
    {
        $obj = clone $this;
        $obj->phoneNumber = $phoneNumber;

        return $obj;
    }
}
