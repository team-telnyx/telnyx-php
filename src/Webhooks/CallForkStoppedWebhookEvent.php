<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallForkStoppedShape from \Telnyx\Webhooks\CallForkStopped
 *
 * @phpstan-type CallForkStoppedWebhookEventShape = array{
 *   data?: null|CallForkStopped|CallForkStoppedShape
 * }
 */
final class CallForkStoppedWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallForkStoppedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?CallForkStopped $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallForkStopped|CallForkStoppedShape|null $data
     */
    public static function with(CallForkStopped|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallForkStopped|CallForkStoppedShape $data
     */
    public function withData(CallForkStopped|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
