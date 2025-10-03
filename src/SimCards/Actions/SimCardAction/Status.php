<?php

declare(strict_types=1);

namespace Telnyx\SimCards\Actions\SimCardAction;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\SimCards\Actions\SimCardAction\Status\Value;

/**
 * @phpstan-type status_alias = array{reason?: string, value?: value-of<Value>}
 */
final class Status implements BaseModel
{
    /** @use SdkModel<status_alias> */
    use SdkModel;

    /**
     * It describes why the SIM card action is in the current status. This will be <code>null</code> for self-explanatory statuses, such as <code>in-progress</code> and <code>completed</code> but will include further information on statuses like <code>interrupted</code> and <code>failed</code>.
     */
    #[Api(optional: true)]
    public ?string $reason;

    /**
     * The current status of the SIM card action.
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
     * It describes why the SIM card action is in the current status. This will be <code>null</code> for self-explanatory statuses, such as <code>in-progress</code> and <code>completed</code> but will include further information on statuses like <code>interrupted</code> and <code>failed</code>.
     */
    public function withReason(string $reason): self
    {
        $obj = clone $this;
        $obj->reason = $reason;

        return $obj;
    }

    /**
     * The current status of the SIM card action.
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
