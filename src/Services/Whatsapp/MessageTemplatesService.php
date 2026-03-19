<?php

declare(strict_types=1);

namespace Telnyx\Services\Whatsapp;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Whatsapp\MessageTemplatesContract;
use Telnyx\Whatsapp\MessageTemplates\MessageTemplateCreateParams\Category;
use Telnyx\Whatsapp\MessageTemplates\MessageTemplateListParams\FilterCategory;
use Telnyx\Whatsapp\MessageTemplates\MessageTemplateListResponse;
use Telnyx\Whatsapp\MessageTemplates\MessageTemplateNewResponse;

/**
 * Manage Whatsapp message templates.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MessageTemplatesService implements MessageTemplatesContract
{
    /**
     * @api
     */
    public MessageTemplatesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new MessageTemplatesRawService($client);
    }

    /**
     * @api
     *
     * Create a Whatsapp message template
     *
     * @param Category|value-of<Category> $category
     * @param list<mixed> $components
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function create(
        Category|string $category,
        array $components,
        string $language,
        string $name,
        string $wabaID,
        RequestOptions|array|null $requestOptions = null,
    ): MessageTemplateNewResponse {
        $params = Util::removeNulls(
            [
                'category' => $category,
                'components' => $components,
                'language' => $language,
                'name' => $name,
                'wabaID' => $wabaID,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * List Whatsapp message templates
     *
     * @param FilterCategory|value-of<FilterCategory> $filterCategory Filter by category
     * @param string $filterSearch Search templates by name
     * @param string $filterStatus Filter by template status
     * @param string $filterWabaID Filter by WABA ID
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<MessageTemplateListResponse>
     *
     * @throws APIException
     */
    public function list(
        FilterCategory|string|null $filterCategory = null,
        ?string $filterSearch = null,
        ?string $filterStatus = null,
        ?string $filterWabaID = null,
        ?int $pageNumber = null,
        ?int $pageSize = null,
        RequestOptions|array|null $requestOptions = null,
    ): DefaultFlatPagination {
        $params = Util::removeNulls(
            [
                'filterCategory' => $filterCategory,
                'filterSearch' => $filterSearch,
                'filterStatus' => $filterStatus,
                'filterWabaID' => $filterWabaID,
                'pageNumber' => $pageNumber,
                'pageSize' => $pageSize,
            ],
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
