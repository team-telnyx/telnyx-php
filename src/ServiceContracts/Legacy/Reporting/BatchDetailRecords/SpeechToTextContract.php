<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Legacy\Reporting\BatchDetailRecords;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Legacy\Reporting\BatchDetailRecords\SpeechToText\SpeechToTextCreateParams;
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
     * @param array<mixed>|SpeechToTextCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|SpeechToTextCreateParams $params,
        ?RequestOptions $requestOptions = null,
    ): SpeechToTextNewResponse;

    /**
     * @api
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
     * @throws APIException
     */
    public function list(
        ?RequestOptions $requestOptions = null
    ): SpeechToTextListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): SpeechToTextDeleteResponse;
}
