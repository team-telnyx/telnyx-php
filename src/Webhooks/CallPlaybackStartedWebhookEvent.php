<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallPlaybackStartedShape from \Telnyx\Webhooks\CallPlaybackStarted
 *
 * @phpstan-type CallPlaybackStartedWebhookEventShape = array{
 *   data?: null|CallPlaybackStarted|CallPlaybackStartedShape
 * }
 */
final class CallPlaybackStartedWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallPlaybackStartedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?CallPlaybackStarted $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallPlaybackStarted|CallPlaybackStartedShape|null $data
     */
    public static function with(CallPlaybackStarted|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallPlaybackStarted|CallPlaybackStartedShape $data
     */
    public function withData(CallPlaybackStarted|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
