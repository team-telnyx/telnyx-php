<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI;

use Telnyx\AI\ModelsResponse;
use Telnyx\AI\OpenAI\OpenAICreateResponseParams\Mode;
use Telnyx\AI\OpenAI\OpenAICreateResponseParams\Reasoning;
use Telnyx\AI\OpenAI\OpenAICreateResponseParams\Region;
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
     * @param Mode|value-of<Mode> $mode How strictly `region` is applied. `preferred` (the default when `region` is set) tries that region first and falls back to another when the model cannot be served there, so a request that would have succeeded still succeeds. `strict` pins the request: it is served from that region or it fails with a 422, never redirected to another region. Requires `region`.
     * @param string $model Model identifier to use for the response, for example `zai-org/GLM-5.1-FP8` or another model available from the Telnyx OpenAI-compatible models endpoint.
     * @param Reasoning|ReasoningShape $reasoning
     * @param Region|value-of<Region> $region Optional data-residency region the request should be served from, using the same vocabulary as your account's Data Locality setting. Behavior depends on `mode`. Supported for Telnyx-hosted models only: a request routed to an external provider never passes through Telnyx model routing, so a region cannot be enforced for it. Omit for today's latency-based routing.
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
        Mode|string $mode = 'preferred',
        ?string $model = null,
        Reasoning|array|null $reasoning = null,
        Region|string|null $region = null,
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
