<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Dir;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Dir\PhoneNumberBatches\PhoneNumberBatch;
use Telnyx\Dir\PhoneNumberBatches\PhoneNumberBatchGetResponse;
use Telnyx\Dir\PhoneNumberBatches\PhoneNumberBatchListParams;
use Telnyx\Dir\PhoneNumberBatches\PhoneNumberBatchRetrieveParams;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PhoneNumberBatchesRawContract
{
    /**
     * @api
     *
     * @param string $batchID the batch id (lowercase UUID)
     * @param array<string,mixed>|PhoneNumberBatchRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PhoneNumberBatchGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $batchID,
        array|PhoneNumberBatchRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param array<string,mixed>|PhoneNumberBatchListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<PhoneNumberBatch>>
     *
     * @throws APIException
     */
    public function list(
        string $dirID,
        array|PhoneNumberBatchListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
