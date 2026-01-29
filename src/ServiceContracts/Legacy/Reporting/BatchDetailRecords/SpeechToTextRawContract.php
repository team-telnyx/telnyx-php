<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Legacy\Reporting\BatchDetailRecords;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Legacy\Reporting\BatchDetailRecords\SpeechToText\SpeechToTextCreateParams;
use Telnyx\Legacy\Reporting\BatchDetailRecords\SpeechToText\SpeechToTextDeleteResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\SpeechToText\SpeechToTextGetResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\SpeechToText\SpeechToTextListResponse;
use Telnyx\Legacy\Reporting\BatchDetailRecords\SpeechToText\SpeechToTextNewResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SpeechToTextRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|SpeechToTextCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SpeechToTextNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|SpeechToTextCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SpeechToTextListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;
}
