<?php

declare(strict_types=1);

namespace Telnyx;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCardStatus\Value;

/**
 * @phpstan-type SimCardStatusShape = array{
 *   reason?: string|null, value?: null|Value|value-of<Value>
 * }
 */
final class SimCardStatus implements BaseModel
{
    /** @use SdkModel<SimCardStatusShape> */
    use SdkModel;

    /**
     * It describes why the SIM card is in the current status.
     */
    #[Optional]
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
    #[Optional(enum: Value::class)]
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
     * @param Value|value-of<Value>|null $value
     */
    public static function with(
        ?string $reason = null,
        Value|string|null $value = null
    ): self {
        $self = new self;

        null !== $reason && $self['reason'] = $reason;
        null !== $value && $self['value'] = $value;

        return $self;
    }

    /**
     * It describes why the SIM card is in the current status.
     */
    public function withReason(string $reason): self
    {
        $self = clone $this;
        $self['reason'] = $reason;

        return $self;
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
        $self = clone $this;
        $self['value'] = $value;

        return $self;
    }
}
