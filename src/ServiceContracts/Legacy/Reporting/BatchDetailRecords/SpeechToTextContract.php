<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Legacy\Reporting\BatchDetailRecords;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Implementation\HasRawResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\SpeechToText\SpeechToTextDeleteResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\SpeechToText\SpeechToTextGetResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\SpeechToText\SpeechToTextListResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\SpeechToText\SpeechToTextNewResponse;
use Telnyx\RequestOptions;

interface SpeechToTextContract
{
    /**
     * @api
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
    ): SpeechToTextNewResponse;

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
    ): SpeechToTextNewResponse;

    /**
     * @api
     *
     * @return SpeechToTextGetResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SpeechToTextGetResponse;

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
    ): SpeechToTextGetResponse;

    /**
     * @api
     *
     * @return SpeechToTextListResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): SpeechToTextListResponse;

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
    ): SpeechToTextListResponse;

    /**
     * @api
     *
     * @return SpeechToTextDeleteResponse<HasRawResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SpeechToTextDeleteResponse;

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
    ): SpeechToTextDeleteResponse;
}
