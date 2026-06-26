<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Dir\DirCreateLoaParams;
use Telnyx\Dir\DirGetResponse;
use Telnyx\Dir\DirListDocumentTypesResponse;
use Telnyx\Dir\DirListInfringementClaimsParams;
use Telnyx\Dir\DirListInfringementClaimsResponse;
use Telnyx\Dir\DirListParams;
use Telnyx\Dir\DirListResponse;
use Telnyx\Dir\DirSubmitResponse;
use Telnyx\Dir\DirUpdateInfringementParams;
use Telnyx\Dir\DirUpdateInfringementResponse;
use Telnyx\Dir\DirUpdateParams;
use Telnyx\Dir\DirUpdateResponse;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface DirRawContract
{
    /**
     * @api
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DirGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $dirID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param array<string,mixed>|DirUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DirUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $dirID,
        array|DirUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|DirListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<DirListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|DirListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $dirID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $dirID the DIR id
     * @param array<string,mixed>|DirCreateLoaParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function createLoa(
        string $dirID,
        array|DirCreateLoaParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DirListDocumentTypesResponse>
     *
     * @throws APIException
     */
    public function listDocumentTypes(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param array<string,mixed>|DirListInfringementClaimsParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<DirListInfringementClaimsResponse>>
     *
     * @throws APIException
     */
    public function listInfringementClaims(
        string $dirID,
        array|DirListInfringementClaimsParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DirSubmitResponse>
     *
     * @throws APIException
     */
    public function submit(
        string $dirID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param array<string,mixed>|DirUpdateInfringementParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DirUpdateInfringementResponse>
     *
     * @throws APIException
     */
    public function updateInfringement(
        string $dirID,
        array|DirUpdateInfringementParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
