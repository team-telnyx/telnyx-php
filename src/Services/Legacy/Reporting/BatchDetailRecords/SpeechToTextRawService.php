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
use Telnyx\ServiceContracts\Legacy\Reporting\BatchDetailRecords\SpeechToTextRawContract;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class SpeechToTextRawService implements SpeechToTextRawContract
{
    // @phpstan-ignore-next-line
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
     *   endDate: \DateTimeInterface, startDate: \DateTimeInterface
     * }|SpeechToTextCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SpeechToTextNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|SpeechToTextCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = SpeechToTextCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SpeechToTextGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SpeechToTextListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
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
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SpeechToTextDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['legacy/reporting/batch_detail_records/speech_to_text/%1$s', $id],
            options: $requestOptions,
            convert: SpeechToTextDeleteResponse::class,
        );
    }
}
