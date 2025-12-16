<?php

declare(strict_types=1);

namespace Telnyx\UsageReports;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Get the Usage Reports options for querying usage, including the products available and their respective metrics and dimensions.
 *
 * @see Telnyx\Services\UsageReportsService::getOptions()
 *
 * @phpstan-type UsageReportGetOptionsParamsShape = array{
 *   product?: string|null, authorizationBearer?: string|null
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
    #[Optional]
    public ?string $product;

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
    public static function with(
        ?string $product = null,
        ?string $authorizationBearer = null
    ): self {
        $self = new self;

        null !== $product && $self['product'] = $product;
        null !== $authorizationBearer && $self['authorizationBearer'] = $authorizationBearer;

        return $self;
    }

    /**
     * Options (dimensions and metrics) for a given product. If none specified, all products will be returned.
     */
    public function withProduct(string $product): self
    {
        $self = clone $this;
        $self['product'] = $product;

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
