<?php

declare(strict_types=1);

namespace Telnyx\BrowserSessions\Actions;

use Telnyx\BrowserSessions\Actions\NavigateAction\WaitUntil;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Navigate to a URL.
 *
 * @phpstan-type NavigateActionShape = array{
 *   type: 'navigate',
 *   url: string,
 *   idempotencyKey?: string|null,
 *   includeObservation?: bool|null,
 *   waitUntil?: null|WaitUntil|value-of<WaitUntil>,
 * }
 */
final class NavigateAction implements BaseModel
{
    /** @use SdkModel<NavigateActionShape> */
    use SdkModel;

    /** @var 'navigate' $type */
    #[Required]
    public string $type = 'navigate';

    #[Required]
    public string $url;

    #[Optional('idempotency_key')]
    public ?string $idempotencyKey;

    #[Optional('include_observation')]
    public ?bool $includeObservation;

    /** @var value-of<WaitUntil>|null $waitUntil */
    #[Optional('wait_until', enum: WaitUntil::class)]
    public ?string $waitUntil;

    /**
     * `new NavigateAction()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * NavigateAction::with(url: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new NavigateAction)->withURL(...)
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
     * @param WaitUntil|value-of<WaitUntil>|null $waitUntil
     */
    public static function with(
        string $url,
        ?string $idempotencyKey = null,
        ?bool $includeObservation = null,
        WaitUntil|string|null $waitUntil = null,
    ): self {
        $self = new self;

        $self['url'] = $url;

        null !== $idempotencyKey && $self['idempotencyKey'] = $idempotencyKey;
        null !== $includeObservation && $self['includeObservation'] = $includeObservation;
        null !== $waitUntil && $self['waitUntil'] = $waitUntil;

        return $self;
    }

    /**
     * @param 'navigate' $type
     */
    public function withType(string $type): self
    {
        $self = clone $this;
        $self['type'] = $type;

        return $self;
    }

    public function withURL(string $url): self
    {
        $self = clone $this;
        $self['url'] = $url;

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

    /**
     * @param WaitUntil|value-of<WaitUntil> $waitUntil
     */
    public function withWaitUntil(WaitUntil|string $waitUntil): self
    {
        $self = clone $this;
        $self['waitUntil'] = $waitUntil;

        return $self;
    }
}
