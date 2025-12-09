<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\Faxes\FaxCreateParams;
use Telnyx\Faxes\FaxCreateParams\PreviewFormat;
use Telnyx\Faxes\FaxCreateParams\Quality;
use Telnyx\Faxes\FaxGetResponse;
use Telnyx\Faxes\FaxListParams;
use Telnyx\Faxes\FaxListResponse;
use Telnyx\Faxes\FaxNewResponse;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\FaxesContract;
use Telnyx\Services\Faxes\ActionsService;

final class FaxesService implements FaxesContract
{
    /**
     * @api
     */
    public ActionsService $actions;

    /**
     * @internal
     */
    public function __construct(private Client $client)
    {
        $this->actions = new ActionsService($client);
    }

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
     * @throws APIException
     */
    public function create(
        array|FaxCreateParams $params,
        ?RequestOptions $requestOptions = null
    ): FaxNewResponse {
        [$parsed, $options] = FaxCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<FaxNewResponse> */
        $response = $this->client->request(
            method: 'post',
            path: 'faxes',
            body: (object) $parsed,
            options: $options,
            convert: FaxNewResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * View a fax
     *
     * @throws APIException
     */
    public function retrieve(
        string $id,
        ?RequestOptions $requestOptions = null
    ): FaxGetResponse {
        /** @var BaseResponse<FaxGetResponse> */
        $response = $this->client->request(
            method: 'get',
            path: ['faxes/%1$s', $id],
            options: $requestOptions,
            convert: FaxGetResponse::class,
        );

        return $response->parse();
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
     *   page?: array{number?: int, size?: int},
     * }|FaxListParams $params
     *
     * @throws APIException
     */
    public function list(
        array|FaxListParams $params,
        ?RequestOptions $requestOptions = null
    ): FaxListResponse {
        [$parsed, $options] = FaxListParams::parseRequest(
            $params,
            $requestOptions,
        );

        /** @var BaseResponse<FaxListResponse> */
        $response = $this->client->request(
            method: 'get',
            path: 'faxes',
            query: $parsed,
            options: $options,
            convert: FaxListResponse::class,
        );

        return $response->parse();
    }

    /**
     * @api
     *
     * Delete a fax
     *
     * @throws APIException
     */
    public function delete(
        string $id,
        ?RequestOptions $requestOptions = null
    ): mixed {
        /** @var BaseResponse<mixed> */
        $response = $this->client->request(
            method: 'delete',
            path: ['faxes/%1$s', $id],
            options: $requestOptions,
            convert: null,
        );

        return $response->parse();
    }
}
