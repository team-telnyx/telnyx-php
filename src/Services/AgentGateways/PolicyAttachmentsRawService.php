<?php

declare(strict_types=1);

namespace Telnyx\Services\AgentGateways;

use Telnyx\AgentGateways\PolicyAttachments\AgentGatewayPolicyAttachmentResponse;
use Telnyx\AgentGateways\PolicyAttachments\PolicyAttachmentCreateParams;
use Telnyx\AgentGateways\PolicyAttachments\PolicyAttachmentDeleteParams;
use Telnyx\AgentGateways\PolicyAttachments\PolicyAttachmentListResponse;
use Telnyx\Client;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;
use Telnyx\ServiceContracts\AgentGateways\PolicyAttachmentsRawContract;

/**
 * Where an instance applies each policy.
 *
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
final class PolicyAttachmentsRawService implements PolicyAttachmentsRawContract
{
    // @phpstan-ignore-next-line
    /**
     * @internal
     */
    public function __construct(private Client $client) {}

    /**
     * @api
     *
     * Applies a policy to every request, or to the requests for the models named. It applies from the next request on.
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param array{
     *   policy: string, default?: bool, models?: list<string>, priority?: int|null
     * }|PolicyAttachmentCreateParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayPolicyAttachmentResponse>
     *
     * @throws APIException
     */
    public function create(
        string $instanceID,
        array|PolicyAttachmentCreateParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PolicyAttachmentCreateParams::parseRequest(
            $params,
            $requestOptions,
        );

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'post',
            path: ['agent_gateways/%1$s/policy_attachments', $instanceID],
            body: (object) $parsed,
            options: $options,
            convert: AgentGatewayPolicyAttachmentResponse::class,
        );
    }

    /**
     * @api
     *
     * Lists where the instance applies each policy.
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<PolicyAttachmentListResponse>
     *
     * @throws APIException
     */
    public function list(
        string $instanceID,
        RequestOptions|array|null $requestOptions = null
    ): BaseResponse {
        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'get',
            path: ['agent_gateways/%1$s/policy_attachments', $instanceID],
            options: $requestOptions,
            convert: PolicyAttachmentListResponse::class,
        );
    }

    /**
     * @api
     *
     * Removes an attachment and returns it as it was. The policy stays.
     *
     * @param string $attachmentID the attachment's `id`
     * @param array{instanceID: string}|PolicyAttachmentDeleteParams $params
     * @param RequestOpts|null $requestOptions
     *
     * @return BaseResponse<AgentGatewayPolicyAttachmentResponse>
     *
     * @throws APIException
     */
    public function delete(
        string $attachmentID,
        array|PolicyAttachmentDeleteParams $params,
        RequestOptions|array|null $requestOptions = null,
    ): BaseResponse {
        [$parsed, $options] = PolicyAttachmentDeleteParams::parseRequest(
            $params,
            $requestOptions,
        );
        $instanceID = $parsed['instanceID'];
        unset($parsed['instanceID']);

        // @phpstan-ignore-next-line return.type
        return $this->client->request(
            method: 'delete',
            path: [
                'agent_gateways/%1$s/policy_attachments/%2$s',
                $instanceID,
                $attachmentID,
            ],
            options: $options,
            convert: AgentGatewayPolicyAttachmentResponse::class,
        );
    }
}
