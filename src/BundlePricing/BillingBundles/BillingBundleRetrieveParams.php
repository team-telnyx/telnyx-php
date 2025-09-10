<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\BillingBundles;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new BillingBundleRetrieveParams); // set properties as needed
 * $client->bundlePricing.billingBundles->retrieve(...$params->toArray());
 * ```
 * Get a single bundle by ID.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->bundlePricing.billingBundles->retrieve(...$params->toArray());`
 *
 * @see Telnyx\BundlePricing\BillingBundles->retrieve
 *
 * @phpstan-type billing_bundle_retrieve_params = array{
 *   authorizationBearer?: string
 * }
 */
final class BillingBundleRetrieveParams implements BaseModel
{
    /** @use SdkModel<billing_bundle_retrieve_params> */
    use SdkModel;
    use SdkParams;

    /**
     * Authenticates the request with your Telnyx API V2 KEY.
     */
    #[Api(optional: true)]
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

        null !== $authorizationBearer && $obj->authorizationBearer = $authorizationBearer;

        return $obj;
    }

    /**
     * Authenticates the request with your Telnyx API V2 KEY.
     */
    public function withAuthorizationBearer(string $authorizationBearer): self
    {
        $obj = clone $this;
        $obj->authorizationBearer = $authorizationBearer;

        return $obj;
    }
}
