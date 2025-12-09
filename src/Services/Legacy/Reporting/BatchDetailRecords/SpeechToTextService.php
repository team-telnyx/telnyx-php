<?php

declare(strict_types=1);

namespace Telnyx\Services\Legacy\Reporting\BatchDetailRecords;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
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
     * @param array{
     *   endDate: string|\DateTimeInterface, startDate: string|\DateTimeInterface
     * }|SpeechToTextCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|SpeechToTextCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SpeechToTextNewResponse {
        [$parsed, $options] = SpeechToTextCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<SpeechToTextNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'legacy/reporting/batch_detail_records/speech_to_text',
            body: (object) $parsed,
            options: $options,
            convert: SpeechToTextNewResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves a specific Speech to Text batch report request by ID
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SpeechToTextGetResponse {
        /** @var BaseResponse<SpeechToTextGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['legacy/reporting/batch_detail_records/speech_to_text/%1$s', $id],
            options: $requestOptions,
            convert: SpeechToTextGetResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieves all Speech to Text batch report requests for the authenticated user
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): SpeechToTextListResponse {
        /** @var BaseResponse<SpeechToTextListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'legacy/reporting/batch_detail_records/speech_to_text',
            options: $requestOptions,
            convert: SpeechToTextListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Deletes a specific Speech to Text batch report request by ID
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SpeechToTextDeleteResponse {
        /** @var BaseResponse<SpeechToTextDeleteResponse> */
        $response = $this->client->request(
            method: 'delete',
            path: ['legacy/reporting/batch_detail_records/speech_to_text/%1$s', $id],
            options: $requestOptions,
            convert: SpeechToTextDeleteResponse::class,
        );

        return $response->parse();
    }
}
