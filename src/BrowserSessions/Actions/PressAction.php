<?php

declare(strict_types=1);

namespace Telnyx\BrowserSessions\Actions;

use Telnyx\BrowserSessions\Actions\PressAction\Key;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Press a keyboard key.
 *
 * @phpstan-type PressActionShape = array{
 *   key: Key|value-of<Key>,
 *   type: 'press',
 *   idempotencyKey?: string|null,
 *   includeObservation?: bool|null,
 * }
 */
final class PressAction implements BaseModel
{
    /** @use SdkModel<PressActionShape> */
    use SdkModel;

    /** @var 'press' $type */
    #[Required]
    public string $type = 'press';

    /** @var value-of<Key> $key */
    #[Required(enum: Key::class)]
    public string $key;

    #[Optional('idempotency_key')]
    public ?string $idempotencyKey;

    #[Optional('include_observation')]
    public ?bool $includeObservation;

    /**
     * `new PressAction()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * PressAction::with(key: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new PressAction)->withKey(...)
     * ```
     */
    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Key|value-of<Key> $key
     */
    public static function with(
        Key|string $key,
        ?string $idempotencyKey = null,
        ?bool $includeObservation = null,
    ): self {
        $self = new self;

        $self['key'] = $key;

        null !== $idempotencyKey && $self['idempotencyKey'] = $idempotencyKey;
        null !== $includeObservation && $self['includeObservation'] = $includeObservation;

        return $self;
    }

    /**
     * @param Key|value-of<Key> $key
     */
    public function withKey(Key|string $key): self
    {
        $self = clone $this;
        $self['key'] = $key;

        return $self;
    }

    /**
     * @param 'press' $type
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
