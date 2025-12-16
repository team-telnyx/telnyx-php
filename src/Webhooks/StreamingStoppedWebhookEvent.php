<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallStreamingStoppedShape from \Telnyx\Webhooks\CallStreamingStopped
 *
 * @phpstan-type StreamingStoppedWebhookEventShape = array{
 *   data?: null|CallStreamingStopped|CallStreamingStoppedShape
 * }
 */
final class StreamingStoppedWebhookEvent implements BaseModel
{
    /** @use SdkModel<StreamingStoppedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?CallStreamingStopped $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallStreamingStoppedShape $data
     */
    public static function with(CallStreamingStopped|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallStreamingStoppedShape $data
     */
    public function withData(CallStreamingStopped|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
