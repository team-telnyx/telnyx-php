<?php

declare(strict_types=1);

namespace Telnyx\Webhooks;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type CallRecordingSavedShape from \Telnyx\Webhooks\CallRecordingSaved
 *
 * @phpstan-type CallRecordingSavedWebhookEventShape = array{
 *   data?: null|CallRecordingSaved|CallRecordingSavedShape
 * }
 */
final class CallRecordingSavedWebhookEvent implements BaseModel
{
    /** @use SdkModel<CallRecordingSavedWebhookEventShape> */
    use SdkModel;

    #[Optional]
    public ?CallRecordingSaved $data;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param CallRecordingSaved|CallRecordingSavedShape|null $data
     */
    public static function with(CallRecordingSaved|array|null $data = null): self
    {
        $self = new self;

        null !== $data && $self['data'] = $data;

        return $self;
    }

    /**
     * @param CallRecordingSaved|CallRecordingSavedShape $data
     */
    public function withData(CallRecordingSaved|array $data): self
    {
        $self = clone $this;
        $self['data'] = $data;

        return $self;
    }
}
