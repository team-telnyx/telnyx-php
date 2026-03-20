<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AI\Assistants;

use Telnyx\AI\Assistants\Tags\TagAddResponse;
use Telnyx\AI\Assistants\Tags\TagListResponse;
use Telnyx\AI\Assistants\Tags\TagRemoveResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface TagsContract
{
    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function list(
        RequestOptions|array|null $requestOptions = null
    ): TagListResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function add(
        string $assistantID,
        string $tag,
        RequestOptions|array|null $requestOptions = null,
    ): TagAddResponse;

    /**
     * @api
     *
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function remove(
        string $tag,
        string $assistantID,
        RequestOptions|array|null $requestOptions = null,
    ): TagRemoveResponse;
}
