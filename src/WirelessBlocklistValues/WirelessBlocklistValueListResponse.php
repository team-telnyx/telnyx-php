<?php

declare(strict_types=1);

namespace Telnyx\WirelessBlocklistValues;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListResponse\Data;
use Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListResponse\Data\Country;
use Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListResponse\Data\Mcc;
use Telnyx\WirelessBlocklistValues\WirelessBlocklistValueListResponse\Data\Plmn;

/**
 * @phpstan-type WirelessBlocklistValueListResponseShape = array{
 *   data?: null|list<Country>|list<Mcc>|list<Plmn>, meta?: PaginationMeta|null
 * }
 */
final class WirelessBlocklistValueListResponse implements BaseModel
{
    /** @use SdkModel<WirelessBlocklistValueListResponseShape> */
    use SdkModel;

    /** @var list<Country>|list<Mcc>|list<Plmn>|null $data */
    #[Optional(union: Data::class)]
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
     * @param list<Country|array{code: string, name: string}>|list<Mcc|array{
     *   code: string, name: string
     * }>|list<Plmn|array{code: string, name: string}> $data
     * @param PaginationMeta|array{
     *   pageNumber: int, totalPages: int, pageSize?: int|null, totalResults?: int|null
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
     * @param list<Country|array{code: string, name: string}>|list<Mcc|array{
     *   code: string, name: string
     * }>|list<Plmn|array{code: string, name: string}> $data
     */
    public function withData(array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }

    /**
     * @param PaginationMeta|array{
     *   pageNumber: int, totalPages: int, pageSize?: int|null, totalResults?: int|null
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $self = clone $this;
        $self['meta'] = $meta;

        return $self;
    }
}
