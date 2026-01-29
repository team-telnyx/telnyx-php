<?php

declare(strict_types=1);

namespace Telnyx\Services\Legacy\Reporting\BatchDetailRecords;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\Legacy\Reporting\BatchDetailRecords\SpeechToText\SpeechToTextDeleteResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\SpeechToText\SpeechToTextGetResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\SpeechToText\SpeechToTextListResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\SpeechToText\SpeechToTextNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Legacy\Reporting\BatchDetailRecords\SpeechToTextContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class SpeechToTextService implements SpeechToTextContract
{
    /**
     * @api
     */
    public SpeechToTextRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new SpeechToTextRawService($client);
    }

    /**
     * @api
     *
     * Creates a new Speech to Text batch report request with the specified filters
     *
     * @param \DateTimeInterface $endDate End date in ISO format with timezone (date range must be up to one month)
     * @param \DateTimeInterface $startDate Start date in ISO format with timezone
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        \DateTimeInterface $endDate,
        \DateTimeInterface $startDate,
        RequestOptions|array|null $requestOptions = null,
    ): SpeechToTextNewResponse {
        $params = Util::removeNulls(
            ['endDate' => $endDate, 'startDate' => $startDate]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves a specific Speech to Text batch report request by ID
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): SpeechToTextGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves all Speech to Text batch report requests for the authenticated user
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): SpeechToTextListResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes a specific Speech to Text batch report request by ID
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): SpeechToTextDeleteResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
