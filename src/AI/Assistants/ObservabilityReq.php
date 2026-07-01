<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-type ObservabilityReqShape = array{
 *   host?: string|null,
 *   promptLabel?: string|null,
 *   promptName?: string|null,
 *   promptSync?: null|PromptSyncStatus|value-of<PromptSyncStatus>,
 *   promptVersion?: int|null,
 *   publicKeyRef?: string|null,
 *   secretKeyRef?: string|null,
 *   status?: null|ObservabilityStatus|value-of<ObservabilityStatus>,
 * }
 */
final class ObservabilityReq implements BaseModel
{
    /** @use SdkModel<ObservabilityReqShape> */
    use SdkModel;

    #[Optional]
    public ?string $host;

    #[Optional('prompt_label')]
    public ?string $promptLabel;

    #[Optional('prompt_name')]
    public ?string $promptName;

    /**
     * Whether to auto-publish the assistant's instructions as a Langfuse prompt.
     *
     * When ENABLED + prompt_name set, every assistant create/update pushes
     * `instructions` to Langfuse via create_prompt and stores the returned
     * version in prompt_version.
     *
     * @var value-of<PromptSyncStatus>|null $promptSync
     */
    #[Optional('prompt_sync', enum: PromptSyncStatus::class)]
    public ?string $promptSync;

    #[Optional('prompt_version')]
    public ?int $promptVersion;

    #[Optional('public_key_ref')]
    public ?string $publicKeyRef;

    #[Optional('secret_key_ref')]
    public ?string $secretKeyRef;

    /** @var value-of<ObservabilityStatus>|null $status */
    #[Optional(enum: ObservabilityStatus::class)]
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
     * @param PromptSyncStatus|value-of<PromptSyncStatus>|null $promptSync
     * @param ObservabilityStatus|value-of<ObservabilityStatus>|null $status
     */
    public static function with(
        ?string $host = null,
        ?string $promptLabel = null,
        ?string $promptName = null,
        PromptSyncStatus|string|null $promptSync = null,
        ?int $promptVersion = null,
        ?string $publicKeyRef = null,
        ?string $secretKeyRef = null,
        ObservabilityStatus|string|null $status = null,
    ): self {
        $self = new self;

        null !== $host && $self['host'] = $host;
        null !== $promptLabel && $self['promptLabel'] = $promptLabel;
        null !== $promptName && $self['promptName'] = $promptName;
        null !== $promptSync && $self['promptSync'] = $promptSync;
        null !== $promptVersion && $self['promptVersion'] = $promptVersion;
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

    public function withPromptLabel(string $promptLabel): self
    {
        $self = clone $this;
        $self['promptLabel'] = $promptLabel;

        return $self;
    }

    public function withPromptName(string $promptName): self
    {
        $self = clone $this;
        $self['promptName'] = $promptName;

        return $self;
    }

    /**
     * Whether to auto-publish the assistant's instructions as a Langfuse prompt.
     *
     * When ENABLED + prompt_name set, every assistant create/update pushes
     * `instructions` to Langfuse via create_prompt and stores the returned
     * version in prompt_version.
     *
     * @param PromptSyncStatus|value-of<PromptSyncStatus> $promptSync
     */
    public function withPromptSync(PromptSyncStatus|string $promptSync): self
    {
        $self = clone $this;
        $self['promptSync'] = $promptSync;

        return $self;
    }

    public function withPromptVersion(int $promptVersion): self
    {
        $self = clone $this;
        $self['promptVersion'] = $promptVersion;

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
     * @param ObservabilityStatus|value-of<ObservabilityStatus> $status
     */
    public function withStatus(ObservabilityStatus|string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }
}
