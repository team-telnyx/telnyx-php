<?php

declare(strict_types=1);

namespace Telnyx\AccessIPRanges;

use Telnyx\AccessIPRanges\AccessIPRangeListResponse\Meta;
use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type access_ip_range_list_response = array{
 *   data: list<AccessIPRange>, meta: Meta
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class AccessIPRangeListResponse implements BaseModel
{
    /** @use SdkModel<access_ip_range_list_response> */
    use SdkModel;

    /** @var list<AccessIPRange> $data */
    #[Api(list: AccessIPRange::class)]
    public array $data;

    #[Api]
    public Meta $meta;

    /**
     * `new AccessIPRangeListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * AccessIPRangeListResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new AccessIPRangeListResponse)->withData(...)->withMeta(...)
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
     * @param list<AccessIPRange> $data
     */
    public static function with(array $data, Meta $meta): self
    {
        $obj = new self;

        $obj->data = $data;
        $obj->meta = $meta;

        return $obj;
    }

    /**
     * @param list<AccessIPRange> $data
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
