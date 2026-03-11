<?php

declare(strict_types=1);

namespace Telnyx\Services\Whatsapp;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Whatsapp\MessageTemplatesRawContract;
use Telnyx\Whatsapp\MessageTemplates\MessageTemplateCreateParams;
use Telnyx\Whatsapp\MessageTemplates\MessageTemplateCreateParams\Category;
use Telnyx\Whatsapp\MessageTemplates\MessageTemplateListParams;
use Telnyx\Whatsapp\MessageTemplates\MessageTemplateListParams\FilterCategory;
use Telnyx\Whatsapp\MessageTemplates\MessageTemplateListResponse;
use Telnyx\Whatsapp\MessageTemplates\MessageTemplateNewResponse;

/**
 * Manage Whatsapp message templates.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class MessageTemplatesRawService implements MessageTemplatesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a Whatsapp message template
     *
     * @param array{
     *   category: Category|value-of<Category>,
     *   components: list<mixed>,
     *   language: string,
     *   name: string,
     *   wabaID: string,
     * }|MessageTemplateCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<MessageTemplateNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|MessageTemplateCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessageTemplateCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'v2/whatsapp/message_templates',
            body: (object) $parsed,
            options: $options,
            convert: MessageTemplateNewResponse::class,
        );
    }

    /**
     * @api
     *
     * List Whatsapp message templates
     *
     * @param array{
     *   filterCategory?: FilterCategory|value-of<FilterCategory>,
     *   filterSearch?: string,
     *   filterStatus?: string,
     *   filterWabaID?: string,
     *   pageNumber?: int,
     *   pageSize?: int,
     * }|MessageTemplateListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<MessageTemplateListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|MessageTemplateListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = MessageTemplateListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'v2/whatsapp/message_templates',
            query: Util::array_transform_keys(
                $parsed,
                [
                    'filterCategory' => 'filter[category]',
                    'filterSearch' => 'filter[search]',
                    'filterStatus' => 'filter[status]',
                    'filterWabaID' => 'filter[waba_id]',
                    'pageNumber' => 'page[number]',
                    'pageSize' => 'page[size]',
                ],
            ),
            options: $options,
            convert: MessageTemplateListResponse::class,
            page: DefaultFlatPagination::class,
        );
    }
}
