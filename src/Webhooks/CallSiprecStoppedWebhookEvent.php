<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallSiprecStoppedShape from \Telnyx\Webhooks\CallSiprecStopped
 *
 * @phpstan-type CallSiprecStoppedWebhookEventShape = array{
 *   data?: null|CallSiprecStopped|CallSiprecStoppedShape
 * }
 */
final class CallSiprecStoppedWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallSiprecStoppedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?CallSiprecStopped $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallSiprecStopped|CallSiprecStoppedShape|null $data
     */
    public static function with(CallSiprecStopped|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallSiprecStopped|CallSiprecStoppedShape $data
     */
    public function withData(CallSiprecStopped|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
