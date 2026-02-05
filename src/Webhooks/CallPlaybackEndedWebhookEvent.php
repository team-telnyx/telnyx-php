<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallPlaybackEndedShape from \Telnyx\Webhooks\CallPlaybackEnded
 *
 * @phpstan-type CallPlaybackEndedWebhookEventShape = array{
 *   data?: null|CallPlaybackEnded|CallPlaybackEndedShape
 * }
 */
final class CallPlaybackEndedWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallPlaybackEndedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?CallPlaybackEnded $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallPlaybackEnded|CallPlaybackEndedShape|null $data
     */
    public static function with(CallPlaybackEnded|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallPlaybackEnded|CallPlaybackEndedShape $data
     */
    public function withData(CallPlaybackEnded|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
