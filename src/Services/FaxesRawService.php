<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Core\Util;
use Telnyx\DefaultFlatPagination;
use Telnyx\Faxes\Fax;
use Telnyx\Faxes\FaxCreateParams;
use Telnyx\Faxes\FaxCreateParams\PreviewFormat;
use Telnyx\Faxes\FaxCreateParams\Quality;
use Telnyx\Faxes\FaxGetResponse;
use Telnyx\Faxes\FaxListParams;
use Telnyx\Faxes\FaxNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\FaxesRawContract;

final class FaxesRawService implements FaxesRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Send a fax. Files have size limits and page count limit validations. If a file is bigger than 50MB or has more than 350 pages it will fail with `file_size_limit_exceeded` and `page_count_limit_exceeded` respectively.
     *
     * **Expected Webhooks:**
     *
     * - `fax.queued`
     * - `fax.media.processed`
     * - `fax.sending.started`
     * - `fax.delivered`
     * - `fax.failed`
     *
     * @param array{
     *   connectionID: string,
     *   from: string,
     *   to: string,
     *   clientState?: string,
     *   fromDisplayName?: string,
     *   mediaName?: string,
     *   mediaURL?: string,
     *   monochrome?: bool,
     *   previewFormat?: 'pdf'|'tiff'|PreviewFormat,
     *   quality?: 'normal'|'high'|'very_high'|'ultra_light'|'ultra_dark'|Quality,
     *   storeMedia?: bool,
     *   storePreview?: bool,
     *   t38Enabled?: bool,
     *   webhookURL?: string,
     * }|FaxCreateParams $params
     *
     * @return BaseResponse<FaxNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|FaxCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = FaxCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'faxes',
            body: (object) $parsed,
            options: $options,
            convert: FaxNewResponse::class,
        );
    }

    /**
     * @api
     *
     * View a fax
     *
     * @param string $id the unique identifier of a fax
     *
     * @return BaseResponse<FaxGetResponse>
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['faxes/%1$s', $id],
            options: $requestOptions,
            convert: FaxGetResponse::class,
        );
    }

    /**
     * @api
     *
     * View a list of faxes
     *
     * @param array{
     *   filter?: array{
     *     createdAt?: array{
     *       gt?: string|\DateTimeInterface,
     *       gte?: string|\DateTimeInterface,
     *       lt?: string|\DateTimeInterface,
     *       lte?: string|\DateTimeInterface,
     *     },
     *     direction?: array{eq?: string},
     *     from?: array{eq?: string},
     *     to?: array{eq?: string},
     *   },
     *   pageNumber?: int,
     *   pageSize?: int,
     * }|FaxListParams $params
     *
     * @return BaseResponse<DefaultFlatPagination<Fax>>
     *
     * @throws APIException
     */
    public function list(
        array|FaxListParams $params,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        [$parsed, $options] = FaxListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'faxes',
            query: Util::array_transform_keys(
                $parsed,
                ['pageNumber' => 'page[number]', 'pageSize' => 'page[size]']
            ),
            options: $options,
            convert: Fax::class,
            page: DefaultFlatPagination::class,
        );
    }

    /**
     * @api
     *
     * Delete a fax
     *
     * @param string $id the unique identifier of a fax
     *
     * @return BaseResponse<mixed>
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: ['faxes/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );
    }
}
