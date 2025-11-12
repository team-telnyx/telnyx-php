<?php

declare(strict_types=1);

namespace Telnyx\UsageReports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Get the Usage Reports options for querying usage, including the products available and their respective metrics and dimensions.
 *
 * @see Telnyx\Services\UsageReportsService::getOptions()
 *
 * @phpstan-type UsageReportGetOptionsParamsShape = array{
 *   product?: string, authorization_bearer?: string
 * }
 */
final class UsageReportGetOptionsParams implements BaseModel
{
    /** @use SdkModel<UsageReportGetOptionsParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Options (dimensions and metrics) for a given product. If none specified, all products will be returned.
     */
    #[Api(optional: true)]
    public ?string $product;

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
    public static function with(
        ?string $product = null,
        ?string $authorization_bearer = null
    ): self {
        $obj = new self;

        null !== $product && $obj->product = $product;
        null !== $authorization_bearer && $obj->authorization_bearer = $authorization_bearer;

        return $obj;
    }

    /**
     * Options (dimensions and metrics) for a given product. If none specified, all products will be returned.
     */
    public function withProduct(string $product): self
    {
        $obj = clone $this;
        $obj->product = $product;

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
