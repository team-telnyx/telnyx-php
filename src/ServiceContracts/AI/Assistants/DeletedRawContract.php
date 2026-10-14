<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants;

use Telnyx\AI\Assistants\Deleted\DeletedAssistant;
use Telnyx\AI\Assistants\Deleted\DeletedListParams;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface DeletedRawContract
{
    /**
     * @api
     *
     * @param array<string,mixed>|DeletedListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<DeletedAssistant>>
     *
     * @throws APIException
     */
    public function list(
        array|DeletedListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $assistantID unique identifier of the assistant
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DeletedAssistant>
     *
     * @throws APIException
     */
    public function get(
        string $assistantID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse;
}
