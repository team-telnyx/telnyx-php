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
 * @phpstan-type PrivateWirelessGatewayStatusShape = array{
 *   error_code?: string|null,
 *   error_description?: string|null,
 *   value?: value-of<Value>|null,
 * }
 */
final class PrivateWirelessGatewayStatus implements BaseModel
{
    /** @use SdkModel<PrivateWirelessGatewayStatusShape> */
    use SdkModel;

    /**
     * This attribute is an [error code](https://developers.telnyx.com/api/errors) related to the failure reason.
     */
    #[Api(optional: true)]
    public ?string $error_code;

    /**
     * This attribute provides a human-readable explanation of why a failure happened.
     */
    #[Api(optional: true)]
    public ?string $error_description;

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
        ?string $error_code = null,
        ?string $error_description = null,
        Value|string|null $value = null,
    ): self {
        $obj = new self;

        null !== $error_code && $obj->error_code = $error_code;
        null !== $error_description && $obj->error_description = $error_description;
        null !== $value && $obj['value'] = $value;

        return $obj;
    }

    /**
     * This attribute is an [error code](https://developers.telnyx.com/api/errors) related to the failure reason.
     */
    public function withErrorCode(string $errorCode): self
    {
        $obj = clone $this;
        $obj->error_code = $errorCode;

        return $obj;
    }

    /**
     * This attribute provides a human-readable explanation of why a failure happened.
     */
    public function withErrorDescription(string $errorDescription): self
    {
        $obj = clone $this;
        $obj->error_description = $errorDescription;

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
        $obj['value'] = $value;

        return $obj;
    }
}
