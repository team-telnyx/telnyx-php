<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallLeftQueueShape from \Telnyx\Webhooks\CallLeftQueue
 *
 * @phpstan-type CallLeftQueueWebhookEventShape = array{
 *   data?: null|CallLeftQueue|CallLeftQueueShape
 * }
 */
final class CallLeftQueueWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallLeftQueueWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?CallLeftQueue $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallLeftQueue|CallLeftQueueShape|null $data
     */
    public static function with(CallLeftQueue|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallLeftQueue|CallLeftQueueShape $data
     */
    public function withData(CallLeftQueue|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
