<?php

declare(strict_types=1);

namespace Telnyx\Services\AI\Assistants;

use Telnyx\AI\Assistants\Deleted\DeletedAssistant;
use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AI\Assistants\DeletedContract;

/**
 * Configure AI assistant specifications.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class DeletedService implements DeletedContract
{
    /**
     * @api
     */
    public DeletedRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new DeletedRawService($client);
    }

    /**
     * @api
     *
     * List the organization's soft-deleted assistants in the Recently Deleted list.
     *
     * Each entry includes `deleted_at` and `permanently_deleted_at`, the point after which the assistant is erased automatically and can no longer be restored.
     *
     * @param int $pageNumber page number to retrieve (1-based)
     * @param int $pageSize number of items to return per page
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<DeletedAssistant>
     *
     * @throws APIException
     */
    public function list(
        int $pageNumber = 1,
        int $pageSize = 20,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = ['pageNumber' => $pageNumber, 'pageSize' => $pageSize];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Retrieve a soft-deleted assistant from the Recently Deleted list by `assistant_id`, including its `deleted_at` and `permanently_deleted_at` timestamps. This is a read-only view; the assistant cannot be modified while it remains deleted.
     *
     * @param string $assistantID unique identifier of the assistant
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function get(
        string $assistantID,
        RequestOptions|array|null $requestOptions = null
    ): DeletedAssistant {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->get($assistantID, requestOptions: $requestOptions);

        return $response->parse();
    }
}
