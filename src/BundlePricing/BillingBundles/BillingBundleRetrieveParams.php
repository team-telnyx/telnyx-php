<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\BillingBundles;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Get a single bundle by ID.
 *
 * @see Telnyx\Services\BundlePricing\BillingBundlesService::retrieve()
 *
 * @phpstan-type BillingBundleRetrieveParamsShape = array{
 *   authorization_bearer?: string
 * }
 */
final class BillingBundleRetrieveParams implements BaseModel
{
    /** @use SdkModel<BillingBundleRetrieveParamsShape> */
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

        null !== $authorization_bearer && $obj['authorization_bearer'] = $authorization_bearer;

        return $obj;
    }

    /**
     * Authenticates the request with your Telnyx API V2 KEY.
     */
    public function withAuthorizationBearer(string $authorizationBearer): self
    {
        $obj = clone $this;
        $obj['authorization_bearer'] = $authorizationBearer;

        return $obj;
    }
}
