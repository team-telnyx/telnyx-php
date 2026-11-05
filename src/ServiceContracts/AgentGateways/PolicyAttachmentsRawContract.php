<?php

declare(strict_types=1);

namespace Telnyx\ServiceContracts\AgentGateways;

use Telnyx\AgentGateways\PolicyAttachments\AgentGatewayPolicyAttachmentResponse;
use Telnyx\AgentGateways\PolicyAttachments\PolicyAttachmentCreateParams;
use Telnyx\AgentGateways\PolicyAttachments\PolicyAttachmentDeleteParams;
use Telnyx\AgentGateways\PolicyAttachments\PolicyAttachmentListResponse;
use Telnyx\Core\Contracts\BaseResponse;
use Telnyx\Core\Exceptions\APIException;
use Telnyx\RequestOptions;

/**
 * @phpstan-import-type RequestOpts from \Telnyx\RequestOptions
 */
interface PolicyAttachmentsRawContract
{
    /**
     * @api
     *
     * @param string $instanceID the Agent Gateway's `id`
     * @param array<string,mixed>|PolicyAttachmentCreateParams $params
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
    ): BaseResponse;

    /**
     * @api
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
    ): BaseResponse;

    /**
     * @api
     *
     * @param string $attachmentID the attachment's `id`
     * @param array<string,mixed>|PolicyAttachmentDeleteParams $params
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
    ): BaseResponse;
}
