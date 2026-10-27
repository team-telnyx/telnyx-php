<?php

declare(strict_types=1);

namespace Telnyx\BrowserSessions\Actions;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Scroll the page.
 *
 * @phpstan-type ScrollActionShape = array{
 *   type: 'scroll',
 *   deltaX?: int|null,
 *   deltaY?: int|null,
 *   idempotencyKey?: string|null,
 *   includeObservation?: bool|null,
 * }
 */
final class ScrollAction implements BaseModel
{
    /** @use SdkModel<ScrollActionShape> */
    use SdkModel;

    /** @var 'scroll' $type */
    #[Required]
    public string $type = 'scroll';

    #[Optional('delta_x')]
    public ?int $deltaX;

    #[Optional('delta_y')]
    public ?int $deltaY;

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
        ?int $deltaX = null,
        ?int $deltaY = null,
        ?string $idempotencyKey = null,
        ?bool $includeObservation = null,
    ): self {
        $self = new self;

        null !== $deltaX && $self['deltaX'] = $deltaX;
        null !== $deltaY && $self['deltaY'] = $deltaY;
        null !== $idempotencyKey && $self['idempotencyKey'] = $idempotencyKey;
        null !== $includeObservation && $self['includeObservation'] = $includeObservation;

        return $self;
    }

    /**
     * @param 'scroll' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withDeltaX(int $deltaX): self
    {
        $self = clone $this;
        $self['deltaX'] = $deltaX;

        return $self;
    }

    public function withDeltaY(int $deltaY): self
    {
        $self = clone $this;
        $self['deltaY'] = $deltaY;

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
