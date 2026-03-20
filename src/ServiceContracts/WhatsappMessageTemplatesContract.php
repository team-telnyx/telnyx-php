<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts;

use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateGetResponse;
use Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateUpdateParams\Category;
use Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateUpdateResponse;

/**
 * @phpstan-import-type ComponentShape from \Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateUpdateParams\Component
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface WhatsappMessageTemplatesContract
{
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
    ): WhatsappMessageTemplateGetResponse;

    /**
     * @api
     *
     * @param string $id Whatsapp message template ID
     * @param Category|value-of<Category> $category
     * @param list<ComponentShape> $components Updated template components. Same structure as the create request.
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        Category|string|null $category = null,
        ?array $components = null,
        RequestOptions|array|null $requestOptions = null,
    ): WhatsappMessageTemplateUpdateResponse;

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
