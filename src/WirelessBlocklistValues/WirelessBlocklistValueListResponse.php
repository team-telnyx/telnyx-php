<?php

declare(strict_types=1);

namespace Telnyx\WirelessBlocklistValues;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Api;
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
    #[Api(union: Data::class, optional: true)]
    public ?array $data;

    #[Api(optional: true)]
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
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public static function with(
        ?array $data = null,
        PaginationMeta|array|null $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj['data'] = $data;
        null !== $meta && $obj['meta'] = $meta;

        return $obj;
    }

    /**
     * @param list<Country|array{code: string, name: string}>|list<Mcc|array{
     *   code: string, name: string
     * }>|list<Plmn|array{code: string, name: string}> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj['data'] = $data;

        return $obj;
    }

    /**
     * @param PaginationMeta|array{
     *   page_number?: int|null,
     *   page_size?: int|null,
     *   total_pages?: int|null,
     *   total_results?: int|null,
     * } $meta
     */
    public function withMeta(PaginationMeta|array $meta): self
    {
        $obj = clone $this;
        $obj['meta'] = $meta;

        return $obj;
    }
}
