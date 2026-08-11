<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Collections;

use Telnyx\AI\Collections\Sources\SourceCreateParams;
use Telnyx\AI\Collections\Sources\SourceDeleteParams;
use Telnyx\AI\Collections\Sources\SourceListResponse;
use Telnyx\AI\Collections\Sources\SourceNewResponse;
use Telnyx\AI\Collections\Sources\SourceReplaceParams;
use Telnyx\AI\Collections\Sources\SourceReplaceResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface SourcesRawContract
{
    /**
     * @api
     *
     * @param string $uuid the collection's unique identifier
     * @param array<string,mixed>|SourceCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SourceNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $uuid,
        array|SourceCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $uuid the collection's unique identifier
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SourceListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $uuid,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $sourceID the identifier of the source to remove
     * @param array<string,mixed>|SourceDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $sourceID,
        array|SourceDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $uuid the collection's unique identifier
     * @param array<string,mixed>|SourceReplaceParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<SourceReplaceResponse>
     *
     * @throws APIException
     */
    public function replace(
        string $uuid,
        array|SourceReplaceParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
