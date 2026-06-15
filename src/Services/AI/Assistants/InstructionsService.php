<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Assistants;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Assistants\InstructionsContract;

/**
 * Configure AI assistant specifications.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class InstructionsService implements InstructionsContract
{
    /**
     * @api
     */
    public InstructionsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new InstructionsRawService($client);
    }

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
     * @param string|null $enhancementPrompt Optional guidance describing how the instructions should be enhanced. When provided, the LLM applies these requested changes in addition to fixing any identified issues.
     * @param string|null $instructions The instructions to enhance. When omitted, the assistant's existing instructions are used.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function enhance(
        string $assistantID,
        ?string $enhancementPrompt = null,
        ?string $instructions = null,
        RequestOptions|array|null $requestOptions = null,
    ): string {
        $params = Util::removeNulls(
            [
                'enhancementPrompt' => $enhancementPrompt,
                'instructions' => $instructions,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->enhance($assistantID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
