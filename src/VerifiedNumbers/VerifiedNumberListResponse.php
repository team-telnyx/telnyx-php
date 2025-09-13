<?php

declare(strict_types=1);

namespace Telnyx\VerifiedNumbers;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VerifiedNumbers\VerifiedNumberListResponse\Meta;

/**
 * A paginated list of Verified Numbers.
 *
 * @phpstan-type verified_number_list_response = array{
 *   data: list<VerifiedNumber>, meta: Meta
 * }
 * When used in a response, this type parameter can be used to define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class VerifiedNumberListResponse implements BaseModel
{
    /** @use SdkModel<verified_number_list_response> */
    use SdkModel;

    /** @var list<VerifiedNumber> $data */
    #[Api(list: VerifiedNumber::class)]
    public array $data;

    #[Api]
    public Meta $meta;

    /**
     * `new VerifiedNumberListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerifiedNumberListResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VerifiedNumberListResponse)->withData(...)->withMeta(...)
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
     * @param list<VerifiedNumber> $data
     */
    public static function with(array $data, Meta $meta): self
    {
        $obj = new self;

        $obj->data = $data;
        $obj->meta = $meta;

        return $obj;
    }

    /**
     * @param list<VerifiedNumber> $data
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
