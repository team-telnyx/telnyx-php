<?php

declare(strict_types=1);

namespace Telnyx\Services\Whatsapp;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Omitted;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Whatsapp\TemplatesContract;
use Telnyx\Whatsapp\Templates\TemplateCreateParams\Category;
use Telnyx\Whatsapp\Templates\TemplateListParams\FilterCategory;
use Telnyx\Whatsapp\Templates\TemplateNewResponse;
use Telnyx\WhatsappTemplateData;

/**
 * Manage Whatsapp message templates.
 *
 * @phpstan-import-type ComponentShape from \Telnyx\Whatsapp\Templates\TemplateCreateParams\Component
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class TemplatesService implements TemplatesContract
{
    /**
     * @api
     */
    public TemplatesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new TemplatesRawService($client);
    }

    /**
     * @api
     *
     * Creates a WhatsApp message template for review and subsequent use in template messages.
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
    ): TemplateNewResponse {
        $params = [
            'category' => $category,
            'components' => $components,
            'language' => $language,
            'name' => $name,
            'wabaID' => $wabaID,
        ];

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->create(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Returns WhatsApp message templates owned by the authenticated account, including their current review state.
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
    ): DefaultFlatPagination {
        $params = array_filter(
            [
                'filterCategory' => $filterCategory ?? Omitted::VALUE,
                'filterSearch' => $filterSearch ?? Omitted::VALUE,
                'filterStatus' => $filterStatus ?? Omitted::VALUE,
                'filterWabaID' => $filterWabaID ?? Omitted::VALUE,
                'pageNumber' => $pageNumber ?? Omitted::VALUE,
                'pageSize' => $pageSize ?? Omitted::VALUE,
            ],
            static fn ($value) => Omitted::VALUE !== $value,
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->list(params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }
}
