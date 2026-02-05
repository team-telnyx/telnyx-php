<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallGatherEndedShape from \Telnyx\Webhooks\CallGatherEnded
 *
 * @phpstan-type CallGatherEndedWebhookEventShape = array{
 *   data?: null|CallGatherEnded|CallGatherEndedShape
 * }
 */
final class CallGatherEndedWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallGatherEndedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?CallGatherEnded $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallGatherEnded|CallGatherEndedShape|null $data
     */
    public static function with(CallGatherEnded|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallGatherEnded|CallGatherEndedShape $data
     */
    public function withData(CallGatherEnded|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
