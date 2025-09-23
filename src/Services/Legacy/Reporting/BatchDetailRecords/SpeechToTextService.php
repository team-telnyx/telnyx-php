<?php

declare(strict_types=1);

namespace Telnyx\Services\Legacy\Reporting\BatchDetailRecords;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\SpeechToText\SpeechToTextCreateParams;
use Telnyx\Legacy\Reporting\BatchDetailRecords\SpeechToText\SpeechToTextDeleteResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\SpeechToText\SpeechToTextGetResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\SpeechToText\SpeechToTextListResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\SpeechToText\SpeechToTextNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Legacy\Reporting\BatchDetailRecords\SpeechToTextContract;

final class SpeechToTextService implements SpeechToTextContract
{
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Creates a new Speech to Text batch report request with the specified filters
     *
     * @param \DateTimeInterface $endDate End date in ISO format with timezone (date range must be up to one month)
     * @param \DateTimeInterface $startDate Start date in ISO format with timezone
     *
     * @return SpeechToTextNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function create(
        $endDate,
        $startDate,
        ?RequestOptions $requestOptions = null
    ): SpeechToTextNewResponse {
        $params = ['endDate' => $endDate, 'startDate' => $startDate];

        return $this->createRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @param array<string, mixed> $params
     *
     * @return SpeechToTextNewResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function createRaw(
        array $params,
        ?RequestOptions $requestOptions = null
    ): SpeechToTextNewResponse {
        [$parsed, $options] = SpeechToTextCreateParams::parseRequest(
            $params,
            $requestOptions
        );

        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'post',
            path: 'legacy/reporting/batch_detail_records/speech_to_text',
            body: (object) $parsed,
            options: $options,
            convert: SpeechToTextNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves a specific Speech to Text batch report request by ID
     *
     * @return SpeechToTextGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SpeechToTextGetResponse {
        $params = [];

        return $this->retrieveRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return SpeechToTextGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieveRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): SpeechToTextGetResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: ['legacy/reporting/batch_detail_records/speech_to_text/%1$s', $id],
            options: $requestOptions,
            convert: SpeechToTextGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves all Speech to Text batch report requests for the authenticated user
     *
     * @return SpeechToTextListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): SpeechToTextListResponse {
        $params = [];

        return $this->listRaw($params, $requestOptions);
    }

    /**
     * @api
     *
     * @return SpeechToTextListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function listRaw(
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): SpeechToTextListResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'get',
            path: 'legacy/reporting/batch_detail_records/speech_to_text',
            options: $requestOptions,
            convert: SpeechToTextListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes a specific Speech to Text batch report request by ID
     *
     * @return SpeechToTextDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SpeechToTextDeleteResponse {
        $params = [];

        return $this->deleteRaw($id, $params, $requestOptions);
    }

    /**
     * @api
     *
     * @return SpeechToTextDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function deleteRaw(
        string $id,
        mixed $params,
        ?RequestOptions $requestOptions = null
    ): SpeechToTextDeleteResponse {
        // @phpstan-ignore-next-line;
        return $this->client->request(
            method: 'delete',
            path: ['legacy/reporting/batch_detail_records/speech_to_text/%1$s', $id],
            options: $requestOptions,
            convert: SpeechToTextDeleteResponse::class,
        );
    }
}
