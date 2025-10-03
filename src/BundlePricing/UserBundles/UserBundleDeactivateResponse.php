<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\UserBundles;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkResponse;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Core\Conversion\Contracts\ResponseConverter;

/**
 * @phpstan-type user_bundle_deactivate_response = array{data: UserBundle}
 */
final class UserBundleDeactivateResponse implements BaseModel, ResponseConverter
{
    /** @use SdkModel<user_bundle_deactivate_response> */
    use SdkModel;

    use SdkResponse;

    #[Api]
    public UserBundle $data;

    /**
     * `new UserBundleDeactivateResponse()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * UserBundleDeactivateResponse::with(data: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new UserBundleDeactivateResponse)->withData(...)
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
     */
    public static function with(UserBundle $data): self
    {
        $obj = new self;

        $obj->data = $data;

        return $obj;
    }

    public function withData(UserBundle $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
