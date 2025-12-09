<?php

declare(strict_types=1);

namespace Telnyx\SimCards;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns the details regarding a specific SIM card.
 *
 * @see Telnyx\Services\SimCardsService::retrieve()
 *
 * @phpstan-type SimCardRetrieveParamsShape = array{
 *   includePinPukCodes?: bool, includeSimCardGroup?: bool
 * }
 */
final class SimCardRetrieveParams implements BaseModel
{
    /** @use SdkModel<SimCardRetrieveParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * When set to true, includes the PIN and PUK codes in the response. These codes are used for SIM card security and unlocking purposes. Available for both physical SIM cards and eSIMs.
     */
    #[Optional]
    public ?bool $includePinPukCodes;

    /**
     * It includes the associated SIM card group object in the response when present.
     */
    #[Optional]
    public ?bool $includeSimCardGroup;

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
        ?bool $includePinPukCodes = null,
        ?bool $includeSimCardGroup = null
    ): self {
        $self = new self;

        null !== $includePinPukCodes && $self['includePinPukCodes'] = $includePinPukCodes;
        null !== $includeSimCardGroup && $self['includeSimCardGroup'] = $includeSimCardGroup;

        return $self;
    }

    /**
     * When set to true, includes the PIN and PUK codes in the response. These codes are used for SIM card security and unlocking purposes. Available for both physical SIM cards and eSIMs.
     */
    public function withIncludePinPukCodes(bool $includePinPukCodes): self
    {
        $self = clone $this;
        $self['includePinPukCodes'] = $includePinPukCodes;

        return $self;
    }

    /**
     * It includes the associated SIM card group object in the response when present.
     */
    public function withIncludeSimCardGroup(bool $includeSimCardGroup): self
    {
        $self = clone $this;
        $self['includeSimCardGroup'] = $includeSimCardGroup;

        return $self;
    }
}
