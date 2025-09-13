<?php

declare(strict_types=1);

namespace Telnyx\SimCardGroups\Actions;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type action_set_private_wireless_gateway_response = array{
 *   data?: SimCardGroupAction
 * }
 * When used in a response, this type parameter can define a $rawResponse property.
 * @template TRawResponse of object = object{}
 *
 * @mixin TRawResponse
 */
final class ActionSetPrivateWirelessGatewayResponse implements BaseModel
{
    /** @use SdkModel<action_set_private_wireless_gateway_response> */
    use SdkModel;

    /**
     * This object represents a SIM card group action request. It allows tracking the current status of an operation that impacts the SIM card group and SIM card in it.
     */
    #[Api(optional: true)]
    public ?SimCardGroupAction $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?SimCardGroupAction $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    /**
     * This object represents a SIM card group action request. It allows tracking the current status of an operation that impacts the SIM card group and SIM card in it.
     */
    public function withData(SimCardGroupAction $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
