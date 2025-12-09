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
 * @phpstan-type FilterShape = array{
 *   id?: string|null,
 *   connectionName?: ConnectionName|null,
 *   createdAt?: string|null,
 *   externalSipConnection?: value-of<ExternalSipConnection>|null,
 *   phoneNumber?: PhoneNumber|null,
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
     * @param ConnectionName|array{contains?: string|null} $connectionName
     * @param ExternalSipConnection|value-of<ExternalSipConnection> $externalSipConnection
     * @param PhoneNumber|array{contains?: string|null} $phoneNumber
     */
    public static function with(
        ?string $id = null,
        ConnectionName|array|null $connectionName = null,
        ?string $createdAt = null,
        ExternalSipConnection|string|null $externalSipConnection = null,
        PhoneNumber|array|null $phoneNumber = null,
    ): self {
        $obj = new self;

        null !== $id && $obj['id'] = $id;
        null !== $connectionName && $obj['connectionName'] = $connectionName;
        null !== $createdAt && $obj['createdAt'] = $createdAt;
        null !== $externalSipConnection && $obj['externalSipConnection'] = $externalSipConnection;
        null !== $phoneNumber && $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }

    /**
     * If present, connections with <code>id</code> matching the given value will be returned.
     */
    public function withID(string $id): self
    {
        $obj = clone $this;
        $obj['id'] = $id;

        return $obj;
    }

    /**
     * @param ConnectionName|array{contains?: string|null} $connectionName
     */
    public function withConnectionName(
        ConnectionName|array $connectionName
    ): self {
        $obj = clone $this;
        $obj['connectionName'] = $connectionName;

        return $obj;
    }

    /**
     * If present, connections with <code>created_at</code> date matching the given YYYY-MM-DD date will be returned.
     */
    public function withCreatedAt(string $createdAt): self
    {
        $obj = clone $this;
        $obj['createdAt'] = $createdAt;

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
        $obj['externalSipConnection'] = $externalSipConnection;

        return $obj;
    }

    /**
     * Phone number filter for connections. Note: Despite the 'contains' name, this requires a full E164 match per the original specification.
     *
     * @param PhoneNumber|array{contains?: string|null} $phoneNumber
     */
    public function withPhoneNumber(PhoneNumber|array $phoneNumber): self
    {
        $obj = clone $this;
        $obj['phoneNumber'] = $phoneNumber;

        return $obj;
    }
}
