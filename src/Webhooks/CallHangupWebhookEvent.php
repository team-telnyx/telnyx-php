<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallHangupShape from \Telnyx\Webhooks\CallHangup
 *
 * @phpstan-type CallHangupWebhookEventShape = array{
 *   data?: null|CallHangup|CallHangupShape
 * }
 */
final class CallHangupWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallHangupWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?CallHangup $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallHangup|CallHangupShape|null $data
     */
    public static function with(CallHangup|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallHangup|CallHangupShape $data
     */
    public function withData(CallHangup|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
