<?php

declare(strict_types=1);

namespace Telnyx\Reputation\Numbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Get reputation data for a specific phone number without requiring an `enterprise_id`.
 *
 * Same response as the enterprise-scoped endpoint. Uses cached data by default.
 *
 * @see Telnyx\Services\Reputation\NumbersService::retrieve()
 *
 * @phpstan-type NumberRetrieveParamsShape = array{fresh?: bool|null}
 */
final class NumberRetrieveParams implements BaseModel
{
    /** @use SdkModel<NumberRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * When true, fetches fresh reputation data (incurs API cost). When false, returns cached data.
     */
    #[Optional]
    public ?bool $fresh;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $fresh = null): self
    {
        $self = new self;

        null !== $fresh && $self['fresh'] = $fresh;

        return $self;
    }

    /**
     * When true, fetches fresh reputation data (incurs API cost). When false, returns cached data.
     */
    public function withFresh(bool $fresh): self
    {
        $self = clone $this;
        $self['fresh'] = $fresh;

        return $self;
    }
}
