<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Clone an existing assistant, excluding telephony and messaging settings.
 *
 * @see Telnyx\Services\AI\AssistantsService::clone()
 *
 * @phpstan-type AssistantCloneParamsShape = array{idempotencyKey?: string|null}
 */
final class AssistantCloneParams implements BaseModel
{
    /** @use SdkModel<AssistantCloneParamsShape> */
    use SdkModel;
    use SdkParams;

    #[Optional]
    public ?string $idempotencyKey;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(?string $idempotencyKey = null): self
    {
        $self = new self;

        null !== $idempotencyKey && $self['idempotencyKey'] = $idempotencyKey;

        return $self;
    }

    public function withIdempotencyKey(string $idempotencyKey): self
    {
        $self = clone $this;
        $self['idempotencyKey'] = $idempotencyKey;

        return $self;
    }
}
