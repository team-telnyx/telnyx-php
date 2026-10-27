<?php

declare(strict_types=1);

namespace Telnyx\BrowserSessions\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Capture an observation (DOM snapshot) of the current page.
 *
 * @phpstan-type ObserveActionShape = array{
 *   type: 'observe', idempotencyKey?: string|null, includeObservation?: bool|null
 * }
 */
final class ObserveAction implements BaseModel
{
    /** @use SdkModel<ObserveActionShape> */
    use SdkModel;

    /** @var 'observe' $type */
    #[Required]
    public string $type = 'observe';

    #[Optional('idempotency_key')]
    public ?string $idempotencyKey;

    #[Optional('include_observation')]
    public ?bool $includeObservation;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     */
    public static function with(
        ?string $idempotencyKey = null,
        ?bool $includeObservation = null
    ): self {
        $self = new self;

        null !== $idempotencyKey && $self['idempotencyKey'] = $idempotencyKey;
        null !== $includeObservation && $self['includeObservation'] = $includeObservation;

        return $self;
    }

    /**
     * @param 'observe' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withIdempotencyKey(string $idempotencyKey): self
    {
        $self = clone $this;
        $self['idempotencyKey'] = $idempotencyKey;

        return $self;
    }

    public function withIncludeObservation(bool $includeObservation): self
    {
        $self = clone $this;
        $self['includeObservation'] = $includeObservation;

        return $self;
    }
}
