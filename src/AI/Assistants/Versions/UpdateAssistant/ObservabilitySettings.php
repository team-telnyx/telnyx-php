<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants\Versions\UpdateAssistant;

use Telnyx\AI\Assistants\Versions\UpdateAssistant\ObservabilitySettings\Status;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ObservabilitySettingsShape = array{
 *   host?: string|null,
 *   publicKeyRef?: string|null,
 *   secretKeyRef?: string|null,
 *   status?: null|Status|value-of<Status>,
 * }
 */
final class ObservabilitySettings implements BaseModel
{
    /** @use SdkModel<ObservabilitySettingsShape> */
    use SdkModel;

    #[Optional]
    public ?string $host;

    #[Optional('public_key_ref')]
    public ?string $publicKeyRef;

    #[Optional('secret_key_ref')]
    public ?string $secretKeyRef;

    /** @var value-of<Status>|null $status */
    #[Optional(enum: Status::class)]
    public ?string $status;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Status|value-of<Status>|null $status
     */
    public static function with(
        ?string $host = null,
        ?string $publicKeyRef = null,
        ?string $secretKeyRef = null,
        Status|string|null $status = null,
    ): self {
        $self = new self;

        null !== $host && $self['host'] = $host;
        null !== $publicKeyRef && $self['publicKeyRef'] = $publicKeyRef;
        null !== $secretKeyRef && $self['secretKeyRef'] = $secretKeyRef;
        null !== $status && $self['status'] = $status;

        return $self;
    }

    public function withHost(string $host): self
    {
        $self = clone $this;
        $self['host'] = $host;

        return $self;
    }

    public function withPublicKeyRef(string $publicKeyRef): self
    {
        $self = clone $this;
        $self['publicKeyRef'] = $publicKeyRef;

        return $self;
    }

    public function withSecretKeyRef(string $secretKeyRef): self
    {
        $self = clone $this;
        $self['secretKeyRef'] = $secretKeyRef;

        return $self;
    }

    /**
     * @param Status|value-of<Status> $status
     */
    public function withStatus(Status|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
