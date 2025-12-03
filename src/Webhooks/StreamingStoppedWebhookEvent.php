<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type StreamingStoppedWebhookEventShape = array{
 *   data?: CallStreamingStopped|null
 * }
 */
final class StreamingStoppedWebhookEvent implements BaseModel
{
    /** @use SdkModel<StreamingStoppedWebhookEventShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?CallStreamingStopped $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?CallStreamingStopped $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(CallStreamingStopped $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
