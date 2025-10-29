<?php

declare(strict_types=1);

namespace Telnyx\VerifyProfiles;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;
use Telnyx\Verifications\ByPhoneNumber\VerifyMeta;

/**
 * A paginated list of Verify profiles.
 *
 * @phpstan-type VerifyProfileListResponseShape = array{
 *   data: list<VerifyProfile>, meta: VerifyMeta
 * }
 */
final class VerifyProfileListResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<VerifyProfileListResponseShape> */
    use SdkModel;

    use SdkResponse;

    /** @var list<VerifyProfile> $data */
    #[Api(list: VerifyProfile::class)]
    public array $data;

    #[Api]
    public VerifyMeta $meta;

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
    public static function with(array $data, VerifyMeta $meta): self
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

    public function withMeta(VerifyMeta $meta): self
    {
        $obj = clone $this;
        $obj->meta = $meta;

        return $obj;
    }
}
