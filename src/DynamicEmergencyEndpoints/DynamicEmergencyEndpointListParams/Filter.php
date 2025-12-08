<?php

declare(strict_types=1);

namespace Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\DynamicEmergencyEndpoints\DynamicEmergencyEndpointListParams\Filter\Status;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[status], filter[country_code].
 *
 * @phpstan-type FilterShape = array{
 *   country_code?: string|null, status?: value-of<Status>|null
 * }
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter by country code.
     */
    #[Optional]
    public ?string $country_code;

    /**
     * Filter by status.
     *
     * @var value-of<Status>|null $status
     */
    #[Optional(enum: Status::class)]
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
        ?string $country_code = null,
        Status|string|null $status = null
    ): self {
        $obj = new self;

        null !== $country_code && $obj['country_code'] = $country_code;
        null !== $status && $obj['status'] = $status;

        return $obj;
    }

    /**
     * Filter by country code.
     */
    public function withCountryCode(string $countryCode): self
    {
        $obj = clone $this;
        $obj['country_code'] = $countryCode;

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
