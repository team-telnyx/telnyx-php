<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallInitiatedShape from \Telnyx\Webhooks\CallInitiated
 *
 * @phpstan-type CallInitiatedWebhookEventShape = array{
 *   data?: null|CallInitiated|CallInitiatedShape
 * }
 */
final class CallInitiatedWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallInitiatedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?CallInitiated $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallInitiated|CallInitiatedShape|null $data
     */
    public static function with(CallInitiated|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallInitiated|CallInitiatedShape $data
     */
    public function withData(CallInitiated|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
