<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\UserBundles;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type user_bundle_new_response = array{data: list<UserBundle>}
 */
final class UserBundleNewResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<user_bundle_new_response> */
    use SdkModel;

    use SdkResponse;

    /** @var list<UserBundle> $data */
    #[Api(list: UserBundle::class)]
    public array $data;

    /**
     * `new UserBundleNewResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UserBundleNewResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UserBundleNewResponse)->withData(...)
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
     * @param list<UserBundle> $data
     */
    public static function with(array $data): self
    {
        $obj = new self;

        $obj->data = $data;

        return $obj;
    }

    /**
     * @param list<UserBundle> $data
     */
    public function withData(array $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
