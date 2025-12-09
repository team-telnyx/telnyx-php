<?php

declare(strict_types=1);

namespace Telnyx\Queues\Calls;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Update queued call's keep_after_hangup flag.
 *
 * @see Telnyx\Services\Queues\CallsService::update()
 *
 * @phpstan-type CallUpdateParamsShape = array{
 *   queueName: string, keepAfterHangup?: bool
 * }
 */
final class CallUpdateParams implements BaseModel
{
    /** @use SdkModel<CallUpdateParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Required]
    public string $queueName;

    /**
     * Whether the call should remain in queue after hangup.
     */
    #[Optional('keep_after_hangup')]
    public ?bool $keepAfterHangup;

    /**
     * `new CallUpdateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * CallUpdateParams::with(queueName: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new CallUpdateParams)->withQueueName(...)
     * ```
     */
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
        string $queueName,
        ?bool $keepAfterHangup = null
    ): self {
        $self = new self;

        $self['queueName'] = $queueName;

        null !== $keepAfterHangup && $self['keepAfterHangup'] = $keepAfterHangup;

        return $self;
    }

    public function withQueueName(string $queueName): self
    {
        $self = clone $this;
        $self['queueName'] = $queueName;

        return $self;
    }

    /**
     * Whether the call should remain in queue after hangup.
     */
    public function withKeepAfterHangup(bool $keepAfterHangup): self
    {
        $self = clone $this;
        $self['keepAfterHangup'] = $keepAfterHangup;

        return $self;
    }
}
