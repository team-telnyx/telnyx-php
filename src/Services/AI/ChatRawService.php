<?php

declare(strict_types=1);

namespace Telnyx\Services\AI;

use Telnyx\AI\Chat\ChatCreateCompletionParams;
use Telnyx\AI\Chat\ChatCreateCompletionParams\Message\Role;
use Telnyx\AI\Chat\ChatCreateCompletionParams\ResponseFormat\Type;
use Telnyx\AI\Chat\ChatCreateCompletionParams\ToolChoice;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Conversion\MapOf;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\ChatRawContract;

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
     *   messages: list<array{
     *     content: string|list<array<string,mixed>>,
     *     role: 'system'|'user'|'assistant'|'tool'|Role,
     *   }>,
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
     *   responseFormat?: array{type: 'text'|'json_object'|Type},
     *   stream?: bool,
     *   temperature?: float,
     *   toolChoice?: 'none'|'auto'|'required'|ToolChoice,
     *   tools?: list<array<string,mixed>>,
     *   topLogprobs?: int,
     *   topP?: float,
     *   useBeamSearch?: bool,
     * }|ChatCreateCompletionParams $params
     *
     * @return BaseResponse<array<string,mixed>>
     *
     * @throws APIException
     */
    public function createCompletion(
        array|ChatCreateCompletionParams $params,
        ?RequestOptions $requestOptions = null,
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
