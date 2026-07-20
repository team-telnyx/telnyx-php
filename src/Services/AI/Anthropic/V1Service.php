<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Anthropic;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Anthropic\V1Contract;

/**
 * @phpstan-import-type SystemShape from \Telnyx\AI\Anthropic\V1\V1MessagesParams\System
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class V1Service implements V1Contract
{
    /**
     * @api
     */
    public V1RawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new V1RawService($client);
    }

    /**
     * @api
     *
     * Send a message to a language model using the Anthropic Messages API format. This endpoint is compatible with the [Anthropic Messages API](https://docs.anthropic.com/en/api/messages) and may be used with the Anthropic JS or Python SDK by setting the base URL to `https://api.telnyx.com/v2/ai/anthropic`.
     *
     * The endpoint translates Anthropic-format requests into Telnyx's inference internals, then translates the response back to the Anthropic message shape. Streaming responses use Anthropic SSE event types (`message_start`, `content_block_start`, `content_block_delta`, `content_block_stop`, `message_delta`, `message_stop`).
     *
     * @param int $maxTokens the maximum number of tokens to generate in the response
     * @param list<array<string,mixed>> $messages The messages to send to the model, following the [Anthropic Messages API](https://docs.anthropic.com/en/api/messages) format.
     * @param string $model The model to use for generating the response, for example `zai-org/GLM-5.2` or another model available from the Telnyx models endpoint.
     * @param string $apiKeyRef If you are using an external inference provider, this field allows you to pass along a reference to your API key. After creating an [integration secret](https://developers.telnyx.com/api-reference/integration-secrets/create-a-secret) for your API key, pass the secret's `identifier` in this field.
     * @param string $billingGroupID the billing group ID to associate with this request
     * @param array<string,mixed> $fallbackConfig configuration for model fallback behavior when the primary model is unavailable
     * @param int $maxRetries maximum number of retries for the request
     * @param list<array<string,mixed>> $mcpServers list of MCP (Model Context Protocol) servers to make available to the model
     * @param array<string,mixed> $metadata an object describing metadata about the request
     * @param string $serviceTier service tier for the request
     * @param list<string> $stopSequences custom sequences that will cause the model to stop generating
     * @param bool $stream whether to stream the response as Anthropic-format Server-Sent Events
     * @param SystemShape $system System prompt. Can be a string or an array of content blocks following the Anthropic API format.
     * @param float $temperature Amount of randomness injected into the response. Ranges from 0 to 1.
     * @param array<string,mixed> $thinking Extended thinking configuration for models that support it. Set `type` to `enabled` to turn on extended thinking.
     * @param float $timeout request timeout in seconds
     * @param array<string,mixed> $toolChoice controls how the model uses tools, following the Anthropic API format
     * @param list<array<string,mixed>> $tools definitions of tools that the model may use, following the Anthropic API format
     * @param int $topK Top-k sampling parameter. Only sample from the top K options for each subsequent token.
     * @param float $topP Nucleus sampling parameter. Use temperature or top_p, but not both.
     * @param RequestOpts|null $requestOptions
     *
     * @return array<string,mixed>
     *
     * @throws APIException
     */
    public function messages(
        int $maxTokens,
        array $messages,
        string $model,
        ?string $apiKeyRef = null,
        ?string $billingGroupID = null,
        ?array $fallbackConfig = null,
        ?int $maxRetries = null,
        ?array $mcpServers = null,
        ?array $metadata = null,
        ?string $serviceTier = null,
        ?array $stopSequences = null,
        bool $stream = false,
        string|array|null $system = null,
        ?float $temperature = null,
        ?array $thinking = null,
        float $timeout = 300,
        ?array $toolChoice = null,
        ?array $tools = null,
        ?int $topK = null,
        ?float $topP = null,
        RequestOptions|array|null $requestOptions = null,
    ): array {
        $params = Util::removeNulls(
            [
                'maxTokens' => $maxTokens,
                'messages' => $messages,
                'model' => $model,
                'apiKeyRef' => $apiKeyRef,
                'billingGroupID' => $billingGroupID,
                'fallbackConfig' => $fallbackConfig,
                'maxRetries' => $maxRetries,
                'mcpServers' => $mcpServers,
                'metadata' => $metadata,
                'serviceTier' => $serviceTier,
                'stopSequences' => $stopSequences,
                'stream' => $stream,
                'system' => $system,
                'temperature' => $temperature,
                'thinking' => $thinking,
                'timeout' => $timeout,
                'toolChoice' => $toolChoice,
                'tools' => $tools,
                'topK' => $topK,
                'topP' => $topP,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->messages(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
