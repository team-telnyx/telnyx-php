<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Assistants;

use Telnyx\AI\Assistants\Tools\ToolTestParams;
use Telnyx\AI\Assistants\Tools\ToolTestResponse;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Assistants\ToolsContract;

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
     * @param array{
     *   assistant_id: string,
     *   arguments?: array<string,mixed>,
     *   dynamic_variables?: array<string,mixed>,
     * }|ToolTestParams $params
     *
     * @throws APIException
     */
    public function test(
        string $toolID,
        array|ToolTestParams $params,
        ?RequestOptions $requestOptions = null,
    ): ToolTestResponse {
        [$parsed, $options] = ToolTestParams::parseRequest(
            $params,
            $requestOptions,
        );
        $assistantID = $parsed['assistant_id'];
        unset($parsed['assistant_id']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['ai/assistants/%1$s/tools/%2$s/test', $assistantID, $toolID],
            body: (object) array_diff_key($parsed, ['assistant_id']),
            options: $options,
            convert: ToolTestResponse::class,
        );
    }
}
