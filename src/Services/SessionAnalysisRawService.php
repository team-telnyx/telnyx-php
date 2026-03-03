<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\SessionAnalysisRawContract;
use Telnyx\SessionAnalysis\SessionAnalysisGetResponse;
use Telnyx\SessionAnalysis\SessionAnalysisRetrieveParams;
use Telnyx\SessionAnalysis\SessionAnalysisRetrieveParams\Expand;

/**
 * Analyze voice AI sessions, costs, and event hierarchies across Telnyx products.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class SessionAnalysisRawService implements SessionAnalysisRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Retrieves a full session analysis tree for a given event, including costs, child events, and product linkages.
     *
     * @param string $eventID path param: The event identifier (UUID)
     * @param array{
     *   recordType: string,
     *   dateTime?: \DateTimeInterface,
     *   expand?: Expand|value-of<Expand>,
     *   includeChildren?: bool,
     *   maxDepth?: int,
     * }|SessionAnalysisRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SessionAnalysisGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $eventID,
        array|SessionAnalysisRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SessionAnalysisRetrieveParams::parseRequest(
            $params,
            $requestOptions,
        );
        $recordType = $parsed['recordType'];
        unset($parsed['recordType']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['session_analysis/%1$s/%2$s', $recordType, $eventID],
            query: Util::array_transform_keys(
                $parsed,
                [
                    'dateTime' => 'date_time',
                    'includeChildren' => 'include_children',
                    'maxDepth' => 'max_depth',
                ],
            ),
            options: $options,
            convert: SessionAnalysisGetResponse::class,
        );
    }
}
