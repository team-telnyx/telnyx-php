<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallReferFailedShape from \Telnyx\Webhooks\CallReferFailed
 *
 * @phpstan-type CallReferFailedWebhookEventShape = array{
 *   data?: null|CallReferFailed|CallReferFailedShape
 * }
 */
final class CallReferFailedWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallReferFailedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?CallReferFailed $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallReferFailed|CallReferFailedShape|null $data
     */
    public static function with(CallReferFailed|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallReferFailed|CallReferFailedShape $data
     */
    public function withData(CallReferFailed|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
