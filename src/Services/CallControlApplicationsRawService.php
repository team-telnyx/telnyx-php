<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\CallControlApplications\CallControlApplication;
use Telnyx\CallControlApplications\CallControlApplicationCreateParams;
use Telnyx\CallControlApplications\CallControlApplicationCreateParams\AnchorsiteOverride;
use Telnyx\CallControlApplications\CallControlApplicationCreateParams\DtmfType;
use Telnyx\CallControlApplications\CallControlApplicationCreateParams\WebhookAPIVersion;
use Telnyx\CallControlApplications\CallControlApplicationDeleteResponse;
use Telnyx\CallControlApplications\CallControlApplicationGetResponse;
use Telnyx\CallControlApplications\CallControlApplicationInbound;
use Telnyx\CallControlApplications\CallControlApplicationListParams;
use Telnyx\CallControlApplications\CallControlApplicationListParams\Filter;
use Telnyx\CallControlApplications\CallControlApplicationListParams\Page;
use Telnyx\CallControlApplications\CallControlApplicationListParams\Sort;
use Telnyx\CallControlApplications\CallControlApplicationNewResponse;
use Telnyx\CallControlApplications\CallControlApplicationOutbound;
use Telnyx\CallControlApplications\CallControlApplicationUpdateParams;
use Telnyx\CallControlApplications\CallControlApplicationUpdateResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\DefaultPagination;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CallControlApplicationsRawContract;

/**
 * @phpstan-import-type FilterShape from \Telnyx\CallControlApplications\CallControlApplicationListParams\Filter
 * @phpstan-import-type PageShape from \Telnyx\CallControlApplications\CallControlApplicationListParams\Page
 * @phpstan-import-type CallControlApplicationInboundShape from \Telnyx\CallControlApplications\CallControlApplicationInbound
 * @phpstan-import-type CallControlApplicationOutboundShape from \Telnyx\CallControlApplications\CallControlApplicationOutbound
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class CallControlApplicationsRawService implements CallControlApplicationsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Create a call control application.
     *
     * @param array{
     *   applicationName: string,
     *   webhookEventURL: string,
     *   active?: bool,
     *   anchorsiteOverride?: value-of<AnchorsiteOverride>,
     *   callCostInWebhooks?: bool,
     *   dtmfType?: DtmfType|value-of<DtmfType>,
     *   firstCommandTimeout?: bool,
     *   firstCommandTimeoutSecs?: int,
     *   inbound?: CallControlApplicationInbound|CallControlApplicationInboundShape,
     *   outbound?: CallControlApplicationOutbound|CallControlApplicationOutboundShape,
     *   redactDtmfDebugLogging?: bool,
     *   webhookAPIVersion?: WebhookAPIVersion|value-of<WebhookAPIVersion>,
     *   webhookEventFailoverURL?: string|null,
     *   webhookTimeoutSecs?: int|null,
     * }|CallControlApplicationCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CallControlApplicationNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|CallControlApplicationCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CallControlApplicationCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: 'call_control_applications',
            body: (object) $parsed,
            options: $options,
            convert: CallControlApplicationNewResponse::class,
        );
    }

    /**
     * @api
     *
     * Retrieves the details of an existing call control application.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CallControlApplicationGetResponse>
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
            path: ['call_control_applications/%1$s', $id],
            options: $requestOptions,
            convert: CallControlApplicationGetResponse::class,
        );
    }

    /**
     * @api
     *
     * Updates settings of an existing call control application.
     *
     * @param string $id identifies the resource
     * @param array{
     *   applicationName: string,
     *   webhookEventURL: string,
     *   active?: bool,
     *   anchorsiteOverride?: value-of<CallControlApplicationUpdateParams\AnchorsiteOverride>,
     *   callCostInWebhooks?: bool,
     *   dtmfType?: CallControlApplicationUpdateParams\DtmfType|value-of<CallControlApplicationUpdateParams\DtmfType>,
     *   firstCommandTimeout?: bool,
     *   firstCommandTimeoutSecs?: int,
     *   inbound?: CallControlApplicationInbound|CallControlApplicationInboundShape,
     *   outbound?: CallControlApplicationOutbound|CallControlApplicationOutboundShape,
     *   redactDtmfDebugLogging?: bool,
     *   tags?: list<string>,
     *   webhookAPIVersion?: CallControlApplicationUpdateParams\WebhookAPIVersion|value-of<CallControlApplicationUpdateParams\WebhookAPIVersion>,
     *   webhookEventFailoverURL?: string|null,
     *   webhookTimeoutSecs?: int|null,
     * }|CallControlApplicationUpdateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CallControlApplicationUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|CallControlApplicationUpdateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CallControlApplicationUpdateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'patch',
            path: ['call_control_applications/%1$s', $id],
            body: (object) $parsed,
            options: $options,
            convert: CallControlApplicationUpdateResponse::class,
        );
    }

    /**
     * @api
     *
     * Return a list of call control applications.
     *
     * @param array{
     *   filter?: Filter|FilterShape, page?: Page|PageShape, sort?: Sort|value-of<Sort>
     * }|CallControlApplicationListParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<DefaultPagination<CallControlApplication>>
     *
     * @throws APIException
     */
    public function list(
        array|CallControlApplicationListParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = CallControlApplicationListParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: 'call_control_applications',
            query: $parsed,
            options: $options,
            convert: CallControlApplication::class,
            page: DefaultPagination::class,
        );
    }

    /**
     * @api
     *
     * Deletes a call control application.
     *
     * @param string $id identifies the resource
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<CallControlApplicationDeleteResponse>
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
            path: ['call_control_applications/%1$s', $id],
            options: $requestOptions,
            convert: CallControlApplicationDeleteResponse::class,
        );
    }
}
