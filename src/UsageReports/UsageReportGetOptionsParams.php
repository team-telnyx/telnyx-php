<?php

declare(strict_types=1);

namespace Telnyx\UsageReports;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * An object containing the method's parameters.
 * Example usage:
 * ```
 * $params = (new UsageReportGetOptionsParams); // set properties as needed
 * $client->usageReports->getOptions(...$params->toArray());
 * ```
 * Get the Usage Reports options for querying usage, including the products available and their respective metrics and dimensions.
 *
 * @method toArray()
 *   Returns the parameters as an associative array suitable for passing to the client method.
 *
 *   `$client->usageReports->getOptions(...$params->toArray());`
 *
 * @see Telnyx\UsageReports->getOptions
 *
 * @phpstan-type usage_report_get_options_params = array{
 *   product?: string, authorizationBearer?: string
 * }
 */
final class UsageReportGetOptionsParams implements BaseModel
{
    /** @use SdkModel<usage_report_get_options_params> */
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
    public static function with(
        ?string $product = null,
        ?string $authorizationBearer = null
    ): self {
        $obj = new self;

        null !== $product && $obj->product = $product;
        null !== $authorizationBearer && $obj->authorizationBearer = $authorizationBearer;

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
        $obj->authorizationBearer = $authorizationBearer;

        return $obj;
    }
}
