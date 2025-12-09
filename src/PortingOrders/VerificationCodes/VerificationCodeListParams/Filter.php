<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\VerificationCodes\VerificationCodeListParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[verified].
 *
 * @phpstan-type FilterShape = array{verified?: bool|null}
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<FilterShape> */
    use SdkModel;

    /**
     * Filter verification codes that have been verified or not.
     */
    #[Optional]
    public ?bool $verified;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?bool $verified = null): self
    {
        $self = new self;

        null !== $verified && $self['verified'] = $verified;

        return $self;
    }

    /**
     * Filter verification codes that have been verified or not.
     */
    public function withVerified(bool $verified): self
    {
        $self = clone $this;
        $self['verified'] = $verified;

        return $self;
    }
}
