<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Assistants;

use Telnyx\AI\Assistants\Instructions\InstructionEnhanceParams;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Assistants\InstructionsRawContract;

/**
 * Configure AI assistant specifications.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class InstructionsRawService implements InstructionsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Enhance an assistant's instructions using an LLM. The endpoint reads the assistant's current instructions and tools, then streams back improved instructions as they are generated.
     *
     * Optionally provide an `enhancement_prompt` to steer the changes (for example, "make the instructions more concise" or "add error handling guidance"). When omitted, the assistant's existing instructions are used as the basis for the enhancement.
     *
     * The enhancement focuses on tool-calling reliability, clarity and precision, completeness and error handling, tool schema alignment, and conversation flow structure.
     *
     * The response is streamed as `text/plain` using chunked transfer encoding; consume the body incrementally to render the enhanced instructions as they arrive.
     *
     * @param string $assistantID unique identifier of the assistant
     * @param array{
     *   enhancementPrompt?: string|null, instructions?: string|null
     * }|InstructionEnhanceParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function enhance(
        string $assistantID,
        array|InstructionEnhanceParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = InstructionEnhanceParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['ai/assistants/%1$s/instructions/enhance', $assistantID],
            headers: ['Accept' => 'text/plain'],
            body: (object) $parsed,
            options: $options,
            convert: 'string',
        );
    }
}
