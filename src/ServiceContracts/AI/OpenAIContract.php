<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\ModelsResponse;
use Telnyx\AI\OpenAI\OpenAICreateResponseParams\Reasoning;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type ReasoningShape from \Telnyx\AI\OpenAI\OpenAICreateResponseParams\Reasoning
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface OpenAIContract
{
    /**
     * @api
     *
     * @param string $conversation Optional Telnyx Conversation ID from `POST /ai/conversations`. When provided, Telnyx stores this turn on that conversation and uses the conversation's prior messages as context. Reuse the same ID for subsequent turns and tool-result followups. Omit it for a non-persisted, stateless response.
     * @param array<string,mixed> $input the input items for this turn, using the OpenAI Responses API input format
     * @param string $instructions Optional system/developer instructions for the model. When used with a persisted `conversation`, send these on the first request that creates the thread; subsequent turns can rely on the stored history.
     * @param string $model Model identifier to use for the response, for example `zai-org/GLM-5.1-FP8` or another model available from the Telnyx OpenAI-compatible models endpoint.
     * @param Reasoning|ReasoningShape $reasoning
     * @param string $serviceTier The service tier to use for this request. Supported values vary by model; use `GET /v2/ai/openai/models` and inspect the model's `service_tiers` field. If omitted, Telnyx-hosted models use `default`.
     * @param bool $stream set to `true` to stream Server-Sent Events, matching OpenAI's Responses streaming format
     * @param RequestOpts|null $requestOptions
     *
     * @return array<string,mixed>
     *
     * @throws APIException
     */
    public function createResponse(
        ?string $conversation = null,
        ?array $input = null,
        ?string $instructions = null,
        ?string $model = null,
        Reasoning|array|null $reasoning = null,
        ?string $serviceTier = null,
        ?bool $stream = null,
        RequestOptions|array|null $requestOptions = null,
    ): array;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function listModels(
        RequestOptions|array|null $requestOptions = null
    ): ModelsResponse;
}
