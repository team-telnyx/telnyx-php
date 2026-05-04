<?php

declare(strict_types=1);

namespace Telnyx\AI\Assistants;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * @phpstan-import-type ExternalLlmReqShape from \Telnyx\AI\Assistants\ExternalLlmReq
 *
 * @phpstan-type FallbackConfigReqShape = array{
 *   externalLlm?: null|ExternalLlmReq|ExternalLlmReqShape,
 *   llmAPIKeyRef?: string|null,
 *   model?: string|null,
 * }
 */
final class FallbackConfigReq implements BaseModel
{
    /** @use SdkModel<FallbackConfigReqShape> */
    use SdkModel;

    #[Optional('external_llm')]
    public ?ExternalLlmReq $externalLlm;

    /**
     * Integration secret identifier for the fallback model API key.
     */
    #[Optional('llm_api_key_ref')]
    public ?string $llmAPIKeyRef;

    /**
     * Fallback Telnyx-hosted model to use when the primary LLM provider is unavailable.
     */
    #[Optional]
    public ?string $model;

    public function __construct()
    {
        $this->initialize();
    }

    /**
     * Construct an instance from the required parameters.
     *
     * You must use named parameters to construct any parameters with a default value.
     *
     * @param ExternalLlmReq|ExternalLlmReqShape|null $externalLlm
     */
    public static function with(
        ExternalLlmReq|array|null $externalLlm = null,
        ?string $llmAPIKeyRef = null,
        ?string $model = null,
    ): self {
        $self = new self;

        null !== $externalLlm && $self['externalLlm'] = $externalLlm;
        null !== $llmAPIKeyRef && $self['llmAPIKeyRef'] = $llmAPIKeyRef;
        null !== $model && $self['model'] = $model;

        return $self;
    }

    /**
     * @param ExternalLlmReq|ExternalLlmReqShape $externalLlm
     */
    public function withExternalLlm(ExternalLlmReq|array $externalLlm): self
    {
        $self = clone $this;
        $self['externalLlm'] = $externalLlm;

        return $self;
    }

    /**
     * Integration secret identifier for the fallback model API key.
     */
    public function withLlmAPIKeyRef(string $llmAPIKeyRef): self
    {
        $self = clone $this;
        $self['llmAPIKeyRef'] = $llmAPIKeyRef;

        return $self;
    }

    /**
     * Fallback Telnyx-hosted model to use when the primary LLM provider is unavailable.
     */
    public function withModel(string $model): self
    {
        $self = clone $this;
        $self['model'] = $model;

        return $self;
    }
}
