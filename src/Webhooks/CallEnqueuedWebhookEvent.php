<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallEnqueuedShape from \Telnyx\Webhooks\CallEnqueued
 *
 * @phpstan-type CallEnqueuedWebhookEventShape = array{
 *   data?: null|CallEnqueued|CallEnqueuedShape
 * }
 */
final class CallEnqueuedWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallEnqueuedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?CallEnqueued $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallEnqueued|CallEnqueuedShape|null $data
     */
    public static function with(CallEnqueued|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallEnqueued|CallEnqueuedShape $data
     */
    public function withData(CallEnqueued|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
