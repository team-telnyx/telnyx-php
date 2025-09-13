<?php

declare(strict_types=1);

namespace Telnyx\Verifications\ByPhoneNumber;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Verifications\ByPhoneNumber\ByPhoneNumberListResponse\Meta;
use Telnyx\Verifications\Verification;

/**
 * @phpstan-type by_phone_number_list_response = array{
 *   data: list<Verification>, meta: Meta
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class ByPhoneNumberListResponse implements BaseModel
{
    /** @use SdkModel<by_phone_number_list_response> */
    use SdkModel;

    /** @var list<Verification> $data */
    #[Api(list: Verification::class)]
    public array $data;

    #[Api]
    public Meta $meta;

    /**
     * `new ByPhoneNumberListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ByPhoneNumberListResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ByPhoneNumberListResponse)->withData(...)->withMeta(...)
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
     * @param list<Verification> $data
     */
    public static function with(array $data, Meta $meta): self
    {
        $obj = new self;

        $obj->data = $data;
        $obj->meta = $meta;

        return $obj;
    }

    /**
     * @param list<Verification> $data
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
