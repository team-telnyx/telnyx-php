<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\PronunciationDicts\PronunciationDictCreateParams;
use Telnyx\PronunciationDicts\PronunciationDictData;
use Telnyx\PronunciationDicts\PronunciationDictGetResponse;
use Telnyx\PronunciationDicts\PronunciationDictListParams;
use Telnyx\PronunciationDicts\PronunciationDictNewResponse;
use Telnyx\PronunciationDicts\PronunciationDictUpdateParams;
use Telnyx\PronunciationDicts\PronunciationDictUpdateResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PronunciationDictsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|PronunciationDictCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PronunciationDictNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|PronunciationDictCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the UUID of the pronunciation dictionary
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PronunciationDictGetResponse>
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
     * @param string $id the UUID of the pronunciation dictionary
     * @param array<string,mixed>|PronunciationDictUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PronunciationDictUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|PronunciationDictUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|PronunciationDictListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<PronunciationDictData>>
     *
     * @throws APIException
     */
    public function list(
        array|PronunciationDictListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $id the UUID of the pronunciation dictionary
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
