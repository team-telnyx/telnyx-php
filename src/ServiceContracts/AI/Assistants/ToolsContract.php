<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants;

use Telnyx\AI\Assistants\Tools\ToolTestResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface ToolsContract
{
    /**
     * @api
     *
     * @param string $toolID Path param
     * @param string $assistantID Path param
     * @param array<string,mixed> $arguments Body param: Key-value arguments to use for the webhook test
     * @param array<string,mixed> $dynamicVariables Body param: Key-value dynamic variables to use for the webhook test
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function test(
        string $toolID,
        string $assistantID,
        ?array $arguments = null,
        ?array $dynamicVariables = null,
        RequestOptions|array|null $requestOptions = null,
    ): ToolTestResponse;
}
