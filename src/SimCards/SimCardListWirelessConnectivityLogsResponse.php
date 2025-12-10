<?php

declare(strict_types=1);

namespace Telnyx\SimCards;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCards\SimCardListWirelessConnectivityLogsResponse\Data;
use Telnyx\SimCards\SimCardListWirelessConnectivityLogsResponse\Data\LogType;

/**
 * @phpstan-type SimCardListWirelessConnectivityLogsResponseShape = array{
 *   data?: list<Data>|null, meta?: PaginationMeta|null
 * }
 */
final class SimCardListWirelessConnectivityLogsResponse implements BaseModel
{
    /** @use SdkModel<SimCardListWirelessConnectivityLogsResponseShape> */
    use SdkModel;

    /** @var list<Data>|null $data */
    #[Optional(list: Data::class)]
    public ?array $data;

    #[Optional]
    public ?PaginationMeta $meta;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<Data|array{
     *   id?: int|null,
     *   apn?: string|null,
     *   cellID?: string|null,
     *   createdAt?: string|null,
     *   imei?: string|null,
     *   imsi?: string|null,
     *   ipv4?: string|null,
     *   ipv6?: string|null,
     *   lastSeen?: string|null,
     *   logType?: value-of<LogType>|null,
     *   mobileCountryCode?: string|null,
     *   mobileNetworkCode?: string|null,
     *   radioAccessTechnology?: string|null,
     *   recordType?: string|null,
     *   simCardID?: string|null,
     *   startTime?: string|null,
     *   state?: string|null,
     *   stopTime?: string|null,
     * }> $data
     * @param PaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMeta|array|null $meta = null
    ): self {
        $self = new self;

        null !== $data && $self['data'] = $data;
        null !== $meta && $self['meta'] = $meta;

        return $self;
    }

    /**
     * @param list<Data|array{
     *   id?: int|null,
     *   apn?: string|null,
     *   cellID?: string|null,
     *   createdAt?: string|null,
     *   imei?: string|null,
     *   imsi?: string|null,
     *   ipv4?: string|null,
     *   ipv6?: string|null,
     *   lastSeen?: string|null,
     *   logType?: value-of<LogType>|null,
     *   mobileCountryCode?: string|null,
     *   mobileNetworkCode?: string|null,
     *   radioAccessTechnology?: string|null,
     *   recordType?: string|null,
     *   simCardID?: string|null,
     *   startTime?: string|null,
     *   state?: string|null,
     *   stopTime?: string|null,
     * }> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param PaginationMeta|array{
     *   pageNumber?: int|null,
     *   pageSize?: int|null,
     *   totalPages?: int|null,
     *   totalResults?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
