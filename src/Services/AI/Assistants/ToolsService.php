<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Assistants;

use Telnyx\AI\Assistants\Tools\ToolTestParams;
use Telnyx\AI\Assistants\Tools\ToolTestResponse;
use Telnyx\Client;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Assistants\ToolsContract;

use const Telnyx\Core\OMIT as omit;

final class ToolsService implements ToolsContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Test a webhook tool for an assistant
     *
     * @param string $assistantID
     * @param array<string,
     * mixed,> $arguments Key-value arguments to use for the webhook test
     * @param array<string,
     * mixed,> $dynamicVariables Key-value dynamic variables to use for the webhook test
     */
    public function test(
        string $toolID,
        $assistantID,
        $arguments = omit,
        $dynamicVariables = omit,
        ?RequestOptions $requestOptions = null,
    ): ToolTestResponse {
        [$parsed, $options] = ToolTestParams::parseRequest(
            [
                'assistantID' => $assistantID,
                'arguments' => $arguments,
                'dynamicVariables' => $dynamicVariables,
            ],
            $requestOptions,
        );
        $assistantID = $parsed['assistantID'];
        unset($parsed['assistantID']);

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: ['ai/assistants/%1$s/tools/%2$s/test', $assistantID, $toolID],
            body: (object) array_diff_key($parsed, array_flip(['assistantID'])),
            options: $options,
            convert: ToolTestResponse::class,
        );
    }
}
