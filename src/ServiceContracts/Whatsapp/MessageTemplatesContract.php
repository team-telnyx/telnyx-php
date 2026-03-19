<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Whatsapp;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\Whatsapp\MessageTemplates\MessageTemplateCreateParams\Category;
use Telnyx\Whatsapp\MessageTemplates\MessageTemplateGetResponse;
use Telnyx\Whatsapp\MessageTemplates\MessageTemplateListParams\FilterCategory;
use Telnyx\Whatsapp\MessageTemplates\MessageTemplateNewResponse;
use Telnyx\Whatsapp\MessageTemplates\MessageTemplateUpdateResponse;
use Telnyx\WhatsappTemplateData;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface MessageTemplatesContract
{
    /**
     * @api
     *
     * @param Category|value-of<Category> $category
     * @param list<array<string,mixed>> $components
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
    ): MessageTemplateNewResponse;

    /**
     * @api
     *
     * @param string $id Whatsapp message template ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): MessageTemplateGetResponse;

    /**
     * @api
     *
     * @param string $id Whatsapp message template ID
     * @param \Telnyx\Whatsapp\MessageTemplates\MessageTemplateUpdateParams\Category|value-of<\Telnyx\Whatsapp\MessageTemplates\MessageTemplateUpdateParams\Category> $category
     * @param list<array<string,mixed>> $components
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        \Telnyx\Whatsapp\MessageTemplates\MessageTemplateUpdateParams\Category|string|null $category = null,
        ?array $components = null,
        RequestOptions|array|null $requestOptions = null,
    ): MessageTemplateUpdateResponse;

    /**
     * @api
     *
     * @param FilterCategory|value-of<FilterCategory> $filterCategory Filter by category
     * @param string $filterSearch Search templates by name
     * @param string $filterStatus Filter by template status
     * @param string $filterWabaID Filter by WABA ID
     * @param RequestOpts|null $requestOptions
     *
     * @return DefaultFlatPagination<WhatsappTemplateData>
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
    ): DefaultFlatPagination;

    /**
     * @api
     *
     * @param string $id Whatsapp message template ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed;
}
