<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Assistants;

use Telnyx\AI\Assistants\Tests\AssistantTest;
use Telnyx\AI\Assistants\Tests\TelnyxConversationChannel;
use Telnyx\AI\Assistants\Tests\TestCreateParams;
use Telnyx\AI\Assistants\Tests\TestCreateParams\Rubric;
use Telnyx\AI\Assistants\Tests\TestListParams;
use Telnyx\AI\Assistants\Tests\TestUpdateParams;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Assistants\TestsRawContract;

/**
 * Configure AI assistant specifications.
 *
 * @phpstan-import-type RubricShape from \Telnyx\AI\Assistants\Tests\TestCreateParams\Rubric
 * @phpstan-import-type RubricShape from \Telnyx\AI\Assistants\Tests\TestUpdateParams\Rubric as RubricShape1
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class TestsRawService implements TestsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a comprehensive test configuration for evaluating AI assistant performance
     *
     * @param array{
     *   destination: string,
     *   instructions: string,
     *   name: string,
     *   rubric: list<Rubric|RubricShape>,
     *   description?: string,
     *   maxDurationSeconds?: int,
     *   telnyxConversationChannel?: TelnyxConversationChannel|value-of<TelnyxConversationChannel>,
     *   testSuite?: string,
     * }|TestCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AssistantTest>
     *
     * @throws APIException
     */
    public function create(
        array|TestCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TestCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'ai/assistants/tests',
            body: (object) $parsed,
            options: $options,
            convert: AssistantTest::class,
        );
    }

    /**
     * @api
     *
     * Retrieves detailed information about a specific assistant test
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AssistantTest>
     *
     * @throws APIException
     */
    public function retrieve(
        string $testID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ai/assistants/tests/%1$s', $testID],
            options: $requestOptions,
            convert: AssistantTest::class,
        );
    }

    /**
     * @api
     *
     * Updates an existing assistant test configuration with new settings
     *
     * @param array{
     *   description?: string,
     *   destination?: string,
     *   instructions?: string,
     *   maxDurationSeconds?: int,
     *   name?: string,
     *   rubric?: list<TestUpdateParams\Rubric|RubricShape1>,
     *   telnyxConversationChannel?: TelnyxConversationChannel|value-of<TelnyxConversationChannel>,
     *   testSuite?: string,
     * }|TestUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AssistantTest>
     *
     * @throws APIException
     */
    public function update(
        string $testID,
        array|TestUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TestUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'put',
            path: ['ai/assistants/tests/%1$s', $testID],
            body: (object) $parsed,
            options: $options,
            convert: AssistantTest::class,
        );
    }

    /**
     * @api
     *
     * Retrieves a paginated list of assistant tests with optional filtering capabilities
     *
     * @param array{
     *   destination?: string,
     *   pageNumber?: int,
     *   pageSize?: int,
     *   telnyxConversationChannel?: string,
     *   testSuite?: string,
     * }|TestListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<AssistantTest>>
     *
     * @throws APIException
     */
    public function list(
        array|TestListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TestListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ai/assistants/tests',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                    'telnyxConversationChannel' => 'telnyx_conversation_channel',
                    'testSuite' => 'test_suite',
                ],
            ),
            options: $options,
            convert: AssistantTest::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Permanently removes an assistant test and all associated data
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $testID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['ai/assistants/tests/%1$s', $testID],
            options: $requestOptions,
            convert: null,
        );
    }
}
