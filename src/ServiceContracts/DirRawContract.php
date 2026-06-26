<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\Dir\Dir;
use Telnyx\Dir\DirListDocumentTypesResponse;
use Telnyx\Dir\DirListInfringementClaimsParams;
use Telnyx\Dir\DirListParams;
use Telnyx\Dir\DirNewLoaParams;
use Telnyx\Dir\DirUpdateInfringementParams;
use Telnyx\Dir\DirUpdateParams;
use Telnyx\Dir\DirWrapped;
use Telnyx\InfringementClaims\InfringementClaim;
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
     * @return BaseResponse<DirWrapped>
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
     * @return BaseResponse<DirWrapped>
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
     * @return BaseResponse<DefaultFlatPagination<Dir>>
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
     * @return BaseResponse<DefaultFlatPagination<InfringementClaim>>
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
     * @param string $dirID the DIR id
     * @param array<string,mixed>|DirNewLoaParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<string>
     *
     * @throws APIException
     */
    public function newLoa(
        string $dirID,
        array|DirNewLoaParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $dirID The DIR id. Lowercase UUID.
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DirWrapped>
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
     * @return BaseResponse<DirWrapped>
     *
     * @throws APIException
     */
    public function updateInfringement(
        string $dirID,
        array|DirUpdateInfringementParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
