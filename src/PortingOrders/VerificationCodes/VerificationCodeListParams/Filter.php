<?php

declare(strict_types=1);

namespace Telnyx\PortingOrders\VerificationCodes\VerificationCodeListParams;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Consolidated filter parameter (deepObject style). Originally: filter[verified].
 *
 * @phpstan-type filter_alias = array{verified?: bool}
 */
final class Filter implements BaseModel
{
    /** @use SdkModel<filter_alias> */
    use SdkModel;

    /**
     * Filter verification codes that have been verified or not.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $verified && $obj->verified = $verified;

        return $obj;
    }

    /**
     * Filter verification codes that have been verified or not.
     */
    public function withVerified(bool $verified): self
    {
        $obj = clone $this;
        $obj->verified = $verified;

        return $obj;
    }
}
