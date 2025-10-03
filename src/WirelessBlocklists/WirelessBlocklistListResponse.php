<?php

declare(strict_types=1);

namespace Telnyx\WirelessBlocklists;

use Telnyx\AuthenticationProviders\PaginationMeta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type wireless_blocklist_list_response = array{
 *   data?: list<WirelessBlocklist>, meta?: PaginationMeta
 * }
 */
final class WirelessBlocklistListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<wireless_blocklist_list_response> */
    use SdkModel;

    use SdkResponse;

    /** @var list<WirelessBlocklist>|null $data */
    #[Api(list: WirelessBlocklist::class, optional: true)]
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
     * @param list<WirelessBlocklist> $data
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
     * @param list<WirelessBlocklist> $data
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
