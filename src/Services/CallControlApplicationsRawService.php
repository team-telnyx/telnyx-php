<?php

declare(strict_types=1);

namespace Telnyx\Services;

use Telnyx\CallControlApplications\CallControlApplicationCreateParams;
use Telnyx\CallControlApplications\CallControlApplicationCreateParams\AnchorsiteOverride;
use Telnyx\CallControlApplications\CallControlApplicationCreateParams\DtmfType;
use Telnyx\CallControlApplications\CallControlApplicationCreateParams\WebhookAPIVersion;
use Telnyx\CallControlApplications\CallControlApplicationDeleteResponse;
use Telnyx\CallControlApplications\CallControlApplicationGetResponse;
use Telnyx\CallControlApplications\CallControlApplicationInbound;
use Telnyx\CallControlApplications\CallControlApplicationInbound\SipSubdomainReceiveSettings;
use Telnyx\CallControlApplications\CallControlApplicationListParams;
use Telnyx\CallControlApplications\CallControlApplicationListParams\Filter\Product;
use Telnyx\CallControlApplications\CallControlApplicationListParams\Filter\Status;
use Telnyx\CallControlApplications\CallControlApplicationListParams\Filter\Type;
use Telnyx\CallControlApplications\CallControlApplicationListParams\Sort;
use Telnyx\CallControlApplications\CallControlApplicationListResponse;
use Telnyx\CallControlApplications\CallControlApplicationNewResponse;
use Telnyx\CallControlApplications\CallControlApplicationOutbound;
use Telnyx\CallControlApplications\CallControlApplicationUpdateParams;
use Telnyx\CallControlApplications\CallControlApplicationUpdateResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\CallControlApplicationsRawContract;

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
     *   dtmfType?: 'RFC 2833'|'Inband'|'SIP INFO'|DtmfType,
     *   firstCommandTimeout?: bool,
     *   firstCommandTimeoutSecs?: int,
     *   inbound?: array{
     *     channelLimit?: int,
     *     shakenStirEnabled?: bool,
     *     sipSubdomain?: string,
     *     sipSubdomainReceiveSettings?: 'only_my_connections'|'from_anyone'|SipSubdomainReceiveSettings,
     *   }|CallControlApplicationInbound,
     *   outbound?: array{
     *     channelLimit?: int, outboundVoiceProfileID?: string
     *   }|CallControlApplicationOutbound,
     *   redactDtmfDebugLogging?: bool,
     *   webhookAPIVersion?: '1'|'2'|WebhookAPIVersion,
     *   webhookEventFailoverURL?: string|null,
     *   webhookTimeoutSecs?: int|null,
     * }|CallControlApplicationCreateParams $params
     *
     * @return BaseResponse<CallControlApplicationNewResponse>
     *
     * @throws APIException
     */
    public function create(
        array|CallControlApplicationCreateParams $params,
        ?RequestOptions $requestOptions = null,
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
     *
     * @return BaseResponse<CallControlApplicationGetResponse>
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
     *   dtmfType?: 'RFC 2833'|'Inband'|'SIP INFO'|CallControlApplicationUpdateParams\DtmfType,
     *   firstCommandTimeout?: bool,
     *   firstCommandTimeoutSecs?: int,
     *   inbound?: array{
     *     channelLimit?: int,
     *     shakenStirEnabled?: bool,
     *     sipSubdomain?: string,
     *     sipSubdomainReceiveSettings?: 'only_my_connections'|'from_anyone'|SipSubdomainReceiveSettings,
     *   }|CallControlApplicationInbound,
     *   outbound?: array{
     *     channelLimit?: int, outboundVoiceProfileID?: string
     *   }|CallControlApplicationOutbound,
     *   redactDtmfDebugLogging?: bool,
     *   tags?: list<string>,
     *   webhookAPIVersion?: '1'|'2'|CallControlApplicationUpdateParams\WebhookAPIVersion,
     *   webhookEventFailoverURL?: string|null,
     *   webhookTimeoutSecs?: int|null,
     * }|CallControlApplicationUpdateParams $params
     *
     * @return BaseResponse<CallControlApplicationUpdateResponse>
     *
     * @throws APIException
     */
    public function update(
        string $id,
        array|CallControlApplicationUpdateParams $params,
        ?RequestOptions $requestOptions = null,
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
     *   filter?: array{
     *     applicationName?: array{contains?: string},
     *     applicationSessionID?: string,
     *     connectionID?: string,
     *     failed?: bool,
     *     from?: string,
     *     legID?: string,
     *     name?: string,
     *     occurredAt?: array{
     *       eq?: string, gt?: string, gte?: string, lt?: string, lte?: string
     *     },
     *     outboundOutboundVoiceProfileID?: string,
     *     product?: 'call_control'|'fax'|'texml'|Product,
     *     status?: 'init'|'in_progress'|'completed'|Status,
     *     to?: string,
     *     type?: 'command'|'webhook'|Type,
     *   },
     *   page?: array{
     *     after?: string, before?: string, limit?: int, number?: int, size?: int
     *   },
     *   sort?: 'created_at'|'connection_name'|'active'|Sort,
     * }|CallControlApplicationListParams $params
     *
     * @return BaseResponse<CallControlApplicationListResponse>
     *
     * @throws APIException
     */
    public function list(
        array|CallControlApplicationListParams $params,
        ?RequestOptions $requestOptions = null,
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
            convert: CallControlApplicationListResponse::class,
        );
    }

    /**
     * @api
     *
     * Deletes a call control application.
     *
     * @param string $id identifies the resource
     *
     * @return BaseResponse<CallControlApplicationDeleteResponse>
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
            path: ['call_control_applications/%1$s', $id],
            options: $requestOptions,
            convert: CallControlApplicationDeleteResponse::class,
        );
    }
}
