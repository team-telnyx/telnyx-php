<?php

declare(strict_types=1);

namespace Telnyx\AgentGateways\AgentGatewayGetSpendLogsResponse;

use Telnyx\Core\Attributes\Required;
use Telnyx\Core\Concerns\SdkModel;
use Telnyx\Core\Contracts\BaseModel;

/**
 * One request the instance served.
 *
 * @phpstan-type DataShape = array{
 *   id: string,
 *   completionTokens: int,
 *   durationMs: int|null,
 *   endedAt: \DateTimeInterface|null,
 *   keyID: string|null,
 *   model: string|null,
 *   operation: string,
 *   promptTokens: int,
 *   spend: float,
 *   startedAt: \DateTimeInterface,
 *   status: string|null,
 *   teamID: string|null,
 *   totalTokens: int,
 * }
 */
final class Data implements BaseModel
{
    /** @use SdkModel<DataShape> */
    use SdkModel;

    /**
     * The request's ID.
     */
    #[Required]
    public string $id;

    /**
     * Output tokens, reasoning included.
     */
    #[Required('completion_tokens')]
    public int $completionTokens;

    /**
     * How long the request took, in milliseconds.
     */
    #[Required('duration_ms')]
    public ?int $durationMs;

    /**
     * When the request ended.
     */
    #[Required('ended_at')]
    public ?\DateTimeInterface $endedAt;

    /**
     * The key the request used.
     */
    #[Required('key_id')]
    public ?string $keyID;

    /**
     * The Telnyx Inference model that answered, such as `zai-org/GLM-5.3-Flash`. For an MCP tool request, `MCP: ` and the tool's name.
     */
    #[Required]
    public ?string $model;

    /**
     * The request type. `acompletion` is a chat completion, `aresponses` a response, `anthropic_messages` a message, `call_mcp_tool` an MCP tool request, and `list_mcp_tools` an MCP tool list.
     */
    #[Required]
    public string $operation;

    /**
     * Input tokens.
     */
    #[Required('prompt_tokens')]
    public int $promptTokens;

    /**
     * What the request cost, in USD, with its tokens at Telnyx Inference prices.
     */
    #[Required]
    public float $spend;

    /**
     * When the request started.
     */
    #[Required('started_at')]
    public \DateTimeInterface $startedAt;

    /**
     * `success` or `failure`.
     */
    #[Required]
    public ?string $status;

    /**
     * The key's team.
     */
    #[Required('team_id')]
    public ?string $teamID;

    /**
     * Input and output tokens.
     */
    #[Required('total_tokens')]
    public int $totalTokens;

    /**
     * `new Data()` is missing required properties by the API.
     *
     * To enforce required parameters use
     * ```
     * Data::with(
     *   id: ...,
     *   completionTokens: ...,
     *   durationMs: ...,
     *   endedAt: ...,
     *   keyID: ...,
     *   model: ...,
     *   operation: ...,
     *   promptTokens: ...,
     *   spend: ...,
     *   startedAt: ...,
     *   status: ...,
     *   teamID: ...,
     *   totalTokens: ...,
     * )
     * ```
     *
     * Otherwise ensure the following setters are called
     *
     * ```
     * (new Data)
     *   ->withID(...)
     *   ->withCompletionTokens(...)
     *   ->withDurationMs(...)
     *   ->withEndedAt(...)
     *   ->withKeyID(...)
     *   ->withModel(...)
     *   ->withOperation(...)
     *   ->withPromptTokens(...)
     *   ->withSpend(...)
     *   ->withStartedAt(...)
     *   ->withStatus(...)
     *   ->withTeamID(...)
     *   ->withTotalTokens(...)
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
     */
    public static function with(
        string $id,
        int $completionTokens,
        ?int $durationMs,
        ?\DateTimeInterface $endedAt,
        ?string $keyID,
        ?string $model,
        string $operation,
        int $promptTokens,
        float $spend,
        \DateTimeInterface $startedAt,
        ?string $status,
        ?string $teamID,
        int $totalTokens,
    ): self {
        $self = new self;

        $self['id'] = $id;
        $self['completionTokens'] = $completionTokens;
        $self['durationMs'] = $durationMs;
        $self['endedAt'] = $endedAt;
        $self['keyID'] = $keyID;
        $self['model'] = $model;
        $self['operation'] = $operation;
        $self['promptTokens'] = $promptTokens;
        $self['spend'] = $spend;
        $self['startedAt'] = $startedAt;
        $self['status'] = $status;
        $self['teamID'] = $teamID;
        $self['totalTokens'] = $totalTokens;

        return $self;
    }

    /**
     * The request's ID.
     */
    public function withID(string $id): self
    {
        $self = clone $this;
        $self['id'] = $id;

        return $self;
    }

    /**
     * Output tokens, reasoning included.
     */
    public function withCompletionTokens(int $completionTokens): self
    {
        $self = clone $this;
        $self['completionTokens'] = $completionTokens;

        return $self;
    }

    /**
     * How long the request took, in milliseconds.
     */
    public function withDurationMs(?int $durationMs): self
    {
        $self = clone $this;
        $self['durationMs'] = $durationMs;

        return $self;
    }

    /**
     * When the request ended.
     */
    public function withEndedAt(?\DateTimeInterface $endedAt): self
    {
        $self = clone $this;
        $self['endedAt'] = $endedAt;

        return $self;
    }

    /**
     * The key the request used.
     */
    public function withKeyID(?string $keyID): self
    {
        $self = clone $this;
        $self['keyID'] = $keyID;

        return $self;
    }

    /**
     * The Telnyx Inference model that answered, such as `zai-org/GLM-5.3-Flash`. For an MCP tool request, `MCP: ` and the tool's name.
     */
    public function withModel(?string $model): self
    {
        $self = clone $this;
        $self['model'] = $model;

        return $self;
    }

    /**
     * The request type. `acompletion` is a chat completion, `aresponses` a response, `anthropic_messages` a message, `call_mcp_tool` an MCP tool request, and `list_mcp_tools` an MCP tool list.
     */
    public function withOperation(string $operation): self
    {
        $self = clone $this;
        $self['operation'] = $operation;

        return $self;
    }

    /**
     * Input tokens.
     */
    public function withPromptTokens(int $promptTokens): self
    {
        $self = clone $this;
        $self['promptTokens'] = $promptTokens;

        return $self;
    }

    /**
     * What the request cost, in USD, with its tokens at Telnyx Inference prices.
     */
    public function withSpend(float $spend): self
    {
        $self = clone $this;
        $self['spend'] = $spend;

        return $self;
    }

    /**
     * When the request started.
     */
    public function withStartedAt(\DateTimeInterface $startedAt): self
    {
        $self = clone $this;
        $self['startedAt'] = $startedAt;

        return $self;
    }

    /**
     * `success` or `failure`.
     */
    public function withStatus(?string $status): self
    {
        $self = clone $this;
        $self['status'] = $status;

        return $self;
    }

    /**
     * The key's team.
     */
    public function withTeamID(?string $teamID): self
    {
        $self = clone $this;
        $self['teamID'] = $teamID;

        return $self;
    }

    /**
     * Input and output tokens.
     */
    public function withTotalTokens(int $totalTokens): self
    {
        $self = clone $this;
        $self['totalTokens'] = $totalTokens;

        return $self;
    }
}
