<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Tests\TestFramework\V1;

use Telnyx\AI\Tests\TestFramework\V1\Aiagents\AiagentCreateParams;
use Telnyx\AI\Tests\TestFramework\V1\Aiagents\AiagentListParams;
use Telnyx\AI\Tests\TestFramework\V1\Aiagents\AiagentListResponse;
use Telnyx\AI\Tests\TestFramework\V1\Aiagents\AiagentUpdateParams;
use Telnyx\AI\Tests\TestFramework\V1\Aiagents\TestAgent;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Tests\TestFramework\V1\AiagentsRawContract;

/**
 * Test agents, evaluator scenarios, metrics, and run results for the AI test framework.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class AiagentsRawService implements AiagentsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a test agent in your organization. The agent wraps a Telnyx AI assistant so simulated callers can be sent against it.
     *
     * @param array{
     *   agentName: string,
     *   assistantID: string,
     *   autoFetchCallsEnabled?: bool,
     *   autoSyncPromptEnabled?: bool,
     *   autoUpdateDropoffNodes?: bool,
     *   autoUpdateTopicNodes?: bool,
     *   contactNumber?: string,
     *   description?: string,
     *   inbound?: bool,
     *   language?: string,
     *   llmMaxTokens?: int,
     *   llmModel?: string,
     *   llmSystemPrompt?: string,
     *   llmTemperature?: float,
     *   outboundAutoCall?: bool,
     *   sipEndpoint?: string,
     * }|AiagentCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TestAgent>
     *
     * @throws APIException
     */
    public function create(
        array|AiagentCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AiagentCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'ai/tests/test_framework/v1/aiagents',
            body: (object) $parsed,
            options: $options,
            convert: TestAgent::class,
        );
    }

    /**
     * @api
     *
     * Returns the specified test agent.
     *
     * @param int $id numeric ID of the test agent
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TestAgent>
     *
     * @throws APIException
     */
    public function retrieve(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ai/tests/test_framework/v1/aiagents/%1$s', $id],
            options: $requestOptions,
            convert: TestAgent::class,
        );
    }

    /**
     * @api
     *
     * Updates the specified test agent.
     *
     * @param int $id numeric ID of the test agent
     * @param array{
     *   agentName?: string,
     *   assistantID?: string,
     *   autoFetchCallsEnabled?: bool,
     *   autoSyncPromptEnabled?: bool,
     *   autoUpdateDropoffNodes?: bool,
     *   autoUpdateTopicNodes?: bool,
     *   contactNumber?: string,
     *   description?: string,
     *   inbound?: bool,
     *   language?: string,
     *   llmMaxTokens?: int,
     *   llmModel?: string,
     *   llmSystemPrompt?: string,
     *   llmTemperature?: float,
     *   outboundAutoCall?: bool,
     *   sipEndpoint?: string,
     * }|AiagentUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TestAgent>
     *
     * @throws APIException
     */
    public function update(
        int $id,
        array|AiagentUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AiagentUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['ai/tests/test_framework/v1/aiagents/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: TestAgent::class,
        );
    }

    /**
     * @api
     *
     * Returns a paginated list of test agents in your organization. A test agent wraps the Telnyx AI assistant under test and drives simulated callers against it.
     *
     * @param array{page?: int, pageSize?: int}|AiagentListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AiagentListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|AiagentListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = AiagentListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ai/tests/test_framework/v1/aiagents',
            query: Util::array_transform_keys($parsed, ['pageSize' => 'page_size']),
            options: $options,
            convert: AiagentListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes the specified test agent.
     *
     * @param int $id numeric ID of the test agent
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        int $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['ai/tests/test_framework/v1/aiagents/%1$s', $id],
            options: $requestOptions,
            convert: 'mixed',
        );
    }
}
