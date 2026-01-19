<?php

declare(strict_types=1);

namespace Telnyx\SimCards\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * This API makes a SIM card reachable on the public internet by mapping a random public IP to the SIM card. <br/><br/>
 *  The API will trigger an asynchronous operation called a SIM Card Action. The status of the SIM Card Action can be followed through the [List SIM Card Action](https://developers.telnyx.com/api-reference/sim-card-actions/list-sim-card-actions) API. <br/><br/>
 *  Setting a Public IP to a SIM Card incurs a charge and will only succeed if the account has sufficient funds.
 *
 * @see Telnyx\Services\SimCards\ActionsService::setPublicIP()
 *
 * @phpstan-type ActionSetPublicIPParamsShape = array{regionCode?: string|null}
 */
final class ActionSetPublicIPParams implements BaseModel
{
    /** @use SdkModel<ActionSetPublicIPParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * The code of the region where the public IP should be assigned. A list of available regions can be found at the regions endpoint.
     */
    #[Optional]
    public ?string $regionCode;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $regionCode = null): self
    {
        $self = new self;

        null !== $regionCode && $self['regionCode'] = $regionCode;

        return $self;
    }

    /**
     * The code of the region where the public IP should be assigned. A list of available regions can be found at the regions endpoint.
     */
    public function withRegionCode(string $regionCode): self
    {
        $self = clone $this;
        $self['regionCode'] = $regionCode;

        return $self;
    }
}
