<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Tests\TestFramework;

use Telnyx\AI\Tests\TestFramework\V1\V1GetPersonalitiesResponseItem;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Conversion\ListOf;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Tests\TestFramework\V1RawContract;

/**
 * Test agents, evaluator scenarios, metrics, and run results for the AI test framework.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class V1RawService implements V1RawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Returns the catalogue of test personalities available to your organization. A personality describes how a simulated caller speaks: prompt, language, accent, voice, interruption level, and call-behaviour settings.
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<list<V1GetPersonalitiesResponseItem>>
     *
     * @throws APIException
     */
    public function retrievePersonalities(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ai/tests/test_framework/v1/personalities',
            options: $requestOptions,
            convert: new ListOf(V1GetPersonalitiesResponseItem::class),
        );
    }
}
