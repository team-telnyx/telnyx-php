<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Anthropic;

use Telnyx\AI\Anthropic\V1\V1MessagesParams;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Conversion\MapOf;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Anthropic\V1RawContract;

/**
 * @phpstan-import-type SystemShape from \Telnyx\AI\Anthropic\V1\V1MessagesParams\System
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class V1RawService implements V1RawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Send a message to a language model using the Anthropic Messages API format. This endpoint is compatible with the [Anthropic Messages API](https://docs.anthropic.com/en/api/messages) and may be used with the Anthropic JS or Python SDK by setting the base URL to `https://api.telnyx.com/v2/ai/anthropic`.
     *
     * The endpoint translates Anthropic-format requests into Telnyx's inference internals, then translates the response back to the Anthropic message shape. Streaming responses use Anthropic SSE event types (`message_start`, `content_block_start`, `content_block_delta`, `content_block_stop`, `message_delta`, `message_stop`).
     *
     * @param array{
     *   maxTokens: int,
     *   messages: list<array<string,mixed>>,
     *   model: string,
     *   apiKeyRef?: string,
     *   billingGroupID?: string,
     *   fallbackConfig?: array<string,mixed>,
     *   maxRetries?: int,
     *   mcpServers?: list<array<string,mixed>>,
     *   metadata?: array<string,mixed>,
     *   serviceTier?: string,
     *   stopSequences?: list<string>,
     *   stream?: bool,
     *   system?: SystemShape,
     *   temperature?: float,
     *   thinking?: array<string,mixed>,
     *   timeout?: float,
     *   toolChoice?: array<string,mixed>,
     *   tools?: list<array<string,mixed>>,
     *   topK?: int,
     *   topP?: float,
     * }|V1MessagesParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<array<string,mixed>>
     *
     * @throws APIException
     */
    public function messages(
        array|V1MessagesParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = V1MessagesParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'ai/anthropic/v1/messages',
            body: (object) $parsed,
            options: $options,
            convert: new MapOf('mixed'),
        );
    }
}
