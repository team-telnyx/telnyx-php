<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallStreamingStartedShape from \Telnyx\Webhooks\CallStreamingStarted
 *
 * @phpstan-type CallStreamingStartedWebhookEventShape = array{
 *   data?: null|CallStreamingStarted|CallStreamingStartedShape
 * }
 */
final class CallStreamingStartedWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallStreamingStartedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?CallStreamingStarted $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallStreamingStartedShape $data
     */
    public static function with(CallStreamingStarted|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallStreamingStartedShape $data
     */
    public function withData(CallStreamingStarted|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
