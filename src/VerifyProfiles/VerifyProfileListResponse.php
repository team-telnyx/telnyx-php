<?php

declare(strict_types=1);

namespace Telnyx\VerifyProfiles;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VerifyProfiles\VerifyProfileListResponse\Meta;

/**
 * A paginated list of Verify profiles.
 *
 * @phpstan-type verify_profile_list_response = array{
 *   data: list<VerifyProfile>, meta: Meta
 * }
 * When used in a response, this type parameter can be used to define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class VerifyProfileListResponse implements BaseModel
{
    /** @use SdkModel<verify_profile_list_response> */
    use SdkModel;

    /** @var list<VerifyProfile> $data */
    #[Api(list: VerifyProfile::class)]
    public array $data;

    #[Api]
    public Meta $meta;

    /**
     * `new VerifyProfileListResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VerifyProfileListResponse::with(data: ..., meta: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VerifyProfileListResponse)->withData(...)->withMeta(...)
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
     * @param list<VerifyProfile> $data
     */
    public static function with(array $data, Meta $meta): self
    {
        $obj = new self;

        $obj->data = $data;
        $obj->meta = $meta;

        return $obj;
    }

    /**
     * @param list<VerifyProfile> $data
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
