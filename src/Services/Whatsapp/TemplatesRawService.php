<?php

declare(strict_types=1);

namespace Telnyx\Services\Whatsapp;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\Whatsapp\TemplatesRawContract;
use Telnyx\Whatsapp\Templates\TemplateCreateParams;
use Telnyx\Whatsapp\Templates\TemplateCreateParams\Category;
use Telnyx\Whatsapp\Templates\TemplateListParams;
use Telnyx\Whatsapp\Templates\TemplateListParams\FilterCategory;
use Telnyx\Whatsapp\Templates\TemplateListResponse;
use Telnyx\Whatsapp\Templates\TemplateNewResponse;

/**
 * Manage Whatsapp message templates.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class TemplatesRawService implements TemplatesRawContract
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
     * }|TemplateCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<TemplateNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|TemplateCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TemplateCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'v2/whatsapp/message_templates',
            body: (object) $parsed,
            options: $options,
            convert: TemplateNewResponse::class,
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
     * }|TemplateListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultFlatPagination<TemplateListResponse>>
     *
     * @throws APIException
     */
    public function list(
        array|TemplateListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = TemplateListParams::parseRequest(
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
            convert: TemplateListResponse::class,
            page: DefaultFlatPagination::class,
        );
    }
}
