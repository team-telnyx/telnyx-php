<?php

declare(strict_types=1);

namespace Telnyx\Reputation\Numbers;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Convenience alias for `GET /v2/enterprises/{enterprise_id}/reputation/numbers/{phone_number}`.
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
     * When true, fetches fresh reputation data (incurs API cost). When false (default), returns cached data.
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
     * When true, fetches fresh reputation data (incurs API cost). When false (default), returns cached data.
     */
    public function withFresh(bool $fresh): self
    {
        $self = clone $this;
        $self['fresh'] = $fresh;

        return $self;
    }
}
