<?php

declare(strict_types=1);

namespace Telnyx\VoiceDesigns;

use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Concerns\SdkParams;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\VoiceDesigns\VoiceDesignCreateParams\Provider;

/**
 * Creates a new voice design (version 1) when `voice_design_id` is omitted. When `voice_design_id` is provided, adds a new version to the existing design instead. A design can have at most 50 versions.
 *
 * @see Telnyx\Services\VoiceDesignsService::create()
 *
 * @phpstan-type VoiceDesignCreateParamsShape = array{
 *   prompt: string,
 *   text: string,
 *   language?: string|null,
 *   maxNewTokens?: int|null,
 *   name?: string|null,
 *   provider?: null|Provider|value-of<Provider>,
 *   repetitionPenalty?: float|null,
 *   temperature?: float|null,
 *   topK?: int|null,
 *   topP?: float|null,
 *   voiceDesignID?: string|null,
 * }
 */
final class VoiceDesignCreateParams implements BaseModel
{
    /** @use SdkModel<VoiceDesignCreateParamsShape> */
    use SdkModel;
    use SdkParams;

    /**
     * Natural language description of the voice style, e.g. 'Speak in a warm, friendly tone with a slight British accent'.
     */
    #[Required]
    public string $prompt;

    /**
     * Sample text to synthesize for this voice design.
     */
    #[Required]
    public string $text;

    /**
     * Language for synthesis. Supported values: Auto, Chinese, English, Japanese, Korean, German, French, Russian, Portuguese, Spanish, Italian. Defaults to Auto.
     */
    #[Optional]
    public ?string $language;

    /**
     * Maximum number of tokens to generate. Default: 2048.
     */
    #[Optional('max_new_tokens')]
    public ?int $maxNewTokens;

    /**
     * Name for the voice design. Required when creating a new design (`voice_design_id` is not provided); ignored when adding a version. Cannot be a UUID.
     */
    #[Optional]
    public ?string $name;

    /**
     * Voice synthesis provider. `telnyx` uses the Qwen3TTS model; `minimax` uses the Minimax speech models. Case-insensitive. Defaults to `telnyx`.
     *
     * @var value-of<Provider>|null $provider
     */
    #[Optional(enum: Provider::class)]
    public ?string $provider;

    /**
     * Repetition penalty to reduce repeated patterns in generated audio. Default: 1.05.
     */
    #[Optional('repetition_penalty')]
    public ?float $repetitionPenalty;

    /**
     * Sampling temperature controlling randomness. Higher values produce more varied output. Default: 0.9.
     */
    #[Optional]
    public ?float $temperature;

    /**
     * Top-k sampling parameter — limits the token vocabulary considered at each step. Default: 50.
     */
    #[Optional('top_k')]
    public ?int $topK;

    /**
     * Top-p (nucleus) sampling parameter — cumulative probability cutoff for token selection. Default: 1.0.
     */
    #[Optional('top_p')]
    public ?float $topP;

    /**
     * ID of an existing voice design to add a new version to. When provided, a new version is created instead of a new design.
     */
    #[Optional('voice_design_id')]
    public ?string $voiceDesignID;

    /**
     * `new VoiceDesignCreateParams()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * VoiceDesignCreateParams::with(prompt: ..., text: ...)
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new VoiceDesignCreateParams)->withPrompt(...)->withText(...)
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
     * @param Provider|value-of<Provider>|null $provider
     */
    public static function with(
        string $prompt,
        string $text,
        ?string $language = null,
        ?int $maxNewTokens = null,
        ?string $name = null,
        Provider|string|null $provider = null,
        ?float $repetitionPenalty = null,
        ?float $temperature = null,
        ?int $topK = null,
        ?float $topP = null,
        ?string $voiceDesignID = null,
    ): self {
        $self = new self;

        $self['prompt'] = $prompt;
        $self['text'] = $text;

        null !== $language && $self['language'] = $language;
        null !== $maxNewTokens && $self['maxNewTokens'] = $maxNewTokens;
        null !== $name && $self['name'] = $name;
        null !== $provider && $self['provider'] = $provider;
        null !== $repetitionPenalty && $self['repetitionPenalty'] = $repetitionPenalty;
        null !== $temperature && $self['temperature'] = $temperature;
        null !== $topK && $self['topK'] = $topK;
        null !== $topP && $self['topP'] = $topP;
        null !== $voiceDesignID && $self['voiceDesignID'] = $voiceDesignID;

        return $self;
    }

    /**
     * Natural language description of the voice style, e.g. 'Speak in a warm, friendly tone with a slight British accent'.
     */
    public function withPrompt(string $prompt): self
    {
        $self = clone $this;
        $self['prompt'] = $prompt;

        return $self;
    }

    /**
     * Sample text to synthesize for this voice design.
     */
    public function withText(string $text): self
    {
        $self = clone $this;
        $self['text'] = $text;

        return $self;
    }

    /**
     * Language for synthesis. Supported values: Auto, Chinese, English, Japanese, Korean, German, French, Russian, Portuguese, Spanish, Italian. Defaults to Auto.
     */
    public function withLanguage(string $language): self
    {
        $self = clone $this;
        $self['language'] = $language;

        return $self;
    }

    /**
     * Maximum number of tokens to generate. Default: 2048.
     */
    public function withMaxNewTokens(int $maxNewTokens): self
    {
        $self = clone $this;
        $self['maxNewTokens'] = $maxNewTokens;

        return $self;
    }

    /**
     * Name for the voice design. Required when creating a new design (`voice_design_id` is not provided); ignored when adding a version. Cannot be a UUID.
     */
    public function withName(string $name): self
    {
        $self = clone $this;
        $self['name'] = $name;

        return $self;
    }

    /**
     * Voice synthesis provider. `telnyx` uses the Qwen3TTS model; `minimax` uses the Minimax speech models. Case-insensitive. Defaults to `telnyx`.
     *
     * @param Provider|value-of<Provider> $provider
     */
    public function withProvider(Provider|string $provider): self
    {
        $self = clone $this;
        $self['provider'] = $provider;

        return $self;
    }

    /**
     * Repetition penalty to reduce repeated patterns in generated audio. Default: 1.05.
     */
    public function withRepetitionPenalty(float $repetitionPenalty): self
    {
        $self = clone $this;
        $self['repetitionPenalty'] = $repetitionPenalty;

        return $self;
    }

    /**
     * Sampling temperature controlling randomness. Higher values produce more varied output. Default: 0.9.
     */
    public function withTemperature(float $temperature): self
    {
        $self = clone $this;
        $self['temperature'] = $temperature;

        return $self;
    }

    /**
     * Top-k sampling parameter — limits the token vocabulary considered at each step. Default: 50.
     */
    public function withTopK(int $topK): self
    {
        $self = clone $this;
        $self['topK'] = $topK;

        return $self;
    }

    /**
     * Top-p (nucleus) sampling parameter — cumulative probability cutoff for token selection. Default: 1.0.
     */
    public function withTopP(float $topP): self
    {
        $self = clone $this;
        $self['topP'] = $topP;

        return $self;
    }

    /**
     * ID of an existing voice design to add a new version to. When provided, a new version is created instead of a new design.
     */
    public function withVoiceDesignID(string $voiceDesignID): self
    {
        $self = clone $this;
        $self['voiceDesignID'] = $voiceDesignID;

        return $self;
    }
}
