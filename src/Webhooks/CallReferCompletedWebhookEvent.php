<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallReferCompletedShape from \Telnyx\Webhooks\CallReferCompleted
 *
 * @phpstan-type CallReferCompletedWebhookEventShape = array{
 *   data?: null|CallReferCompleted|CallReferCompletedShape
 * }
 */
final class CallReferCompletedWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallReferCompletedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?CallReferCompleted $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallReferCompleted|CallReferCompletedShape|null $data
     */
    public static function with(CallReferCompleted|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallReferCompleted|CallReferCompletedShape $data
     */
    public function withData(CallReferCompleted|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
