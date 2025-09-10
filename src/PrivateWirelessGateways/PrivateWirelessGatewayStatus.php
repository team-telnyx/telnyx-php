<?php

declare(strict_types=1);

namespace Telnyx\PrivateWirelessGateways;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\PrivateWirelessGateways\PrivateWirelessGatewayStatus\Value;

/**
 * The current status or failure details of the Private Wireless Gateway.
 *
 * @phpstan-type private_wireless_gateway_status = array{
 *   errorCode?: string|null,
 *   errorDescription?: string|null,
 *   value?: value-of<Value>|null,
 * }
 */
final class PrivateWirelessGatewayStatus implements BaseModel
{
    /** @use SdkModel<private_wireless_gateway_status> */
    use SdkModel;

    /**
     * This attribute is an [error code](https://developers.telnyx.com/api/errors) related to the failure reason.
     */
    #[Api('error_code', optional: true)]
    public ?string $errorCode;

    /**
     * This attribute provides a human-readable explanation of why a failure happened.
     */
    #[Api('error_description', optional: true)]
    public ?string $errorDescription;

    /**
     * The current status or failure details of the Private Wireless Gateway. <ul>
     *  <li><code>provisioning</code> - the Private Wireless Gateway is being provisioned.</li>
     *  <li><code>provisioned</code> - the Private Wireless Gateway was provisioned and able to receive connections.</li>
     *  <li><code>failed</code> - the provisioning had failed for a reason and it requires an intervention.</li>
     *  <li><code>decommissioning</code> - the Private Wireless Gateway is being removed from the network.</li>
     *  </ul>
     *  Transitioning between the provisioning and provisioned states may take some time.
     *
     * @var value-of<Value>|null $value
     */
    #[Api(enum: Value::class, optional: true)]
    public ?string $value;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Value|value-of<Value> $value
     */
    public static function with(
        ?string $errorCode = null,
        ?string $errorDescription = null,
        Value|string|null $value = null,
    ): self {
        $obj = new self;

        null !== $errorCode && $obj->errorCode = $errorCode;
        null !== $errorDescription && $obj->errorDescription = $errorDescription;
        null !== $value && $obj->value = $value instanceof Value ? $value->value : $value;

        return $obj;
    }

    /**
     * This attribute is an [error code](https://developers.telnyx.com/api/errors) related to the failure reason.
     */
    public function withErrorCode(string $errorCode): self
    {
        $obj = clone $this;
        $obj->errorCode = $errorCode;

        return $obj;
    }

    /**
     * This attribute provides a human-readable explanation of why a failure happened.
     */
    public function withErrorDescription(string $errorDescription): self
    {
        $obj = clone $this;
        $obj->errorDescription = $errorDescription;

        return $obj;
    }

    /**
     * The current status or failure details of the Private Wireless Gateway. <ul>
     *  <li><code>provisioning</code> - the Private Wireless Gateway is being provisioned.</li>
     *  <li><code>provisioned</code> - the Private Wireless Gateway was provisioned and able to receive connections.</li>
     *  <li><code>failed</code> - the provisioning had failed for a reason and it requires an intervention.</li>
     *  <li><code>decommissioning</code> - the Private Wireless Gateway is being removed from the network.</li>
     *  </ul>
     *  Transitioning between the provisioning and provisioned states may take some time.
     *
     * @param Value|value-of<Value> $value
     */
    public function withValue(Value|string $value): self
    {
        $obj = clone $this;
        $obj->value = $value instanceof Value ? $value->value : $value;

        return $obj;
    }
}
