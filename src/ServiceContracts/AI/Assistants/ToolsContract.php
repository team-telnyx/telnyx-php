<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants;

use Telnyx\AI\Assistants\Tools\ToolTestResponse;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\RequestOptions;

use const Telnyx\Core\OMIT as omit;

interface ToolsContract
{
    /**
     * @api
     *
     * @param string $assistantID
     * @param array<string,
     * mixed,> $arguments Key-value arguments to use for the webhook test
     * @param array<string,
     * mixed,> $dynamicVariables Key-value dynamic variables to use for the webhook test
     *
     * @return ToolTestResponse<HasRawResponse>
     */
    public function test(
        string $toolID,
        $assistantID,
        $arguments = omit,
        $dynamicVariables = omit,
        ?RequestOptions $requestOptions = null,
    ): ToolTestResponse;
}
