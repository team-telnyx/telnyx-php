<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Memory\Namespaces\Profiles;

use Telnyx\AI\Memory\Namespaces\Profiles\Memories\MemoryGetResponse;
use Telnyx\AI\Memory\Namespaces\Profiles\Memories\MemoryListParams;
use Telnyx\AI\Memory\Namespaces\Profiles\Memories\MemoryListResponse;
use Telnyx\AI\Memory\Namespaces\Profiles\Memories\MemoryRetrieveParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MemoriesRawContract
{
    /**
     * @api
     *
     * @param string $memoryID a memory's id, as `recall` and the listing return it
     * @param array<string,mixed>|MemoryRetrieveParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MemoryGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $memoryID,
        array|MemoryRetrieveParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $profileID Path param
     * @param array<string,mixed>|MemoryListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<MemoryListResponse>>
     *
     * @throws APIException
     */
    public function list(
        string $profileID,
        array|MemoryListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
