<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Legacy\Reporting\BatchDetailRecords;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Legacy\Reporting\BatchDetailRecords\SpeechToText\SpeechToTextDeleteResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\SpeechToText\SpeechToTextGetResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\SpeechToText\SpeechToTextListResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\SpeechToText\SpeechToTextNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SpeechToTextContract
{
    /**
     * @api
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
    ): SpeechToTextNewResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): SpeechToTextGetResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): SpeechToTextListResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): SpeechToTextDeleteResponse;
}
