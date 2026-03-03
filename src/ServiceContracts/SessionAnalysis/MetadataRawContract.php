<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\SessionAnalysis;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\SessionAnalysis\Metadata\MetadataGetRecordTypeResponse;
use Telnyx\SessionAnalysis\Metadata\MetadataGetResponse;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MetadataRawContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MetadataGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $recordType The record type identifier (e.g. "call-control").
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MetadataGetRecordTypeResponse>
     *
     * @throws APIException
     */
    public function retrieveRecordType(
        string $recordType,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
