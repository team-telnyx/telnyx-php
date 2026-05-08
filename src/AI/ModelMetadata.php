<?php

declare(strict_types=1);

namespace Telnyx\AI;

use Telnyx\AI\ModelMetadata\Tier;
use Telnyx\Core\Attributes\Optional;
use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * Metadata for a model available on Telnyx Inference. Returned by `GET /v2/ai/openai/models` (and the deprecated `GET /v2/ai/models`). Open-source models live under their Hugging Face organization (e.g. `moonshotai/Kimi-K2.6`, `zai-org/GLM-5.1-FP8`, `MiniMaxAI/MiniMax-M2.7`); fine-tuned models are owned by the Telnyx organization that trained them.
 *
 * @phpstan-type ModelMetadataShape = array{
 *   id: string,
 *   contextLength: int,
 *   created: \DateTimeInterface,
 *   languages: list<string>,
 *   license: string,
 *   organization: string,
 *   ownedBy: string,
 *   parameters: int,
 *   tier: Tier|value-of<Tier>,
 *   baseModel?: string|null,
 *   description?: string|null,
 *   isFineTunable?: bool|null,
 *   isVisionSupported?: bool|null,
 *   maxCompletionTokens?: int|null,
 *   object?: string|null,
 *   parametersStr?: string|null,
 *   pricing?: array<string,string>|null,
 *   recommendedForAssistants?: bool|null,
 *   regions?: list<string>|null,
 *   task?: string|null,
 * }
 */
final class ModelMetadata implements BaseModel
{
    /** @use SdkModel<ModelMetadataShape> */
    use SdkModel;

    /**
     * Model identifier. For open-source models, follows the `{organization}/{model_name}` convention from Hugging Face (e.g. `moonshotai/Kimi-K2.6`).
     */
    #[Required]
    public string $id;

    /**
     * Maximum total tokens (prompt + completion) supported by the model in a single request.
     */
    #[Required('context_length')]
    public int $contextLength;

    /**
     * Timestamp at which the model was registered on Telnyx Inference (ISO 8601).
     */
    #[Required]
    public \DateTimeInterface $created;

    /**
     * ISO language codes the model supports (e.g. `en`, `es`).
     *
     * @var list<string> $languages
     */
    #[Required(list: 'string')]
    public array $languages;

    /**
     * License the model is distributed under, e.g. `Apache 2.0`, `MIT`, `Llama 3 Community License`.
     */
    #[Required]
    public string $license;

    /**
     * Organization that originally published the model, matching the prefix of `id` for open-source models.
     */
    #[Required]
    public string $organization;

    /**
     * Owner of the model. `Telnyx` for Telnyx-hosted open-source models, the upstream provider name for proxied models, or the Telnyx organization id for fine-tuned models.
     */
    #[Required('owned_by')]
    public string $ownedBy;

    /**
     * Total parameter count of the model.
     */
    #[Required]
    public int $parameters;

    /**
     * Billing tier the model belongs to. Used together with `pricing` to determine cost per 1M tokens.
     *
     * @var value-of<Tier> $tier
     */
    #[Required(enum: Tier::class)]
    public string $tier;

    /**
     * Base model the fine-tuned model was trained from. Only set for fine-tuned models.
     */
    #[Optional('base_model', nullable: true)]
    public ?string $baseModel;

    /**
     * Short, human-readable summary of what the model is best suited for.
     */
    #[Optional(nullable: true)]
    public ?string $description;

    /**
     * Whether the model can be used as a base for a fine-tuning job via `POST /v2/ai/fine_tuning/jobs`.
     */
    #[Optional('is_fine_tunable')]
    public ?bool $isFineTunable;

    /**
     * Whether the model accepts image inputs in chat completions (multimodal vision support).
     */
    #[Optional('is_vision_supported')]
    public ?bool $isVisionSupported;

    /**
     * Maximum number of completion (output) tokens the model will generate per request. `null` if unconstrained beyond `context_length`.
     */
    #[Optional('max_completion_tokens', nullable: true)]
    public ?int $maxCompletionTokens;

    /**
     * Object type. Always `model`.
     */
    #[Optional]
    public ?string $object;

    /**
     * Human-readable parameter count, e.g. `1.0T`, `753.9B`, `8B`.
     */
    #[Optional('parameters_str', nullable: true)]
    public ?string $parametersStr;

    /**
     * Mapping of token kind to price in USD per 1M tokens, as a string. Typical keys are `input` and `output`; embedding models expose `embedding`. Empty object when pricing is not yet published for the model.
     *
     * @var array<string,string>|null $pricing
     */
    #[Optional(map: 'string')]
    public ?array $pricing;

    /**
     * Whether Telnyx currently recommends this model as the LLM powering a Telnyx AI Assistant.
     */
    #[Optional('recommended_for_assistants')]
    public ?bool $recommendedForAssistants;

    /**
     * Public region names where the model is currently deployed (e.g. `us-central-1`, `eu-central-1`).
     *
     * @var list<string>|null $regions
     */
    #[Optional(list: 'string')]
    public ?array $regions;

    /**
     * Primary task the model is intended for, e.g. `text-generation`, `audio-text-to-text`, `feature-extraction` (embeddings).
     */
    #[Optional]
    public ?string $task;

    /**
     * `new ModelMetadata()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * ModelMetadata::with(
     *   id: ...,
     *   contextLength: ...,
     *   created: ...,
     *   languages: ...,
     *   license: ...,
     *   organization: ...,
     *   ownedBy: ...,
     *   parameters: ...,
     *   tier: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new ModelMetadata)
     *   ->withID(...)
     *   ->withContextLength(...)
     *   ->withCreated(...)
     *   ->withLanguages(...)
     *   ->withLicense(...)
     *   ->withOrganization(...)
     *   ->withOwnedBy(...)
     *   ->withParameters(...)
     *   ->withTier(...)
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
     * @param list<string> $languages
     * @param Tier|value-of<Tier> $tier
     * @param array<string,string>|null $pricing
     * @param list<string>|null $regions
     */
    public static function with(
        string $id,
        int $contextLength,
        \DateTimeInterface $created,
        array $languages,
        string $license,
        string $organization,
        string $ownedBy,
        int $parameters,
        Tier|string $tier,
        ?string $baseModel = null,
        ?string $description = null,
        ?bool $isFineTunable = null,
        ?bool $isVisionSupported = null,
        ?int $maxCompletionTokens = null,
        ?string $object = null,
        ?string $parametersStr = null,
        ?array $pricing = null,
        ?bool $recommendedForAssistants = null,
        ?array $regions = null,
        ?string $task = null,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['contextLength'] = $contextLength;
        $self['created'] = $created;
        $self['languages'] = $languages;
        $self['license'] = $license;
        $self['organization'] = $organization;
        $self['ownedBy'] = $ownedBy;
        $self['parameters'] = $parameters;
        $self['tier'] = $tier;

        null !== $baseModel && $self['baseModel'] = $baseModel;
        null !== $description && $self['description'] = $description;
        null !== $isFineTunable && $self['isFineTunable'] = $isFineTunable;
        null !== $isVisionSupported && $self['isVisionSupported'] = $isVisionSupported;
        null !== $maxCompletionTokens && $self['maxCompletionTokens'] = $maxCompletionTokens;
        null !== $object && $self['object'] = $object;
        null !== $parametersStr && $self['parametersStr'] = $parametersStr;
        null !== $pricing && $self['pricing'] = $pricing;
        null !== $recommendedForAssistants && $self['recommendedForAssistants'] = $recommendedForAssistants;
        null !== $regions && $self['regions'] = $regions;
        null !== $task && $self['task'] = $task;

        return $self;
    }

    /**
     * Model identifier. For open-source models, follows the `{organization}/{model_name}` convention from Hugging Face (e.g. `moonshotai/Kimi-K2.6`).
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Maximum total tokens (prompt + completion) supported by the model in a single request.
     */
    public function withContextLength(int $contextLength): self
    {
        $self = clone $this;
        $self['contextLength'] = $contextLength;

        return $self;
    }

    /**
     * Timestamp at which the model was registered on Telnyx Inference (ISO 8601).
     */
    public function withCreated(\DateTimeInterface $created): self
    {
        $self = clone $this;
        $self['created'] = $created;

        return $self;
    }

    /**
     * ISO language codes the model supports (e.g. `en`, `es`).
     *
     * @param list<string> $languages
     */
    public function withLanguages(array $languages): self
    {
        $self = clone $this;
        $self['languages'] = $languages;

        return $self;
    }

    /**
     * License the model is distributed under, e.g. `Apache 2.0`, `MIT`, `Llama 3 Community License`.
     */
    public function withLicense(string $license): self
    {
        $self = clone $this;
        $self['license'] = $license;

        return $self;
    }

    /**
     * Organization that originally published the model, matching the prefix of `id` for open-source models.
     */
    public function withOrganization(string $organization): self
    {
        $self = clone $this;
        $self['organization'] = $organization;

        return $self;
    }

    /**
     * Owner of the model. `Telnyx` for Telnyx-hosted open-source models, the upstream provider name for proxied models, or the Telnyx organization id for fine-tuned models.
     */
    public function withOwnedBy(string $ownedBy): self
    {
        $self = clone $this;
        $self['ownedBy'] = $ownedBy;

        return $self;
    }

    /**
     * Total parameter count of the model.
     */
    public function withParameters(int $parameters): self
    {
        $self = clone $this;
        $self['parameters'] = $parameters;

        return $self;
    }

    /**
     * Billing tier the model belongs to. Used together with `pricing` to determine cost per 1M tokens.
     *
     * @param Tier|value-of<Tier> $tier
     */
    public function withTier(Tier|string $tier): self
    {
        $self = clone $this;
        $self['tier'] = $tier;

        return $self;
    }

    /**
     * Base model the fine-tuned model was trained from. Only set for fine-tuned models.
     */
    public function withBaseModel(?string $baseModel): self
    {
        $self = clone $this;
        $self['baseModel'] = $baseModel;

        return $self;
    }

    /**
     * Short, human-readable summary of what the model is best suited for.
     */
    public function withDescription(?string $description): self
    {
        $self = clone $this;
        $self['description'] = $description;

        return $self;
    }

    /**
     * Whether the model can be used as a base for a fine-tuning job via `POST /v2/ai/fine_tuning/jobs`.
     */
    public function withIsFineTunable(bool $isFineTunable): self
    {
        $self = clone $this;
        $self['isFineTunable'] = $isFineTunable;

        return $self;
    }

    /**
     * Whether the model accepts image inputs in chat completions (multimodal vision support).
     */
    public function withIsVisionSupported(bool $isVisionSupported): self
    {
        $self = clone $this;
        $self['isVisionSupported'] = $isVisionSupported;

        return $self;
    }

    /**
     * Maximum number of completion (output) tokens the model will generate per request. `null` if unconstrained beyond `context_length`.
     */
    public function withMaxCompletionTokens(?int $maxCompletionTokens): self
    {
        $self = clone $this;
        $self['maxCompletionTokens'] = $maxCompletionTokens;

        return $self;
    }

    /**
     * Object type. Always `model`.
     */
    public function withObject(string $object): self
    {
        $self = clone $this;
        $self['object'] = $object;

        return $self;
    }

    /**
     * Human-readable parameter count, e.g. `1.0T`, `753.9B`, `8B`.
     */
    public function withParametersStr(?string $parametersStr): self
    {
        $self = clone $this;
        $self['parametersStr'] = $parametersStr;

        return $self;
    }

    /**
     * Mapping of token kind to price in USD per 1M tokens, as a string. Typical keys are `input` and `output`; embedding models expose `embedding`. Empty object when pricing is not yet published for the model.
     *
     * @param array<string,string> $pricing
     */
    public function withPricing(array $pricing): self
    {
        $self = clone $this;
        $self['pricing'] = $pricing;

        return $self;
    }

    /**
     * Whether Telnyx currently recommends this model as the LLM powering a Telnyx AI Assistant.
     */
    public function withRecommendedForAssistants(
        bool $recommendedForAssistants
    ): self {
        $self = clone $this;
        $self['recommendedForAssistants'] = $recommendedForAssistants;

        return $self;
    }

    /**
     * Public region names where the model is currently deployed (e.g. `us-central-1`, `eu-central-1`).
     *
     * @param list<string> $regions
     */
    public function withRegions(array $regions): self
    {
        $self = clone $this;
        $self['regions'] = $regions;

        return $self;
    }

    /**
     * Primary task the model is intended for, e.g. `text-generation`, `audio-text-to-text`, `feature-extraction` (embeddings).
     */
    public function withTask(string $task): self
    {
        $self = clone $this;
        $self['task'] = $task;

        return $self;
    }
}
