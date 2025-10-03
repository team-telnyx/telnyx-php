<?php

declare(strict_types=1);

namespace Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointListParams\Filter\Status;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[status], filter[country_code].
 *
 * @phpstan-type filter_alias = array{
 *   countryCode?: string, status?: value-of<Status>
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * Filter by country code.
     */
    #[Api('country_code', optional: true)]
    public ?string $countryCode;

    /**
     * Filter by status.
     *
     * @var value-of<Status>|null $status
     */
    #[Api(enum: Status::class, optional: true)]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status> $status
     */
    public static function with(
        ?string $countryCode = null,
        Status|string|null $status = null
    ): self {
        $obj = new self;

        null !== $countryCode && $obj->countryCode = $countryCode;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    /**
     * Filter by country code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj->countryCode = $countryCode;

        return $obj;
    }

    /**
     * Filter by status.
     *
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $obj = clone $this;
        $obj['status'] = $status;

        return $obj;
    }
}
