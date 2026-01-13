<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Assistants;

use Telnyx\AI\Assistants\Tools\ToolTestResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Assistants\ToolsContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class ToolsService implements ToolsContract
{
    /**
     * @api
     */
    public ToolsRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new ToolsRawService($client);
    }

    /**
     * @api
     *
     * Test a webhook tool for an assistant
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
    ): ToolTestResponse {
        $params = Util::removeNulls(
            [
                'assistantID' => $assistantID,
                'arguments' => $arguments,
                'dynamicVariables' => $dynamicVariables,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->test($toolID, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
