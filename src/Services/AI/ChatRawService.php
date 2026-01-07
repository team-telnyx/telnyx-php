<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\AI\Chat\ChatCreateCompletionParams;
use Telnyx\AI\Chat\ChatCreateCompletionParams\Message;
use Telnyx\AI\Chat\ChatCreateCompletionParams\ResponseFormat;
use Telnyx\AI\Chat\ChatCreateCompletionParams\ToolChoice;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Conversion\MapOf;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\ChatRawContract;

/**
 * @phpstan-import-type MessageShape from \Telnyx\AI\Chat\ChatCreateCompletionParams\Message
 * @phpstan-import-type ResponseFormatShape from \Telnyx\AI\Chat\ChatCreateCompletionParams\ResponseFormat
 * @phpstan-import-type ToolShape from \Telnyx\AI\Chat\ChatCreateCompletionParams\Tool
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ChatRawService implements ChatRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Chat with a language model. This endpoint is consistent with the [OpenAI Chat Completions API](https://platform.openai.com/docs/api-reference/chat) and may be used with the OpenAI JS or Python SDK.
     *
     * @param array{
     *   messages: list<Message|MessageShape>,
     *   apiKeyRef?: string,
     *   bestOf?: int,
     *   earlyStopping?: bool,
     *   frequencyPenalty?: float,
     *   guidedChoice?: list<string>,
     *   guidedJson?: array<string,mixed>,
     *   guidedRegex?: string,
     *   lengthPenalty?: float,
     *   logprobs?: bool,
     *   maxTokens?: int,
     *   minP?: float,
     *   model?: string,
     *   n?: float,
     *   presencePenalty?: float,
     *   responseFormat?: ResponseFormat|ResponseFormatShape,
     *   stream?: bool,
     *   temperature?: float,
     *   toolChoice?: ToolChoice|value-of<ToolChoice>,
     *   tools?: list<ToolShape>,
     *   topLogprobs?: int,
     *   topP?: float,
     *   useBeamSearch?: bool,
     * }|ChatCreateCompletionParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<array<string,mixed>>
     *
     * @throws APIException
     */
    public function createCompletion(
        array|ChatCreateCompletionParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = ChatCreateCompletionParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'ai/chat/completions',
            body: (object) $parsed,
            options: $options,
            convert: new MapOf('mixed'),
        );
    }
}
