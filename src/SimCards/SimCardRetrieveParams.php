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
 * @see Telnyx\SimCardsService::retrieve()
 *
 * @phpstan-type SimCardRetrieveParamsShape = array{
 *   include_pin_puk_codes?: bool, include_sim_card_group?: bool
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
    #[Api(optional: true)]
    public ?bool $include_pin_puk_codes;

    /**
     * It includes the associated SIM card group object in the response when present.
     */
    #[Api(optional: true)]
    public ?bool $include_sim_card_group;

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
        ?bool $include_pin_puk_codes = null,
        ?bool $include_sim_card_group = null
    ): self {
        $obj = new self;

        null !== $include_pin_puk_codes && $obj->include_pin_puk_codes = $include_pin_puk_codes;
        null !== $include_sim_card_group && $obj->include_sim_card_group = $include_sim_card_group;

        return $obj;
    }

    /**
     * When set to true, includes the PIN and PUK codes in the response. These codes are used for SIM card security and unlocking purposes. Available for both physical SIM cards and eSIMs.
     */
    public function withIncludePinPukCodes(bool $includePinPukCodes): self
    {
        $obj = clone $this;
        $obj->include_pin_puk_codes = $includePinPukCodes;

        return $obj;
    }

    /**
     * It includes the associated SIM card group object in the response when present.
     */
    public function withIncludeSimCardGroup(bool $includeSimCardGroup): self
    {
        $obj = clone $this;
        $obj->include_sim_card_group = $includeSimCardGroup;

        return $obj;
    }
}
