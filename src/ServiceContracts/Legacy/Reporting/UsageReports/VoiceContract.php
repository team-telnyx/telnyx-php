<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Legacy\Reporting\UsageReports;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\Legacy\Reporting\UsageReports\Voice\VoiceCreateParams;
use Telnyx\Legacy\Reporting\UsageReports\Voice\VoiceDeleteResponse;
use Telnyx\Legacy\Reporting\UsageReports\Voice\VoiceGetResponse;
use Telnyx\Legacy\Reporting\UsageReports\Voice\VoiceListParams;
use Telnyx\Legacy\Reporting\UsageReports\Voice\VoiceListResponse;
use Telnyx\Legacy\Reporting\UsageReports\Voice\VoiceNewResponse;
use Telnyx\RequestOptions;

interface VoiceContract
{
    /**
     * @api
     *
     * @param array<mixed>|VoiceCreateParams $params
     *
     * @throws APIException
     */
    public function create(
        array|VoiceCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): VoiceNewResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): VoiceGetResponse;

    /**
     * @api
     *
     * @param array<mixed>|VoiceListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|VoiceListParams $params,
        ?RequestOptions $requestOptions = null
    ): VoiceListResponse;

    /**
     * @api
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): VoiceDeleteResponse;
}
