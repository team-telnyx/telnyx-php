<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Api;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type CallStreamingStartedWebhookEventShape = array{
 *   data?: CallStreamingStarted|null
 * }
 */
final class CallStreamingStartedWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallStreamingStartedWebhookEventShape> */
    use SdkModel;

    #[Api(optional: true)]
    public ?CallStreamingStarted $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?CallStreamingStarted $data = null): self
    {
        $obj = new self;

        null !== $data && $obj->data = $data;

        return $obj;
    }

    public function withData(CallStreamingStarted $data): self
    {
        $obj = clone $this;
        $obj->data = $data;

        return $obj;
    }
}
