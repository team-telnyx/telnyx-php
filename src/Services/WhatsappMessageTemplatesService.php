<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\WhatsappMessageTemplatesContract;
use Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateGetResponse;
use Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateUpdateParams\Category;
use Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateUpdateResponse;

/**
 * Manage Whatsapp message templates.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class WhatsappMessageTemplatesService implements WhatsappMessageTemplatesContract
{
    /**
     * @api
     */
    public WhatsappMessageTemplatesRawService $raw;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->raw = new WhatsappMessageTemplatesRawService($client);
    }

    /**
     * @api
     *
     * Get a Whatsapp message template by ID
     *
     * @param string $id Whatsapp message template ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): WhatsappMessageTemplateGetResponse {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->retrieve($id, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Update a Whatsapp message template
     *
     * @param string $id Whatsapp message template ID
     * @param Category|value-of<Category> $category
     * @param list<mixed> $components
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function update(
        string $id,
        Category|string|null $category = null,
        ?array $components = null,
        RequestOptions|array|null $requestOptions = null,
    ): WhatsappMessageTemplateUpdateResponse {
        $params = Util::removeNulls(
            ['category' => $category, 'components' => $components]
        );

        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->update($id, params: $params, requestOptions: $requestOptions);

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a Whatsapp message template
     *
     * @param string $id Whatsapp message template ID
     * @param RequestOpts|null $requestOptions
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): mixed {
        // @phpstan-ignore-next-line argument.type
        $response = $this->raw->delete($id, requestOptions: $requestOptions);

        return $response->parse();
    }
}
