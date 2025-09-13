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
 * @phpstan-type wireless_blocklist_value_list_response = array{
 *   data?: list<Country>|list<Mcc>|list<Plmn>, meta?: PaginationMeta
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class WirelessBlocklistValueListResponse implements BaseModel
{
    /** @use SdkModel<wireless_blocklist_value_list_response> */
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
     * @param list<Country>|list<Mcc>|list<Plmn> $data
     */
    public static function with(
        ?array $data = null,
        ?PaginationMeta $meta = null
    ): self {
        $obj = new self;

        null !== $data && $obj->data = $data;
        null !== $meta && $obj->meta = $meta;

        return $obj;
    }

    /**
     * @param list<Country>|list<Mcc>|list<Plmn> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }

    public function withMeta(PaginationMeta $meta): self
    {
        $obj = clone $this;
        $obj->meta = $meta;

        return $obj;
    }
}
