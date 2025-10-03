<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCardStatus\Value;

/**
 * @phpstan-type sim_card_status = array{reason?: string, value?: value-of<Value>}
 */
final class SimCardStatus implements BaseModel
{
    /** @use SdkModel<sim_card_status> */
    use SdkModel;

    /**
     * It describes why the SIM card is in the current status.
     */
    #[Api(optional: true)]
    public ?string $reason;

    /**
     * The current status of the SIM card. It will be one of the following: <br/>
     * <ul>
     *  <li><code>registering</code> - the card is being registered</li>
     *  <li><code>enabling</code> - the card is being enabled</li>
     *  <li><code>enabled</code> - the card is enabled and ready for use</li>
     *  <li><code>disabling</code> - the card is being disabled</li>
     *  <li><code>disabled</code> - the card has been disabled and cannot be used</li>
     *  <li><code>data_limit_exceeded</code> - the card has exceeded its data consumption limit</li>
     *  <li><code>setting_standby</code> - the process to set the card in stand by is in progress</li>
     *  <li><code>standby</code> - the card is in stand by</li>
     * </ul>
     * Transitioning between the enabled and disabled states may take a period of time.
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
        ?string $reason = null,
        Value|string|null $value = null
    ): self {
        $obj = new self;

        null !== $reason && $obj->reason = $reason;
        null !== $value && $obj['value'] = $value;

        return $obj;
    }

    /**
     * It describes why the SIM card is in the current status.
     */
    public function withReason(string $reason): self
    {
        $obj = clone $this;
        $obj->reason = $reason;

        return $obj;
    }

    /**
     * The current status of the SIM card. It will be one of the following: <br/>
     * <ul>
     *  <li><code>registering</code> - the card is being registered</li>
     *  <li><code>enabling</code> - the card is being enabled</li>
     *  <li><code>enabled</code> - the card is enabled and ready for use</li>
     *  <li><code>disabling</code> - the card is being disabled</li>
     *  <li><code>disabled</code> - the card has been disabled and cannot be used</li>
     *  <li><code>data_limit_exceeded</code> - the card has exceeded its data consumption limit</li>
     *  <li><code>setting_standby</code> - the process to set the card in stand by is in progress</li>
     *  <li><code>standby</code> - the card is in stand by</li>
     * </ul>
     * Transitioning between the enabled and disabled states may take a period of time.
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
