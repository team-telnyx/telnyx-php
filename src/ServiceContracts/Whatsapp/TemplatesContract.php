<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\Whatsapp;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\Whatsapp\Templates\TemplateCreateParams\Category;
use Telnyx\Whatsapp\Templates\TemplateListParams\FilterCategory;
use Telnyx\Whatsapp\Templates\TemplateNewResponse;
use Telnyx\WhatsappTemplateData;

/**
 * @phpstan-import-type ComponentShape from \Telnyx\Whatsapp\Templates\TemplateCreateParams\Component
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface TemplatesContract
{
    /**
     * @api
     *
     * @param Category|value-of<Category> $category template category: AUTHENTICATION, UTILITY, or MARKETING
     * @param list<ComponentShape> $components Template components defining message structure. Passed through to Meta Graph API. Templates with variables must include example values. Supports HEADER, BODY, FOOTER, BUTTONS, CAROUSEL and any future Meta component types.
     * @param string $language Template language code (e.g. en_US, es, pt_BR).
     * @param string $name Template name. Lowercase letters, numbers, and underscores only.
     * @param string $wabaID the WhatsApp Business Account ID
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
    ): TemplateNewResponse;

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
}
