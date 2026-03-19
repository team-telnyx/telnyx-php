<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants;

use Telnyx\AI\Assistants\Tags\TagCreateParams;
use Telnyx\AI\Assistants\Tags\TagDeleteParams;
use Telnyx\AI\Assistants\Tags\TagDeleteResponse;
use Telnyx\AI\Assistants\Tags\TagListResponse;
use Telnyx\AI\Assistants\Tags\TagNewResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface TagsRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|TagCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TagNewResponse>
     *
     * @throws APIException
     */
    public function create(
        string $assistantID,
        array|TagCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TagListResponse>
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;

    /**
     * @api
     *
     * @param array<string,mixed>|TagDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TagDeleteResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $tag,
        array|TagDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;
}
