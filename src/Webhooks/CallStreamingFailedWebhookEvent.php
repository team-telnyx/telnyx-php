<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallStreamingFailedShape from \Telnyx\Webhooks\CallStreamingFailed
 *
 * @phpstan-type CallStreamingFailedWebhookEventShape = array{
 *   data?: null|CallStreamingFailed|CallStreamingFailedShape
 * }
 */
final class CallStreamingFailedWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallStreamingFailedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?CallStreamingFailed $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallStreamingFailed|CallStreamingFailedShape|null $data
     */
    public static function with(CallStreamingFailed|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallStreamingFailed|CallStreamingFailedShape $data
     */
    public function withData(CallStreamingFailed|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
