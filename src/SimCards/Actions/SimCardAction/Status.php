<?php

declare(strict_types=1);

namespace Telnyx\SimCards\Actions\SimCardAction;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCards\Actions\SimCardAction\Status\Value;

/**
 * @phpstan-type StatusShape = array{
 *   reason?: string|null, value?: value-of<Value>|null
 * }
 */
final class Status implements BaseModel
{
    /** @use SdkModel<StatusShape> */
    use SdkModel;

    /**
     * It describes why the SIM card action is in the current status. This will be <code>null</code> for self-explanatory statuses, such as <code>in-progress</code> and <code>completed</code> but will include further information on statuses like <code>interrupted</code> and <code>failed</code>.
     */
    #[Optional]
    public ?string $reason;

    /**
     * The current status of the SIM card action.
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
     * @param Value|value-of<Value> $value
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
     * It describes why the SIM card action is in the current status. This will be <code>null</code> for self-explanatory statuses, such as <code>in-progress</code> and <code>completed</code> but will include further information on statuses like <code>interrupted</code> and <code>failed</code>.
     */
    public function withReason(string $reason): self
    {
        $self = clone $this;
        $self['reason'] = $reason;

        return $self;
    }

    /**
     * The current status of the SIM card action.
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
