<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\Webhooks\CallPlaybackEndedWebhookEvent\Data;

/**
 * @phpstan-import-type DataShape from \Telnyx\Webhooks\CallPlaybackEndedWebhookEvent\Data
 *
 * @phpstan-type CallPlaybackEndedWebhookEventShape = array{
 *   data?: null|Data|DataShape
 * }
 */
final class CallPlaybackEndedWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallPlaybackEndedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?Data $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Data|DataShape|null $data
     */
    public static function with(Data|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param Data|DataShape $data
     */
    public function withData(Data|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
