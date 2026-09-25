<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Memory\Namespaces\Profiles;

use Telnyx\AI\Collections\Sources\Source;
use Telnyx\AI\Memory\Namespaces\Profiles\Sources\SourceDeleteParams;
use Telnyx\AI\Memory\Namespaces\Profiles\Sources\SourceDeleteResponse;
use Telnyx\AI\Memory\Namespaces\Profiles\Sources\SourceGetResponse;
use Telnyx\AI\Memory\Namespaces\Profiles\Sources\SourceListParams;
use Telnyx\AI\Memory\Namespaces\Profiles\Sources\SourceRetrieveParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SourcesRawContract
{
    /**
     * @api
     *
     * @param string $sourceID Identifies one source within its profile: an ingested session, or one remembered fact. Returned by `ingest` and `remember` when the write is accepted. Re-ingesting a session keeps its source id.
     * @param array<string,mixed>|SourceRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SourceGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $sourceID,
        array|SourceRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $profileID Path param
     * @param array<string,mixed>|SourceListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<Source>>
     *
     * @throws APIException
     */
    public function list(
        string $profileID,
        array|SourceListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $sourceID Identifies one source within its profile: an ingested session, or one remembered fact. Returned by `ingest` and `remember` when the write is accepted. Re-ingesting a session keeps its source id.
     * @param array<string,mixed>|SourceDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SourceDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $sourceID,
        array|SourceDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
