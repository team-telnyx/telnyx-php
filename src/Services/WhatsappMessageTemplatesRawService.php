<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\WhatsappMessageTemplatesRawContract;
use Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateGetResponse;
use Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateUpdateParams;
use Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateUpdateParams\Category;
use Telnyx\WhatsappMessageTemplates\WhatsappMessageTemplateUpdateResponse;

/**
 * Manage Whatsapp message templates.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class WhatsappMessageTemplatesRawService implements WhatsappMessageTemplatesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Get a Whatsapp message template by ID
     *
     * @param string $id Whatsapp message template ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WhatsappMessageTemplateGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['v2/whatsapp_message_templates/%1$s', $id],
            options: $requestOptions,
            convert: WhatsappMessageTemplateGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Update a Whatsapp message template
     *
     * @param string $id Whatsapp message template ID
     * @param array{
     *   category?: Category|value-of<Category>, components?: list<mixed>
     * }|WhatsappMessageTemplateUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<WhatsappMessageTemplateUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|WhatsappMessageTemplateUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = WhatsappMessageTemplateUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['v2/whatsapp_message_templates/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: WhatsappMessageTemplateUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Delete a Whatsapp message template
     *
     * @param string $id Whatsapp message template ID
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['v2/whatsapp_message_templates/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );
    }
}
