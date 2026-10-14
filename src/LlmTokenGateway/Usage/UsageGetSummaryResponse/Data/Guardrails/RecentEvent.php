<?php

declare(strict_types=1);

namespace Telnyx\LlmTokenGateway\Usage\UsageGetSummaryResponse\Data\Guardrails;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;
use Telnyx\LlmTokenGateway\Usage\GuardrailFinding;
use Telnyx\LlmTokenGateway\Usage\UsageGetSummaryResponse\Data\Guardrails\RecentEvent\Metadata;
use Telnyx\LlmTokenGateway\Usage\UsageGetSummaryResponse\Data\Guardrails\RecentEvent\Outcome;
use Telnyx\LlmTokenGateway\Usage\UsageGetSummaryResponse\Data\Guardrails\RecentEvent\Stage;

/**
 * @phpstan-import-type MetadataVariants from \Telnyx\LlmTokenGateway\Usage\UsageGetSummaryResponse\Data\Guardrails\RecentEvent\Metadata
 * @phpstan-import-type GuardrailFindingShape from \Telnyx\LlmTokenGateway\Usage\GuardrailFinding
 * @phpstan-import-type MetadataShape from \Telnyx\LlmTokenGateway\Usage\UsageGetSummaryResponse\Data\Guardrails\RecentEvent\Metadata
 *
 * @phpstan-type RecentEventShape = array{
 *   id: string,
 *   createdAt: \DateTimeInterface,
 *   endUserID: string|null,
 *   evaluationInputTokens: int|null,
 *   evaluationOutputTokens: int|null,
 *   findings: list<GuardrailFinding|GuardrailFindingShape>,
 *   metadata: array<string,MetadataShape>,
 *   model: string,
 *   outcome: Outcome|value-of<Outcome>,
 *   recordType: 'guardrail_event',
 *   requestID: string,
 *   stage: Stage|value-of<Stage>,
 *   tokenGroupID: string,
 *   tokenKeyID: string,
 *   tokenUserID: string|null,
 * }
 */
final class RecentEvent implements BaseModel
{
    /** @use SdkModel<RecentEventShape> */
    use SdkModel;

    /** @var 'guardrail_event' $recordType */
    #[Required('record_type')]
    public string $recordType = 'guardrail_event';

    #[Required]
    public string $id;

    #[Required('created_at')]
    public \DateTimeInterface $createdAt;

    #[Required('end_user_id')]
    public ?string $endUserID;

    #[Required('evaluation_input_tokens')]
    public ?int $evaluationInputTokens;

    #[Required('evaluation_output_tokens')]
    public ?int $evaluationOutputTokens;

    /** @var list<GuardrailFinding> $findings */
    #[Required(list: GuardrailFinding::class)]
    public array $findings;

    /**
     * Customer request tags from the x-ltg-metadata header: up to 5 entries. Keys are case-sensitive; keys starting with ltg_, telnyx_, litellm_ or cf_ (any case) are reserved. Values are strings (1-256 characters, no control or format characters), integers within +/-9007199254740991, or booleans; floats, null, objects and arrays are rejected. Values that look like credentials are rejected. Tags are attribution only: never forwarded upstream, never part of the response cache key, never used for budgets or routing. An untagged request reports {}.
     *
     * @var array<string,MetadataVariants> $metadata
     */
    #[Required(map: Metadata::class)]
    public array $metadata;

    #[Required]
    public string $model;

    /** @var value-of<Outcome> $outcome */
    #[Required(enum: Outcome::class)]
    public string $outcome;

    #[Required('request_id')]
    public string $requestID;

    /** @var value-of<Stage> $stage */
    #[Required(enum: Stage::class)]
    public string $stage;

    #[Required('token_group_id')]
    public string $tokenGroupID;

    #[Required('token_key_id')]
    public string $tokenKeyID;

    #[Required('token_user_id')]
    public ?string $tokenUserID;

    /**
     * `new RecentEvent()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * RecentEvent::with(
     *   id: ...,
     *   createdAt: ...,
     *   endUserID: ...,
     *   evaluationInputTokens: ...,
     *   evaluationOutputTokens: ...,
     *   findings: ...,
     *   metadata: ...,
     *   model: ...,
     *   outcome: ...,
     *   requestID: ...,
     *   stage: ...,
     *   tokenGroupID: ...,
     *   tokenKeyID: ...,
     *   tokenUserID: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new RecentEvent)
     *   ->withID(...)
     *   ->withCreatedAt(...)
     *   ->withEndUserID(...)
     *   ->withEvaluationInputTokens(...)
     *   ->withEvaluationOutputTokens(...)
     *   ->withFindings(...)
     *   ->withMetadata(...)
     *   ->withModel(...)
     *   ->withOutcome(...)
     *   ->withRequestID(...)
     *   ->withStage(...)
     *   ->withTokenGroupID(...)
     *   ->withTokenKeyID(...)
     *   ->withTokenUserID(...)
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
     * @param list<GuardrailFinding|GuardrailFindingShape> $findings
     * @param array<string,MetadataShape> $metadata
     * @param Outcome|value-of<Outcome> $outcome
     * @param Stage|value-of<Stage> $stage
     */
    public static function with(
        string $id,
        \DateTimeInterface $createdAt,
        ?string $endUserID,
        ?int $evaluationInputTokens,
        ?int $evaluationOutputTokens,
        array $findings,
        array $metadata,
        string $model,
        Outcome|string $outcome,
        string $requestID,
        Stage|string $stage,
        string $tokenGroupID,
        string $tokenKeyID,
        ?string $tokenUserID,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['createdAt'] = $createdAt;
        $self['endUserID'] = $endUserID;
        $self['evaluationInputTokens'] = $evaluationInputTokens;
        $self['evaluationOutputTokens'] = $evaluationOutputTokens;
        $self['findings'] = $findings;
        $self['metadata'] = $metadata;
        $self['model'] = $model;
        $self['outcome'] = $outcome;
        $self['requestID'] = $requestID;
        $self['stage'] = $stage;
        $self['tokenGroupID'] = $tokenGroupID;
        $self['tokenKeyID'] = $tokenKeyID;
        $self['tokenUserID'] = $tokenUserID;

        return $self;
    }

    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    public function withCreatedAt(\DateTimeInterface $createdAt): self
    {
        $self = clone $this;
        $self['createdAt'] = $createdAt;

        return $self;
    }

    public function withEndUserID(?string $endUserID): self
    {
        $self = clone $this;
        $self['endUserID'] = $endUserID;

        return $self;
    }

    public function withEvaluationInputTokens(?int $evaluationInputTokens): self
    {
        $self = clone $this;
        $self['evaluationInputTokens'] = $evaluationInputTokens;

        return $self;
    }

    public function withEvaluationOutputTokens(
        ?int $evaluationOutputTokens
    ): self {
        $self = clone $this;
        $self['evaluationOutputTokens'] = $evaluationOutputTokens;

        return $self;
    }

    /**
     * @param list<GuardrailFinding|GuardrailFindingShape> $findings
     */
    public function withFindings(array $findings): self
    {
        $self = clone $this;
        $self['findings'] = $findings;

        return $self;
    }

    /**
     * Customer request tags from the x-ltg-metadata header: up to 5 entries. Keys are case-sensitive; keys starting with ltg_, telnyx_, litellm_ or cf_ (any case) are reserved. Values are strings (1-256 characters, no control or format characters), integers within +/-9007199254740991, or booleans; floats, null, objects and arrays are rejected. Values that look like credentials are rejected. Tags are attribution only: never forwarded upstream, never part of the response cache key, never used for budgets or routing. An untagged request reports {}.
     *
     * @param array<string,MetadataShape> $metadata
     */
    public function withMetadata(array $metadata): self
    {
        $self = clone $this;
        $self['metadata'] = $metadata;

        return $self;
    }

    public function withModel(string $model): self
    {
        $self = clone $this;
        $self['model'] = $model;

        return $self;
    }

    /**
     * @param Outcome|value-of<Outcome> $outcome
     */
    public function withOutcome(Outcome|string $outcome): self
    {
        $self = clone $this;
        $self['outcome'] = $outcome;

        return $self;
    }

    /**
     * @param 'guardrail_event' $recordType
     */
    public function withRecordType(string $recordType): self
    {
        $self = clone $this;
        $self['recordType'] = $recordType;

        return $self;
    }

    public function withRequestID(string $requestID): self
    {
        $self = clone $this;
        $self['requestID'] = $requestID;

        return $self;
    }

    /**
     * @param Stage|value-of<Stage> $stage
     */
    public function withStage(Stage|string $stage): self
    {
        $self = clone $this;
        $self['stage'] = $stage;

        return $self;
    }

    public function withTokenGroupID(string $tokenGroupID): self
    {
        $self = clone $this;
        $self['tokenGroupID'] = $tokenGroupID;

        return $self;
    }

    public function withTokenKeyID(string $tokenKeyID): self
    {
        $self = clone $this;
        $self['tokenKeyID'] = $tokenKeyID;

        return $self;
    }

    public function withTokenUserID(?string $tokenUserID): self
    {
        $self = clone $this;
        $self['tokenUserID'] = $tokenUserID;

        return $self;
    }
}
