<?php

declare(strict_types=1);

namespace Telnyx\AccessIPAddress;

use Telnyx\AccessIPAddress\AccessIPAddressListResponse\Meta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type access_ip_address_list_response = array{
 *   data: list<AccessIPAddressResponse>, meta: Meta
 * }
 */
final class AccessIPAddressListResponse implements BaseModel
{
    /** @use SdkModel<access_ip_address_list_response> */
    use SdkModel;

    /** @var list<AccessIPAddressResponse> $data */
    #[Api(list: AccessIPAddressResponse::class)]
    public array $data;

    #[Api]
    public Meta $meta;

    /**
     * `new AccessIPAddressListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AccessIPAddressListResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AccessIPAddressListResponse)->withData(...)->withMeta(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param list<AccessIPAddressResponse> $data
     */
    public static function with(array $data, Meta $meta): self
    {
        $obj = new self;

        $obj->data = $data;
        $obj->meta = $meta;

        return $obj;
    }

    /**
     * @param list<AccessIPAddressResponse> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }

    public function withMeta(Meta $meta): self
    {
        $obj = clone $this;
        $obj->meta = $meta;

        return $obj;
    }
}
