<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\UserBundles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Retrieves a user bundle by its ID.
 *
 * @see Telnyx\Services\BundlePricing\UserBundlesService::retrieve()
 *
 * @phpstan-type UserBundleRetrieveParamsShape = array{
 *   authorizationBearer?: string
 * }
 */
final class UserBundleRetrieveParams implements BaseModel
{
    /** @use SdkModel<UserBundleRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Authenticates the request with your Telnyx API V2 KEY.
     */
    #[Optional]
    public ?string $authorizationBearer;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $authorizationBearer = null): self
    {
        $obj = new self;

        null !== $authorizationBearer && $obj['authorizationBearer'] = $authorizationBearer;

        return $obj;
    }

    /**
     * Authenticates the request with your Telnyx API V2 KEY.
     */
    public function withAuthorizationBearer(string $authorizationBearer): self
    {
        $obj = clone $this;
        $obj['authorizationBearer'] = $authorizationBearer;

        return $obj;
    }
}
