<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallDtmfReceivedShape from \Telnyx\Webhooks\CallDtmfReceived
 *
 * @phpstan-type CallDtmfReceivedWebhookEventShape = array{
 *   data?: null|CallDtmfReceived|CallDtmfReceivedShape
 * }
 */
final class CallDtmfReceivedWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallDtmfReceivedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?CallDtmfReceived $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallDtmfReceived|CallDtmfReceivedShape|null $data
     */
    public static function with(CallDtmfReceived|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallDtmfReceived|CallDtmfReceivedShape $data
     */
    public function withData(CallDtmfReceived|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
