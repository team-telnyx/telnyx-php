<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\UserBundles;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieves the resources of a user bundle by its ID.
 *
 * @see Telnyx\BundlePricing\UserBundles->listResources
 *
 * @phpstan-type UserBundleListResourcesParamsShape = array{
 *   authorization_bearer?: string
 * }
 */
final class UserBundleListResourcesParams implements BaseModel
{
    /** @use SdkModel<UserBundleListResourcesParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Authenticates the request with your Telnyx API V2 KEY.
     */
    #[Api(optional: true)]
    public ?string $authorization_bearer;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $authorization_bearer = null): self
    {
        $obj = new self;

        null !== $authorization_bearer && $obj->authorization_bearer = $authorization_bearer;

        return $obj;
    }

    /**
     * Authenticates the request with your Telnyx API V2 KEY.
     */
    public function withAuthorizationBearer(string $authorizationBearer): self
    {
        $obj = clone $this;
        $obj->authorization_bearer = $authorizationBearer;

        return $obj;
    }
}
