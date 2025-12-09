<?php

declare(strict_types=1);

namespace Telnyx\BundlePricing\BillingBundles;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Get a single bundle by ID.
 *
 * @see Telnyx\Services\BundlePricing\BillingBundlesService::retrieve()
 *
 * @phpstan-type BillingBundleRetrieveParamsShape = array{
 *   authorizationBearer?: string
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
        $self = new self;

        null !== $authorizationBearer && $self['authorizationBearer'] = $authorizationBearer;

        return $self;
    }

    /**
     * Authenticates the request with your Telnyx API V2 KEY.
     */
    public function withAuthorizationBearer(string $authorizationBearer): self
    {
        $self = clone $this;
        $self['authorizationBearer'] = $authorizationBearer;

        return $self;
    }
}
