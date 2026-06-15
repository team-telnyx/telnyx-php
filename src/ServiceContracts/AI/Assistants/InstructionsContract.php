<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface InstructionsContract
{
    /**
     * @api
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
    ): string;
}
