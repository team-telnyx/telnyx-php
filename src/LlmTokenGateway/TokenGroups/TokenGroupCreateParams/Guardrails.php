<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\TokenGroups\TokenGroupCreateParams;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\LlmTokenGateway\TokenGroups\TokenGroupCreateParams\Guardrails\Dlp;
use Telnyx\LlmTokenGateway\TokenGroups\TokenGroupCreateParams\Guardrails\Secrets;
use Telnyx\LlmTokenGateway\TokenGroups\TokenGroupCreateParams\Guardrails\Streaming;

/**
 * Per-group guardrail policy. Missing actions default to ignore. profiles may be listed with both dlp actions ignore (staged, inactive) but a non-ignore dlp action requires at least one profile. streaming defaults to buffered when any response action is block and passthrough otherwise; passthrough with a response block is 400. Findings are codes and counts only; content is never stored. The stored form is echoed back canonicalised (all actions explicit, profiles sorted); {} is stored as an all-ignore policy, null disables.
 *
 * @phpstan-import-type DlpShape from \Telnyx\LlmTokenGateway\TokenGroups\TokenGroupCreateParams\Guardrails\Dlp
 * @phpstan-import-type SecretsShape from \Telnyx\LlmTokenGateway\TokenGroups\TokenGroupCreateParams\Guardrails\Secrets
 *
 * @phpstan-type GuardrailsShape = array{
 *   dlp?: null|Dlp|DlpShape,
 *   secrets?: null|Secrets|SecretsShape,
 *   streaming?: null|Streaming|value-of<Streaming>,
 * }
 */
final class Guardrails implements BaseModel
{
    /** @use SdkModel<GuardrailsShape> */
    use SdkModel;

    #[Optional]
    public ?Dlp $dlp;

    #[Optional]
    public ?Secrets $secrets;

    /** @var value-of<Streaming>|null $streaming */
    #[Optional(enum: Streaming::class)]
    public ?string $streaming;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param Dlp|DlpShape|null $dlp
     * @param Secrets|SecretsShape|null $secrets
     * @param Streaming|value-of<Streaming>|null $streaming
     */
    public static function with(
        Dlp|array|null $dlp = null,
        Secrets|array|null $secrets = null,
        Streaming|string|null $streaming = null,
    ): self {
        $self = new self;

        null !== $dlp && $self['dlp'] = $dlp;
        null !== $secrets && $self['secrets'] = $secrets;
        null !== $streaming && $self['streaming'] = $streaming;

        return $self;
    }

    /**
     * @param Dlp|DlpShape $dlp
     */
    public function withDlp(Dlp|array $dlp): self
    {
        $self = clone $this;
        $self['dlp'] = $dlp;

        return $self;
    }

    /**
     * @param Secrets|SecretsShape $secrets
     */
    public function withSecrets(Secrets|array $secrets): self
    {
        $self = clone $this;
        $self['secrets'] = $secrets;

        return $self;
    }

    /**
     * @param Streaming|value-of<Streaming> $streaming
     */
    public function withStreaming(Streaming|string $streaming): self
    {
        $self = clone $this;
        $self['streaming'] = $streaming;

        return $self;
    }
}
