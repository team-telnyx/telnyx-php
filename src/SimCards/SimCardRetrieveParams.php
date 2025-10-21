<?php

declare(strict_types=1);

namespace Telnyx\SimCards;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Returns the details regarding a specific SIM card.
 *
 * @see Telnyx\SimCards->retrieve
 *
 * @phpstan-type sim_card_retrieve_params = array{
 *   includePinPukCodes?: bool, includeSimCardGroup?: bool
 * }
 */
final class SimCardRetrieveParams implements BaseModel
{
    /** @use SdkModel<sim_card_retrieve_params> */
    use SdkModel;
    use SdkParams;

    /**
     * When set to true, includes the PIN and PUK codes in the response. These codes are used for SIM card security and unlocking purposes. Available for both physical SIM cards and eSIMs.
     */
    #[Api(optional: true)]
    public ?bool $includePinPukCodes;

    /**
     * It includes the associated SIM card group object in the response when present.
     */
    #[Api(optional: true)]
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
        $obj = new self;

        null !== $includePinPukCodes && $obj->includePinPukCodes = $includePinPukCodes;
        null !== $includeSimCardGroup && $obj->includeSimCardGroup = $includeSimCardGroup;

        return $obj;
    }

    /**
     * When set to true, includes the PIN and PUK codes in the response. These codes are used for SIM card security and unlocking purposes. Available for both physical SIM cards and eSIMs.
     */
    public function withIncludePinPukCodes(bool $includePinPukCodes): self
    {
        $obj = clone $this;
        $obj->includePinPukCodes = $includePinPukCodes;

        return $obj;
    }

    /**
     * It includes the associated SIM card group object in the response when present.
     */
    public function withIncludeSimCardGroup(bool $includeSimCardGroup): self
    {
        $obj = clone $this;
        $obj->includeSimCardGroup = $includeSimCardGroup;

        return $obj;
    }
}
