<?php

declare(strict_types=1);

namespace Telnyx\BotChallenge;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Generates a reverse-CAPTCHA challenge used to gate the bot signup flow. A random active problem is selected from the pool; math problems are returned obfuscated (case randomization, symbol injection, spacing noise) with an unobfuscated rounding instruction appended, while string and binary problems are returned as-is. The response contains a single-use nonce, the problem text, and the current terms-and-conditions and privacy-policy URLs, which must be echoed back on the signup request. Challenges expire after a short window (10 minutes by default) and can only be answered once. This endpoint is public and unauthenticated.
 *
 * @see Telnyx\Services\BotChallengeService::create()
 *
 * @phpstan-type BotChallengeCreateParamsShape = array{
 *   llmModelName?: string|null,
 *   llmParameterCount?: string|null,
 *   llmQuantization?: string|null,
 * }
 */
final class BotChallengeCreateParams implements BaseModel
{
    /** @use SdkModel<BotChallengeCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Name of the LLM the client is using.
     */
    #[Optional('llm_model_name')]
    public ?string $llmModelName;

    /**
     * Parameter count of the client LLM.
     */
    #[Optional('llm_parameter_count')]
    public ?string $llmParameterCount;

    /**
     * Quantization of the client LLM.
     */
    #[Optional('llm_quantization')]
    public ?string $llmQuantization;

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
        ?string $llmModelName = null,
        ?string $llmParameterCount = null,
        ?string $llmQuantization = null,
    ): self {
        $self = new self;

        null !== $llmModelName && $self['llmModelName'] = $llmModelName;
        null !== $llmParameterCount && $self['llmParameterCount'] = $llmParameterCount;
        null !== $llmQuantization && $self['llmQuantization'] = $llmQuantization;

        return $self;
    }

    /**
     * Name of the LLM the client is using.
     */
    public function withLlmModelName(string $llmModelName): self
    {
        $self = clone $this;
        $self['llmModelName'] = $llmModelName;

        return $self;
    }

    /**
     * Parameter count of the client LLM.
     */
    public function withLlmParameterCount(string $llmParameterCount): self
    {
        $self = clone $this;
        $self['llmParameterCount'] = $llmParameterCount;

        return $self;
    }

    /**
     * Quantization of the client LLM.
     */
    public function withLlmQuantization(string $llmQuantization): self
    {
        $self = clone $this;
        $self['llmQuantization'] = $llmQuantization;

        return $self;
    }
}
