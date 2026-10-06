<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Assistants;

use Telnyx\AI\Assistants\Deleted\DeletedAssistant;
use Telnyx\AI\Assistants\Deleted\DeletedListParams;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Assistants\DeletedRawContract;

/**
 * Configure AI assistant specifications.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class DeletedRawService implements DeletedRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * List the organization's soft-deleted assistants in the Recently Deleted list.
     *
     * Each entry includes `deleted_at` and `permanently_deleted_at`, the point after which the assistant is erased automatically and can no longer be restored.
     *
     * @param array{pageNumber?: int, pageSize?: int}|DeletedListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<DeletedAssistant>>
     *
     * @throws APIException
     */
    public function list(
        array|DeletedListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = DeletedListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'ai/assistants/deleted',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: DeletedAssistant::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Retrieve a soft-deleted assistant from the Recently Deleted list by `assistant_id`, including its `deleted_at` and `permanently_deleted_at` timestamps. This is a read-only view; the assistant cannot be modified while it remains deleted.
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
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['ai/assistants/%1$s/deleted', $assistantID],
            options: $requestOptions,
            convert: DeletedAssistant::class,
        );
    }
}
