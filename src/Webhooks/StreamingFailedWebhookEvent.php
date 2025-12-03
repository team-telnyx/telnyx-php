<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type StreamingFailedWebhookEventShape = array{
 *   data?: CallStreamingFailed|null
 * }
 */
final class StreamingFailedWebhookEvent implements BaseModel
{
    /** @use SdkModel<StreamingFailedWebhookEventShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?CallStreamingFailed $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?CallStreamingFailed $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(CallStreamingFailed $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
