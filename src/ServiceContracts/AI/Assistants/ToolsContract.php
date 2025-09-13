<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants;

use Telnyx\AI\Assistants\Tools\ToolTestResponse;
use Telnyx\Core\Exceptions\APIException;
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
     *
     * @throws APIException
     */
    public function test(
        string $toolID,
        $assistantID,
        $arguments = omit,
        $dynamicVariables = omit,
        ?RequestOptions $requestOptions = null,
    ): ToolTestResponse;

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return ToolTestResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function testRaw(
        string $toolID,
        array $params,
        ?RequestOptions $requestOptions = null
    ): ToolTestResponse;
}
